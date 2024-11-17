@extends('admin.layout')
@section('title', ' Seasons')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">All Seasons</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted"> Seasons</li>

                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#addSeasonModal" class="btn btn-sm btn-flex btn-info"> <i class="fas fa-user"></i> Add New</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_contentss" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                    <div class="card-header pt-4">
                        <h3 class="text-start">
                            Seasons
                        </h3>
                        <p class="text-end">
                            {{-- @if (isset($success) && $success->any())
                            <div class="alert alert-success " role="alert">
                                @foreach ($success->all() as $succes)
                                <strong> Success! </strong>{{ $succes}}
                                @endforeach
                            </div>
                            @endif --}}
                        </p>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="Prizes">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px"> ID</th>
                                    <th class="min-w-100px">Name</th>
                                    <th class="min-w-100px"> Start Date</th>
                                    <th class="min-w-100px"> End Date</th>
                                    <th class="min-w-100px">Action</th>

                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600 coupons_body">
                                @foreach ( $seasons as $season )
                                <tr>
                                    <td>{{ $season->id }}</td>
                                    <td>{{ $season->name }}</td>
                                    <td>{{ $season->start_date }}</td>
                                    <td>{{ $season->end_date }}</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="#" type="button" data-route="{{ route('admin.getSingleSeason') }}" data-id="{{ $season->id }}" id="update_season{{$season->id}}" class="loadUpdateseasonModal menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.season.destroy', ['seasonId' => $season->id]) }}" class="menu-link px-3">Delete</a>
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

@include('admin.setting.modals.addSeasonModal')
@include('admin.setting.modals.updateSeasonModal')


<script>
    $('.loadUpdateseasonModal').on('click', function() {
        // alert($(this).attr('id'))
        let seasonId = $(this).data('id')
        let action = $(this).data('route')
        let data = {
            'seasonId': seasonId
            , '_token': '{{ csrf_token() }}'
        }
        ajaxCall(
            action, 'POST', data
            , function(response) {
                // let data =  JSON.stringify(response)
                // console.log(data)
                $('#seasonId').val(response.season.id)
                $('#name').val(response.season.name)
                $('#start_date').val(response.season.start_date)
                $('#end_date').val(response.season.end_date)

                $('#UpdateSeasonModal').modal('show');
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
<script>
    $('.sendEmail').on('change', function() {
        let userId = $(this).data('id')
        let sendEmail = $(this).prop('checked') ? 1 : 0
        let action = $(this).data('route')
        let data = {
            'userId': userId
            , 'sendEmail': sendEmail
            , '_token': '{{ csrf_token() }}'
        }
        ajaxCall(
            action, 'POST', data
            , function(response) {
                Swal.fire({
                        text: 'Send Email Updated'
                        , icon: 'success'
                        , confirmButtonText: "Ok"
                        , buttonsStyling: false
                        , customClass: {
                            confirmButton: "btn btn-light-primary"
                        }
                    })
                    window.location.href=window.location.href
                // let data =  JSON.stringify(response)
                // console.log(data)
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
    });

</script>
@endsection
