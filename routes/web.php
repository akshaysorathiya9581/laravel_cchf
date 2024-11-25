<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\campaignController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\couponController;
use App\Http\Controllers\bannerController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\EarlyBirdController;
use App\Http\Controllers\GrandPrizesController;
use App\Http\Controllers\PrizesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\paymentMethodController;
use App\Http\Controllers\CampaignCustomCodeController;
use App\Http\Controllers\CampaignGalleryController;
use App\Http\Controllers\SponsorshipOpportunityController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CampaignSplitPotController;
use App\Http\Controllers\CampaignGiftsController;
use App\Http\Controllers\CampaignGalleryControllerr;
use App\Http\Controllers\CampaignMenuController;
use App\Http\Controllers\EmailApiSettingsController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\TicketOptionsController;
use App\Http\Controllers\TeamsController;
use App\Models\OrganizationMeta;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationMetaController;
use App\Http\Controllers\refundController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\TipsController;
use App\Models\Seasons;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TestEmailController;
use App\Http\Controllers\SustainerOptionsController;
use App\Http\Controllers\AllocateDonationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\OpenGraphController;
use App\Http\Controllers\Admin\EmailTemplatesController;
use App\Http\Controllers\Admin\VolunteerRoleController;

// Route::get('/', function () {
//     return view('frontend/home');
// });

require_once('forntendRoutes.php');

// routes/web.php
Route::get('/test-email', [TestEmailController::class, 'sendTestEmail']);

// Route::get('/dashboard', function (Request $request) {
//     if (!$request->session()->has('season_id')) {
//         $season = Seasons::first();

//         if ($season) {
//             $request->session()->put('season_id', $season->id);
//         }
//     }
//     return view('admin.dashboard');
// })->middleware(['auth:admin', 'verified', 'setDatabase'])->name('dashboard');

// Route::middleware(['setDatabase'])->group(function () {
//     Route::post('/login', [AuthenticatedSessionController::class, 'store']);
//     Route::get('/db-config', function () {
//         dd(DB::getConfig());
//     });
// });

// // logout
// Route::get('/logout', function () {
//     Auth::logout();
//     return redirect('/login');
// })->name('logout');

Route::post('/set-season', [SeasonsController::class, 'setSeason'])->name('set-season');

Route::middleware('auth:admin', 'setDatabase')->group(function () {
    // sustainer-options route
    Route::resource('sustainer-options', SustainerOptionsController::class);
    // Route::middleware(['isSetOrganization'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {

        //____GRAND_PRIZES_ROUTES___
        Route::get('/admin', function () {
            return redirect(route('admin.dashboard', absolute: false));
        });

        Route::get('/admin/grand-prizes', [GrandPrizesController::class, 'index'])->name('admin.grand-prizes');
        Route::post('/admin/storeGrandPrizes', [GrandPrizesController::class, 'update'])->name('admin.storeGrandPrizes');
        Route::post('/admin/getgrandPrizeSingledata', [GrandPrizesController::class, 'getgrandPrizeSingledata'])->name('admin.getgrandPrizeSingledata');
        Route::post('/admin/editGrandPrize', [GrandPrizesController::class, 'update'])->name('admin.editGrandPrize');

        //_____COUPONS_ROUTES
        Route::post('/admin/storeCoupon', [couponController::class, 'update'])->name('admin.storeCoupon');
        Route::post('/admin/editCoupon', [couponController::class, 'update'])->name('admin.editCoupon');
        Route::post('/admin/getCouponSingledata', [couponController::class, 'getCouponSingledata'])->name('admin.getCouponSingledata');
        Route::get('/admin/coupons', [couponController::class, 'index'])->name('admin.coupons');

        //_____PRIZES_ROUTES
        Route::get('/admin/prizes', [PrizesController::class, 'index'])->name('admin.prizes');
        Route::post('/admin/storePrizes', [PrizesController::class, 'update'])->name('admin.storePrizes');
        Route::post('/admin/getPrizeSingledata', [PrizesController::class, 'getPrizeSingledata'])->name('admin.getPrizeSingledata');
        Route::post('/admin/editPrize', [PrizesController::class, 'update'])->name('admin.editPrize');

        //_____TICKET_OPTIONS_ROUTES
        Route::get('/admin/ticket-options', [TicketOptionsController::class, 'index'])->name('admin.ticket-options');
        Route::post('/admin/storeTicketOption', [TicketOptionsController::class, 'update'])->name('admin.storeTicketOption');
        Route::post('/admin/getTicketOptionSingledata', [TicketOptionsController::class, 'getTicketOptionSingledata'])->name('admin.getTicketOptionSingledata');
        Route::post('/admin/updateTicketOption', [TicketOptionsController::class, 'update'])->name('admin.updateTicketOption');


        //_____EARLY_BIRD_ROUTES
        Route::get('/admin/early-bird', [EarlyBirdController::class, 'index'])->name('admin.early-bird');
        Route::post('/admin/getSingleEarlyBird', [EarlyBirdController::class, 'getSingleEarlyBird'])->name('admin.getSingleEarlyBird');
        Route::post('/admin/storeEarlyBird', [EarlyBirdController::class, 'update'])->name('admin.storeEarlyBird');
        Route::post('/admin/UpdateEarlyBird', [EarlyBirdController::class, 'update'])->name('admin.UpdateEarlyBird');
    });

    //_____CAMPAIGN_ROUTES___
    Route::get('/admin/campaigns', [campaignController::class, 'index'])->name('admin.campaigns');
    Route::get('/admin/createCampaign', [campaignController::class, 'createNew'])->name('admin.addCampaigns');
    Route::post('/admin/addCampaign', [campaignController::class, 'create'])->name('admin.storeCampaign');
    Route::post('/admin/updateCampaign', [campaignController::class, 'update'])->name('admin.updateCampaign');

    Route::get('/admin/campaigns/{campaign}/edit', [CampaignController::class, 'edit'])->name('admin.campaign.edit');

    //_DONATIONS_ROUTES
    Route::get('/admin/donations', [DonationController::class, 'index'])->name('admin.donations');
    Route::get('/admin/donation/{id}', [DonationController::class, 'details'])->name('admin.donationsDetails');
    Route::get('/admin/getDonationData', [DonationController::class, 'getDonationData'])->name('admin.getDonationData');
    Route::get('/admin/exportDonation', [DonationController::class, 'exportDonation'])->name('admin.exportDonation');

    Route::get('/admin/referrers', [DonationController::class, 'referrers'])->name('admin.referrers');
    Route::get('/admin/offline-donations', [DonationController::class, 'offline_donations'])->name('admin.offline-donations');
    Route::post('/admin/saveOfflineDonation', [DonationController::class, 'create'])->name('admin.saveOfflineDonation');
    Route::post('/admin/edit_donation_notes', [DonationController::class, 'edit_donation_notes'])->name('admin.edit_donation_notes');
    Route::post('/admin/changeDonationTeam', [DonationController::class, 'changeDonationTeam'])->name('admin.changeDonationTeam');
    Route::post('/admin/edit_donation', [DonationController::class, 'edit_donation'])->name('admin.edit_donation');
    Route::post('/admin/refundDonation', [refundController::class, 'index'])->name('admin.refundDonation');
    Route::post('admin/donations/import', [DonationController::class, 'import'])->name('admin.donations.import');

    Route::get('/admin/getTeamsByCampaign/{campaign}', [DonationController::class, 'getTeamsByCampaign'])->name('admin.campaign.teams');
    Route::get('/admin/getYingerManByCampaign/{campaign}', [DonationController::class, 'getYingerManByCampaign'])->name('admin.campaign.getYingerMan');

    //_DONATIONS_TIPS
    Route::get('/admin/donation-tips', [TipsController::class, 'DonationTips'])->name('admin.donationsTips');
    Route::get('/admin/getDonationTipsData', [TipsController::class, 'getDonationTipsData'])->name('admin.getDonationTipsData');
    Route::get('/admin/tips-details/{tipID}', [TipsController::class, 'tipsDetails'])->name('admin.tipsDetails');


    //_PAYMENT_MODALS_ROUTES
    Route::post('/admin/getPaymentData', [paymentMethodController::class, 'getPaymentData'])->name('admin.getPaymentData');
    Route::post('/admin/updatePaymentMethodForm', [paymentMethodController::class, 'update'])->name('admin.updatePaymentMethodForm');


    //_CAMPAIGN_BANNER_ROUTES
    Route::post('/admin/{slug}/addbanner', [BannerController::class, 'store'])->name('admin.storebanner');
    Route::post('/admin/getSingleBanner', [BannerController::class, 'getSingleBanner'])->name('admin.getSingleBanner');
    Route::post('/admin/updateBanner', [BannerController::class, 'update'])->name('admin.updateBanner');


    //_CAMPAIGN_TEAM_ROUTES
    Route::get('admin/campaign/teams/{id}', [TeamsController::class, 'index'])->name('admin.Campaignteams');
    Route::post('/admin/storeTeam', [TeamsController::class, 'update'])->name('admin.storeTeam');
    Route::post('/admin/getSingleTeamData', [TeamsController::class, 'getSingleTeamData'])->name('admin.getSingleTeamData');
    Route::post('/admin/updateTeam', [TeamsController::class, 'update'])->name('admin.updateTeam');

    //_CAMPAIGN_SPLIT_THE_POT_ROUTES
    Route::get('admin/campaign/split-pot/{id}', [CampaignSplitPotController::class, 'index'])->name('admin.split-pot');
    Route::post('/admin/storeSTP', [CampaignSplitPotController::class, 'update'])->name('admin.storeSTP');
    Route::post('/admin/getSinglesplitPotData', [CampaignSplitPotController::class, 'getSinglesplitPotData'])->name('admin.getSinglesplitPotData');
    Route::post('/admin/updateSTP', [CampaignSplitPotController::class, 'update'])->name('admin.updateSTP');

    //_CAMPAIGN_GIFTS_ROUTES
    Route::get('admin/campaign/gifts/{id}', [CampaignGiftsController::class, 'index'])->name('admin.gifts');
    Route::post('/admin/storeGifts', [CampaignGiftsController::class, 'update'])->name('admin.storeGifts');
    Route::post('/admin/updateGifts', [CampaignGiftsController::class, 'update'])->name('admin.updateGifts');
    Route::post('/admin/getSinglegiftData', [CampaignGiftsController::class, 'getSinglegiftData'])->name('admin.getSinglegiftData');

    //_SEASONS_ROUTES
    Route::get('admin/setting/seasons', [SeasonsController::class, 'index'])->name('admin.seasons');
    Route::post('admin/setting/storeSeason', [SeasonsController::class, 'store'])->name('admin.storeSeason');
    Route::post('admin/setting/updateSeason', [SeasonsController::class, 'update'])->name('admin.updateSeason');
    Route::post('admin/setting/getSingleSeason', [SeasonsController::class, 'getSingleSeason'])->name('admin.getSingleSeason');
    Route::put('/organization-meta/{organizationMeta}', [OrganizationMetaController::class, 'update']);
    //_CAMPAIGN_CUSTOM_CODE
    Route::get('admin/campaign/custom-code/{id}', [CampaignCustomCodeController::class, 'index'])->name('admin.custom-code');
    Route::post('/admin.updateCustomCode', [CampaignCustomCodeController::class, 'update'])->name('admin.updateCustomCode');
    //_CAMPAIGN_GALLERY_ROUTES
    Route::post('/admin/storeGallery', [CampaignGalleryController::class, 'update'])->name('admin.storeGallery');
    Route::post('/admin/updateGallery', [CampaignGalleryController::class, 'update'])->name('admin.updateGallery');
    Route::post('/admin/getSingleGallery', [CampaignGalleryController::class, 'getSingleGallery'])->name('admin.getSingleGallery');
    //_SPONSORSHIP_OPPORTUNITIES
    Route::post('/admin/storeSponsorShipOpportunities', [SponsorshipOpportunityController::class, 'update'])->name('admin.storeSponsorShipOpportunities');
    Route::post('/admin/updateSponsorShipOpportunities', [SponsorshipOpportunityController::class, 'update'])->name('admin.updateSponsorShipOpportunities');
    Route::post('/admin/getSingleSponsorShipOpportunities', [SponsorshipOpportunityController::class, 'getSingleSponsorShipOpportunity'])->name('admin.getSingleSponsorShipOpportunities');
    //_EMAIL_TEMPLATES_ROUTES
    Route::post('/admin/updateEmailTemplate', [EmailTemplateController::class, 'update'])->name('admin.updateEmailTemplate');
    //_BLOGS_ROUTES
    Route::get('/admin/blogs', [BlogsController::class, 'index'])->name('admin.blogs');
    Route::post('/admin/saveBlog', [BlogsController::class, 'update'])->name('admin.saveBlog');
    Route::post('/admin/updateBlog', [BlogsController::class, 'update'])->name('admin.updateBlog');
    Route::post('/admin/getSingleBlog', [BlogsController::class, 'getSingleBlog'])->name('admin.getSingleBlog');
    //_CAMPAIGN_MENU_ROUTES
    Route::post('/admin/storeMenu', [CampaignMenuController::class, 'update'])->name('admin.storeMenu');
    Route::post('/admin/getMenuSingledata', [CampaignMenuController::class, 'getMenuSingledata'])->name('admin.getMenuSingledata');

    //_CAMPAIGN_SPONSOR
    Route::get('admin/campaign/sponsor/{id}', [SponsorController::class, 'index'])->name('admin.sponsor');
    Route::post('/admin/storeSponsor', [SponsorController::class, 'update'])->name('admin.storeSponsor');
    Route::post('/admin/getSingleSponsorData', [SponsorController::class, 'getSingleSponsorData'])->name('admin.getSingleSponsorData');
    Route::post('/admin/updateSponsor', [SponsorController::class, 'update'])->name('admin.updateSponsor');

    //_CAMPAIGN_TIPS
    Route::get('admin/campaign/tips/{id}', [TipsController::class, 'index'])->name('admin.tips');
    Route::post('/admin/storeTip', [TipsController::class, 'update'])->name('admin.storeTip');
    Route::post('/admin/getSingleTipData', [TipsController::class, 'getSingleTipData'])->name('admin.getSingleTipData');
    Route::post('/admin/updateTip', [TipsController::class, 'update'])->name('admin.updateTip');

    //_EMAIL_TEMPLATE
    Route::get('/admin/email-template', [EmailTemplatesController::class, 'index'])->name('admin.emailtemplate');
    Route::post('/admin/save-template', [EmailTemplatesController::class, 'update'])->name('emailtemplate.save');
    Route::get('/admin/getemailsetting', [EmailTemplatesController::class, 'getEmailSetting'])->name('email.get-settings');

    //_VOLUNTEER_ROLE
    Route::get('/admin/volunteer/role', [VolunteerRoleController::class, 'index'])->name('volunteer.role');
    Route::post('/admin/volunteer/managerole', [VolunteerRoleController::class, 'managerole'])->name('volunteer.managerole');

    /*
        |___DELETE_METHOD_
        |
        |
        |_CAMPAIGNS___ */
    Route::get('admin/campaign/delete/{campaignId}', [campaignController::class, 'destroy'])->name('admin.campaign.destroy');
    //_CAMPAIGN_BANNER_DELETE
    Route::get('admin/banner/delete/{bannerId}', [bannerController::class, 'destroy'])->name('admin.banner.destroy');
    //_TICKET_OPTION_DELETE
    Route::get('admin/ticket-option/delete/{ticketId}', [TicketOptionsController::class, 'destroy'])->name('admin.ticketOption.destroy');
    //_CAMPAIGN_GALLERY_DELETE
    Route::get('admin/gallery/delete/{galleryId}', [CampaignGalleryController::class, 'destroy'])->name('admin.gallery.destroy');
    //_CAMPAIGN_SPONSORSHIP_DELETE
    Route::get('admin/sponsorship-opportunities/delete/{sponsorShipId}', [SponsorshipOpportunityController::class, 'destroy'])->name('admin.sponsorship.destroy');
    //_CAMPAIGN_MENU_DELETE
    Route::get('admin/menu/delete/{menuId}', [CampaignMenuController::class, 'destroy'])->name('admin.menu.destroy');
    //_CAMPAIGN_TEAM_DELETE
    Route::get('admin/team/delete/{teamId}', [TeamsController::class, 'destroy'])->name('admin.team.destroy');
    //_CAMPAIGN_STP_DELETE
    Route::get('admin/split-pot/delete/{stpId}', [CampaignSplitPotController::class, 'destroy'])->name('admin.stp.destroy');
    //_CAMPAIGN_GIFT_DELETE
    Route::get('admin/gift/delete/{giftId}', [CampaignGiftsController::class, 'destroy'])->name('admin.gift.destroy');
    //_COUPON_DELETE
    Route::get('admin/coupon/delete/{couponId}', [couponController::class, 'destroy'])->name('admin.coupon.destroy');
    //_GRAND_PRIZE_DELETE
    Route::get('admin/grand-prize/delete/{grandPrizeId}', [GrandPrizesController::class, 'destroy'])->name('admin.grandPrize.destroy');
    //_PRIZE_DELETE
    Route::get('admin/prize/delete/{prizeId}', [PrizesController::class, 'destroy'])->name('admin.prize.destroy');
    //_EARLY_BIRD_DELETE
    Route::get('admin/early-bird/delete/{earlyBirdId}', [EarlyBirdController::class, 'destroy'])->name('admin.earlyBird.destroy');
    //_BLOGS_DELETE
    Route::get('admin/blog/delete/{blogId}', [BlogsController::class, 'destroy'])->name('admin.blog.destroy');
    //_SEASON_DELETE
    Route::get('admin/season/delete/{seasonId}', [SeasonsController::class, 'destroy'])->name('admin.season.destroy');
    //_CAMPAIGN_SPONSOR_DELETE
    Route::get('admin/sponsor/delete/{sponsorID}', [SponsorController::class, 'destroy'])->name('admin.sponsor.destroy');
    //_CAMPAIGN_TIP_DELETE
    Route::get('admin/tip/delete/{tipID}', [TipsController::class, 'destroy'])->name('admin.tip.destroy');
    //_USERS_DELETE
    Route::get('admin/user/delete/{userId}', [UsersController::class, 'destroy'])->name('admin.user.destroy');
    //_ORGANIZATION_DELETE
    Route::get('admin/organization/delete/{organizationId}', [OrganizationController::class, 'destroy'])->name('admin.organization.destroy');
    // });


    //____USERS_ROUTES_______
    Route::get('admin/setting/users', [UsersController::class, 'index'])->name('admin.users');
    Route::post('admin/setting/storeUser', [UsersController::class, 'store'])->name('admin.storeUser');
    Route::post('admin/setting/updateUser', [UsersController::class, 'update'])->name('admin.updateUser');
    Route::post('admin/setting/changeSendMail', [UsersController::class, 'changeSendMail'])->name('admin.changeSendMail');
    Route::post('admin/setting/getSingleUser', [UsersController::class, 'getSingleUser'])->name('admin.getSingleUser');

    //____ORGANIZATION_ROUTES____
    Route::get('/admin/organization', [OrganizationController::class, 'index'])->name('admin.organization');
    Route::post('/admin/getSingleOrganization', [OrganizationController::class, 'getSingleOrganization'])->name('admin.getSingleOrganization');
    Route::post('/admin/storeOrganization', [OrganizationController::class, 'update'])->name('admin.storeOrganization');
    Route::post('/admin/updateOrganization', [OrganizationController::class, 'update'])->name('admin.updateOrganization');

    //__EMAIL_API_SETTINGS___
    Route::get('/admin/email-settings', [EmailApiSettingsController::class, 'index'])->name('admin.emailApiSettings');
    Route::post('/admin/email-settings', [EmailApiSettingsController::class, 'update'])->name('admin.updateApiEmailSettings');

    // sustainer-options route
    Route::resource('sustainer-options', SustainerOptionsController::class);

    // AllocateDonation
    Route::resource('allocate-donation', AllocateDonationController::class);
    Route::get('admin/allocatedonation/delete/{allocateID}', [AllocateDonationController::class, 'destroy'])->name('admin.allocateDonation.destroy');

    //_OG_PROPERTIES
    Route::get('/admin/og/get', [OpenGraphController::class, 'getOgDetail'])->name('admin.getoginfo');
    Route::post('/admin/og/update', [OpenGraphController::class, 'update'])->name('admin.updateogdata');
}); 

require __DIR__.'/admin-auth.php';
require __DIR__ . '/auth.php';