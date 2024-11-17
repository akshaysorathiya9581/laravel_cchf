@extends('admin.layout')
@section('title', 'Coupons')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">All Coupons</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Coupons</li>

                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#add_coupon_modal" class="btn btn-sm btn-flex btn-info"> <i class="fas fa-user"></i> Add New</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_contentss" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                    <div class="card-header pt-4">
                        <h3 class="text-start">
                            Coupons
                        </h3>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="coupons_datatable">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px">Coupon ID</th>
                                    <th class="min-w-100px">Title</th>
                                    <th class="min-w-100px">Type</th>
                                    <th class="min-w-100px">Min Amount</th>
                                    <th class="min-w-100px">Discount Amount</th>
                                    <th class="min-w-100px">Multiply by</th>
                                    <th class="min-w-100px">Start Date</th>
                                    <th class="min-w-100px">End Date</th>
                                    <th class="min-w-100px">Action</th>

                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600 coupons_body">
                                @foreach ( $coupons as $coupon )
                                <tr>
                                    <td>{{ $coupon->id }}</td>
                                    <td>{{ $coupon->title }}</td>
                                    <td>{{$coupon->type}}</td>
                                    <td>{{ $coupon->minimum_amount }}</td>
                                    <td>{{ $coupon->discount_amount }}</td>
                                    <td>{{ $coupon->multiplyer }}</td>
                                    <td>{{ $coupon->start_date }}</td>
                                    <td>{{ $coupon->end_date }}</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="#" type="button" data-route="{{ route('admin.getCouponSingledata') }}" data-id="{{ $coupon->id }}" id="update_coupon{{$coupon->id}}" class="loadUpdateCouponModal menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.coupon.destroy', ['couponId' => $coupon->id]) }}"   class="menu-link px-3">Delete</a>
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

@include('admin.coupons.modals.addCouponModal')
@include('admin.coupons.modals.updateCouponModal')


<script>
    $('.loadUpdateCouponModal').on('click', function() {
        // alert($(this).attr('id'))
        let couponId = $(this).data('id')
        let action = $(this).data('route')
        let data = {
            'couponId': couponId
            , '_token': '{{ csrf_token() }}'
        }
        ajaxCall(
            action, 'POST', data
            , function(response) {
                // let data =  JSON.stringify(response)
                // console.log(data)
                $('#editCouponTitle').val(response.coupons.title)
                $('#editCouponId').val(response.coupons.id)
                if (response.coupons.type == 'selected') {
                    $('#editSelected').attr('checked', true)
                } else if (response.coupons.type == 'general') {
                    $('#editGeneral').attr('checked', true)
                }
                $('#editCouponMinAmount').val(response.coupons.minimum_amount)
                // $('#editCouponDiscAmount').val(response.coupons.discount_amount)
                $('#editCouponStartdate').val(response.coupons.start_date)
                $('#editCouponEndDate').val(response.coupons.end_date)
                $('#editCouponMultiplayer').val(response.coupons.multiplyer)
                $('#EditCouponDiscountAmount').val(response.coupons.discount_amount)
                let campaigns = response.campaigns;
                let campaign_coupons = response.campaign_coupons;
                let campaignsCount = campaigns.length;
                let campaignsCouponCount = campaign_coupons.length;
                let option = "";

                for (let i = 0; i < campaignsCount; i++) {
                    let selected = "";
                    for (let j = 0; j < campaignsCouponCount; j++) {
                        if (campaign_coupons[j].campaign_id == campaigns[i].id) {
                            selected = "selected";
                            break;
                        }
                    }
                    option += '<option ' + selected + ' value="' + campaigns[i].id + '" >' + campaigns[i].camp_title + '</option>';
                }
                $('#Seasons').html('');
                let seasons = response.seasons;
                let seasonsCount = seasons.length;
                let season_option = "";
                for (let i = 0; i < seasonsCount; i++) {
                    let selectedseason = "";
                    if(seasons[i].id == response.coupons.season_id){
                        selectedseason += "selected";
                    }
                    season_option += '<option ' + selectedseason + ' value="' + seasons[i].id + '" >' + seasons[i].name + '</option>';
                }
                $('#Seasons').append(season_option);

                $('#editCounponCampaigns').append(option);

                $('#update_coupon_modal').modal('show');
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
