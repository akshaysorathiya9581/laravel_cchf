@section('title', 'Masbia')
@include('frontend.templates.masbia-template.includes.header')

<main class="main-sponsorship">

    <div class="topLineBreak"></div>

    <section class="blog-single">
        <div class="container">
            <article class="blog-single__content">
                <h1 class="title">{{ $blog->title }}</h1>
                @if($blog->author)
                    <p class="byName"><i>By {{ $blog->author }}</i></p>
                @endif

                @if($blog->video_link)
                    <iframe class="mt-4 mb-4" style="width: 100%; height: 350px" src="{{ $blog->video_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif

				{!! $blog->description !!}
            </article>
        </div>
    </section>
</main>

@include('frontend.templates.masbia-template.includes.footer')
