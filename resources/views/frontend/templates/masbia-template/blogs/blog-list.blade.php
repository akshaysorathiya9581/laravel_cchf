
@foreach ($blogs as $blog)

	<div class="blog-main__content">
		<div class="img-content">
			<iframe src="{{ $blog->video_link }}" allowfullscreen></iframe>
		</div>
		<div class="text-content">
			<h2 class="title">{{ $blog->title }}</h2>
			<p class="text">
				{!! Str::words(strip_tags($blog->description), 10) !!}
			</p>
			<span class="authDes">
				<time datetime="" class="date">
					{{ \Carbon\Carbon::parse($blog->created_at)->format('F j, Y') }}
				</time>
				<span class="author">By {{ $blog->author }}</span>
			</span>
			<a href="{{ route('blogs.view',$blog->slug) }}" class="btn btn--green">read more</a>
		</div>
	</div>
@endforeach