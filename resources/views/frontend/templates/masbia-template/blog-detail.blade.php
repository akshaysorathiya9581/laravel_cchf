@section('title', 'Masbia')
@include('frontend.templates.masbia-template.includes.header')

<main class="main-sponsorship">

    <div class="topLineBreak"></div>

    <section class="blog-single">
        <div class="container">
            <article class="blog-single__content">
                <h1 class="title">{{ $blog->title }}</h1>
                <p class="byName"><i>By {{ $blog->author }}</i></p>
				{!! $blog->description !!}
            </article>
        </div>
    </section>
</main>

@include('frontend.templates.masbia-template.includes.footer')
