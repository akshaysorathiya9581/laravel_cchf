@section('title', 'Multi Location CCHF')
{{-- @section('raffle_template') --}}
@include('frontend.templates.multi-location-template.includes.header')



<main>
    <!-- starts main banner area  -->
    <div class="container-wrapper">
        <div class="banner_container">
            <div class="banner_column">
                <div class="promo__content-wrapper">
                    <div class="promo-content">
                        <h1 class="promo__title"> Support the <br> Satmer Money Kolle <mark></mark></h1>
                        <p class="promo__subtitle ">
                            Win a Brand New Honda Pilot
                        </p>
                        </p>
                        <div class="d-flex button_sec align-items-center flex-wrap gap-30">
                            <a href="#GiftsSection" class="home_btn overlay">Free Gifts for Donation of $100+</a>
                            <a href="#aboutSection" class="promo__link">
                                <span>About Satmer Monsey Kollel</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357"
                                    viewBox="0 0 19.071 11.357">
                                    <g id="arrow" transform="translate(-382.929 -510.314)">
                                        <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2"
                                            transform="translate(400.586 517.385) rotate(-135)" fill="var(--white)">
                                        </rect>
                                        <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2"
                                            transform="translate(402 516.014) rotate(135)" fill="var(--white)">
                                        </rect>
                                        <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2"
                                            transform="translate(394.586 517.385) rotate(-135)" fill="var(--white)">
                                        </rect>
                                        <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2"
                                            transform="translate(396 516.014) rotate(135)" fill="var(--white)">
                                        </rect>
                                        <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2"
                                            transform="translate(388.586 517.385) rotate(-135)" fill="var(--white)">
                                        </rect>
                                        <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2"
                                            transform="translate(390 516.014) rotate(135)" fill="var(--white)">
                                        </rect>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner_column">
                <div style="background-image: url('{{ asset('assets/frontend/templates/multi-location/images/Vector.png') }}');"
                    class="banner_slide_container">
                    <div class="promo__images">
                        <img alt="img" style="display: none">
                    </div>
                </div>
                <div class="swiper-sponsor-wrapper">
                    <div class="swiper swiper-sponsors  ">
                        <h2 class="banner-right-heading">Our Sponsors</h2>
                        <div class="swiper-wrapper">
                            @if (!empty($sponsers) && $sponsers->count())
                                @foreach ($sponsers as $sponser)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($sponser->image) }}" alt="Sponser Image">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .raffle_ticket {
            background-image: url("{{ asset('assets/frontend/templates/multi-location/images/ticket.png') }}")
        }
    </style>

    @if ($pageTeam)
        @include('frontend.team-data')
    @endif

    <!-- ends main banner area  -->
    <!-- starts ticket & raffle offer -->
    <div class="container-wrapper" id="sponsor_donation">
        <div class="raffle_offer--container ">
            <div class="ticket_option_side">
                <h2 class="sponor_title">Sponsor Now</h2>
                <p class="sponor_pg">Choose a donation amount</p>
                <div class="tickets_area ">
                    <div class="tickets options-grid">

                    </div>
                    <div class="custom_area">
                        <div class="input_custom">
                            <h4>
                                <input type="text" placeholder="Amount" id="customAmount" name="DonateAmount">
                            </h4>
                        </div>
                        <button class="checkout_btn main_btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseCart" aria-expanded="false">Donate Now</button>
                    </div>
                </div>
                <script>
                    //                     function addDollarSign(input) { 
                    //     if (!input.value.startsWith('$')) {
                    //         input.value = '$' + input.value.replace(/[^0-9]/g, ''); 
                    //     } else {
                    //         input.value = '$' + input.value.slice(1).replace(/[^0-9]/g, ''); 
                    //     }
                    // }
                </script>
                <div class="supported_methods">
                    @foreach ($payment_gateways as $index => $gateway)
                        @switch($gateway->payment_method)
                            @case('stripe')
                                <img class="image" style="width:60px;"
                                    src="{{ asset('assets/frontend/images/payment-method/Stripe.svg') }}" alt="stripe icon">
                            @break

                            @case('authorize_net')
                                <img class="image" style="width:60px;"
                                    src="{{ asset('assets/frontend/images/payment-method/Mastercard.svg') }}"
                                    alt="Mastercard Icon">
                            @break

                            @case('cardknox_cc')
                                <img class="image" style="width:60px;"
                                    src="{{ asset('assets/frontend/images/payment-method/General-CC.svg') }}"
                                    alt="General CC Icon" srcset="">
                            @break

                            @case('banquest')
                                <img class="image" style="width:60px;"
                                    src="{{ asset('assets/frontend/images/payment-method/Mastercard.svg') }}"
                                    alt="Mastercard Icon">
                            @break

                            @case('matbia')
                                <img class="image" style="width:60px;"
                                    src="{{ asset('assets/frontend/images/payment-method/matbia.svg') }}"
                                    alt="General CC Icon">
                            @break

                            @case('ojc_fund')
                                <img class="image" style="width:60px;"
                                    src="{{ asset('assets/frontend/images/payment-method/Ojc.png') }}" alt="Ojc Icon">
                            @break

                            @case('donors_fund')
                                <img class="image" style="width:60px;"
                                    src="{{ asset('assets/frontend/images/payment-method/DonorsFund.png') }}"
                                    alt="Donors Fund">
                            @break

                            @case('usaepay')
                                <img class="image" style="width:60px;"
                                    src="{{ asset('assets/frontend/images/payment-method/General-CC.svg') }}"
                                    alt="General CC Icon">
                            @break

                            @case('paypal')
                                <img class="image" style="width:60px;"
                                    src="{{ asset('assets/frontend/images/payment-method/PayPal.svg') }}" alt=""
                                    srcset="">
                            @break

                            @case('pledger')
                                <img class="image" style="width:60px;"
                                    src="{{ asset('assets/frontend/images/payment-method/Pledger.png') }}"
                                    alt="Pledger Icon">
                            @break

                            @default
                        @endswitch
                    @endforeach

                </div>
                <div class="tax_id_desc">
                    <p>
                        All donations are tax
                    </p>
                    <p>
                        Deductible.
                        <strong>
                            Tax ID: {{ $organzationMeta->tax_id ?? '' }}
                        </strong>
                    </p>
                </div>
            </div>
            <div class="raffle_offer_side">
                <div class="raffle-offer">

                </div>
            </div>
        </div>
    </div>
    <!-- ends ticket & raffle offer -->

    <!-- STARTS ABOUT SECTION -->
    <div class="container-wrapper">
        <div class="about-right-column language-selector-wrapper">
            <div class="img-btn">
                <button class="language_btn englishBtn active">
                    <img src="{{ asset('assets/frontend/templates/multi-location/images/english.png') }}">
                    English
                </button>
                <button class="language_btn yiddishBtn">
                    <img src="{{ asset('assets/frontend/templates/multi-location/images/yiddish.png') }}">
                    יודיש
                </button>

            </div>
        </div>
        <div class="about_container eng_local">
            <div class="about-column">
                <h2 class="about-title">
                    @if ($about['title'])
                        {{ $about['title'] }}
                    @endif
                </h2>
                <p class="about-description">

                    {{-- <div class="eng_local"> --}}
                    @if (!empty($about['description']))
                        {!! cleanText($about['description']) !!}
                    @endif
                    {{-- </div> --}}

                </p>
                <div class="about-owner">
                    <div class="owner-column">
                        <strong>Harav Shia Meisels Shlite</strong>
                        <p>Rosh Hakolel</p>
                    </div>
                    <div class="owner-column">
                        <strong>Andrew Shlite </strong>
                        <p>Rosh Hakolel</p>
                    </div>
                    <div class="owner-column">
                        <strong>Location</strong>
                        <p>
                            @if (!empty($campaign->organization_meta->org_address))
                                {{ $campaign->organization_meta->org_address }}
                            @endif
                        </p>
                    </div>
                </div>
                <div id="fff" class="about-image">
                    <img src="{{ asset('assets/frontend/templates/multi-location/images/img.png') }}">
                </div>
                <div class="about-btn">
                    <a href="#" class="text-btn">Learn more</a>
                </div>
            </div>
            @if ($campaign->meta->allow_tip === 1)
                <div class="about-column">
                    <div class="lodim-container">
                        <div class="tip_start">
                            <div class="eng_local">
                                {{-- <h3>Direct Support for Yungerleit</h3>
                            <p>Empower the yungerleit who dedicate themselves to Torah study by
                                providing direct support. Your contribution helps them focus on their vital
                                learning without distraction, allowing them to continue enriching our
                                community with their effort</p> --}}
                                @if (!empty($about['yingerman_content']))
                                    {!! cleanText($about['yingerman_content']) !!}
                                @endif

                            </div>
                            <div class="yi_local d-none">
                                @if (!empty($about['yiddish_yingerman_content']))
                                    {!! cleanText($about['yiddish_yingerman_content']) !!}
                                @endif
                            </div>
                        </div>
                        <div class="d-flex" style="align-items: center;justify-content:center;">
                            <h6 class="heading">
                                Select a Yangerman
                            </h6>
                            <div class="search-div" style="margin-left: auto;margin-top:15px;">
                                <input type="search" id="tipSearch" placeholder="Search">
                                <span class="lnr lnr-magnifier search_icon"></span>
                            </div>

                        </div>
                        <div class="tip_wrapper">
                            <div class="tip_container">
                                @if ($campaign->tips)
                                    @foreach ($campaign->tips as $tip)
                                        <button class="tip_item" data-id="{{ $tip->id }}">
                                            <div class="tip_item-icon">
                                                <div class="tip_item_checkbox">
                                                    <input class="inp-cbx" id="tipCheckbox{{ $tip->id }}"
                                                        type="checkbox" />
                                                    <label class="cbx" for="tipCheckbox{{ $tip->id }}">
                                                        <span>
                                                            <svg width="12px" height="10px">
                                                                <use xlink:href="#check-4"></use>
                                                            </svg>
                                                        </span>
                                                    </label>
                                                    <svg class="inline-svg">
                                                        <symbol id="check-4" viewbox="0 0 12 10">
                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                        </symbol>
                                                    </svg>
                                                </div>
                                                <svg width="22px" class="tip_icon" height="auto"
                                                    style="margin-right:12px;margin-left:6px; padding: 3px 0px;"
                                                    viewBox="0 0 26 27" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 13.1705L1.52835 23.8441C1.52835 23.8441 9.37164 23.0545 12.1398 26.7975V16.9426C12.1398 16.9426 9.08314 11.8839 0 13.1705Z"
                                                        fill="var(--accent-color)" />
                                                    <path
                                                        d="M25.9992 13.1708L24.4709 23.8444C24.4709 23.8444 16.6276 23.0549 13.8594 26.7979V16.9429C13.8594 16.9429 16.9161 11.8839 25.9992 13.1704V13.1708Z"
                                                        fill="var(--accent-color)" />
                                                    <path d="M13.6056 17.2344H12.3945V27.0015H13.6056V17.2344Z"
                                                        fill="var(--accent-color)" />
                                                    <path
                                                        d="M15.259 10.2764C17.0659 9.41476 18.3168 7.55244 18.3168 5.39342C18.3168 2.4146 15.9358 0 12.9989 0C10.0619 0 7.68059 2.4146 7.68059 5.39342C7.68059 7.55393 8.93334 9.41738 10.7421 10.2783C4.4824 10.1415 2.78125 11.5304 2.78125 11.5304C10.5236 11.3548 12.9985 16.1799 12.9985 16.1799C12.9985 16.1799 15.4734 11.3548 23.2157 11.5304C23.2157 11.5304 21.6826 10.112 15.2586 10.2764H15.259Z"
                                                        fill="var(--accent-color)" />
                                                </svg>
                                            </div>
                                            <div class="tip_item-title">{{ $tip->title }}</div>
                                            <div class="tip_amount">$0</div>
                                        </button>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="about_container yi_local text-end d-none">

            @if ($campaign->meta->allow_tip === 1)
                <div class="about-column">
                    <div class="lodim-container">
                        <div class="tip_start yi_direction">
                            {{-- <div class="eng_local "> --}}
                            {{-- <h3>Direct Support for Yungerleit</h3>
                            <p>Empower the yungerleit who dedicate themselves to Torah study by
                                providing direct support. Your contribution helps them focus on their vital
                                learning without distraction, allowing them to continue enriching our
                                community with their effort</p> --}}
                            {{-- @if (!empty($about['yingerman_content']))
                                    {!! cleanText($about['yingerman_content']) !!}
                                @endif

                            </div> --}}
                            <div class="yi_local  text-end">
                                @if (!empty($about['yiddish_yingerman_content']))
                                    {!! cleanText($about['yiddish_yingerman_content']) !!}
                                @endif
                            </div>
                        </div>
                        <div class="d-flex  " style="align-items: center;justify-content:center;">
                            <div class="search-div" style="margin-right: auto;">
                                <span style=" margin: 2px 6px 1px 7px;" class="lnr lnr-magnifier search_icon"></span>
                                <input type="search" id="tipSearch" placeholder="לְחַפֵּשׂ">
                            </div>
                            <h6 class="heading yi_direction">
                                קלייב אויס א יונגערמאן
                            </h6>
                        </div>
                        <div class="tip_wrapper">
                            <div class="tip_container">
                                @if ($campaign->tips)
                                    @foreach ($campaign->tips as $tip)
                                        <button class="tip_item" data-id="{{ $tip->id }}">
                                            <div class="tip_item-icon">
                                                <div class="tip_item_checkbox">
                                                    <input class="inp-cbx" id="tipCheckbox{{ $tip->id }}"
                                                        type="checkbox" />
                                                    <label class="cbx" for="tipCheckbox{{ $tip->id }}">
                                                        <span>
                                                            <svg width="12px" height="10px">
                                                                <use xlink:href="#check-4"></use>
                                                            </svg>
                                                        </span>
                                                    </label>
                                                    <svg class="inline-svg">
                                                        <symbol id="check-4" viewbox="0 0 12 10">
                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                        </symbol>
                                                    </svg>
                                                </div>
                                                <svg width="22px" class="tip_icon" height="auto"
                                                    style="margin-right:12px; padding: 3px 0px;margin-left:8px;"
                                                    viewBox="0 0 26 27" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 13.1705L1.52835 23.8441C1.52835 23.8441 9.37164 23.0545 12.1398 26.7975V16.9426C12.1398 16.9426 9.08314 11.8839 0 13.1705Z"
                                                        fill="var(--accent-color)" />
                                                    <path
                                                        d="M25.9992 13.1708L24.4709 23.8444C24.4709 23.8444 16.6276 23.0549 13.8594 26.7979V16.9429C13.8594 16.9429 16.9161 11.8839 25.9992 13.1704V13.1708Z"
                                                        fill="var(--accent-color)" />
                                                    <path d="M13.6056 17.2344H12.3945V27.0015H13.6056V17.2344Z"
                                                        fill="var(--accent-color)" />
                                                    <path
                                                        d="M15.259 10.2764C17.0659 9.41476 18.3168 7.55244 18.3168 5.39342C18.3168 2.4146 15.9358 0 12.9989 0C10.0619 0 7.68059 2.4146 7.68059 5.39342C7.68059 7.55393 8.93334 9.41738 10.7421 10.2783C4.4824 10.1415 2.78125 11.5304 2.78125 11.5304C10.5236 11.3548 12.9985 16.1799 12.9985 16.1799C12.9985 16.1799 15.4734 11.3548 23.2157 11.5304C23.2157 11.5304 21.6826 10.112 15.2586 10.2764H15.259Z"
                                                        fill="var(--accent-color)" />
                                                </svg>
                                            </div>
                                            <div class="tip_item-title">{{ $tip->title }}</div>
                                            <div class="tip_amount">$0</div>
                                        </button>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="about-column">
                <h2 class="about-title">
                    @if ($about['title'])
                        {{ $about['title'] }}
                    @endif
                </h2>
                <p class="about-description">

                <div class="yi_local yi_direction">
                    @if (!empty($about['yiddish_description']))
                        {!! cleanText($about['yiddish_description']) !!}
                    @endif
                </div>
                </p>
                <div class="about-owner">
                    <div class="owner-column">
                        <strong class="yi_direction">הרב שיא מייזלס שליט"א</strong>
                        <p class="yi_direction"> ראש הכל</p>
                    </div>
                    <div class="owner-column yi_direction">
                        <strong>אנדרו שליט </strong>
                        <p>ראש הכל</p>
                    </div>
                    <div class="owner-column yi_direction">
                        <strong>מִקוּם</strong>
                        <p>
                            @if (!empty($campaign->organization_meta->org_address))
                                {{ $campaign->organization_meta->org_address }}
                            @endif
                        </p>
                    </div>
                </div>
                <div id="fff" class="about-image">
                    <img src="{{ asset('assets/frontend/templates/multi-location/images/img.png') }}">
                </div>
                <div class="about-btn">
                    <a href="#" class="text-btn ms-auto yi_direction">למידע נוסף</a>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
    <!-- ENDS ABOUT SECTION -->

    @if ($campaign->meta->show_recent_donations === 1)
        <!-- STARTS DONORS & TEAMS SECTION -->
        <div class="donors_teams_section">
            <div class="donors_team_header">
                <div class="button_column">
                    {{-- {{ dd($pageTeam) }} --}}
                     @if (isset($pageTeam->slug))
                        <button class="teams_donors_btn @if (isset($pageTeam->slug)) active @endif ">Team {{ $pageTeam->display_name }} Donors ({{ $pageTeam->data['total_donors'] }})</button>
                    @endif
                    <button class="donors_btn @if (!isset($pageTeam->slug)) active @endif ">Donors
                        @if ($countersStatistic[1]['value'] > 0)
                            ({{ $countersStatistic[1]['value'] }})
                        @else
                            (0)
                        @endif

                    </button>
                    @if (count($campaign->teams) > 0)
                        <button class="teams_btn">Teams ({{ count($campaign->teams) }})</button>
                    @endif
                   
                </div>
                <div class="donors_heading">
                    <h3> Donors & Teams</h3>
                </div>

                <div class="donors_sorting_search donation_sorting" @if (isset($pageTeam->slug)) style="display:none;" @endif >
                    <div class="donors_sorting">
                        <select id="filterSelect">
                            <option value="name">Sort By Name</option>
                            <option value="highest">Sort By Highest</option>
                            <option value="latest">Sort By Latest</option>
                            <option value="oldest">Sort By Oldest</option>
                        </select>
                    </div>
                    <div class="sorting_search">
                        <form action="#">
                            <div class="search_icon">
                                <span id="searchButtun" class="lnr donor_search_btn lnr-magnifier "></span>
                                <input type="search" id="searchInput" class="" placeholder="search">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="donors_sorting_search teams_sorting" style="display:none;">
                    <div class="donors_sorting">
                        <select id="teamfilterSelect">
                            <option value="name">Sort By Name</option>
                            <option value="highest">Sort By Highest</option>
                            <option value="latest">Sort By Latest</option>
                            <option value="oldest">Sort By Oldest</option>
                        </select>
                    </div>
                    <div class="sorting_search">
                        <form action="#">
                            <div class="search_icon">
                                <span id="" class="lnr donor_search_btn lnr-magnifier "></span>
                                <input type="search" id="teamsearchInput" class=""
                                    placeholder="search">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="donors_sorting_search teams_donors_sorting" @if (!isset($pageTeam->slug)) style="display:none;" @endif>
                    <div class="donors_sorting">
                        <select id="teamDonorsfilterSelect">
                            <option value="name">Sort By Name</option>
                            <option value="highest">Sort By Highest</option>
                            <option value="latest">Sort By Latest</option>
                            <option value="oldest">Sort By Oldest</option>
                        </select>
                    </div>
                    <div class="sorting_search">
                        <form action="#">
                            <div class="search_icon">
                                <span id="" class="lnr donor_search_btn lnr-magnifier "></span>
                                <input type="search" id="teamsDonorsearchInput" class=""
                                    placeholder="search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="DonationMainContainer" @if (isset($pageTeam->slug)) style="display:none;" @endif  >
                <div class="donations_container">
                    @if ($donationData)
                        @foreach ($donationData as $donation)
                            <div class="donation_item">
                                <div class="donation_item-head">
                                    <div class="donor_name">
                                        @if ($donation['is_anonymous'])
                                            Anonymous
                                        @elseif (!empty($donation['name']))
                                            {{ $donation['name'] }}
                                        @endif

                                    </div>
                                    <div class="donated_amount">
                                        @if ($donation['amount'])
                                            {{ '$' . formatNumber($donation['amount']) }}
                                        @endif
                                    </div>
                                </div>
                                @if ($donation['teamName'])
                                    <div class="donation_item_team">
                                        <a class="team_a_tag"
                                            href="{{ route('raffle', ['campaign' => $campaign->slug, 'team' => $donation['team_slug'] ?? null]) }}">
                                            <span class="lnr lnr-users"></span>
                                            <div class="donation_item-team-name">
                                                {{ $donation['teamName'] }}
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                @if ($donation['comment'])
                                    <div class="donation_item_comment">
                                        <span class="lnr lnr-bubble"></span>
                                        <div class="donation_item-comment_txt">
                                            <div class="donation_tooltip">{{ substr($donation['comment'], 0, 10) }}...
                                                <span class="donation_tooltiptext">{{ $donation['comment'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="donation_item-time">
                                    <span class="lnr lnr-history"></span>
                                    <p>
                                        @if ($donation['time'])
                                            {{ formattedDate($donation['time']) }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- DONATION LOAD MORE -->
                <div class="donation_load_more">
                    <button type="button" class="load_more">Load More</button>
                </div>
            </div>
            <div id="TeamsMainContainer" style="display: none" >
                <div  class="teams_container">
                    @if (count($CampaignTeamsData) > 0)
                        @foreach ($CampaignTeamsData as $team)
                            <div class="team_item @if ($team['slug'] == Request::segment(3)) selected @endif">
                                <div class="selected_team ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849"
                                        viewBox="0 0 17.87 12.849">
                                        <g id="Group_2" data-name="Group 2"
                                            transform="translate(-436.858 -1650.344)">
                                            <rect id="Rectangle_31" data-name="Rectangle 31" width="10"
                                                height="3" rx="1.5"
                                                transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                            <rect id="Rectangle_32" data-name="Rectangle 32" width="15"
                                                height="3" rx="1.5"
                                                transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                        </g>
                                    </svg>
                                </div>
                                <div class="team_">
                                    <div class="team_item-head">
                                        <div class="team_name">
                                            {{ $team['display_name'] ?? '' }}
                                        </div>
                                        <div class="team_goal">
                                            ${{ $team['total_donated'] }}
                                        </div>
                                    </div>
                                    <div class="team_item-progress">
                                        <div class="teams-donors">{{ $team['total_donors'] }} donors</div>
                                        <div class="team-goal-raised">of {{ $team['currency'] . $team['goal'] }}
                                            raised
                                        </div>
                                    </div>
                                    <div class="team-item-progress-bar">
                                        <div class="completed" style="width:{{ $team['percentage'] }}%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="team-action ">
                                    <div class="team-card__btns">
                                 @if (!isset($pageTeam->slug))
                                        <button type="button" class="btn overlay select-team "
                                            data-id="{{ $team['id'] }}">Select Team</button>
                                            @endif
                                        <a href="/campaign/{{ $campaign->slug }}/{{ $team['slug'] }}">
                                            <button type="button" class="btn overlay donate-btn">Visit Team</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- TEAMS LOAD MORE -->
                <div class="teams_load_more"  >
                    <button type="button" class="team_load_more">Load More</button>
                </div>
            </div>
            <div id="TeamsDonorsContainer"  @if (!isset($pageTeam->slug)) style="display:none;" @endif>
                <div  class="teams_donors_container">
                    @if ($AllteamsDonors)
                        @foreach ($AllteamsDonors as $donation)
                            <div class="donation_item">
                                <div class="donation_item-head">
                                    <div class="donor_name">
                                        @if ($donation['is_anonymous'])
                                            Anonymous
                                        @elseif (!empty($donation['name']))
                                            {{ $donation['name'] }}
                                        @endif

                                    </div>
                                    <div class="donated_amount">
                                        @if ($donation['amount'])
                                            {{ '$' . formatNumber($donation['amount']) }}
                                        @endif
                                    </div>
                                </div>
                                @if ($donation['teamName'])
                                    <div class="donation_item_team">
                                        <a class="team_a_tag"
                                            href="{{ route('raffle', ['campaign' => $campaign->slug, 'team' => $donation['team_slug'] ?? null]) }}">
                                            <span class="lnr lnr-users"></span>
                                            <div class="donation_item-team-name">
                                                {{ $donation['teamName'] }}
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                @if ($donation['comment'])
                                    <div class="donation_item_comment">
                                        <span class="lnr lnr-bubble"></span>
                                        <div class="donation_item-comment_txt">
                                            <div class="donation_tooltip">{{ substr($donation['comment'], 0, 10) }}...
                                                <span class="donation_tooltiptext">{{ $donation['comment'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="donation_item-time">
                                    <span class="lnr lnr-history"></span>
                                    <p>
                                        @if ($donation['time'])
                                            {{ formattedDate($donation['time']) }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- TEAMS DONORS LOAD MORE -->
                <div class="teams_donors_load_more">
                    <button type="button" class="team_donors_load_more">Load More</button>
                </div>
            </div>







        </div>
        <!-- ENDS DONORS & TEAMS SECTION -->
    @endif



    <div class="compaigns">

        <h1 class="head_title">Toggle Upcoming <br> and Previous campaigns </h1>

        <div id="tabs-nav-wrap">
            <ul id="tabs-nav">
                <li class="tab-nav-link" data-target="#tab-one">Upcoming Campaigns</li>
                <li class="tab-nav-link" data-target="#tab-two">Previous Campaigns</li>
            </ul>
            <hr style="margin-top:0 !important;background:var(--accent-color);opacity:1;">
            <div style="clear:both;"></div>
        </div>
        <!-- ends tabs-nav-wrap -->
        <div class="tabs-main-content">
            <div id="tab-one" class="tab-content_cmampaign">
                <!-- Begins tab-one -->
                <div class="tab-inner">
                    <div class="campaign_wrapper">
                        <div class="campaign_container">
                            @if (!empty($upcomingCampaigns))
                                @foreach ($upcomingCampaigns as $camp)
                                    <div class="campaign-item">
                                        <div class="campaign_content">
                                            <div class="campaign_tite">
                                                <svg width="40" height="46" viewBox="0 0 40 46"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.1859 0L39.6719 6.28646V43.8075L14.2093 46L0.326958 43.6409V5.62134L14.1859 0ZM16.9136 42.3831L25.2317 41.6667V34.5307L30.1809 34.4699V41.2405L36.3 40.7135V8.9275L16.9136 4.14566V42.3831Z"
                                                        fill="#7E7E7E" />
                                                    <path
                                                        d="M18.6273 6.91211L22.6445 7.75547V12.4845L18.6273 11.7918V6.91211Z"
                                                        fill="#7E7E7E" />
                                                    <path
                                                        d="M32.3452 10.0664L35.1445 10.6584V14.8088L32.3452 14.3282V10.0664Z"
                                                        fill="#7E7E7E" />
                                                    <path
                                                        d="M25.9278 8.61914L29.4844 9.36377V13.7479L25.9278 13.1347V8.61914Z"
                                                        fill="#7E7E7E" />
                                                    <path
                                                        d="M32.345 18.2539L35.1445 18.637V22.7944L32.345 22.5159V18.2539Z"
                                                        fill="#7E7E7E" />
                                                    <path
                                                        d="M25.9278 17.3203L29.4844 17.8021V22.1862L25.9278 21.8359V17.3203Z"
                                                        fill="#7E7E7E" />
                                                    <path
                                                        d="M18.6273 16.2656L22.6445 16.8098V21.465L18.6273 21.0692V16.2656Z"
                                                        fill="#7E7E7E" />
                                                    <path
                                                        d="M18.6273 25.707L22.6445 25.9545V30.6095L18.6273 30.5105V25.707Z"
                                                        fill="#7E7E7E" />
                                                    <path
                                                        d="M25.9278 26.1875L29.4844 26.4065V30.7907L25.9278 30.7031V26.1875Z"
                                                        fill="#7E7E7E" />
                                                    <path
                                                        d="M32.3452 26.6113L35.1445 26.7854V30.9428L32.3452 30.8732V26.6113Z"
                                                        fill="#7E7E7E" />
                                                </svg>
                                                {{ $camp->camp_title }}
                                            </div>
                                            <div class="campaign_details">
                                                <div class="campaign_details-dtl">
                                                    <span>Winner Adam Sandler</span>
                                                    <div class="camp_location">
                                                        <img src="{{ asset('assets/frontend/templates/multi-location/images/location.svg') }}"
                                                            alt="icon">
                                                        <p style="padding-left: 10px">
                                                            {{-- 50/4 Northwear Road, NY --}}
                                                            @if (!empty($camp->organization_meta->org_address))
                                                                {{ $camp->organization_meta->org_address }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="campaign_details-datetime">
                                                    <div style="display: flex">
                                                        <span>Date Start: </span>
                                                        <p>
                                                            {{ date('d/m/Y', strtotime($camp->created_at)) }}
                                                        </p>
                                                    </div>
                                                    <div style="display: flex">
                                                        <span>Drawing Date:</span>
                                                        <p>
                                                            {{ date('d/m/Y', strtotime($camp->meta->end_date)) ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="campaign_action">
                                                <a href="/campaign/{{ $camp->slug }}" target="_blank"
                                                    class="main_btn campaign_btn">Donate
                                                    Now</a>
                                            </div>
                                        </div>
                                        <div class="campaign_brand">
                                            <div class="campaign_brand-content">
                                                <div class="campaign_brand-img">
                                                    <img src="{{ asset($camp->media->logo_url) }}" alt=""
                                                        srcset="">
                                                </div>
                                                <p style="font-size: 14px;font-weight:500;text-align:center;">
                                                    {{-- {{ $camp->media-> }} this is text --}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-two" class="tab-content_cmampaign">
                <!-- Begins tab-two -->
                <div class="tab-inner">
                    <div class="campaign_wrapper">
                        <div class="campaign_container">
                            @if (!empty($previousCampaigns))
                                @foreach ($previousCampaigns as $camp)
                                    <div class="campaign-item">
                                        <div class="campaign_content">
                                            <div class="campaign_tite">- {{ $camp->camp_title }}</div>
                                            <div class="campaign_details">
                                                <div class="campaign_details-dtl">
                                                    <span>Winner Adam Sandler</span>
                                                    <div class="camp_location">
                                                        <img src="{{ asset('assets/frontend/templates/multi-location/images/location.svg') }}"
                                                            alt="icon">
                                                        <p style="padding-left: 10px">
                                                            50/4 Northwear Road, NY
                                                            {{-- @if (!empty($campaign->organization_meta->org_address))
                                                    {{ $campaign->organization_meta->org_address ?? 'no location' }}
                                                    @endif --}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="campaign_details-datetime">
                                                    <div style="display: flex">
                                                        <span>Date Start: </span>
                                                        <p>
                                                            {{ date('d/m/Y', strtotime($camp->created_at)) }}
                                                        </p>
                                                    </div>
                                                    <div style="display: flex">
                                                        <span>Drawing Date:</span>
                                                        <p>
                                                            {{ date('d/m/Y', strtotime($camp->meta->end_date)) ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="campaign_action">
                                                <a href="/campaign/{{ $camp->slug }}" target="_blank"
                                                    class="main_btn campaign_btn">Donate
                                                    Now</a>
                                            </div>
                                        </div>
                                        <div class="campaign_brand">
                                            <div class="campaign_brand-content">
                                                <div class="campaign_brand-img">
                                                    <img src="{{ asset($camp->media->logo_url) }}" alt=""
                                                        srcset="">
                                                </div>
                                                <p style="font-size: 14px;font-weight:500;text-align:center;"> Toyota
                                                    Rav 4, Model-2024</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>

    <div class="about_cchf">
        <div class="cchf_left_row">
            @if (!empty($about['additionalContent']))
                {!! cleanText($about['additionalContent']) !!}
            @endif
        </div>
        <div class="cchf_right_row">
            <img src="{{ asset('assets/frontend/templates/multi-location/images/about.png') }}" alt="">
        </div>
    </div>
    <div class="swiper-Sponsors-wrapper">
        <h1 class="head_title">Our Valuable Sponsors</h1>
        <div class="swiper swiper-Sponsors ">
            <div class="swiper-wrapper">
                @if (!empty($sponsers) && $sponsers->count())
                    @foreach ($sponsers as $sponser)
                        <div class="swiper-slide">
                            <img src="{{ asset($sponser->image) }}" alt="Sponser Image">
                        </div>
                    @endforeach
                @else
                    <p>No sponsors available at the moment.</p>
                @endif
            </div>
        </div>
    </div>
</main>
<input type="hidden" id="url_team_id" value="@if(isset($pageTeam->id)){{$pageTeam->id}}@endif" >
<!-- body section end  -->
@include('frontend.templates.multi-location-template.tips_all_items_modal')
@include('frontend.templates.multi-location-template.tips_popup')
@include('frontend.templates.multi-location-template.includes.footer')

@section('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '.select-team', function() {
                const $this = $(this);
                const teamID = $this.data('id');
                const teamName = $this.closest('.team_item').find('.team_name').text().trim();
                const isClearAction = $this.text() === 'Clear Selection';

                if (isClearAction) {
                    $this.text('Select');
                    $this.closest('.team_item').removeClass('selected');
                    $('#teamId').val('');
                    $('.cart__team').html('')
                    return;
                }


                $('.team_item').removeClass('selected');
                $this.closest('.team_item').addClass('selected');
                $('.select-team').text('Select');
                $this.text('Clear Selection');
                $('#teamId').val(teamID);
                $('.cart__team').html('<b>Team: ' + teamName + ' </b>');
            });

            $(".TipsPopupClose").on("click", function() {
                $("#AllTipsItemModal").hide();
            });
            $('#donateNow').on('click', function() {
                $('#AllTipsItemModal').show();
            })

        });
    </script>
    <script>
        $(document).ready(function() {
            $('.yiddishBtn').on('click', function() {
                $('.language_btn').removeClass('active');
                $(this).addClass('active');
                $('.eng_local').addClass('d-none');
                $('.yi_local').removeClass('d-none');
            })
            $('.englishBtn').on('click', function() {
                $('.language_btn').removeClass('active');
                $(this).addClass('active');
                $('.eng_local').removeClass('d-none');
                $('.yi_local').addClass('d-none');
            })
        })
        $(document).ready(function() {
            function toggleScrollbar() {
                const tipWrapper = $('.tip_wrapper');
                if (tipWrapper[0].scrollHeight > tipWrapper.outerHeight()) {
                    tipWrapper.css('overflow-y', 'auto');
                } else {
                    tipWrapper.css('overflow-y', 'hidden');
                }
            }
            toggleScrollbar();
            $(window).on('resize', function() {
                toggleScrollbar();
            });
        });
    </script>
@endsection
<script type="module" src="{{ asset('assets/frontend/templates/raffle/js/main.js') }}?v={{ time() }}"></script>
