@extends('admin.layout')
@section('title', ' Media')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
	<div class="d-flex flex-column flex-column-fluid">
		<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
			<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
				<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">All Media</h1>
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
						<li class="breadcrumb-item text-muted">
							<a href="#" class="text-muted text-hover-primary">Home</a>
						</li>
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<li class="breadcrumb-item text-muted">Media</li>
					</ul>
				</div>
				<div class="d-flex align-items-center gap-2 gap-lg-3">
					<div class="m-0">
						<button type="button" data-bs-toggle="modal" data-bs-target="#add_media_modal" class="btn btn-sm btn-flex btn-info"> <i class="fas fa-user"></i> Add New Media</button>
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
								@foreach ($media as $mediaInfo)
								<tr>
									<td>{{ $mediaInfo->id }}</td>
									<td>{{ $mediaInfo->publish_date }}</td>
									<td>{{ $mediaInfo->title }}</td>
									<td>{{ $mediaInfo->author }}</td>
									<td class="text-end">
										<a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											Actions
											<i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<div class="menu-item px-3">
												<a href="javascript:void(0)" type="button" data-id="{{ $mediaInfo->id }}" class="edt-media menu-link px-3">
													Edit
												</a>
											</div>
											<div class="menu-item px-3">
												<a href="{{ route('media.delete', ['mediaId' => $mediaInfo->id]) }}"  class="menu-link px-3">Delete</a>
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

@include('admin.media.modals.add_media_modal')
@include('admin.media.modals.update_media_modal')

<script>

	let mediaEditor = false;

	$(document).ready(function () {

		$('.edt-media').on('click', function() {

			let mediaId = $(this).data('id');

			$.when(send_ajax_request("{{ route('media.detail') }}", {'mediaId': mediaId})).done(function(response) {

				var mediaInfo = response.media;
				
				$('#editMediatitle').val(mediaInfo.title)
				$('#editMediaauthor').val(mediaInfo.author)
				$('#editMediaId').val(mediaInfo.id)
				$('#videoLink').val(mediaInfo.video_link)
				$('#publishDate').val(mediaInfo.publish_date)

				if (mediaEditor) {
					mediaEditor.destruct();
				}
				mediaEditor = new Jodit(".description_editor");
				mediaEditor.container.style.height = '1000px';

				if(mediaInfo.description) {
					mediaEditor.value = mediaInfo.description;
				} else {
					mediaEditor.value = '';
				}

				$('#OldMediaImage').val(mediaInfo.image);
				$('#seasons').select2().val(mediaInfo.season_id).trigger('change');
				$('#bg_Media_image').css('background-image', 'url(' + mediaInfo.image + ')')

				$('#update_media_modal').modal('show');
			});
		});

		$('#frm-add-media, #frm-update-media').on('submit', function (e) {
			e.preventDefault();

			var formData = new FormData(this);
			_this = $(this).closest('form');
			_this.find('.btn-submit').prop('disabled',true).html('Processing...')

			$.when(send_ajax_request($(this).attr('action'), formData, 'POST', true)).done(function(response) {

				if (response.success) {

					if(_this.attr('id') == 'frm-add-media') {
						toastr_show('Media created successfully !');
					} else {
						toastr_show('Media updated successfully !');
					}

					setTimeout(() => {
						location.reload();
					}, 1000);

				} else {

					$.each(response.errors, function (key, value) {
						var errorElement =  _this.find('input[name=' + key + '], select[name=' + key + '], textarea[name=' + key + ']');
						errorElement.next('.text-danger').remove();  // Remove existing error messages
						errorElement.after('<div class="err-media text-danger">' + value + '</div>');
					});
					$('.err-media').closest('div').find('.form-control').focus();
				}
				_this.find('.btn-submit').prop('disabled',false).html('Submit')

			}).fail(function(xhr) {

				_this.find('.btn-submit').prop('disabled',false).html('Submit')
			});
		});
	});

</script>

@endsection
