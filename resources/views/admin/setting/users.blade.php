@extends('admin.layout')
@section('title', ' Users')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">All Users</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted"> Users</li>

                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-sm btn-flex btn-info"> <i class="fas fa-user"></i> Add New</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_contentss" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                    <div class="card-header pt-4">
                        <h3 class="text-start">
                            Users
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
                                    <th class="min-w-100px"> Email</th>
                                    <th class="min-w-100px"> Send Email</th>
                                    <th class="min-w-100px"> Role</th>
                                    <th class="min-w-100px">Action</th>

                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600 coupons_body">
                                @foreach ( $users as $user )
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                            <input class="sendEmail form-check-input w-45px h-30px" value="1" data-route="{{ route('admin.changeSendMail') }}" data-id="{{ $user->id }}" name="send_email" type="checkbox" {{ $user->send_email == "1" ? 'checked': '' }} id="sendEmail{{ $user->id }}" />
                                            <label class="form-check-label" for="sendEmail{{ $user->id }}"></label>
                                        </div>
                                    </td>
                                    <td>{{ $user->role }}</td>

                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="#" type="button" data-route="{{ route('admin.getSingleUser') }}" data-id="{{ $user->id }}" id="update_User{{$user->id}}" class="loadUpdateUserModal menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            @role('admin')
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.user.destroy', ['userId' => $user->id]) }}" class="menu-link px-3">Delete</a>
                                            </div>
                                            @endrole
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

@include('admin.setting.modals.addUser')
@include('admin.setting.modals.updateUser')


<script>
    $('.loadUpdateUserModal').on('click', function() {
        // alert($(this).attr('id'))
        let userId = $(this).data('id')
        let action = $(this).data('route')
        let data = {
            'userId': userId,
            '_token': '{{ csrf_token() }}'
        }
        ajaxCall(
            action, 'POST', data,
            function(response) {
                // let data =  JSON.stringify(response)
                // console.log(data)
                $('#Organization').html('');
                $('#UserRole').html('');
                $('#userId').val(response.user.id)
                $('#name').val(response.user.name)
                $('#email').val(response.user.email)
                let UserRole = '';
                let selected = "selected";
                if (response.user.role == "admin") {
                    UserRole += '<option id="admin" ' + selected + ' value="admin">Admin</option><option id="employee" value="employee">employee</option>'
                } else {
                    UserRole += '<option id="admin"  value="admin">Admin</option><option id="employee" ' + selected + ' value="employee">employee</option>'
                }

                let organizations = response.organizations;
                let organizationsCount = organizations.length;
                let organization_option = "";
                for (let i = 0; i < organizationsCount; i++) {
                    let selectedOrganization = "";
                    if(organizations[i].id == response.user.organization_id){
                        selectedOrganization += "selected";
                    }
                    organization_option += '<option ' + selectedOrganization + ' value="' + organizations[i].id + '" >' + organizations[i].name + '</option>';
                }
                $('#Organization').append(organization_option);
                $('#UserRole').append(UserRole);
                $('#UpdateUserModal').modal('show');
            },
            function(xhr, status, error) {
                console.error('Error:', error);

                swal.fire({
                    text: 'Error:' + error,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-light-primary"
                    }
                });
            }
        );



    })
</script>
<script>
    $('.sendEmail').on('change', function() {
        let userId = $(this).data('id')
        let sendEmail = $(this).prop('checked') ? 1 : 0
        let action = $(this).data('route')
        let data = {
            'userId': userId,
            'sendEmail': sendEmail,
            '_token': '{{ csrf_token() }}'
        }
        ajaxCall(
            action, 'POST', data,
            function(response) {
                Swal.fire({
                    text: 'Send Email Updated',
                    icon: 'success',
                    confirmButtonText: "Ok",
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: "btn btn-light-primary"
                    }
                })
                location.reload();
            },
            function(xhr, status, error) {
                console.error('Error:', error);
                swal.fire({
                    text: 'Error:' + error,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-light-primary"
                    }
                });
            }
        );
    });
</script>
@endsection
