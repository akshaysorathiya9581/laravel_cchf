<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title') - {{ config('app.name', 'CCHF') }}
    </title>

    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/raffle/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/style.css') }}" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/fontawesome-free-6.5.2-web/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/HeroSection.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/global.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/Achievement.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/Featured.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/AboutMasbia.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/getInvolved.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/RecentCompaign.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/Media.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/Events.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/OurBlog.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/Incredible.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/general/Css/Footer.css') }}" />





    <style>
        body.page-template-default .default-page,
        body.page-template-page-shabbos .default-page {
            max-width: 1024px;
            padding: 3rem;
        }

    </style>

</head>
<body>
    <div class="main-container">
        <!-- header start  -->
        <div class="header-container">
            <div class="header-sub-container">
                <div class="offcanvas-container">
                    <div class="offcanvas-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop">
                        <img src="{{ asset('assets/frontend/templates/general/Assets/header/header-icons/offcanvas-icon.svg') }}" alt="" />
                    </div>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="header-btns-container">
                                <button class="header-btn donate-btn">
                                    <img src="{{ asset('assets/frontend/templates/general/Assets/header/header-btn-icon2.svg') }}" alt="" />Donate
                                </button>
                                <button class="header-btn">
                                    <img src="{{ asset('assets/frontend/templates/general/Assets/header/header-btn-icon.svg') }}" alt="" />
                                    Volunteer
                                </button>
                                <button class="header-btn">
                                    <img src="{{ asset('assets/frontend/templates/general/Assets/header/header-btn-icon3.svg') }}" alt="" />
                                    Store
                                </button>
                            </div>
                            <div class="offcanvas-links-wrap">
                                <a href="#about-masbia" class="header-link about-link">About Masbia</a>
                                <a href="#getInvolved" class="header-link">Get Involved</a>
                                <a href="#blog" class="header-link">Get Food</a>
                                <a href="#compaigns" class="header-link">Events And Campaigns</a>
                                <a href="#media" class="header-link">Media</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-responsive-container">
                    <div class="offcanvas-btn" onclick="displayMenu()">
                        <img src="{{ asset('assets/frontend/templates/general/Assets/header/header-icons/offcanvas-icon.svg') }}" alt="" />
                    </div>
                    <div class="offcanvas-menu hidden">
                        <div class="menu-close-icon" onclick="hideMenu()">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                        <div class="header-links-container">
                            <a href="#about-masbia" class="header-link about-link">About Masbia</a>
                            <a href="#getInvolved" class="header-link">Get Involved</a>
                            <a href="#blog" class="header-link">Get Food</a>
                            <a href="#compaigns" class="header-link">Events And Campaigns</a>
                            <a href="#media" class="header-link media-link">Media</a>
                        </div>
                    </div>
                </div>
                <div class="header-links-container">
                    <a href="#about-masbia" class="header-link about-link">About Masbia</a>
                    <a href="#getInvolved" class="header-link">Get Involved</a>
                    <a href="#blog" class="header-link">Get Food</a>
                    <a href="#compaigns" class="header-link">Events And Campaigns</a>
                    <a href="#media" class="header-link">Media</a>
                </div>
                <div class="header-logo-wrap">
                    <img src="{{ asset('assets/frontend/templates/general/Assets/header/headerLogo/header-logo.svg') }}" alt="" />
                </div>
                <div class="btn-icon-container">
                    <div class="header-btns-container">
                        <button class="header-btn donate-btn">
                            <img src="{{ asset('assets/frontend/templates/general/Assets/header/header-btn-icon2.svg') }}" alt="" />Donate
                        </button>
                        <button class="header-btn">
                            <img src="{{ asset('assets/frontend/templates/general/Assets/header/header-btn-icon.svg') }}" alt="" />
                            Volunteer
                        </button>
                        <button class="header-btn">
                            <img src="{{ asset('assets/frontend/templates/general/Assets/header/header-btn-icon3.svg') }}" alt="" /> Store
                        </button>
                    </div>
                    <div class="user-and-search-wrap">
                        <div class="search-wrap icon-wrap">
                            <img src="{{ asset('assets/frontend/templates/general/Assets/header/header-icons/header-search-icon2.svg') }}" alt="" />
                        </div>
                        <div class="user-wrap icon-wrap">
                            <img src="{{ asset('assets/frontend/templates/general/Assets/header/header-icons/header-user-icon.svg') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-btn-responsive">
                <div class="header-btns-container">
                    <button class="header-btn donate-btn">
                        <img src="{{ asset('assets/frontend/templates/general/Assets/header/header-btn-icon2.svg') }}" alt="" />Donate
                    </button>
                    <button class="header-btn">
                        <img src="{{ asset('assets/frontend/templates/general/Assets/header/header-btn-icon.svg') }}" alt="" /> Volunteer
                    </button>
                    <button class="header-btn">
                        <img src="{{ asset('assets/frontend/templates/general/Assets/header/header-btn-icon3.svg') }}" alt="" /> Store
                    </button>
                </div>
            </div>
        </div>
        <!-- header end  -->
