<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
	content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<x-open-graph-meta :campaign="($campaign ?? '')" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  {{-- New Font --}}
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/frontend/templates/masbia/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/frontend/templates/masbia/css/style.bundle.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/frontend/templates/masbia/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery.toast.css') }}">
  <script src="{{ asset('assets/frontend/templates/general/Js/jquery.js') }}" type="text/javascript"></script>
</head>

<body class="m-body">
  <header class="header">
	<button class="hamburger-menu" id="hamburgerMenu">
	  <img src="{{ asset('assets/frontend/templates/masbia/images/icons/hamburger-menu.svg') }}" alt="">
	</button>

	<div class="side-menu" id="sideMenu">
		<button class="close-btn" id="closeBtn">&times;</button>
		<ul class="header__menu">
			@foreach ($mainMenu as $m_key => $m_value)
			  <li><a href="{{ $m_value['link'] }}">{{ $m_value['text'] }}</a></li>
			@endforeach
		</ul>
	</div>

	<a href="/" class="logo">
	  <img src="{{ asset('assets/frontend/templates/masbia/images/logo.png') }}" alt="Masbia">
	</a>

	<div class="header-btns">
	  <a href="#" class="btn btn--green">
		<img src="{{ asset('assets/frontend/templates/masbia/images/icons/donate.svg') }}" alt="">
		<span>Donate</span>
	  </a>
	  <a href="#" class="btn">
		<img src="{{ asset('assets/frontend/templates/masbia/images/icons/volunteer.svg') }}" alt="">
		<span>Volunteer</span>
	  </a>
	  <a href="#" class="btn">
		<img src="{{ asset('assets/frontend/templates/masbia/images/icons/store.svg') }}" alt="">
		<span>Store</span>
	  </a>
	</div>

	<div class="header-btn-icons">
	  <button type="button" class="btn-icon">
		<img src="{{ asset('assets/frontend/templates/masbia/images/icons/search.svg') }}" alt="image">
	  </button>

	  {{-- Old --}}
	  {{-- <a href="{{ Auth::guard('web')->check() ? route('profile.edit') : route('login') }}" class="btn-icon">
		<img src="{{ asset('assets/frontend/templates/masbia/images/icons/person.svg') }}" alt="image">
	  </a> --}}


      @if (Auth::guard('web')->check())
        <a href="{{ route('profile.edit') }}" class="btn-icon">
          <img src="{{ asset('assets/frontend/templates/masbia/images/icons/person.svg') }}" alt="image">
        </a>
      @else
        <a href="javascript:;" class="btn-icon openModalBtn" data-modal="LoginModal">
          <img src="{{ asset('assets/frontend/templates/masbia/images/icons/person.svg') }}" alt="image">
        </a>
      @endif
     
    </div>
  </header>

@include('frontend.templates.masbia-template.auth-modal')