
@foreach ($blogs as $blog)

	<div class="blog-main__content">
		<div class="img-content">
			@if(trim($blog->image) !== '')
				<img src="{{ asset($blog->image) }}" alt="Blog Image" style="max-width: 100%; height: auto;" />
			@elseif($blog->video_link)
				<iframe src="{{ $blog->video_link }}" width="560" height="315" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			@endif

		</div>
		<div class="text-content">
			<h2 class="title">{{ $blog->title }}</h2>
			<p class="text">
				{!! Str::words(strip_tags($blog->description), 10) !!}
			</p>
			<span class="authDes">
				<time datetime="" class="date">
					{{ \Carbon\Carbon::parse($blog->publish_date)->format('F j, Y') }}
				</time>
				@if(trim($blog->author) !== '')
					<span class="author">By {{ $blog->author }}</span>
				@endif
			</span>
			<a href="{{ route('blogs.view',$blog->id) }}" class="btn btn--green">read more</a>
		</div>
	</div>
@endforeach