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
            --accent-color: #0089ff;
            --secondary-color: #333;
        }

    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/templates/raffle/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/raffle/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/raffle/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/raffle/css/hint-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/event/css/masbiaStyle.css') }}?v={{time()}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/event/css/eventStyle.css') }}?v={{time()}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.css') }}?v={{time()}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/templates/raffle/css/style.css') }}">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/odometer-theme-default.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/templates/event/assets/css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div class="overlay-loader" id="overlayloader" style="display: none;"></div>
    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
        <!-- end preloader -->

