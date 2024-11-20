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
						<button type="button" id="manageOg" class="btn btn-sm btn-flex btn-info">Manage OG</button>
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
												<a href="#" type="button" data-route="{{ route('admin.getSingleBlog') }}" data-id="{{ $blog->id }}" id="update_blog{{$blog->id}}" class="edt-blog menu-link px-3">
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

@include('admin.manage_og_modal')
@include('admin.blogs.modals.add_blog_modal')
@include('admin.blogs.modals.update_blog_modal')


<script>

	let blogEditor = false;

	$(document).ready(function () {

		$('.edt-blog').on('click', function() {

			let blogId = $(this).data('id');
			let reqUrl = $(this).data('route');

			$.when(send_ajax_request(reqUrl, {'blogId': blogId})).done(function(response) {

				var blogInfo = response.blog;
				
				$('#editBlogtitle').val(blogInfo.title)
				$('#editBlogauthor').val(blogInfo.author)
				$('#EditblogId').val(blogInfo.id)
				$('#videoLink').val(blogInfo.video_link)
				$('#publishDate').val(blogInfo.publish_date)

				if (blogEditor) {
					blogEditor.destruct();
				}
				blogEditor = new Jodit(".description_editor");
				blogEditor.container.style.height = '1000px';

				if(blogInfo.description) {
					blogEditor.value = blogInfo.description;
				} else {
					blogEditor.value = '';
				}

				$('#OldBlogImage').val(blogInfo.image);
				$('#seasons').select2().val(blogInfo.season_id).trigger('change');
				$('#bg_Blog_image').css('background-image', 'url(' + blogInfo.image + ')')

				$('#update_blog_modal').modal('show');
			});
		});

		$('body').on('click','#manageOg',function(){

			$.when(send_ajax_request('{{ route("admin.getoginfo") }}', {'page':'blog'}, 'GET')).done(function(response) {

				$('#manage_og_modal').modal('show');

				if (response.success) {
					var og_properties = response.data.og_properties;

					if(og_properties) {
						$('input[name="og_title"]').val(og_properties.og_title);
						$('textarea[name="og_description"]').val(og_properties.og_description);

						$('input[name="old_og_image"]').val(og_properties.og_image)
						$('#og_image').css('background-image', 'url(' + og_properties.og_image + ')')
					}
				}
			})
		})

		$('#updateOgData').on('submit', function (e) {
			e.preventDefault();

			var formData = new FormData(this);
			// formData.append('page','blog');
			_this = $(this).closest('form');
			_this.find('.btn-submit').prop('disabled',true).html('Processing...')

			$.when(send_ajax_request($(this).attr('action'), formData, 'POST', true)).done(function(response) {

				toastr_show(response.message);
				_this.find('.btn-submit').prop('disabled', false).html('Submit');
				$('#manage_og_modal').modal('hide');

			}).fail(function(xhr) {

				if (xhr.status == 422) {
					
					var errors = xhr.responseJSON.errors;

					$('.err-msg').remove();  // Remove existing error messages
					$.each(errors, function (key, value) {
						var errorElement = _this.find('input[name=' + key + '], select[name=' + key + '], textarea[name=' + key + ']');
						errorElement.after('<div class="err-msg text-danger">' + value[0] + '</div>'); // Display the first error message
					});
					$('.err-blog').closest('div').find('.form-control').focus();
					_this.find('.btn-submit').prop('disabled', false).html('Submit');
				}
			});
		});

		$('#addBlogForm, #UpdateBlogForm').on('submit', function (e) {
			e.preventDefault();

			var formData = new FormData(this);
			_this = $(this).closest('form');
			_this.find('.btn-submit').prop('disabled',true).html('Processing...')

			$.when(send_ajax_request($(this).attr('action'), formData, 'POST', true)).done(function(response) {

				if (response.success) {

					if(_this.attr('id') == 'addBlogForm') {
						toastr_show('Blog created successfully !');
					} else {
						toastr_show('Blog updated successfully !');
					}

					setTimeout(() => {
						location.reload();
					}, 1000);

				} else {

					$.each(response.errors, function (key, value) {
						var errorElement =  _this.find('input[name=' + key + '], select[name=' + key + '], textarea[name=' + key + ']');
						errorElement.next('.text-danger').remove();  // Remove existing error messages
						errorElement.after('<div class="err-blog text-danger">' + value + '</div>');
					});
					$('.err-blog').closest('div').find('.form-control').focus();
				}
				_this.find('.btn-submit').prop('disabled',false).html('Submit')

			}).fail(function(xhr) {

				_this.find('.btn-submit').prop('disabled',false).html('Submit')
			});
		});
	});

</script>

@endsection
