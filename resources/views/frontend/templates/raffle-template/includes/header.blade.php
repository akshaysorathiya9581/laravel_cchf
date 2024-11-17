<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>
        @yield('title') - {{ config('app.name', 'CCHF') }}
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --secondary-color: #333;
            --accent-color: {{ $campaign->theme_color }} !important;
            /* --accent-color: #0089ff; */
        }
        .btn{
            background-color: var(--accent-color) !important;
        }

    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/raffle/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/raffle/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/raffle/css/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/raffle/css/hint-css.css') }}">
    <script src="{{ asset('assets/frontend/js/common.js') }}?v={{ time() }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/raffle/css/style.css') }}?v={{time()}}">
    <style>
        .promo__images,
        .promo,
        .promo__images img {
            background-image: url({{ asset('assets/frontend/images/banner.png')
        }
        }

        );
        }

        @media only screen and (max-width: 480px) {
            .option-card__body .d-flex:nth-child(2) {
                flex-direction: column;
            }
            .ticket-container {
                padding: 50px 10px 40px;
            }
            .option-card__amount {
                margin-bottom: 3px;
            }
            .option-card__body {
                padding: 10px;
            }

            .option-card__plus {
                font-size: 30px;
            }

            .ticket-options__heading {
                height: auto;
                grid-template-columns: auto;
            }

            .about__statistics-list dl {
                width: 100%;
                justify-content: center;
            }
        }
        .header__menu li:last-child a,
        .header__menu li:nth-last-child(2) a {
            height: 42px;
            background-color: #f2f2f2 !important;
            border-radius: 25px !important;
            white-space: nowrap !important;
            padding: 11px 30px !important;
        }
        #addTeam input {
            width: 94%;
            margin: auto;
            font-size: 17px;
            font-weight: 600;
            color: var(--secondary-color);
            background-color: #fafafa;
            border: 2px solid;
            border-color: #ccc;
            border-radius: calc(infinity* 1px);
            outline: 0;
            padding: 12px 30px;
            margin-top: 20px !important;
        }
        #addTeam input:focus{
            box-shadow: none;
            outline: none;
        }
        iframe{
            background: transparent !important;
        }
    </style>
</head>

<body class="header-fixed">

    <header class="header">
        <a href="/" class="logo">
            <span class="overlay">
            </span>
            <span class="logo-content"><b>CCHF</b> test</span>
        </a>

        <input id="menu-toggle" type="checkbox" class="hidden">
        <label class="menu-button-container overlay" for="menu-toggle">
            <div class="menu-button"></div>
        </label>

        <nav class="menu">
            <ul class="header__menu main-menu">
                <li>
                    <a href="#team" data-bs-toggle="modal" id="createTeamModal" data-bs-target="#addTeam">Create Team</a>
                </li>
                <li>
                    <a href="#ticketsSection">Donate Now</a>
                </li>
            </ul>
        </nav>
    </header>
