<?php

namespace App\Http\Controllers;

use App\Models\campaign;
use App\Models\CampaignMedia;
use App\Models\CampaignMeta;
use App\Models\CampaignOpenGraph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\FileUploadService;
use App\Models\GrandPrizes;
use App\Models\CampaignUsers;
use App\Models\CampaignGallery;
use App\Models\SponsorshipOpportunities;
use App\Models\Coupons;
use App\Models\Donations;
use App\Models\Seasons;
use App\Models\EmailTemplate;
use App\Models\PaymentMethod;
use App\Models\TicketOptions;
use App\Models\Prizes;
use App\Models\User;
use App\Models\OrganizationMeta;
use App\Models\TicketOptionsPrizes;
use App\Models\AllocateDonation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class campaignController extends Controller
{

    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {



    //     return view(
    //         'admin.campaign.campaigns',
    //         [
    //             'campaigns' => Campaign::with('media', 'meta')->get()
    //         ],
    //     );
    // }

    public function index(Request $request)
    {
        $seasonId = $request->session()->get('season_id');

        if (auth()->user()->role == 'admin') {
            $campaigns = Campaign::where('season_id', $seasonId)->get();

            foreach ($campaigns as $campaign) {
                $campaign->totalDonations = Donations::where('campaign_id', $campaign->id)
                    ->where('status', 'Paid')
                    ->sum('amount');
            }
        } else {
            $campaigns = auth()->user()->campaigns;
            foreach ($campaigns as $campaign) {
                $campaign->totalDonations = Donations::where('campaign_id', $campaign->id)
                    ->where('status', 'Paid')
                    ->sum('amount');
            }
        }

        return view('admin.campaign.campaigns', compact('campaigns'));
    }


    function createNew(Request $request)
    {
        $seasonId = $request->session()->get('season_id');
        return view(
            'admin.campaign.createCampaign',
            [
                'campaigns' => campaign::where('season_id', $seasonId)->get(),
                'campaign_users' => User::all(),
                'seasons' => Seasons::all()
            ],
        );
    }


    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'organization_name' => 'required|string',
            'campaign_name' => 'required|string',
            'template' => 'required|string',
            'slug' => 'required|string|unique:campaigns,slug',
            'logo' => 'required|image',
            'users' => 'required|array',
            'theme_color' => 'nullable|string',
            'season_id' => 'required|numeric'
        ]);


        if ($validator->fails()) {
            return redirect('admin/createCampaign')
                ->withErrors($validator)
                ->withInput();
        }
        DB::beginTransaction();

        try {
            $slug = str_replace(' ', '_', $request->slug);
            $campaign = new campaign();
            $campaign->org_name = $request->organization_name;
            $campaign->camp_title = $request->campaign_name;
            $campaign->template = $request->template;
            $campaign->slug = $slug;
            $campaign->theme_color = $request->theme_color;
            $campaign->season_id = $request->season_id; #TODO make a logic for season
            $campaign->save();
            // dd($campaingId);

            // $fileUrl = $request->hasFile('logo');
            if ($request->hasFile('logo')) {
                $image =   $this->fileUploadService->uploadFile($request, 'logo', 'logos');
                $imageMedia = new CampaignMedia();
                $imageMedia->campaign_id = $campaign->id;
                $imageMedia->logo_url = $image;
                $imageMedia->save();
            }

            $campaign_meta = new CampaignMeta();
            $campaign_meta->campaign_id = $campaign->id;
            $campaign_meta->save();

            $users = $request->input('users', []);
            // dd($users);
            foreach ($users as $user) {
                $campaignUsers = new CampaignUsers();
                $campaignUsers->user_id = $user;
                $campaignUsers->campaign_id = $campaign->id;
                $campaignUsers->save();
            }

            // : $request->input('old_logo');


            DB::commit();

            return redirect()->route('admin.campaign.edit', ['campaign' => $campaign->slug])->with('success', 'Campaign created successfully');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            Log::error('Failed to create campaign: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an error creating campaign. Please try again.' . $e->getMessage());
        }
    }



    public function edit(Campaign $campaign)
    {
        $payment_env = config('app.payment_env');
        $ticket_options = TicketOptions::where('campaign_id', 0)->get();
        $campaign_ticket_options = TicketOptions::where('campaign_id', $campaign->id)->get();
        $ticketOptions = $campaign_ticket_options->isEmpty() ? $ticket_options : $campaign_ticket_options;
        $campaign_Users = CampaignUsers::where('campaign_id', $campaign->id)->get();
        $payMethod = PaymentMethod::where('campaign_id', $campaign->id)->where('environment', $payment_env)->get();

        $campaign->load('media', 'meta', 'banners', 'payments', 'organization', 'openGraph', 'menu');
        return view(
            'admin.campaign.editCampaign',
            [
                'campaign' => $campaign,
                'ticket_options' => $ticketOptions,
                'all_users' => User::all(),
                'payments' => $payMethod,
                'gallery' => CampaignGallery::where('campaign_id', $campaign->id)->get(),
                'email_template' => EmailTemplate::where('campaign_id', $campaign->id)->first(),
                'sponsorship_opportunities' => SponsorshipOpportunities::where('campaign_id', $campaign->id)->get(),
                'campaign_users' => $campaign_Users,
                'prizes' => Prizes::all(),
                'grand_prizes' => GrandPrizes::all(),
                'coupons' => Coupons::all(),
                'seasons' => Seasons::all(),
                'allocate_donation' => AllocateDonation::all(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campaign $campaign)
    {

        $validator = Validator::make($request->all(), [
            'organization_name' => 'required|string',
            'campaign_name' => 'required|string',
            'template' => 'required|string',
            'slug' => 'required|string|unique:campaigns,slug,' . $request->input('campaignId'),
            'goal' => 'nullable|numeric',
            'show_goal' => 'nullable|boolean',
            'bonus_amount' => 'nullable|numeric',
            'bonus_goal' => 'nullable|boolean',
            'extend_date' => 'nullable|date',
            'enable_gifts' => 'nullable|boolean',
            'show_end_date' => 'nullable|boolean',
            'end_date' => 'nullable|date',
            'is_extented' => 'nullable|boolean',
            'count_down' => 'nullable|boolean',
            'menuPosition' => 'nullable|string',
            'total_amount_currency' => 'nullable|string',
            'manual_amount' => 'nullable|numeric',
            'allow_fee' => 'nullable|boolean',
            'show_recent_donations' => 'nullable|boolean',
            'show_team_button' => 'nullable|boolean',
            'is_recurring' => 'nullable|boolean',
            'multi_currency' => 'nullable|boolean',
            'logo' => 'nullable|image|max:2048',
            'gateways.*.payment_method' => 'required|string',
            'gateways.*.status' => 'nullable|boolean',
            'legal_name' => 'nullable|string',
            'email' => 'nullable|string',
            'bank_statement' => 'nullable|string',
            'tax_id' => 'nullable|string',
            'org_address' => 'nullable|string',
            'org_address_2' => 'nullable|string',
            'mailing_address' => 'nullable|string',
            'org_phone' => 'nullable|string',
            'twilio_phone_number' => 'nullable|string',
            'statement_descriptor' => 'nullable|string',
            'group_og_title' => 'nullable|string',
            'group_og_description' => 'nullable|string',
            'og_image' => 'nullable|image',
            'users' => 'required|array',
            'intro_content_enabled' => 'nullable|numeric',
            'intro_content_header' => 'nullable|string',
            'intro_main_content'  => 'nullable|string',
            'button_content'  => 'nullable|string',
            'additional_content'  => 'nullable|string',
            'rules_description' => 'nullable|string',
            'enable_stats' => 'nullable|boolean',
            'enable_fabulous_prizes' => 'nullable|boolean',
            'enable_total_donors' => 'nullable|boolean',
            'enable_ticket_sold' => 'nullable|boolean',
            'enable_largest_donation' => 'nullable|boolean',
            'season_id' => 'required|numeric',
            'enable_blogs' => 'nullable|numeric',
            'theme_color' => 'nullable|string',
            'allow_tip' => 'nullable|numeric',
            'main_content_yiddish' => 'nullable|string',
            'yingerman_content_yiddish' => 'nullable|string',
            'yingerman_content' => 'nullable|string',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $campaignId = $request->input('campaignId');
            $metaId = $request->input('metaId') ?? null;
            $mediaId = $request->input('mediaId') ?? null;
            $organizationId = $request->input('organizationId') ?? null;
            $intro_content_enabled = $request->intro_content_enabled ?? 0;
            $allowTip = $request->allow_tip == 1 ? $request->allow_tip : 0;
            $campaign = Campaign::findOrFail($campaignId);
            $campaign->update([
                'org_name' => $request->organization_name,
                'camp_title' => $request->campaign_name,
                'template' => $request->template,
                'theme_color' => $request->theme_color,
                'slug' => str_replace(' ', '_', $request->slug),
                'season_id' => $request->season_id #TODO make a logic for season
            ]);


            $fileUrl = $request->hasFile('logo')
                ? $this->fileUploadService->uploadFile($request, 'logo', 'logos')
                : $request->input('old_logo');


            $campaignMedia = CampaignMedia::updateOrCreate(
                ['id' => $mediaId],
                [
                    'campaign_id' => $campaign->id,
                    'logo_url' => $fileUrl

                ]
            );
            $TicketOptionsPrizes = TicketOptionsPrizes::where('campaign_id', 0)->get();
            $CampaignTicketOptions = TicketOptions::where('campaign_id', $campaign->id)->first();
            $TicketOptions = TicketOptions::where('campaign_id', 0)->get();
            if ($CampaignTicketOptions == null) {
                $newTicketOptions = [];
                foreach ($TicketOptions as $key => $TicketOption) {
                    $newTicketOption = TicketOptions::create([
                        'campaign_id'  => $campaignId,
                        'title'  => $TicketOption->title,
                        'price' => $TicketOption->price,
                        'entries' => $TicketOption->entries,
                        'grand_prize' => $TicketOption->grand_prize,
                        'coupon_id' => $TicketOption->coupon_id,
                        'content' => $TicketOption->content,
                        'season_id' => $TicketOption->season_id,
                        'icon' => $TicketOption->icon
                    ]);
                    $newTicketOptions[$TicketOption->id] = $newTicketOption->id;
                }
                $TicketOptionsPrizes->each(function ($item) use ($campaignId, $newTicketOptions) {
                    $newTicketOptionId = $newTicketOptions[$item->ticket_option_id] ?? null;
                    if ($newTicketOptionId) {
                        $addCampaignId = $item->replicate();
                        $addCampaignId->campaign_id = $campaignId;
                        $addCampaignId->ticket_option_id = $newTicketOptionId;
                        $addCampaignId->save();
                    }
                });
            }

            $company_meta_data =  array(
                'campaign_id' => $campaign->id,
                'goal' => $request->goal,
                'show_goal' => $request->show_goal,
                'bonus_amount' => $request->bonus_amount,
                'bonus_goal' => $request->bonus_goal,
                'extend_date' => $request->extend_date,
                'enable_gifts' => $request->enable_gifts,
                'show_end_date' => $request->show_end_date,
                'end_date' => $request->end_date,
                'is_extented' => $request->is_extented,
                'count_down' => $request->count_down,
                'menuPosition' => $request->menuPosition,
                'total_amount_currency' => $request->input('total_amount_currency', 'usd'),
                'manual_amount' => $request->manual_amount,
                'allow_fee' => $request->allow_fee,
                'show_recent_donations' => $request->show_recent_donations,
                'show_team_button' => $request->show_team_button,
                'is_recurring' => $request->is_recurring,
                'multi_currency' => $request->multi_currency,
                'intro_content_enabled' => $intro_content_enabled,
                'intro_content_header' => $request->intro_content_header,
                'intro_main_content' => $request->intro_main_content,
                'button_content' => $request->button_content,
                'additional_content' => $request->additional_content,
                'rules_description' => $request->rules_description,
                'enable_stats' => $request->enable_stats,
                'enable_fabulous_prizes' => $request->enable_fabulous_prizes,
                'enable_total_donors' => $request->enable_total_donors,
                'enable_ticket_sold' => $request->enable_ticket_sold,
                'enable_largest_donation' => $request->enable_largest_donation,
                'enable_blogs' => $request->enable_blogs,
                'allow_tip' => $allowTip,
                'main_content_yiddish' => $request->main_content_yiddish,
                'yingerman_content_yiddish' => $request->yingerman_content_yiddish,
                'yingerman_content' => $request->yingerman_content,
            );

            if($campaign->template == 'masbia') {
                $company_meta_data['enable_recognition'] = ($request->has('enable_recognition')) ? $request->enable_recognition : '0';
                $company_meta_data['letter_price'] = $request->letter_price;
                $company_meta_data['recognition_price'] = $request->recognition_price;
            }

            $campaignMeta = CampaignMeta::updateOrCreate(
                ['id' => $metaId],
                $company_meta_data
            );

            // $gateways = $request->input('gateways', []);
            // foreach ($gateways as $gateway) {
            //     foreach (['live', 'test'] as $environment) {
            //         $payment_env = config('app.payment_env');
            //         $checkbox_name = 'gateways[' . $gateway['payment_method'] . '][status]';
            //         if ($request->has($checkbox_name)) {
            //             $Paymentstatus = $request->input($checkbox_name);
            //         } else {
            //             $Paymentstatus = 0;
            //         }

            //         $envdata = ($payment_env == $environment) ? 1 : 0;
            //         $status = ($Paymentstatus == $envdata) ? 1:0;
            //         // dd($checkbox_name);
            //         PaymentMethod::updateOrCreate(
            //             [
            //                 'campaign_id' => $campaignId,
            //                 'payment_method' => $gateway['payment_method'],
            //                 'environment' => $environment,

            //             ],
            //             [
            //                 'payment_method' => $gateway['payment_method'],
            //                 'environment' => $environment,
            //                 'status' => $status
            //             ]
            //         );
            //     }
            // }


            $gateways = $request->input('gateways', []);

            foreach ($gateways as $gateway) {
                foreach (['test', 'live'] as $environment) {
                    $CheckStatus = $gateway['status'] ?? 0;
                    $payment_env = config('app.payment_env');
                    $envdata = ($payment_env == $environment) ? 1 : 0;
                    // dd($envdata);

                    $status = ($CheckStatus == $envdata) ? 1 : 0;
                    //    dd($status);
                    PaymentMethod::updateOrCreate(
                        [
                            'campaign_id' => $campaignId,
                            'payment_method' => $gateway['payment_method'],
                            'environment' => $environment,
                        ],
                        [
                            'payment_method' => $gateway['payment_method'],
                            'environment' => $environment,
                            'status' => $status
                        ]
                    );
                }
            }





            $organizationMeta = OrganizationMeta::updateOrCreate(
                ['id' => $organizationId],
                [
                    'campaign_id' => $campaign->id,
                    'legal_name' => $request->legal_name,
                    'email' => $request->email,
                    'bank_statement' => $request->bank_statement,
                    'tax_id' => $request->tax_id,
                    'org_address' => $request->org_address,
                    'org_address_2' => $request->org_address_2,
                    'mailing_address' => $request->mailing_address,
                    'org_phone' => $request->org_phone,
                    'twilio_phone_number' => $request->twilio_phone_number,
                    'statement_descriptor' => $request->statement_descriptor,
                ]
            );
            $users = $request->input('users', []);
            CampaignUsers::where('campaign_id', $campaign->id)->delete();
            // dd($users);
            foreach ($users as $user) {
                $campaignUsers = CampaignUsers::create(
                    [
                        'user_id' => $user,
                        'campaign_id' => $campaign->id,
                    ]
                );
            }
            $fileUrl = $request->hasFile('og_image')
                ? $this->fileUploadService->uploadFile($request, 'og_image', 'open_graphs')
                : $request->input('old_og_image');
            $OpenGraph = CampaignOpenGraph::updateOrCreate(
                ['campaign_id' =>  $campaign->id,],
                [
                    'og_title' => $request->group_og_title,
                    'og_description' => $request->group_og_description,
                    'og_image' => $fileUrl,

                ]

            );

            DB::commit();

            return redirect()->route('admin.campaign.edit', ['campaign' => $campaign->slug])->with('success', 'Campaign Updated successfully');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            Log::error('Failed to Update campaign: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an error updating campaign. Please try again.' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($campaignId)
    {
        $campaign = campaign::findOrFail($campaignId);
        $campaign->delete();
        return redirect()->route('admin.campaigns')->with('success', 'Campaign deleted successfully.');
    }
}