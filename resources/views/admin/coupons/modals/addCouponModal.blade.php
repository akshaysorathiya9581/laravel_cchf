{{-- ADD NEW COUPON MODAL --}}
<div class="modal fade" id="add_coupon_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>Add Coupon</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.storeCoupon') }}" id="addCouponForm" method="POST">

                    <div class="card-body pt-">
                        <div class="w-100">
                            <div class="fv-row mb-10">
                                @if(isset($coupons->id))
                                <input type="hidden" name="couponId" value="{{ $coupons->id }}" />
                                @endif
                                <label class="form-label required">Title</label>
                                <input name="title" class="form-control form-control-lg form-control-solid" value="" />
                                @if ($errors->has('title'))
                                <div class="text-danger">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="required form-label mb-3">Add To Campaigns</label>

                                <select name="campaign_id[]" class="form-select required form-select-solid form-select-sm" multiple data-control="select2" data-placeholder="Select Campaign..." data-hide-search="false">
                                    @foreach ($campaigns as $campaign)
                                    <option value="{{ $campaign->id }}">{{ $campaign->camp_title }}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('campaign_id'))
                                <div class="text-danger">{{ $errors->first('campaign_id') }}</div>
                                @endif
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="required form-label mb-3">Seasons</label>
                                <select class="form-select form-select-solid form-select-sm" data-control="select2" data-placeholder="select season" data-hide-search="false" name="season_id">
                                    @foreach ($seasons as $season)
                                    <option value="{{ $season->id }}">{{ $season->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('season_id'))
                                <div class="text-danger">{{ $errors->first('season_id') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label required">Min Amount</label>
                                <input name="minimum_amount" type="number" class="form-control form-control-lg form-control-solid" />
                                @if ($errors->has('minimum_amount'))
                                <div class="text-danger">{{ $errors->first('minimum_amount') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Discount Amount</label>
                                <input name="discount_amount" type="number" class="form-control form-control-lg form-control-solid" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label required">Start Date</label>
                                <input name="start_date" type="datetime-local" class="form-control form-control-lg form-control-solid" />
                                @if ($errors->has('start_date'))
                                <div class="text-danger">{{ $errors->first('start_date') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label required">End Date</label>
                                <input name="end_date" type="datetime-local" class="form-control form-control-lg form-control-solid" />
                                @if ($errors->has('end_date'))
                                <div class="text-danger">{{ $errors->first('end_date') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label required">Multiplier for Tickets</label>
                                <input name="multiplyer" type="number" class="form-control form-control-lg form-control-solid" />
                                @if ($errors->has('multiplyer'))
                                <div class="text-danger">{{ $errors->first('multiplyer') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label fw-semibold">Coupon Type</label>
                                <div class="d-flex">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" name="type" value="general" checked="checked" type="radio" />
                                        <span class="form-check-label">General</span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" name="type" value="selected" type="radio" />
                                        <span class="form-check-label">Selected</span>
                                    </label>
                                </div>
                                @if ($errors->has('type'))
                                <div class="text-danger">{{ $errors->first('type') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" id="addCoupon" class="btn btn-lg btn-primary" data-kt-element="type-next">
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
        $('#addCoupon').click(function() {
            let formData = new FormData($('#addCouponForm')[0]);
            formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token if required
            let action = $('#addCouponForm').attr('action');
            $.ajax({
                url: action
                , type: 'POST'
                , data: formData
                , contentType: false
                , processData: false
                , success: function(response) {
                    Swal.fire({
                        text: 'Coupon added successfully!'
                        , icon: 'success'
                        , confirmButtonText: "Ok"
                        , buttonsStyling: false
                        , customClass: {
                            confirmButton: "btn btn-light-primary"
                        }
                    });
                    $('#add_coupon_modal').modal('hide');
                    location.reload();
                }
                , error: function(xhr, status, error) {
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
            });
        });
    });

</script>
