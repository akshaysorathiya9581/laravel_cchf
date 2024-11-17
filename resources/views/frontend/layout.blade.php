{{-- <?= $campaign->template; die(); ?> --}}
@if ($campaign->template == 'raffle')
    @include('frontend.templates.raffle-template.home')
@elseif ($campaign->template == 'general')
    @include('frontend.templates.general-template.home')
@elseif ($campaign->template == 'event')
    @include('frontend.templates.event-template.home')
@elseif ($campaign->template == 'multi_location')
    @include('frontend.templates.multi-location-template.home')
@elseif ($campaign->template == 'masbia')
    @include('frontend.templates.masbia-template.index')
@endif

{{-- <link rel="stylesheet" href="{{ asset('assets/frontend/templates/raffle/css/general-style.css') }}"> --}}
{{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
@include('frontend.checkout')

@include('frontend.add-team')

<link rel="stylesheet" href="{{ asset('assets/css/common.css') }}?v={{ time() }}">
@include('frontend.js-data')


@yield('scripts')
