<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>
        @yield('title') - {{ config('app.name', 'CCHF') }}
    </title>
    <style>
        :root {
            --accent-color: #0089ff;
            --secondary-color: #333;
        }
    </style>

    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/hint-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <style>
        .promo__images,
        .promo,
        .promo__images img {
            background-image: url({{ asset('assets/frontend/images/banner.png')
        }
        });
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

            /* .promo__title, .promo__subtitle, .promo__content .align-items-center {
          text-align: center;
            justify-content: center;
      } */
        }
    </style>
</head>

<body class="header-fixed">
    <!-- add class "header-fixed" for floating header or remove for static header -->

    <!-- @include('frontend.includes.header') -->
    <!-- @yield('main_content') -->
    <!-- @include('frontend.includes.footer') -->

    <script src="{{ asset('assets/frontend/js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/swiper-bundle.min.js') }}" type="module"></script>
    <!-- <script src="{{ asset('assets/frontend/js/main.js') }}" type="module"></script> -->
    <script src="{{ asset('assets/frontend/js/ua-parser.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/hint-css.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.3"></script>

</body>

</html>