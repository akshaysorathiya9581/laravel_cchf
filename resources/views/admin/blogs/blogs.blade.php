@extends('admin.layout')
@section('title', ' Blogs')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">All Blogs</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Blogs</li>

					</ul>
				</div>
				<div class="d-flex align-items-center gap-2 gap-lg-3">
					<div class="m-0">
						<button type="button" id="manageOg" class="btn btn-sm btn-flex btn-info">Manage OG 1</button>
						<button type="button" data-bs-toggle="modal" data-bs-target="#add_blog_modal" class="btn btn-sm btn-flex btn-info"> <i class="fas fa-user"></i> Add New Blog</button>
					</div>
				</div>
			</div>
		</div>
		<div id="kt_app_contentss" class="app-content flex-column-fluid">
			<div id="kt_app_content_container" class="app-container container-xxl">
				<div class="card card-flush">
					<div class="card-body pt-0">
						<table class="table align-middle table-row-dashed fs-6 gy-5" id="Prizes">
							<thead>
								<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
									<th class="min-w-100px">ID</th>
									<th class="min-w-100px">Publish Date</th>
									<th class="min-w-100px">Title</th>
									<th class="min-w-100px">Author</th>
									<th class="min-w-100px">Action</th>
								</tr>
							</thead>
							<tbody class="fw-semibold text-gray-600 coupons_body">
								@foreach ($blogs as $blog)
								<tr>
									<td>{{ $blog->id }}</td>
									<td>{{ $blog->publish_date }}</td>
									<td>{{ $blog->title }}</td>
									<td>{{ $blog->author }}</td>
									<td class="text-end">
										<a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											Actions
											<i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<div class="menu-item px-3">
												<a href="#" type="button" data-route="{{ route('admin.getSingleBlog') }}" data-id="{{ $blog->id }}" id="update_blog{{$blog->id}}" class="loadBlogModal menu-link px-3">
													Edit
												</a>
											</div>
											<div class="menu-item px-3">
												<a href="{{ route('admin.blog.destroy', ['blogId' => $blog->id]) }}"  class="menu-link px-3">Delete</a>
											</div>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
</div>

@include('admin.blogs.modals.add_blog_modal')
@include('admin.blogs.modals.update_blog_modal')


<script>

    let blogEditor = false;
    $('.loadBlogModal').on('click', function() {
        // alert($(this).attr('id'))
        let blogId = $(this).data('id')
        let action = $(this).data('route')
        let data = {
            'blogId': blogId
            , '_token': '{{ csrf_token() }}'
        }
        ajaxCall(
            action, 'POST', data
            , function(response) {
                // let data =  JSON.stringify(response)
                // console.log(data)
                $('#editBlogtitle').val(response.blog.title)
                $('#editBlogauthor').val(response.blog.author)
                $('#EditblogId').val(response.blog.id)
                $('#videoLink').val(response.blog.video_link)

                if (blogEditor) {
                    blogEditor.destruct();
                }
                blogEditor = new Jodit(".description_editor");
                blogEditor.container.style.height = '1000px';
                blogEditor.value = response.blog.description;

                $('#OldBlogImage').val(response.blog.image)
                $('#bg_Blog_image').css('background-image', 'url(' + response.blog.image + ')')

                let seasons = response.seasons;
                let season_option = "";
                let seasonsCount = seasons.length;
                for (let i = 0; i < seasonsCount; i++) {
                    let selectedseason = "";
                    if (seasons[i].id == response.blog.season_id) {
                        selectedseason += "selected";
                    }
                    season_option += '<option ' + selectedseason + ' value="' + seasons[i].id + '" >' + seasons[i].name + '</option>';
                }
                $('#Seasons').append(season_option);

                $('#update_blog_modal').modal('show');
            }
            , function(xhr, status, error) {
                console.error('Error:', error);

                swal.fire({
                    text: 'Error:' + error
                    , icon: "error"
                    , buttonsStyling: false
                    , confirmButtonText: "Ok, got it!"
                    , customClass: {
                        confirmButton: "btn btn-light-primary"
                    }
                });
            }
        );



    })

    $(document).ready(function () {

        $('input[name="title"]').on('keyup', function (e) {

            var slug = generateSlug($(this).val().trim());
            $('input[name="slug"]').val(slug)
        });

        $('#addBlogForm, #UpdateBlogForm').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            _this = $(this).closest('form');
            _this.find('.btn-submit').prop('disabled',true)

            $.ajax({
                url: $(this).attr('action'),  // The form's action URL
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        $.each(response.errors, function (key, value) {
                            var errorElement =  _this.find('input[name=' + key + '], select[name=' + key + '], textarea[name=' + key + ']');
                            errorElement.next('.text-danger').remove();  // Remove existing error messages
                            errorElement.after('<div class="err-blog text-danger">' + value + '</div>');
                        });
                        $('.err-blog').closest('div').find('.form-control').focus();
                    }
                },
                error: function (xhr, status, error) {
                },
                always: function() {
                    _this.find('.btn-submit').prop('disabled',false)
                }
            });
        });
    });

    function generateSlug(title) {
        // Convert to lowercase, remove special characters, and replace spaces with hyphens
        var slug = title
            .toLowerCase() // Convert to lowercase
            .replace(/[^a-z0-9]+/gi, '-') // Replace non-alphanumeric characters with hyphens
            .replace(/^-+|-+$/g, ''); // Remove leading and trailing hyphens

        return slug;
    }

</script>

@endsection
