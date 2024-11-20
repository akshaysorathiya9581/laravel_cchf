
<title> {{ $og_title ?? 'masbia donation' }} - {{ config('app.name', 'Masbia') }} </title>

<meta property="og:title" content="{{ $og_title ?? 'Masbia' }}">
<meta property="og:description" content="{{ $og_description ?? 'Masbia' }}">
<meta property="og:image" content="{{ $og_image ?? '' }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}" />
