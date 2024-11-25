<?php

namespace App\Http\Controllers;

use App\Models\banners;
use App\Models\Blogs;
use App\Models\PaymentMethod;
use App\Models\TicketOptionsPrizes;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use App\Models\campaign;
use App\Models\CampaignCoupons;
use App\Models\CampaignGallery;
use App\Models\CampaignGifts;
use App\Models\CampaignMenu;
use App\Models\CampaignMeta;
use App\Models\CampaignUsers;
use App\Models\Donations;
use App\Models\DonationSplitPot;
use App\Models\DonationTips;
use App\Models\EarlyBird;
use App\Models\GrandPrizes;
use App\Models\Prizes;
use App\Models\SponsorshipOpportunities;
use App\Models\Teams;
use App\Models\TicketOptions;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use App\Models\Organization;
use App\Models\OrganizationMeta;
use App\Models\TransactionDetails;
use App\Models\AllocateDonation;
use Carbon\Carbon;
use App\Models\Media;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $domain = $request->getHost();

        if($domain == 'masbia.webaryco.com') {

            $campaign = Campaign::where('template', 'masbia')->orderBy('created_at', 'desc')->first();
            $media = Media::getRecentMedia();

            return view (
                'frontend.templates.masbia-template.index',
                array(
                    'campaign' => $campaign,
                    'media' => $media
                )
            );

        } else {
            return view('frontend/home');
        }
    }

    public function thank_you($donationKey)
    {

        $donation = Donations::where('friendly_key', $donationKey)->first();
        if (empty($donation)) {
            return abort(404);
        }
        $donationID = $donation->id;
        // $campaign_id = $donation->campaign_id;
        $DonationTips = [];
        $details = TransactionDetails::where('donation_id', $donationID)->first();
        $TipsTotalAmount = DonationTips::where('donation_id', $donationID)->sum('amount') ?? 0;
        $DonationTips = DonationTips::where('donation_id', $donationID)->with('tips')->get() ?? '';
        // $teams = Teams::where('campaign_id', $campaign_id)->get();
        // $campaign = campaign::select('camp_title')->where('id', $campaign_id)->first();
        $stp = DonationSplitPot::where('donation_id', $donationID)->first() ?? '';
        return view(
            'frontend/templates/general-template/thank-you',
            [
                'donation' => $donation,
                'details' => $details,
                // 'teams' => $teams,
                'stp' => $stp,
                'DonationTips' => $DonationTips ?? '',
                'TipsTotalAmount' => $TipsTotalAmount,
            ]
        );
    }

    public function create_team(Request $request, Teams $teams)
    {

        $campaignId = $request->input('campaign_id');
        $TeamId = $request->input('teamId') ?? null;
        // echo $TeamId;die;
        $validator = Validator::make($request->all(), [
            'first_name'  => 'required|string',
            'last_name'  => 'nullable|string',
            'display_name'  => 'required|string',
            'email'  => 'required|string',
            'slug'  => 'nullable|string',
            'phone_system_code'  => 'nullable|numeric',
            'goal'  => 'required|numeric',
            'currency'  => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        DB::beginTransaction();
        try {
            $slug = str_replace(' ', '_', $request->first_name) . '-' . str_replace(' ', '_', $request->last_name) . '_' . rand(1, 400);

            $Teams = Teams::updateOrCreate(
                ['id' => $TeamId],
                [
                    'campaign_id'  => $request->campaign_id,
                    'first_name'  => $request->first_name,
                    'last_name'  => $request->last_name,
                    'display_name'  => $request->display_name,
                    'email'  => $request->email,
                    'slug'  => $slug,
                    'phone_system_code'  => $request->phone_system_code,
                    'goal'  => $request->goal,
                    'currency'  =>  $request->currency
                ]
            );
            DB::commit();
            // return response()->json(['teams' => $Teams], 201);
            return redirect()->back()->with('success', 'Campaign created successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            Log::error('Error while Creating team: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create team. ' . $e->getMessage());
            // return response()->json(['error' => 'Failed to update.', 'messages' => $e->getMessage()], 500);
        }
    }

    public function raffle(Request $request, Campaign $campaign, $team = null)
    {        
        $payment_env = config('app.payment_env');

        $campaign_Users = CampaignUsers::where('campaign_id', $campaign->id)->get();
        //___TEAM_DETAILS_START

        $pageTeam = Teams::where('slug', $team)->first();

        if ($team && $pageTeam) {
            $teamsDonors = Donations::where('team_id', $pageTeam->id)
                ->where('status', 'Paid')
                ->count();                
            $AllteamsDonors = Donations::getCampaignTeamsDonors($campaign->id, $pageTeam->id);
            $totalDonated = Donations::where('team_id', $pageTeam->id)
                ->where('status', 'Paid')
                ->sum('amount');

            $goal = $pageTeam->goal;
            $percentage = $goal > 0 ? intval(($totalDonated / $goal) * 100) : 0;

            if ($pageTeam->currency === 'usd') {
                $currency = '$';
            } elseif ($pageTeam->currency === 'cad') {
                $currency = 'CA$';
            } else {
                $currency = '$';
            }

            $pageTeam['data'] = [
                'currency' => $currency,
                'totalDonated' => $totalDonated,
                'percentage' => formatNumber($percentage),
                'total_donors' => $teamsDonors,
            ];
        } else {
            $pageTeam = [];
            $AllteamsDonors = [];
        }

        //____TEAM_DETAILS_END

        $payment_gateways = PaymentMethod::where('campaign_id', $campaign->id)
            ->where('environment', $payment_env)
            ->where('status', 1)
            ->get();

        $earlyBird = EarlyBird::all();

        $banners = banners::where('campaign_id', $campaign->id)
            ->where('start_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now())
            ->get();

        $campaign_gifts = CampaignGifts::where('campaign_id', $campaign->id)
            ->get();

        $campaign_gallery = CampaignGallery::where('campaign_id', $campaign->id)
            ->get();

        $blogs = Blogs::all();

        $main_Menu = CampaignMenu::where('type', 'primary')
            ->where('campaign_id', $campaign->id)
            ->get();

        $secondary_Menu = CampaignMenu::where('type', 'secondary')
            ->where('campaign_id', $campaign->id)
            ->get();

        $packages = TicketOptions::getCustomPrices($campaign->id);

        $sponsers = Sponsor::where('campaign_id', $campaign->id)
            ->get();

        $organzationMeta = OrganizationMeta::where('campaign_id', $campaign->id)->first();

        $upcomingCampaigns = Campaign::where('id', '!=', $campaign->id)
            ->whereHas('meta', function ($query) {
                $query->where('start_date', '<', Carbon::now());
            })
            ->with(['meta', 'organization_meta'])
            ->get();

        $previousCampaigns = Campaign::where('id', '!=', $campaign->id)
            ->whereHas('meta', function ($query) {
                $query->where('end_date', '<', Carbon::now());
            })->with(['meta', 'organization_meta'])
            ->get();

        $teamData = Teams::where('campaign_id', $campaign->id)->get();
        $CampaignTeamsData = $teamData->map(function ($team) {
            $teamsDonors = Donations::where('team_id', $team->id)->where('status', 'Paid')->count();
            $totalDonated = Donations::select('amount')->where('team_id', $team->id)->where('status', 'Paid')->sum('amount');
            $goal = $team->goal;
            $percentage = $goal > 0 ? intval(($totalDonated / $goal) * 100) : 0;
            if ($team->currency === 'usd') {
                $currency = '$';
            } elseif ($team->currency === 'cad') {
                $currency = 'CA$';
            } else {
                $currency = '$';
            }

            return [
                'id' => $team->id,
                'first_name' => $team->first_name ?? '',
                'last_name' => $team->last_name ?? '',
                'display_name' => $team->display_name ?? $team->first_name,
                "email" => $team->email,
                "total_donors" => $teamsDonors,
                "total_donated" => $totalDonated,
                "percentage" => formatNumber($percentage),
                "slug" => $team->slug,
                'goal' => formatNumber($team->goal) ?? '',
                "currency" =>  $currency
            ];

        });

        $stpData = $campaign->campaign_split_the_pot->map(function ($stp) {
            return [
                'title' => $stp->title ?? '',
                'amount' => $stp->amount ?? '',
                'entries' => $stp->entries ?? '',

            ];
        });
        $campaignMenuData = $campaign->menu->map(function ($menu) {
            return [
                'title' => $menu->title ?? '',
                'url' => $menu->url ?? '',
                'type' => $menu->type ?? '',
            ];
        });
        $sponserData = $campaign->sponsorship_opportunities->map(function ($sponsorship) {
            return [
                'id' => $sponsorship->id ?? '',
                'title' => $sponsorship->title ?? '',
                'imageURL' => $sponsorship->image ?? '',
                'amount' => $sponsorship->amount ?? '',
            ];
        });
        $bannerData = $banners->map(function ($banner) use ($campaign) {
            $isImgBg = $banner->banner_type === 'file';
            if ($banner->banner_type === 'file') {
                $imageURL =  $banner->file_desktop_image ?? '';
            } else {
                $imageURL =  $banner->text_desktop_image ?? '';
            }
            return [
                'campaign_type' => $campaign->template,
                'type' => $banner->banner_type ?? '',
                'mainContent' => $banner->text_main_content ?? "",
                'subtitle' => $banner->text_sub_content ?? "",
                'buttonText' => $banner->text_button ?? "View Prizes",
                'buttonLink' => $banner->text_button_link ?? "#",
                'isImgBg' => $isImgBg,
                'titleAmount' => $banner->text_amount ?? "",
                'buttonClass' => empty($banner->text_button) ? 'd-none' : '',
                'title' => $banner->text_main_content ?? '',
                'link' => "#aboutSection",
                'secondary_button_content' => $banner->secondary_button_content ?? '',
                'secondary_button_url' => $banner->secondary_button_url ?? '',
                'imageURL' => $imageURL ?? '',
                'button' => [
                    [
                        'text' => $banner->text_button ?? "View Prizes",
                        'link' => $banner->text_button_link ?? "#",
                        'class' => empty($banner->text_button) ? 'd-none' : ''
                    ]
                ]
            ];
        });
        $templateType =  $campaign->template;
        $CampaignGiftsData = $campaign_gifts->map(function ($gift) {
            return [
                'id' => $gift->id ?? '',
                'title' => $gift->name ?? '',
                'imageURL' => $gift->image ?? '',
                'amount' => $gift->amount ?? '',
                'details' => $gift->details ?? '',
                'draw_date' => $gift->draw_date ?? '',
            ];
        });
        $splitPot = $campaign->campaign_split_the_pot->map(function ($stp) {
            return [
                'id' => $stp->id ?? '',
                'title' => $stp->title ?? '',
                'amount' => $stp->amount ?? '',
                'entries' => $stp->entries ?? '',
            ];
        });
        $mainMenu = $main_Menu->map(function ($primary) {
            return [
                'id' => $primary->id ?? '',
                'text' => $primary->title ?? '',
                'link' => $primary->url ?? '',
            ];
        });
        $secondaryMenu = $secondary_Menu->map(function ($secondary) {
            return [
                'id' => $secondary->id ?? '',
                'text' => $secondary->title ?? '',
                'link' => $secondary->url ?? '',
            ];
        });
        // $donations = new Donations();
        $donationData = Donations::getCampaignDonations($campaign->id);
        // dd($donationData);
        $bannerData = $bannerData[0] ?? [
            'type' => 'text',
            'mainContent' =>  "ENTER NOW FOR A CHANCE TO WIN",
            'subContent' =>  "Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque,",
            'buttonText' =>  "View Prizes",
            'buttonLink' =>  "#",
            'bgImg' => 'https://cdn.100kgoral.org/V2/blogs/1722249678_english-writing-assignment1.jpg',
            'isImgBg' => 'https://cdn.100kgoral.org/V2/blogs/1722249678_english-writing-assignment1.jpg',
            'titleAmount' =>  "$100,000!",
            'buttonClass' => '',
            'title' => 'About 100k Goral',
            'link' => "#aboutSection",
            'imageURL' => '',
            'secondary_button_content' => 'Learn More',
            'secondary_button_url' => '#',
            'button' => [
                [
                    'text' =>  "View Prizes",
                    'link' => "#",
                    'class' => ''
                ]
            ]
        ];
        $gallery = CampaignGallery::getCampaingGallery($campaign->id);
        $campaignSettings = CampaignMeta::getCampaignSetting($campaign->id);
        $TicketOptionsPrizes = TicketOptionsPrizes::getUniqueRecordsByPrizeId($campaign->id);
        // echo "<pre>";
        // print_r ($TicketOptionsPrizes);
        // echo "</pre>";
        // die();
        $campaignPrizes = collect($TicketOptionsPrizes)->map(function ($prize, $index) {
            $ticketOption = new TicketOptionsPrizes();
            $subPriceIDsJson = $ticketOption->getTicketId($prize->prize_id);
            return [
                'number' => $index + 1,
                'id' => $prize->id,
                'imageURL' =>  Prizes::where('id', $prize->prize_id)->first()->image,
                'title' => Prizes::where('id', $prize->prize_id)->first()->name,
                'packageIds' => $subPriceIDsJson,

            ];
        });
        $grandPrizes = GrandPrizes::first();
        $ticketOptions = new TicketOptions();
        $grandPrizeIds = $ticketOptions->getGrandPrizeIds($campaign->id);
        $grandPrize = [
            'number' =>  1,
            'packageIds' => $grandPrizeIds ?? [],
            'imageURL' =>  $grandPrizes->image ?? '',
            'defaultAmount' => 100000,
            'description' => $grandPrizes->title ?? '',
        ];
        $fabulousPrizes = $campaignPrizes->count();
        $largestDonation = Donations::select('usd_amount')->where('campaign_id', $campaign->id)->where('status', 'Paid')->max('usd_amount');
        $totalDonors = Donations::where('campaign_id', $campaign->id)->where('status', 'Paid')->count();
        $ticketsSold = Donations::where('campaign_id', $campaign->id)->where('status', 'Paid')->sum('entries');
        $totalDonations = Donations::where('campaign_id', $campaign->id)->where('status', 'Paid')->sum('amount');
        $countersStatistic = [
            ['id' => 'fabulousPrizes', 'text' => 'Fabulous Prizes', 'value' => $fabulousPrizes],
            ['id' => 'totalDonors', 'text' => 'Total<br>Donors', 'value' => $totalDonors],
            ['id' => 'ticketsSold', 'text' => 'Tickets<br>Sold', 'value' => $ticketsSold],
            ['id' => 'largestDonation', 'text' => 'Largest<br>Donation', 'value' => $largestDonation],
        ];
        // dd($largestDonation);
        $teamTitle = [
            'title' => 'Teams',
            'slug' => 'teams',
            'donationsCount' => $totalDonors,
            'teamsCount' => count($campaign->teams),
            'teamsDonationCount' => 0,
        ];
        $campaignGOAL = $campaign->meta->goal === 0 ? $campaign->meta->goal : 1;
        $campaign->load('media', 'meta', 'payments', 'organization', 'openGraph', 'teams');

        $raffleOffer = [
            'drawingDate' => $campaign->meta->end_date,
            // 'drawingDate' => (new \DateTime($campaign->meta->end_date))->format(DATE_ISO8601),
            'progressPercentage' => ($totalDonations / $campaignGOAL) * 100,
            'amount' => $totalDonations,
            'targetAmount' => $campaign->meta->goal,
            'showBonusAmount' => $campaign->meta->show_goal,
            'copAmount' => 0,
            'is_extented' => $campaign->meta->is_extented,
            'extend_date' => $campaign->meta->extend_date,
            'bonusAmount' => $campaign->meta->bonus_amount,
            'endDate' => $campaign->meta->end_date,
            'button' => [['text' => 'Enter The Raffle', 'link' => '#']],
            'ticketsSold' => $ticketsSold,
        ];
        $about = [
            'title' => $campaign->meta->intro_content_enabled == 1 ? $campaign->meta->intro_content_header : 'About Raffle',
            'description' => $campaign->meta->intro_main_content ?? '',
            'yiddish_description' => $campaign->meta->main_content_yiddish ?? '',
            'yingerman_content' => $campaign->meta->yingerman_content ?? '',
            'yiddish_yingerman_content' => $campaign->meta->yingerman_content_yiddish ?? '',
            'additionalContent' => $campaign->meta->additional_content  ?? '',
            'button' => [
                [
                    'text' => $campaign->meta->button_content ?? '',
                    'link' => '#additionalContent',
                    'class' => empty($campaign->meta->button_content) ? 'd-none' : '',
                ]
            ],
        ];
        $blogsData = $blogs->map(function ($blog) use ($campaign) {
            return [
                'id' => $blog->id ?? '',
                'title' => $blog->title ?? '',
                'slug' => $blog->slug ?? '',
                'image' => $blog->image ?? '',
                'description' => $blog->description ?? '',
                'date' => $blog->created_at ?? '',
            ];
        });
        $footer = [
            'footerTitle' => $organzationMeta->legal_name ?? '',
            'addressLine1' => $organzationMeta->org_address ?? '',
            'addressLine2' => $organzationMeta->org_address_2 ?? '',
            'country' => 'USA',
            'email' => $organzationMeta->email ?? '',
            'tax_id' => $organzationMeta->tax_id ?? '',
            'phone' => $organzationMeta->org_phone ?? '',
            'terms' => [
                'Compliance Notice 18 U.S.C Section 5847.',
                'You must be 18 years or older to participate.',
                '© 2024 / 100k Goral. All rights reserved.',
            ],
        ];

        $allocate_donation = AllocateDonation::all();
        // dd($pageTeam);
        return view('frontend/layout', compact(
            'campaign',
            'mainMenu',
            'secondaryMenu',
            'packages',
            'campaign_Users',
            'payment_gateways',
            'bannerData',
            'sponserData',
            'gallery',
            'campaignSettings',
            'CampaignTeamsData',
            'CampaignGiftsData',
            'donationData',
            'campaignMenuData',
            'splitPot',
            'campaignPrizes',
            'grandPrize',
            'countersStatistic',
            'about',
            'blogsData',
            'templateType',
            'raffleOffer',
            'sponsers',
            'footer',
            'upcomingCampaigns',
            'previousCampaigns',
            'organzationMeta',
            'teamTitle',
            'pageTeam',
            'AllteamsDonors',
            'allocate_donation'

        ));
        // return view('frontend/templates/raffle-template/home', compact('campaign', 'ticketOptions', 'campaign_Users'));
    }
}