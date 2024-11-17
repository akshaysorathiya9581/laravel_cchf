{{-- UPDATE COUPON MODAL --}}
<div class="modal fade" id="update_coupon_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>Update Coupon</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.editCoupon') }}" method="POST" id="updateCouponForm">
                    <div class="card-body pt-">
                        <div class="w-100">
                            <div class="fv-row mb-10">
                                <input type="hidden" name="couponId" id="editCouponId">
                                <label class="form-label required">Title</label>
                                <input name="title" id="editCouponTitle" class="form-control form-control-lg form-control-solid" value="" />
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="required form-label mb-3">Add To Campaigns</label>
                                <select name="campaign_id[]" id="editCounponCampaigns" class="form-select form-select-solid form-select-sm" multiple data-control="select2" data-placeholder="Select Campaign..." data-hide-search="false">
                                    {{-- <option>CCHF</option>
                                    <option selected="selected">Matbia</option>
                                    <option selected="selected" >Testing Campaign</option> --}}
                                </select>
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="required form-label mb-3">Seasons</label>
                                <select id="Seasons" class="form-select form-select-solid form-select-sm" data-control="select2" data-placeholder="select season" data-hide-search="false" name="season_id">

                                </select>
                                @if ($errors->has('season_id'))
                                <div class="text-danger">{{ $errors->first('season_id') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label required">Min Amount</label>
                                <input name="minimum_amount" id="editCouponMinAmount" type="number" class="form-control form-control-lg form-control-solid" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Discount Amount</label>
                                <input name="discount_amount" id="EditCouponDiscountAmount" type="number" class="form-control form-control-lg form-control-solid" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label required">Start Date</label>
                                <input name="start_date" id="editCouponStartdate" type="date" class="form-control form-control-lg form-control-solid" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label required">End Date</label>
                                <input name="end_date" id="editCouponEndDate" type="date" class="form-control form-control-lg form-control-solid" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label required">Multiplier for Tickets</label>
                                <input name="multiplyer" id="editCouponMultiplayer" type="number" class="form-control form-control-lg form-control-solid" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label fw-semibold">Coupon Type</label>
                                <div class="d-flex">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" name="type" id="editGeneral" value="general" type="radio" />
                                        <span class="form-check-label">General</span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" id="editSelected" name="type" value="selected" type="radio" />
                                        <span class="form-check-label">Selected</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button id="updateCoupon" type="button" class="btn btn-lg btn-primary" data-kt-element="type-next">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
            <!--begin::Modal body-->
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#updateCoupon').click(function() {
            let formData = new FormData($('#updateCouponForm')[0]);
            formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token if required

            let action = $('#updateCouponForm').attr('action');

            ajaxCall(
                action
                , 'POST'
                , formData
                , function(response) {
                    Swal.fire({
                        text: 'Coupon updated successfully!'
                        , icon: 'success'
                        , confirmButtonText: "Ok"
                        , buttonsStyling: false
                        , customClass: {
                            confirmButton: "btn btn-light-primary"
                        }
                    });
                    $('#update_coupon_modal').modal('hide');
                    location.reload();
                }
                , function(xhr, status, error) {
                    console.error('Error:', error);
                    let errorMessage = 'An error occurred. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.messages) {
                        errorMessage = '<ul>';
                        $.each(xhr.responseJSON.messages, function(key, messages) {
                            $.each(messages, function(index, message) {
                                errorMessage += '<li>' + message + '</li>';
                            });
                        });
                        errorMessage += '</ul>';
                    }
                    Swal.fire({
                        html: errorMessage
                        , icon: 'error'
                        , buttonsStyling: false
                        , confirmButtonText: "Ok, got it!"
                        , customClass: {
                            confirmButton: "btn btn-light-primary"
                        }
                    });
                }
            );
        });
    });

</script>
