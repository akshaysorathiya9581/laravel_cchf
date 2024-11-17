@extends('admin.layout')
@section('title', ' Early Bird')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">All Early Bird</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted"> Early Bird</li>

                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#add_early_bird_modal" class="btn btn-sm btn-flex btn-info"> <i class="fas fa-user"></i> New Early Bird</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_contentss" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                    <div class="card-header pt-4">
                        <h3 class="text-start">
                            Prizes
                        </h3>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="Prizes">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px"> ID</th>
                                    <th class="min-w-100px">Start Date</th>
                                    <th class="min-w-100px"> End Date</th>
                                    <th class="min-w-100px">Image</th>
                                    <th class="min-w-100px">Action</th>

                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600 coupons_body">
                                @foreach ( $EarlyBird as $early_bird )
                                <tr>
                                    <td>{{ $early_bird->id }}</td>
                                    <td>{{ $early_bird->start_date }}</td>
                                    <td>{{ $early_bird->end_date }}</td>
                                    <td>
                                    <img src="{{ $early_bird->image }}" style="width:150px;" alt="Image">
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="#" type="button" data-route="{{ route('admin.getSingleEarlyBird') }}" data-id="{{ $early_bird->id }}" id="update_early_bird{{$early_bird->id}}" class="loadUpdateRarlyBirdModal menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.earlyBird.destroy', ['earlyBirdId' => $early_bird->id]) }}"   class="menu-link px-3">Delete</a>
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

@include('admin.early_bird.modals.addEarlyBirdModal')
@include('admin.early_bird.modals.UpdateEarlyBirdModal')


<script>
    $('.loadUpdateRarlyBirdModal').on('click', function() {
        // alert($(this).attr('id'))
        let earlyBirdId = $(this).data('id')
        let action = $(this).data('route')
        let data = {
            'earlyBirdId': earlyBirdId
            , '_token': '{{ csrf_token() }}'
        }
        ajaxCall(
            action, 'POST', data
            , function(response) {
                // let data =  JSON.stringify(response)
                // console.log(data)
                $('#EarlyBirdId').val(response.EarlyBird.id)
                $('#start_date').val(response.EarlyBird.start_date)
                $('#end_date').val(response.EarlyBird.end_date)
                $('#old_image').val(response.EarlyBird.image)
                $('#EditEarlyBirdBgImage').css('background-image', 'url(' + response.EarlyBird.image + ')')
                let seasons = response.seasons;
                let season_option = "";
                $('#Seasons').html('');
                let seasonsCount = seasons.length;
                for (let i = 0; i < seasonsCount; i++) {
                    let selectedseason = "";
                    if(seasons[i].id == response.EarlyBird.season_id){
                        selectedseason += "selected";
                    }
                    season_option += '<option ' + selectedseason + ' value="' + seasons[i].id + '" >' + seasons[i].name + '</option>';
                }
                $('#Seasons').append(season_option);
                $('#update_early_bird_modal').modal('show');
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
