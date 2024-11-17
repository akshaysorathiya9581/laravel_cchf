@extends('admin.layout')
@section('title', 'Sponsors')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{ $campaign->camp_title }} Sponsors</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Sponsors</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#add_sponsor_modal" class="btn btn-sm btn-flex btn-info"> <i class="fas fa-user"></i> Add New</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_contentss" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush mt-4">
                    <div class="card-header pt-4">
                        <h3 class="text-start">
                            All Sponsors
                        </h3>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="coupons_datatable">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th style="white-space: nowrap" class="min-w-100px">Name</th>
                                    <th style="white-space: nowrap" class="min-w-100px"> Image</th>
                                    <th style="white-space: nowrap" class="min-w-100px">Action</th>

                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600 coupons_body">
                                @foreach ($sponsors as $sponsor)
                                <tr>
                                    <td>{{ $sponsor->title }}</td>
                                    <td>
                                     <img src="{{ $sponsor->image }}" style="width:130px;height:auto;" alt="">
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="#" data-route="{{ route('admin.getSingleSponsorData') }}" data-id="{{ $sponsor->id }}" id="update_sponsor{{$sponsor->id}}" class="loadEditSponsorModal menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.sponsor.destroy', ['sponsorID' => $sponsor->id]) }}"  class="menu-link px-3">Delete</a>
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

@include('admin.sponsor.modals.addSponsor')
@include('admin.sponsor.modals.updateSponsor')

<script>
    $('.loadEditSponsorModal').on('click', function() {
        let sponsorID = $(this).data('id')
        let action = $(this).data('route')
        let data = {
            'sponsorID': sponsorID
            , '_token': '{{ csrf_token() }}'
        }
        ajaxCall(action, 'POST', data, function(response) {

                let sponsor = response.sponsor;
                if (sponsor) {
                    // alert('yes');
                    $('#sponsorID').val(sponsor.id);
                    $('#EditCampaignId').val(sponsor.campaign_id);
                    $('#editSponsorTitle').val(sponsor.title);
                    $('#sponsorPreviewImage').css('background-image', 'url(' + sponsor.image + ')');
                    $('#oldSponsorImage').val(sponsor.image);
                } else {
                    console.error("Sponsor not found in response", response);
                }

                $('#update_sponsor_modal').modal('show');
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
