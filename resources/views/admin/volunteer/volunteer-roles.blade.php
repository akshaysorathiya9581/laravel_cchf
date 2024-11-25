@extends('admin.layout')
@section('title', ' Volunteer Roles')

@section('content')

<style>
	.modal {
		align-items: center !important;
		justify-items: center !important;
	}
</style>

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
	<div class="d-flex flex-column flex-column-fluid">
		<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
			<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
				<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Volunteer Roles</h1>
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
						<li class="breadcrumb-item text-muted">
							<a href="#" class="text-muted text-hover-primary">Home</a>
						</li>
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<li class="breadcrumb-item text-muted">Volunteer Role</li>

					</ul>
				</div>
				<div class="d-flex align-items-center gap-2 gap-lg-3">
					<div class="m-0">
						<button type="button" id="manageOg" class="btn btn-sm btn-flex btn-info">Manage OG</button>
						<button type="button" class="btn opn-vr-modal btn-sm btn-flex btn-info"> <i class="fas fa-user"></i> Add New Role</button>
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
									<th class="min-w-100px">Name</th>
									<th class="min-w-100px">Action</th>
								</tr>
							</thead>
							<tbody class="fw-semibold text-gray-600 coupons_body">
								@foreach ($roles as $role)
								<tr>
									<td>{{ $role->id }}</td>
									<td>{{ $role->name }}</td>
									<td class="text-end">
										<a href="javascript:void(0)" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											Actions
											<i class="ki-duotone ki-down fs-5 ms-1"></i>
										</a>
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<div class="menu-item px-3">
												<a href="javascript:void(0)" type="button" data-id="{{ $role->id }}" data-name="{{ $role->name }}" class="edt-role menu-link px-3">
													Edit
												</a>
											</div>
											<div class="menu-item px-3">
												<a href="{{ route('admin.blog.destroy', ['blogId' => $role->id]) }}"  class="menu-link px-3">Delete</a>
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

{{-- ADD VOLUNTEER ROLE MODAL --}}
<div class="modal fade" id="vr_modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content modal-rounded">
			<div class="modal-header d-flex justify-content-between" style="padding: 12px 14px 8px 18px;">
				<h2>Add Volunteer Role</h2>
				<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
					<i class="fas fa-times"></i>
				</div>
			</div>

			<form action="{{ route('volunteer.managerole') }}" id="frm-volunteer-role" method="POST">
				<div class="modal-body scroll-y m-3" style="max-height: 70vh;overflow: auto;">
					@csrf
					<div class="card-body">
						<div class="w-100">
							<input type="hidden" name="roleId">
							<div class="fv-row row">
								<div class="col-md-12">
									<label class="form-label required">Title</label>
									<input type="text" name="name" class="form-control form-control-lg form-control-solid" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-submit btn-lg btn-primary"
						data-kt-element="type-next"><span class="indicator-label">Submit</span>
					</button>
				</div>
			</form>
			<!--begin::Modal body-->
		</div>
	</div>
</div>

@include('admin.manage_og_modal')

<script>

	$('select[name="og_page"]').val('volunteer'); // set default og page value

	$('.edt-role').on('click', function (event) {

		var name = $(this).data('name');
		var id = $(this).data('id');

		$('input[name="roleId"]').val(id);
		$('input[name="name"]').val(name);
		$('#vr_modal').modal('show');
	});

	$('.opn-vr-modal').on('click', function (event) {

		$('input[name="roleId"]').val('');
		$('#vr_modal').modal('show');
	});

	$('#frm-volunteer-role').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        _this = $(this).closest('form');
        toggleButton(_this.find('.btn-submit'),true);

        $.when(send_ajax_request($(this).attr('action'), formData, 'POST', true)).done(function(response) {

            toastr_show(response.message);
			setTimeout(() => {
				location.reload()
			}, 1000);

        }).fail(function(xhr) {

            toggleButton(_this.find('.btn-submit'),false,'SUBMIT');

            if (xhr.status == 422) {
                
                var errors = xhr.responseJSON.errors;

                $('.err-msg').remove();  // Remove existing error messages
                $.each(errors, function (key, value) {
                    var errorElement = _this.find('input[name=' + key + '], select[name=' + key + '], textarea[name=' + key + ']');
                    errorElement.after('<div class="err-msg text-danger">' + value[0] + '</div>'); // Display the first error message
                });
                $('.err-blog').closest('div').find('.form-control').focus();
            }
        });
    });

</script>

@endsection
