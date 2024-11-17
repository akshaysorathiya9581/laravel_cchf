@extends('admin.layout')
@section('title', ' Organization')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">All Organization</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted"> Organization</li>

                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#addOrganization" class="btn btn-sm btn-flex btn-info"> <i class="fas fa-user"></i> Add New</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_contentss" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                    <div class="card-header pt-4">
                        <h3 class="text-start">
                            Organization
                        </h3>
                        <p class="text-end">
                            @if (isset($success) && $success->any())
                            <div class="alert alert-success " role="alert">
                                @foreach ($success->all() as $succes)
                                <strong> Success! </strong>{{ $succes}}
                                @endforeach
                            </div>
                            @endif
                        </p>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="Prizes">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px"> ID</th>
                                    <th class="min-w-100px">Name</th>
                                    <th class="min-w-100px">Title</th>
                                    <th class="min-w-100px"> Email</th>
                                    <th class="min-w-100px">Action</th>

                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600 coupons_body">
                                @foreach ( $organizations as $organization )
                                <tr>
                                    <td>{{ $organization->id }}</td>
                                    <td>{{ $organization->name }}</td>
                                    <td>{{ $organization->title }}</td>
                                    <td>{{ $organization->email }}</td>

                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="#" type="button" data-route="{{ route('admin.getSingleOrganization') }}" data-id="{{ $organization->id }}" id="update_Organization{{$organization->id}}" class="loadUpdateOrganizationModal menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.organization.destroy', ['organizationId' => $organization->id]) }}" class="menu-link px-3">Delete</a>
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

@include('admin.organization.modals.addOrganization')
@include('admin.organization.modals.updateOrganization')


<script>
    $('.loadUpdateOrganizationModal').on('click', function() {
        // alert($(this).attr('id'))
        let organizationId = $(this).data('id')
        let action = $(this).data('route')
        let data = {
            'organizationId': organizationId
            , '_token': '{{ csrf_token() }}'
        }
        ajaxCall(
            action, 'POST', data
            , function(response) {
                // let data =  JSON.stringify(response)
                // console.log(data)
                $('#organizationId').val(response.organization.id)
                $('#EditName').val(response.organization.name)
                $('#EditTitle').val(response.organization.title)
                $('#EditEmail').val(response.organization.email)

                $('#EditOrganization').modal('show');
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
</script>
@endsection
