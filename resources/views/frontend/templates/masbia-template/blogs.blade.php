@section('title', 'Masbia')
@include('frontend.templates.masbia-template.includes.header')

    <main class="main-sponsorship">
        <section class="hero-blogs">
            <div class="hero-blogs__img">
                <img src="{{ asset('assets/frontend/templates/masbia/images/food-banner.jpg') }}" alt="">
            </div>
            <div class="container">
                <div class="hero-blogs__inner">
                    <h1><strong>Blogs</strong></h1>
                    <p>Insights, Updates, and Stories from Masbia’s Community and Mission</p>
                </div>
            </div>
        </section>

        <section class="blog-main">
            <div class="container">

                <div class="blog-list">
                </div>
                <div class="btn_container">
                    <a href="javascript:void(0)" data-offset="0" id="loadMoreBlogs" class="btn btn--green"><strong>LOAD more</strong></a>
                </div>
            </div>
        </section>
    </main>

@section('scripts')

    <script>

        $('body').on('click','#loadMoreBlogs',function() {

            var $button = $(this);
            var offset = $button.data('offset'); // Get the current offset value
            var perPage = 1; // You can change this value to match your API's default

            // Disable the button while the request is being made to prevent multiple clicks
            $button.prop('disabled', true);
            $button.text('Loading...');

            $.ajax({
                url: "{{ route('blogs.get-blogs') }}",  // Update with your route
                method: 'GET',
                data: {
                    offset: offset,
                    per_page: perPage
                },
                success: function(response) {
                    // Append the new blogs to the list
                    $('.blog-list').append(response.blogs);

                    // If there are no more blogs, hide the "View More" button
                    if (!response.hasMore) {
                        $button.hide();
                    } else {
                        // Update the offset and enable the button for the next request
                        $button.data('offset', offset + perPage);
                        $button.prop('disabled', false);
                        $button.text('View More');
                    }
                },
                error: function() {
                    // Handle errors (if any)
                    alert('An error occurred. Please try again.');
                    $button.prop('disabled', false);
                    $button.text('View More');
                }
            });
        })

        $('#loadMoreBlogs').trigger('click')
    </script>

@endsection


@include('frontend.templates.masbia-template.includes.footer')