<?php
//for thankyou page

$isThankyouPage = 0;
if (isset($_GET['trans']) && $_GET['trans'] > 0) {

    $getDonationByID = $donation->getDonationByKey($_GET['trans']);
    if ($db->count_rows($getDonationByID) > 0) {
        $donationInfo = $db->fetch_array($getDonationByID);
        $causeID =  $donationInfo['cause_id'];
        $getCauseByID = $campaign->getCauseByID($causeID);
        $causeInfo = $db->fetch_array($getCauseByID);
        $isThankyouPage = 1;
    }
}
$team_panel_id = "";
$team_panel_title = "";
$team_panel_slug = "";
$team_panel_goal = 0;
$team_panel_raiseAmount = 0;
$team_panel_total_donations = 0;
$teamCurrency = "USD";
if (isset($_GET['teamslug']) && $_GET['teamslug'] != "") {
    $teamsSlug = $_GET['teamslug'];
    $getTeamsBySlug = $campaign->getTeamsDetails($teamsSlug);
    if ($db->count_rows($getTeamsBySlug) > 0) {
        $team = $db->fetch_object($getTeamsBySlug);
        if ($team->currency == "cad") {
            $teamCurrency = "CAD";
        }
        $team_panel_id = $team->team_id;
        $team_panel_title = $team->display_name;
        $team_panel_goal = $team->team_goal;
        $team_panel_slug = $team->team_slug;
        $team_panel_raiseAmount =  $team->total_amount;
        $team_panel_total_donations =  $team->total_donations;
        $getTeamsDonations = $donation->getTeamsDonations($team->team_id, 0, 12);
        $teamsDonationsCount = $donation->getTeamsDonationsCount($team->team_id);
    }
}
$getAdminSettings = $admin->getAdminSettings($causeID);
if ($db->count_rows($getAdminSettings) > 0) {
    $adminSetting = $db->fetch_object($getAdminSettings);
    $legalName = $adminSetting->legal_name;
    $orgEmail = $adminSetting->email;
    $bankStatement = $adminSetting->bank_statement;
    $phone = $adminSetting->phone;
    $address = $adminSetting->address;
    $address2 = $adminSetting->address2;
    $mailingAddress = $adminSetting->mailing_address;
    $taxID = $adminSetting->tax_id;
    $statementDescriptor = $adminSetting->statement_descriptor;
} else {
    $legalName = "";
    $orgEmail = "";
    $bankStatement = "";
    $phone = "";
    $address = "";
    $address2 = "";
    $mailingAddress = "";
    $taxID = "";
    $statementDescriptor = "";
}

$bannerMainContent =  "";
$bannerSubContent =  "";
$bannerMainButton =  "";
$bannerMainButtonUrl =  "";
$bannerSecondaryButton = "";
$banner_amount = "";
$bannerButtonShow = "d-none";
$getCampaignCustomPrices = $campaign->getCampaignCustomPrices($causeID);
$totalGoalSponsored = $donation->getCauseSponsoredAmount($causeID, $causeInfo['total_amount_currency']);
$getCampaignBanners = $campaign->getCampaignBanners($causeID);

$getAllPrizes = $campaign->getAllPrizes($causeID);
$getAllCampaignPrizes = $campaign->getCampaignPrizesFront($causeID);

$getAllGrandPrizes = $campaign->getAllGrandPrizes();

$getMenu = $campaign->getMenuPages($causeID, 'general');
if ($db->count_rows($getMenu) === 0) {
    $getMenu = $campaign->getMenuPages(0, 'general');
}

$getSecondaryMenu = $campaign->getMenuPages($causeID, "secondary");

if ($db->count_rows($getSecondaryMenu) === 0) {
    $getSecondaryMenu = $campaign->getMenuPages(0, 'secondary');
}

$logo = !empty($causeInfo['logo']) ? baseURL . '/cause_thumbs/' . $causeInfo['logo'] : homeURL . "/images/logo.svg";
$goal =   (isset($causeInfo['goal']) && !empty($causeInfo['goal'])) ? $causeInfo['goal'] : 0;
$bonusAmount =   (isset($causeInfo['bonus_amount']) && !empty($causeInfo['bonus_amount'])) ? $causeInfo['bonus_amount'] : 0;
$showBonusGoal =   (isset($causeInfo['bonus_goal']) && !empty($causeInfo['bonus_goal'])) ? $causeInfo['bonus_goal'] : 0;
$bgImg = !empty($causeInfo['logo']) ? baseURL . '/cause_thumbs/' . $causeInfo['logo'] : homeURL . "/images/logo.svg";
$isImgBg = false;
if ($db->count_rows($getCampaignBanners) > 0) {

    while ($banner = $db->fetch_array($getCampaignBanners)) {
        $banner['start_date'];
        $banner['end_date'];
        require __DIR__ . '/../MobileDetect/vendor/autoload.php';

        $detect = new Detection\MobileDetect;
        if ($banner['type'] == 'media') {
            $isImgBg = false;
            $bannerMainContent =  "";
            $bannerSubContent =  "";
            $bannerMainButton =  "";
            $bannerMainButtonUrl =  "";
            $bannerSecondaryButton = "";
            $banner_amount = "";
            $bannerButtonShow = "d-none";
            if ($banner['media_type'] == 'file') {


                if (($detect->isMobile() || $detect->isTablet()) && !empty($banner['mobile_media'])) {
                    $bgImg = baseURL . "/../uploads/banners/" . $banner['mobile_media'];
                } else {
                    $bgImg = baseURL . "/../uploads/banners/" . $banner['media'];
                }
                $iframe  = false;
            } else {
                $bgImg =  $banner['media'];
                $iframe  = true;
            }
        } else {

            if (($detect->isMobile() || $detect->isTablet())) {
                $isImgBg = true;
                if (!empty($banner['custom_bg_mobile'])) {
                    $bgImg = baseURL . "/../uploads/banners/" . $banner['custom_bg_mobile'];
                } else {
                    $bgImg = baseURL . "/../uploads/banners/" . $banner['custom_bg'];
                }
            } else {
                $isImgBg = false;
                $bgImg = baseURL . "/../uploads/banners/" . $banner['custom_bg'];
            }

            $bannerMainButtonUrl = (isset($banner['button_url']) && !empty($banner['button_url'])) ? $banner['button_url'] : "#";
            $bannerMainContent = (isset($banner['mainContent']) && !empty($banner['mainContent'])) ? $banner['mainContent'] : "ENTER NOW FOR A CHANCE TO WIN";
            $bannerSubContent = (isset($banner['subContent']) && !empty($banner['subContent'])) ? $banner['subContent'] : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque,";
            $bannerMainButton = (isset($banner['mainButtonContent']) && !empty($banner['mainButtonContent'])) ? $banner['mainButtonContent'] : "View Prizes";
            $bannerSecondaryButton = (isset($banner['subButtonContent']) && !empty($banner['subButtonContent'])) ? $banner['subButtonContent'] : "Buy the Raffle";
            $banner_amount = (isset($banner['banner_amount']) && !empty($banner['banner_amount'])) ? $banner['banner_amount'] : "";
            $bannerButtonShow = "";
        }
    }
}
$getAllPrizess = $campaign->getPrizesCount($causeID);

$allPrizesCount = 0;

if ($getAllPrizess !== false) {
    $prizeArray = mysqli_fetch_all($getAllPrizess, MYSQLI_ASSOC);
    $allPrizesCount = count($prizeArray);
}


$showDonors =  (isset($causeInfo['totalDonors']) && $causeInfo['totalDonors'] == 0) ? true : false;
$showCustomAmount =  (isset($causeInfo['manual_amount']) && $causeInfo['manual_amount'] == 1) ? 1 : 0;
$enableGifts =  (isset($causeInfo['enable_gifts']) && $causeInfo['enable_gifts'] == 1) ? 1 : 0;
$createTeams =  (isset($causeInfo['show_team_button']) && $causeInfo['show_team_button'] == 1) ? 1 : 0;
$showLargestDonation =    (isset($causeInfo['largestDonation']) && $causeInfo['largestDonation'] == 0) ? true : false;
$showFabulousPrize =    (isset($causeInfo['fabulousPrize']) && $causeInfo['fabulousPrize'] == 0) ? true : false;
$showTicketSold =    (isset($causeInfo['ticketSold']) && $causeInfo['ticketSold'] == 0) ? true : false;
$totalDoners = 0;
$ticketsSold = 0;
$largestDonationAmount = 0;
$getCampgainStats = $campaign->getCampgainStats($causeID);
if ($db->count_rows($getCampgainStats) > 0) {
    $campgainStats = $db->fetch_array($getCampgainStats);
    $totalDoners = (isset($campgainStats['TotalDonors']) && !empty($campgainStats['TotalDonors'])) ? $campgainStats['TotalDonors'] : 0;
    $ticketsSold = (isset($campgainStats['TicketsSold']) && !empty($campgainStats['TicketsSold'])) ? $campgainStats['TicketsSold'] : 0;
    $largestDonationAmount = (isset($campgainStats['largestDonationAmount']) && !empty($campgainStats['largestDonationAmount'])) ? $campgainStats['largestDonationAmount'] : 0;
}
$goalSponsored = ($totalGoalSponsored > 0 && $goal > 0) ? number_format(min(($totalGoalSponsored / $goal) * 100, 100), 0) : 0;
// $goalSponsored = ($totalGoalSponsored > 0 && $goal > 0) ? number_format(($totalGoalSponsored / $goal) * 100, 0) : 0;
$getRules = $campaign->getRules($causeID);
$getRules = $db->fetch_array($getRules);

$rules = isset($getRules['rules']) ? $getRules['rules'] : "";
$rules = htmlspecialchars_decode($rules);

$getDonations = $donation->getRecentDonationByCause($causeID, 0, 12);
$donationsCount = $donation->getRecentDonationByCauseCount($causeID);

$getTeams = $donation->getTeamsForDonations($causeID, 0, 6, null);
$teamsCount = $campaign->getCountTeams($causeID);

$getEB = $campaign->getEarlyBirdforFront();
$earlyBird = $db->fetch_object($getEB);

if ($enableGifts == 1) {
    $getAllCampaignGifts = $campaign->getCampaignGiftsFront($causeID);
}

$gallery = $campaign->getCampaignGallery($causeID);

$sponsorship = $campaign->getSponsorShipOpportunities($causeID);
$getCouponInfoForTimer = $donation->getCouponInfoForTimer($causeID);

$cop_end_date = "";
$cop_amount = 0;

if (!empty($getCouponInfoForTimer)) {
    $cop_end_date = $getCouponInfoForTimer->end_date;
    $cop_amount = $getCouponInfoForTimer->cp_amount;
}
