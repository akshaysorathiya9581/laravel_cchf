<?php

namespace App\Http\Controllers;

use App\Models\campaign;
use App\Models\CampaignSplitPot;
use App\Models\Donations;
use App\Models\DonationSplitPot;
use App\Models\DonationTips;
use App\Models\Teams;
use App\Models\TransactionDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use App\Models\FailedTransaction;
use App\Models\OrganizationMeta;
use App\Models\PaymentMethod;
use App\Models\Prizes;
use App\Models\TicketOptions;
use App\Models\TicketOptionsPrizes;
use App\Models\Tips;
use App\Models\DonationMasbiaDetail;
use App\Services\Payment\CardknoxService;
use App\Services\Payment\StripeService;
use App\Services\Payment\UsaePayService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $seasonId = $request->session()->get('season_id');
        $campaigns = campaign::where('season_id', $seasonId)->get();
        $donations = Donations::with('campaign')
            ->orderBy('created_at', 'DESC')
            ->get();



        return view(
            'admin.donation.donation',
            [
                'donations' => $donations,
                'campaigns' => $campaigns
            ]
        );
    }
    public function getDonationData(Request $request)
    {
        $data = Donations::with('campaign')
            ->leftJoin('campaigns', 'donations.campaign_id', '=', 'campaigns.id')
            ->leftJoin('campaign_teams', 'donations.team_id', '=', 'campaign_teams.id')
            ->select('donations.*', 'campaigns.camp_title as campaign_title', 'campaign_teams.display_name as team_name');

        if ($request->has('campaign_id') && $request->campaign_id != '') {
            $data->where('campaign_id', $request->campaign_id);
        }
        if ($request->has('status') && $request->status != '') {
            $data->where('status', $request->status);
        }
        if ($request->has('type') && $request->type != '') {
            if ($request->type == 'offline') {
                $data->where('payment_gateway', 'offline');
            } else {
                $data->where('payment_gateway', '!=', 'offline');
            }
        }
        if ($request->has('start_date') && $request->start_date != '') {
            $data->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->has('end_date') && $request->end_date != '') {
            $data->whereDate('created_at', '<=', $request->end_date);
        }

        //sortable

        // dd($request->all());
        if ($request->has('order') && !empty($request->order)) {
            $orderData = $request->order[0];
            $columnIndex = $orderData['column'];
            $direction = $orderData['dir'] === 'desc' ? 'desc' : 'asc';


            $columnName = $request->columns[$columnIndex]['name'] ?? 'created_at';

            if ($columnIndex ==  0) {
                $columnName = 'created_at';
                $direction = 'desc';
            }
            if ($columnName == 'donor_name') {
                $columnName = 'donor_first_name';
            }
            if ($columnName === 'campaign.camp_title') {
                $columnName = 'campaigns.camp_title';
            }
            if ($columnName === 'team_name') {
                $columnName = 'team_name';
            }
            $data->orderBy($columnName, $direction);
        } else {
            $data->orderBy('created_at', 'desc');
        }

        if ($request->has('search') && $request->search['value'] != '') {
            $searchValue = $request->search['value'];

            $searchableColumns = [
                'donor_first_name',
                'donor_last_name',
                function ($q, $value) {
                    $q->orWhere(DB::raw("CONCAT(donor_first_name, ' ', donor_last_name)"), 'like', "%{$value}%");
                },
                'usd_amount',
                'amount',
                'status',
                'recurring',
                'donor_email'
            ];

            applySearch($data, $searchableColumns, $searchValue, function ($q, $value) {
                $q->orWhereHas('campaign', function ($query) use ($value) {
                    $query->where('camp_title', 'like', "%{$value}%");
                });
            });
        }

        // return DataTables::of($data)->make(true);


        //   dd($data->toSql());
        return DataTables::of($data)
            ->addColumn('camp_title', function ($row) {
                return $row->campaign ? $row->campaign->camp_title : '';
            })
            ->addColumn('donor_name', function ($row) {
                return $row->donor_first_name . ' ' . $row->donor_last_name;
            })
            ->addColumn('team_name', function ($row) {
                $team = Teams::select('display_name')->where('id', $row->team_id)->first();
                return $team ? $team->display_name : '';
            })
            ->addColumn('action', function ($row) {
                $detailUrl = route('admin.donationsDetails', $row->id);
                return '
                    <a href="' . $detailUrl . '" class="btn btn-success" style="font-size: 10px;white-space:nowrap;">
                        <i class="fas fa-info-circle"></i> Details
                    </a>';
            })->rawColumns(['action'])
            ->make(true);
    }

    // DONATION DETAILS FOR ADMIN
    public function details($id)
    {

        $details = Donations::where('id', $id)->first();
        if (empty($details)) {
            return abort(404);
        }
        $campaign_id = $details->campaign_id;
        $TransactionDetails = TransactionDetails::where('donation_id', $details->id)->first();
        $teams = Teams::where('campaign_id', $campaign_id)->get();
        $DonationTips = DonationTips::where('donation_id', $id)->with('tips')->get() ?? [];
        // dd($DonationTips);
        $campaign = campaign::select('camp_title')->where('id', $campaign_id)->first();
        $stp = DonationSplitPot::where('donation_id', $id)->first() ?? '';
        $recurring_details = [];
        if ($details->recurring != 'oneTime' && $details->payment_gateway != 'offline') {
            $recurring_details = $this->getRecurringDetails($details, $TransactionDetails) ?? [];
        }
         $TipsTotalAmount = DonationTips::where('donation_id', $id)->sum('amount') ?? 0;
        return view(
            'admin.donation.donationDetails',
            [
                'details' => $details,
                'campaign' => $campaign,
                'teams' => $teams,
                'stp' => $stp,
                'tips' => $DonationTips,
                'recurring_details' => $recurring_details ?? [],
                'TipsTotalAmount'=> $TipsTotalAmount
            ]
        );
    }
    public function getRecurringDetails($details, $TransactionDetails)
    {
        // dd($TransactionDetails);
        try {

            $customer_id = $TransactionDetails->customer_id ?? '';
            $gateway = $details->payment_gateway;
            $campaign_id = $details->campaign_id;
            $transaction_id = $details->transaction_id;
            $subscription_id = $details->subscription_id ?? '';
            $payment_env = config('app.payment_env');


            if ($gateway == 'cardknox') {
                $gateway = 'cardknox_cc';
            }
            // dd($payment_env);

            $paymentMethod = PaymentMethod::where('campaign_id', $campaign_id)
                ->where('environment',  $payment_env)
                ->where('payment_method', $gateway)
                ->firstOrFail();

            switch ($paymentMethod->payment_method) {
                case 'cardknox_cc':
                    $cardknoxService = App::make(CardknoxService::class);
                    return $cardknoxService->getCardKnoxRecurring($paymentMethod, $transaction_id, $subscription_id);
                case 'stripe':
                    $stripeService = App::make(StripeService::class);
                    $response = $stripeService->getStripeRecurring($paymentMethod, $transaction_id, $subscription_id);
                    return $response;
                case 'usaepay':
                    $UsaePayService = App::make(UsaePayService::class);
                    $response = $UsaePayService->getUSAePayRecurring($paymentMethod, $customer_id);
                    return $response;
                default:
                    return ['success' => false, 'error' => 'Invalid payment method'];
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    public function referrers()
    {
        return view(
            'admin.donation.referrers'
        );
    }
    public function changeDonationTeam(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'donationId' => 'required|numeric',
            'team_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $donationId = $request->donationId;
            $donation = Donations::findOrFail($donationId);
            $donation_team = $donation->update(
                [
                    'team_id' => $request->team_id,
                ]
            );

            DB::commit();

            return redirect()->route('admin.donationsDetails', ['id' => $donationId])->with('success', 'Team Changed successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error while change team: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to change team. ' . $e->getMessage());
        }
    }
    public function offline_donations(Request $request)
    {
        $seasonId = $request->session()->get('season_id');
        $campaign = Campaign::where('season_id', $seasonId)->select('id', 'camp_title')->get();
        $teams = Teams::all();
        return view(
            'admin.donation.offlineDonation',
            [
                'campaigns' => $campaign,
                'teams' => $teams
            ]
        );
    }

    public function getYingerManByCampaign($campaignID)
    {
        $tips = Tips::where('campaign_id', $campaignID)->get();
        return response()->json($tips);
    }
    public function getTeamsByCampaign($campaignID)
    {
        // dd($campaignID);
        $teams = Teams::where('campaign_id', $campaignID)->get();
        return response()->json($teams);
    }
    public function edit_donation_notes(Request $request, Donations $donations)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'notesId' => 'required|numeric',
            'notes' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $notesId = $request->notesId;
            $notes = Donations::findOrFail($notesId);
            $donation_notes = $notes->update(
                [
                    'notes' => $request->notes,
                ]
            );

            DB::commit();

            return redirect()->route('admin.donationsDetails', ['id' => $notesId])->with('success', 'Notes Updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error while updating notes: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to updating notes. ' . $e->getMessage());
        }
    }
    public function edit_donation(Request $request, Donations $donations)
    {
        $request->merge([
            'is_anonymous' => $request->input('is_anonymous', 0)
        ]);
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'donationId' => 'required|numeric',
            'is_anonymous' => 'numeric|min:0',
            'donor_first_name' => 'required|string',
            'donor_last_name' => 'required|string',
            'donor_email' => 'required|string',
            'usd_amount' => 'required|numeric',
            'amount' => 'required|numeric',
            'stp_usd_amount' => 'nullable|numeric',
            'stp_amount' => 'nullable|numeric',
            'stp_entries' => 'nullable|numeric',
            'entries' => 'nullable|numeric',
            'donor_phone' => 'nullable|numeric',
            'address' => 'nullable|string',
            'zipcode' => 'nullable|string',
            'street' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'comments' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $donationId = $request->donationId;
            $donation = Donations::findOrFail($donationId);
            $donations = $donation->update(
                [
                    'is_anonymous' => $request->is_anonymous,
                    'donor_first_name' => $request->donor_first_name,
                    'donor_last_name' => $request->donor_last_name,
                    'donor_email' => $request->donor_email,
                    'usd_amount' => $request->usd_amount,
                    'amount' => $request->amount,
                    'entries' => $request->entries,
                    'donor_phone' => $request->donor_phone,
                    'address' => $request->address,
                    'zipcode' => $request->zipcode,
                    'street' => $request->street,
                    'city' => $request->city,
                    'state' => $request->state,
                    'country' => $request->country,
                    'comments' => $request->comments,

                ]
            );
            $donationStp = DonationSplitPot::updateOrCreate(
                [
                    'donation_id' => $donationId,
                ],
                [
                    'stp_usd_amount' => $request->stp_usd_amount,
                    'stp_amount' => $request->stp_amount,
                    'stp_entries' => $request->stp_entries
                ]
            );

            DB::commit();

            return redirect()->route('admin.donationsDetails', ['id' => $donationId])->with('success', 'Notes Updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error while edit donation: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed edit Donation. ' . $e->getMessage());
        }
    }

    public function create(Request $request, Donations $donations)
    {
        // echo "<pre>";
        // print_r($request->all());die;
        // dd($request->all());
        $request->merge([
            'is_anonymous' => $request->input('is_anonymous', 0)
        ]);
        $validator = Validator::make($request->all(), [
            'campaign_id' => 'required|numeric',
            'donor_first_name' => 'required|string',
            'donor_last_name' => 'required|string',
            'donor_email' => 'required|string',
            'donor_phone' => 'nullable|string',
            'address' => 'nullable|string',
            'team_id' => 'nullable|numeric',
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'notes' => 'nullable|string',
            'campaign_split_pot_id' => 'nullable|numeric',
            'is_anonymous' => 'numeric|min:0',
            'recurring' => 'required|string',
            'recurring_intervals' => 'nullable|numeric',
            'type' => 'required|string',
            'season_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect('admin/offline-donations')
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {

            $Donations = Donations::create(
                [
                    'campaign_id' => $request->campaign_id,
                    'donor_first_name' => $request->donor_first_name,
                    'donor_last_name' => $request->donor_last_name,
                    'donor_email' => $request->donor_email,
                    'donor_phone' => $request->donor_phone,
                    'address' => $request->address,
                    'team_id' => $request->team_id,
                    'amount' => $request->amount,
                    'donated_amount' => $request->amount,
                    'usd_amount' => $request->amount,
                    'currency' => $request->currency,
                    'notes' => $request->notes,
                    'is_anonymous' => $request->is_anonymous,
                    'recurring' => $request->recurring,
                    'recurring_intervals' => $request->recurring_intervals,
                    'type' => $request->type,
                    'season_id' => $request->season_id,
                    'payment_gateway' => 'offline',
                ]
            );
            $DonationsId = $Donations->id;
            $DonationSplitPot = DonationSplitPot::create([
                'donation_id' => $DonationsId,
                // 'campaign_split_pot_id' => $request->campaign_split_pot_id
            ]);


            if ($request->has('yinger_man') && $request->has('tipAmount')) {
                foreach ($request->input('yinger_man') as $key => $yingerMan) {
                    $tipAmount = $request->input('tipAmount')[$key];
                    
                    if (!empty($tipAmount)) {  
                        DonationTips::create([
                            'donation_id' => $DonationsId,
                            'recipient_id' => $yingerMan,
                            'amount' => $tipAmount,
                        ]);
                    }
                }
            }


            DB::commit();

            return redirect()->route('admin.offline-donations')->with('success', 'Donations added successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error importing donations: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an error importing donations. Please try again.' . $e->getMessage());
        }
    }

    public function handlePostPayment($request, $campaignId, $paymentIntent)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $don_recurring = $request->don_recurring ?? 0;
            $is_anonymous = $request->is_anonymous ?? 0;
            if ($don_recurring == 0) {
                $recurring = 'oneTime';
                $subscription_id = null;
                $recurring_intervals = 1;
            } else {
                $recurring = $request->recurring;
                $recurring_intervals = $request->recurring_intervals;
            }

            //    $response = $paymentIntent['paymentIntent'];
            //    $transactionId = $response->json()['xRefNum'];
            if (is_object($paymentIntent)) {
                $paymentIntent = (array) $paymentIntent;
            }

            $card_type = '';
            $paymentDetails = $paymentIntent['paymentIntent'] ?? null;
            $status = "Paid";
            $error_detail = '';
            $subscription_id = null;
            $transactionId = '';
            $customer_id = null;
            if ($request->payment_gateway == 'stripe') {
                // dd($paymentDetails);
                $subscription_id = $paymentIntent['paymentIntent']['sub_id'];
                $card_token = $request->stripeToken;
                $card_number = $paymentDetails['last4'];
                $expiry = str_pad($paymentDetails['exp_month'], 2, '0', STR_PAD_LEFT) . substr($paymentDetails['exp_year'], -2);
                $card_expiry = $expiry;
                $card_type = $paymentDetails['brand'];
            } else if ($request->payment_gateway == 'cardknox' || $request->payment_gateway == 'cardknox_ach' || $request->payment_gateway == 'cardknox_cc') {
                $xCardNum = $request->xCardNum;
                // $cardNumber = $xCardNum != "" ? substr($paymentIntent['paymentIntent']['xMaskedCardNumber'], -4) : substr($$paymentIntent['paymentIntent']['xMaskedAccountNumber'], -4);
                $card_number = 5454;
                $card_expiry = $request->expiry;
                $transactionId = $paymentIntent['paymentIntent']['xRefNum'];
                $paymentStatus = $paymentIntent['paymentIntent']['xStatus'];
                $paymentError = $paymentIntent['paymentIntent']['xError'];
                if ($paymentStatus == 'E' || $paymentError) {
                    $status = "Failed";
                    $error_detail = $paymentError;
                }
                if ($don_recurring == 1) {
                    $subscription_id = $paymentIntent['paymentIntent']['xScheduleID'];
                }
                $card_token =   '';
                // $cardType = $xCardNum != "" ? $$paymentIntent['paymentIntent']['xCardType'] : 'Check ACH';
                $card_type = '';
            } else if ($request->payment_gateway == 'banquest') {
                $card_token = '';
                $card_number = $request->card;
                $card_expiry = '';
            } else if ($request->payment_gateway == 'authorize_net') {
                $card_token = $paymentDetails['cardToken'];
                $card_number = $paymentDetails['cardNumber'];
                $card_expiry = $paymentDetails['cardExpiry'];
            } else if ($request->payment_gateway == 'donors_fund') {
                $card_token = $paymentIntent['paymentIntent']['transactionId'];
                $card_number = $request->dfd_card_num;
                $card_expiry = '';
            } else if ($request->payment_gateway == 'ojc_fund') {
                dd($paymentDetails['cardNumber']);
                $card_number = $paymentDetails['cardNumber'];
                $card_expiry = $paymentDetails['cardExpiry'];
                $card_type =  $paymentDetails['cardType'];
                $card_token = '';
                $transactionId = $paymentDetails['paymentID'];
            } else if ($request->payment_gateway == 'matbia') {
                $card_number = $paymentDetails['cardNumber'];
                $card_expiry = $paymentDetails['cardExpiry'];
                $card_token = null;
                $card_type = $paymentDetails['cardType'];
                $transactionId = $paymentDetails['paymentID'];
                if ($don_recurring == 1) {
                    $subscription_id = $paymentDetails['scheduleID'];
                }
            } else if ($request->payment_gateway == 'usaepay') {

                $card_number = substr($paymentDetails->creditcard->number, -4);
                if ($don_recurring == 1) {
                    $subscription_id = $paymentDetails->key;
                    $customer_id =    $paymentDetails->customer->custkey;
                }
                $card_token = $request->payment_key;
                $transactionId = $paymentDetails->key . '_%_' . $paymentDetails->refnum;
                $card_expiry = '';
                $card_type = (substr($card_number, 0, 1) == "4" ? "Visa" : (substr($card_number, 0, 1) == "5" ? "MasterCard" : (substr($card_number, 0, 1) == "6" ? "Discover" : (substr($card_number, 0, 2) == "34" ? "American Express" : (substr($card_number, 0, 2) == "37" ? "American Express" : (substr($card_number, 0, 2) == "36" ? "Diners Club" : (substr($card_number, 0, 2) == "38" ? "Diners Club" : (substr($card_number, 0, 2) == "35" ? "JCB" : "Unknown"))))))));
            } else {
                $card_token = null;
                $card_number = null;
                $card_expiry = '';
                $transactionId = null;
                $card_type = '';
                $customer_id = null;
            }


            $ticket_option_id = $request->ticket_option_id ?? null;
            $entries =  0;

            if ($ticket_option_id) {
                $ticket_option = TicketOptions::find($ticket_option_id);
                $entries = $ticket_option->entries;
            }

            // $donationAmount = $request->amount / $recurring_intervals;
            $donationAmount = $request->amount;
            if (!$request->session()->has('visitor_id')) {
                $visitorId = Str::uuid();

                $request->session()->put('visitor_id', $visitorId);
            } else {
                $visitorId = $request->session()->get('visitor_id');
            }
            $visitorId = $visitorId->toString();
            $full_address =  $request->address . ' ' .  $request->state . ' ' . $request->zipcode . ' ' .  $request->country;

            $donation_insert_data = [
                'campaign_id' => $campaignId,
                'team_id' => $request->teamId ?? 0,
                // vistor id is in session
                'visitor_id' => $visitorId,
                'status' => $status,
                'ticket_option_id' => $ticket_option_id,
                'donor_first_name' => $request->donor_first_name,
                'donor_last_name' => $request->donor_last_name,
                'donor_email' => $request->donor_email,
                'donor_phone' => $request->donor_phone,
                'full_address' => $full_address,
                'address' => $request->address,
                'comments' => $request->comments,
                'currency' => $request->currency,
                'city' => $request->city,
                'recurring' => $recurring,
                'state' => $request->state,
                'zipcode' => $request->zipcode,
                'country' => $request->country,
                'amount' => $donationAmount,
                'is_anonymous' => $is_anonymous,
                'entries' => $entries,
                'usd_amount' => $donationAmount,
                'donated_amount' => $donationAmount,
                'payment_gateway' => $request->payment_gateway,
                'paid_by' => 1,
                'recurring_intervals' => $recurring_intervals,
                'subscription_id' => $subscription_id,
                'transaction_id' => $transactionId ?? '',
                'season_id' => $request->season_id,
                'friendly_key' =>  substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10 / strlen($x)))), 1, 10),
            ];
            
            if($request->has('donation_masbia_details') && $request->input('donation_masbia_details') != '' ) {
                $donation_insert_data['donor_company'] = $request->donor_company;
            }

            $Donations = Donations::create($donation_insert_data);

            $DonationsId = $Donations->id;
            $DonationSTP = DonationSplitPot::create([
                'donation_id' => $DonationsId,
                // 'campaign_split_pot_id' => $request->campaign_split_pot_id
            ]);

            // donation_masbia_details
            $this->add_masbia_details($DonationsId, $request);
            
            if ($request->has('tips') && $request->input('tips') != '') {
                $tips = json_decode($request->input('tips'), true);
                foreach ($tips as $tip) {
                    DonationTips::create([
                        'donation_id' => $DonationsId,
                        'recipient_id' => $tip['recipient_id'],
                        'amount' => $tip['amount'],
                    ]);
                }
            }

            // $paymentDatils = $paymentIntent['paymentIntent'];

            $TransactionDetails = TransactionDetails::create(
                [
                    'donation_id' => $DonationsId,
                    'pay_method' => $request->payment_gateway,
                    'card_expiry' => $card_expiry,
                    'card_number' => $card_number,
                    'card_type' => $card_type,
                    'customer_id' => $customer_id,
                    'card_token' => $card_token,
                    'error_detail' => $error_detail,
                ]
            );
            DB::commit();

            $donationData = [];
            $donationData = Donations::where('id', $DonationsId)->first();
            $donationData['details'] = TransactionDetails::where('donation_id', $DonationsId)->first();
            $TicketData = TicketOptions::where('campaign_id', $Donations->campaign_id)
                ->where('id', $Donations->ticket_option_id)
                ->with(['ticketOptionsPrizes', 'grandPrize'])
                ->first();

            if ($TicketData) {
                $donationData['tickets'] = $TicketData;

                $data = TicketOptionsPrizes::where('campaign_id', $Donations->campaign_id)
                    ->where('ticket_option_id', $TicketData->id)
                    ->get();

                $prizeIds = $data->pluck('prize_id')->unique();

                $prizes = Prizes::whereIn('id', $prizeIds)->get();
                $donationData['prizes'] = $prizes;
            } else {
                $donationData['tickets'] = null;
                $donationData['prizes'] = null;
            }

            $donationData['campaign'] = campaign::where('id', $Donations->campaign_id)->with(['meta', 'media'])->first();
            $donationData['organzation_meta'] = OrganizationMeta::where('campaign_id', $Donations->campaign_id)->first();

            if ($status == 'Failed') {
                return response()->json(['error' => $error_detail, 'donation' => $donationData], 400);
            }
            return response()->json(['donation' => $donationData, 'success' => 'Donation Added'], 201);
        } catch (Exception $e) {
            DB::rollBack();
            FailedTransaction::create([
                'request_data' => json_encode($request->all()),
                'payment_data' => json_encode($paymentIntent),
                'error_message' => $e->getMessage(),
            ]);
            Log::error($e);
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    private function add_masbia_details($donation_id, $request)
    {
        $donation_masbia_details_data = [];
        if($request->has('donation_masbia_details') && $request->input('donation_masbia_details') != '' ) {
            $donation_masbia_details = json_decode($request->input('donation_masbia_details'), true);
            if($donation_masbia_details) {
                $donation_masbia_details_data = array_column($donation_masbia_details, 'value', 'name');
            }

            $dataNew = [];
            $dataNew['donation_id'] = $donation_id;
            $dataNew['donation_location_id'] = $donation_masbia_details_data['donation_location_id'];
            $dataNew['allocate_donation_id'] = $donation_masbia_details_data['allocate_donation'];
            $dataNew['dedication_comments'] = isset($donation_masbia_details_data['dedication_comments']) ? $donation_masbia_details_data['dedication_comments'] : NULL;
            $dataNew['letter_price'] = $request->letter_amount;
            $dataNew['recognition_price'] = $request->recognition_amount;
            $dataNew['is_recognition'] = $donation_masbia_details_data['recognition'];
            $dataNew['is_letter'] = $donation_masbia_details_data['letter'];
            $dataNew['is_notification'] = isset($donation_masbia_details_data['is_notification']) ? $donation_masbia_details_data['is_notification'] : 0;
            $dataNew['notification_mail'] = isset($donation_masbia_details_data['notification_mail']) ? $donation_masbia_details_data['notification_mail'] : NULL;
            
            $masbia_data = DonationMasbiaDetail::create($dataNew);
            // $request->recurring = get_sustainer_options_list($donation_masbia_details_data['sustainer_option_id']);
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'imp_don_file' => 'required|file|mimes:csv,txt',
        ]);
        $campaign_id = $request->input('campaign_id');
        $file = $request->file('imp_don_file');
        $requiredFields = [
            'First Name',
            'Donation Amount'
        ];
        $validationErrors = $this->validateCsvData($file->getPathname(), $requiredFields, $campaign_id);
        if (!empty($validationErrors)) {
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }
        DB::beginTransaction();
        try {
            if (($handle = fopen($file->getPathname(), 'r')) !== FALSE) {
                $rowCounter = 0;
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $rowCounter++;
                    if ($rowCounter == 1) {
                        if ($data[0] == 'First Name' || $data[1] == 'Last Name' || $data[2] == 'Email' || $data[3] == 'Team Slug' || $data[4] == 'Phone Number' || $data[5] == 'Donation Amount') {
                            continue;
                        }
                    }
                    if (empty($data[5]) || is_null($data[5])) {
                        continue;
                    }
                    if (strpos($data[7], '$') !== false) {
                        $stpAmnt = str_replace(",", "", str_replace("$", "", $data[7]));
                    } else {
                        $stpAmnt = $data[7];
                    }
                    $manualentries =  $data[10];
                    $priceOption = "Custom Amount";
                    if ($data[9] == "") {
                        $data[9] = 0;
                    }
                    $donationData = [
                        'campaign_id' => $campaign_id,
                        'donor_first_name' => $data[0],
                        'donor_last_name' => $data[1],
                        'donor_email' => $data[2],
                        'team_slug' => $data[3],
                        'donor_phone' => $data[4],
                        'usd_amount' => str_replace(",", "", str_replace("$", "", $data[5])),
                        'amount' => str_replace(",", "", str_replace("$", "", $data[5])),
                        'currency' => 'USD',
                        'address' => $data[6] ?? '',
                        'is_anonymous' => 0,
                        'team_id' => 0,
                        'coupon_id' => $data[9] ?? 0,
                        'season_id' => $request->session()->get('season_id'),
                        'recurring' => "oneTime",
                        'donated_amount' => str_replace(",", "", str_replace("$", "", $data[5])),
                        'price_option' => $priceOption,
                        'created_by' => auth()->id(),
                    ];
                    if ($manualentries) {
                        $donationData['entries'] = $manualentries;
                    }
                    if (!empty(trim($data[3]))) {
                        $team = Campaign::find($campaign_id)->teams()->where('slug', $data[3])->first();
                        if ($team) {
                            $donationData['team_id'] = $team->id;
                        }
                    }
                    $donation = Donations::create($donationData);
                    if ($stpAmnt) {
                        $stpEntries =  $data[8];
                        $stp = DonationSplitPot::create([
                            'donation_id' => $donation->id,
                            'campaign_split_pot_id' => $campaign_id,
                            'stp_usd_amount' => $stpAmnt,
                            'stp_amount' => $stpAmnt,
                            'stp_entries' => $stpEntries
                        ]);
                    }
                }
                fclose($handle);
            }
            DB::commit();
            return redirect()->route('admin.donations')->with('success', 'Offline donations imported successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Log::error('Error importing donations: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an error importing donations. Please try again.' . $e->getMessage());
        }
    }

    private function validateCsvData($filePath, $requiredFields, $campaign_id)
    {

        $errors = [];

        if (($handle = fopen($filePath, 'r')) !== FALSE) {
            $header = fgetcsv($handle, 1000, ",");

            foreach ($requiredFields as $key => $field) {
                if (!in_array($field, $header)) {
                    $errors[] = "The file is missing the required field: $field";
                }
            }

            fclose($handle);
        } else {
            $errors[] = "Unable to open the file.";
        }

        return $errors;
    }
    // LOAD MORE AND FILTERS FOR FRONTEND
    public function loadMoreDonations(Request $request)
    {
        $campaignId = $request->campaignId;
        $offset = $request->input('offset', 0);
        $limit = 12;

        $search = $request->search;
        $load = $request->load;
        $sortOption = $request->filter;

        // dd($request);
        $query = Donations::where('campaign_id', $campaignId)
            ->where('status', 'Paid');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('donor_first_name', 'LIKE', "%$search%")
                    ->orWhere('donor_last_name', 'LIKE', "%$search%")
                    ->orWhere('amount', 'LIKE', "%$search%")
                    ->orWhere('comments', 'LIKE', "%$search%");
            });
        }
        switch ($sortOption) {
            case 'name':
                $query->orderBy('donor_first_name', 'asc');
                break;
            case 'highest':
                $query->orderBy('amount', 'desc');
                break;
            case 'latest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        if ($load == 'yes') {
            $query->skip($offset);
        }
        $data = $query->take($limit)->get();
        $donationData = [];
        $donationData['data'] = $data->map(function ($donation) {
            $currency = $donation->currency == 'usd' ? '$' : ($donation->currency == 'cad' ? 'CAD' : '');
            $teamName = Teams::where('id', $donation->team_id)->first();
            $team = '';
            if (!empty($teamName)) {
                $team =   '<a href="' . $teamName->slug . '" class="team_a_tag">
                <div class="donation_item_team">
                        <span class="lnr lnr-users"></span>
                        <div class="donation_item-team-name">'
                    . $teamName->display_name .
                    '</div>
                     </div></a>';
            }
         if($donation->is_anonymous == 1){
            $donorName = 'Anonymous';
         }else{            
           $donorName = $donation->donor_first_name . ' ' . $donation->donor_last_name;
         }
            return '<div class="donation_item">
                                <div class="donation_item-head">
                                    <div class="donor_name">' . $donorName . '</div>
                                    <div class="donated_amount">' . $currency . formatNumber($donation->amount) . '</div>
                                </div>' .  $team .  '<div class="donation_item-time">
                                    <span class="lnr lnr-history"></span>
                                    <p>' . formattedDate($donation->created_at->format("Y-m-d H:i:s")) . '</p>
                                </div>
                            </div>';
        });
        $donationData['loadmore'] = $load;

        //   return $donationData;
        return response()->json($donationData);
    }

    public function loadMoreTeamDonations(Request $request)
    {
        $campaignId = $request->campaignId;
        $team_id = $request->team_id;
        $offset = $request->input('offset', 0);
        $limit = 12;

        $search = $request->search;
        $load = $request->load;
        $sortOption = $request->filter;

        // dd($request);
        $query = Donations::where('campaign_id', $campaignId)->where('team_id', $team_id)
            ->where('status', 'Paid');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('donor_first_name', 'LIKE', "%$search%")
                    ->orWhere('donor_last_name', 'LIKE', "%$search%")
                    ->orWhere('amount', 'LIKE', "%$search%")
                    ->orWhere('comments', 'LIKE', "%$search%");
            });
        }
        switch ($sortOption) {
            case 'name':
                $query->orderBy('donor_first_name', 'asc');
                break;
            case 'highest':
                $query->orderBy('amount', 'desc');
                break;
            case 'latest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        if ($load == 'yes') {
            $query->skip($offset);
        }
        $data = $query->take($limit)->get();
        $donationData = [];
        $donationData['data'] = $data->map(function ($donation) {
            $currency = $donation->currency == 'usd' ? '$' : ($donation->currency == 'cad' ? 'CAD' : '');
            $teamName = Teams::where('id', $donation->team_id)->first();
            $team = '';
            if (!empty($teamName)) {
                $team =   '<a href="' . $teamName->slug . '" class="team_a_tag">
                <div class="donation_item_team">
                        <span class="lnr lnr-users"></span>
                        <div class="donation_item-team-name">'
                    . $teamName->display_name .
                    '</div>
                     </div></a>';
            }
         if($donation->is_anonymous == 1){
            $donorName = 'Anonymous';
         }else{            
           $donorName = $donation->donor_first_name . ' ' . $donation->donor_last_name;
         }
            return '<div class="donation_item">
                                <div class="donation_item-head">
                                    <div class="donor_name">' . $donorName . '</div>
                                    <div class="donated_amount">' . $currency . formatNumber($donation->amount) . '</div>
                                </div>' .  $team .  '<div class="donation_item-time">
                                    <span class="lnr lnr-history"></span>
                                    <p>' . formattedDate($donation->created_at->format("Y-m-d H:i:s")) . '</p>
                                </div>
                            </div>';
        });
        $donationData['loadmore'] = $load;

        //   return $donationData;
        return response()->json($donationData);
    }
    public function loadMoreTeams(Request $request)
    {
        $campaignId = $request->campaignId;
        $offset = $request->input('offset', 0);
        $limit = 12;


        $search = $request->search;
        $load = $request->load;
        $sortOption = $request->filter;
        $query = Teams::where('campaign_id', $campaignId);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'LIKE', "%$search%")
                    ->orWhere('last_name', 'LIKE', "%$search%")
                    ->orWhere('display_name', 'LIKE', "%$search%")
                    ->orWhere('slug', 'LIKE', "%$search%")
                    ->orWhere('goal', 'LIKE', "%$search%");
            });
        }
        switch ($sortOption) {
            case 'name':
                $query->orderBy('display_name', 'asc');
                break;
            case 'highest':
                $query->orderBy('goal', 'desc');
                break;
            case 'latest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        if ($load == 'yes') {
            $query->skip($offset);
        }
        $data = $query->take($limit)->get();
        $teamsData = [];
        $teamsData['data'] = $data->map(function ($team) use ($request) {
            $teamItem = Teams::where('id', $team->id)->first();
            $teamsDonors = Donations::where('team_id', $teamItem->id)->where('status', 'Paid')->count();
            $totalDonated = Donations::select('amount')->where('team_id', $teamItem->id)->where('status', 'Paid')->sum('amount');
            $goal = $teamItem->goal;
            $campaignSlug = campaign::select('slug')->where('id', $request->campaignId)->first();
            $percentage = $goal > 0 ? intval(($totalDonated / $goal) * 100) : 0;
            $currency = match ($teamItem->currency) {
                'usd' => '$',
                'cad' => 'CA$',
                'default' => '$'
            };
              if(empty($request->team_id)){
                  $selectTeam = '<button type="button" class="btn overlay select-team"  data-id="' . $team->id . '"  >Select Team</button>';
           }else{
               $selectTeam = '';
            }

            return ' <div class="team_item">
                            <div class="selected_team ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849"  viewBox="0 0 17.87 12.849">
                                    <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                        <rect id="Rectangle_31" data-name="Rectangle 31" width="10"  height="3" rx="1.5"  transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                        <rect id="Rectangle_32" data-name="Rectangle 32" width="15"  height="3" rx="1.5"  transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                    </g>
                                </svg>
                            </div>
                            <div class="team_">
                                <div class="team_item-head">
                                    <div class="team_name">
                                        ' . $team->display_name . '
                                    </div>
                                    <div class="team_goal">
                                         ' . $currency . formatNumber($team->goal) . '
                                    </div>
                                </div>
                                <div class="team_item-progress">
                                    <div class="teams-donors"> ' . $teamsDonors . '  donors</div>
                                    <div class="team-goal-raised">of $' . formatNumber($totalDonated) . '  raised</div>
                                </div>
                                <div class="team-item-progress-bar">
                                    <div class="completed"  style="width:' . $percentage . '%;">
                                    </div>
                                </div>
                            </div>
                            <div class="team-action ">
                                <div class="team-card__btns">
                                    '.$selectTeam.'
                                    <a href="/campaign/' . $campaignSlug->slug . '/' . $team->slug . '"  >
                                        <button type="button" class="btn overlay donate-btn">Visit Team</button>
                                    </a>
                                </div>
                            </div>
                        </div>';
        });
        $teamsData['loadmore'] = $load;

        return response()->json($teamsData);
    }
    public function exportDonation(Request $request)
    {
        $data = Donations::with('campaign');
        if ($request->filled('campaign_id')) {
            $data->where('campaign_id', $request->campaign_id);
        }
        if ($request->filled('status')) {
            $data->where('status', $request->status);
        }
        if ($request->filled('type')) {
            $paymentCondition = $request->type === 'offline' ? 'offline' : '!= offline';
            $data->where('payment_gateway', $paymentCondition);
        }
        if ($request->filled('start_date')) {
            $data->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $data->whereDate('created_at', '<=', $request->end_date);
        }

        $donations = $data->get();

        $csvData = "Donation ID,Transaction ID,Campaign Name,Donor First Name,Donor Last Name,Donor Full Name,Donor Email,Donor Phone,Amount,USD Amount,Address,ZipCode,Street,City,Country,Currency,Recurring,Comments,Subscription ID,Payment Gateway,Status,Notes,Date\n";

        foreach ($donations as $item) {
            $csvData .= implode(',', [
                $this->escapeCsv($item->id ?? ''),
                $this->escapeCsv($item->transaction_id ?? 'N/A'),
                $this->escapeCsv($item->campaign->camp_title ?? 'N/A'),
                $this->escapeCsv($item->donor_first_name ?? 'N/A'),
                $this->escapeCsv($item->donor_last_name ?? 'N/A'),
                $this->escapeCsv("{$item->donor_first_name} {$item->donor_last_name}"),
                $this->escapeCsv($item->donor_email ?? 'N/A'),
                $this->escapeCsv($item->donor_phone ?? 'N/A'),
                $this->escapeCsv($item->amount ?? 'N/A'),
                $this->escapeCsv($item->usd_amount ?? 'N/A'),
                $this->escapeCsv($item->address ?? 'N/A'),
                $this->escapeCsv($item->zipcode ?? 'N/A'),
                $this->escapeCsv($item->street ?? 'N/A'),
                $this->escapeCsv($item->city ?? 'N/A'),
                $this->escapeCsv($item->country ?? 'N/A'),
                $this->escapeCsv($item->currency ?? 'N/A'),
                $this->escapeCsv($item->recurring ?? 'N/A'),
                $this->escapeCsv($item->comments ?? 'N/A'),
                $this->escapeCsv($item->subscription_id ?? 'N/A'),
                $this->escapeCsv($item->payment_gateway ?? 'N/A'),
                $this->escapeCsv($item->status ?? 'N/A'),
                $this->escapeCsv($item->notes ?? 'N/A'),
                $this->escapeCsv($item->created_at ?? 'N/A'),
            ]) . "\n";
        }

        return Response::make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="donation_report.csv"',
        ]);
    }
    private function escapeCsv($data)
    {
        $escaped = str_replace('"', '""', $data);
        return '"' . $escaped . '"';
    }
}