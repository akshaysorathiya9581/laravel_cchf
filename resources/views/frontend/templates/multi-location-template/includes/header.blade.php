<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets/frontend/templates/general/Css/fontawesome-free-6.5.2-web/css/all.min.css') }}" />
    <title> {{ $campaign->camp_title }}</title>

    @php
        $protocol =
            (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443
                ? 'https://'
                : 'http://';
        $ip = $_SERVER['REMOTE_ADDR'];
        $pageLink = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $pageLinkNoProtocol = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    @endphp




    <!-- HTML Meta Tags -->
    <meta name="description" content="{{ $campaign->openGraph->og_description ?? '' }} ">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ $pageLink }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $campaign->openGraph->og_title ?? '' }}">
    <meta property="og:description" content="{{ $campaign->openGraph->og_description ?? '' }}">
    @if (!empty($campaign->openGraph->og_image))
        <meta property="og:image" content="{{ $campaign->openGraph->og_image }}">
    @endif

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ $pageLinkNoProtocol }}">
    <meta property="twitter:url" content="{{ $pageLink }}">
    <meta name="twitter:title" content="{{ $campaign->openGraph->og_title ?? '' }}">
    <meta name="twitter:description" content="{{ $campaign->openGraph->og_description ?? '' }}">
    @if (!empty($campaign->openGraph->og_image))
        <meta name="twitter:image" content="{{ $campaign->openGraph->og_image ?? '' }}">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/raffle/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?fam ily=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/multi-location/fonts/fonts.css') }}">
    <link rel="stylesheet" href="https://webaryco.com/override-styles/satmerkolel.css">
    <link rel="stylesheet"
        href="{{ asset('assets/frontend/templates/multi-location/css/style.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/frontend/js/common.js') }}?v={{ time() }}"></script>

    <style>
        .fa-classic,
        .fa-regular,
        .fa-solid,
        .far,
        .fas {
            font-family: "Font Awesome 6 Free" !important;
        }

        .fa-brands,
        .fab {
            font-family: "Font Awesome 6 Brands" !important;
        }

        :root {
            --accent-color: {{ $campaign->theme_color }}
                /* --white-color:#fff; */
        }

        .language_btn:nth-child(1) {
            background-color: var(--gray-color) !important;
            color: var(--accent-color) !important;
        }

        .language_btn.active {
            background-color: var(--accent-color) !important;
            color: #fff !important;
        }

        .yi_direction {
            direction: rtl;
        }
    </style>

</head>

<body>
    {{-- {{dd($campaign->meta)}} --}}
    <header id="navbar">
        <div class="main__header">
            <div class="header_logo header_left">
                <div class="logo_box logo">

                </div>
            </div>
            <div class="header_nav header_ ">
                <nav>
                    <ul class="main-menu">

                    </ul>
                </nav>
            </div>
            <div class="header_action header_">
                <ul>
                    <li>
                        <a href="#" class="phone_btn">
                            <span class="lnr lnr-phone-handset"></span>
                            718.563.2546
                        </a>
                    </li>
                    <li><a href="#" class="main_btn round_btn">Donate</a></li>
                </ul>
            </div>
            <div class="header_humberger">
                <span class="lnr lnr-menu"></span>
            </div>
        </div>
    </header>
