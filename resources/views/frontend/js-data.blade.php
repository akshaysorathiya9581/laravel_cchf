<script>
    window.siteContent = {!! json_encode([
        'mainMenu' => $mainMenu,
        'secondaryMenu' => $secondaryMenu,
        'logo' => [
            'img' => $campaign->media->logo_url ? $campaign->media->logo_url : 'images/logo.png',
            'alt' => '100k Goral Logo',
            'text' => '100k Goral',
        ],
        'promo' => $bannerData,
        'raffleOffer' => $raffleOffer,
        'countersStatistic' => $countersStatistic,
        // [
        //     ['id' => 'fabulousPrizes', 'text' => 'Fabulous Prizes', 'value' => 10],
        //     ['id' => 'totalDonors', 'text' => 'Total\nDonors', 'value' => 27],
        //     ['id' => 'ticketsSold', 'text' => 'Tickets\nSold', 'value' => 7],
        //     ['id' => 'largestDonation', 'text' => 'Largest\nDonation', 'value' => 7500],
        // ],
        // 'about' => [
        //     'title' => $campaign->title,
        //     'description' => '',
        //     'button' => [['text' => 'More About 100k', 'link' => '#']],
        // ],
        'tickets' => [
            'title' => 'Choose your tickets',
            'packages' => $packages,

            'prizes' => $campaignPrizes,
            'grandPrize' => $grandPrize,
            'gifts' => $CampaignGiftsData,
        ],
        'splitPot' => $splitPot,
        'cart' => [
            'heading' => 'Checkout',
            'ticketsTitle' => 'Your Donation:',
            'giftsTitle' => 'Selected Gifts',
        ],
        'about' => $about,
        'aboutCampaign' => [
            'heading' => 'About 100k Goral',
            'text' => '',
            'button' => [
                [
                    'text' => 'More About 100k',
                    'link' => '#',
                ],
            ],
        ],
        'campaignSettings' => $campaignSettings,
        'partners' => [
            'donors' => $donationData,
            'teamMembers' => [],
            'teamDoners' => [],
        ],
        'sponsorship' => $sponserData,

        'gallery' => $gallery,

        'teamTitle' =>$teamTitle,
        'blogsData' => $blogsData,
        'template' => $campaign->template,
        'organzationMeta' => $organzationMeta,
        'footer' => $footer,
        'setting' => ['templateType' => $templateType],
    ]) !!};
</script>
