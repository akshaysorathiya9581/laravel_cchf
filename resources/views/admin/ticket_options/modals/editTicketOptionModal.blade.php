{{-- UPDATE MODAL --}}
<div class="modal fade" id="updateTicketOptionsModals" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2><b>Options
                        Edit Ticket
                    </b></h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.updateTicketOption') }}" id="UpdateTicketOptionForm"
                    enctype="multipart/form-data" method="POST">

                    <div class="card-body pt-">
                        <div class="w-100">
                            @if (!isset($campaign->id))
                                <div class="mb-10 fv-row">
                                    <label class="required form-label mb-3">Seasons</label>
                                    <select id="Seasons" class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-placeholder="select season" data-hide-search="false"
                                        name="season_id">

                                    </select>
                                    @if ($errors->has('season_id'))
                                        <div class="text-danger">{{ $errors->first('season_id') }}</div>
                                    @endif
                                </div>
                            @endif
                            <div class="fv-row mb-10">
                                @if (isset($campaign->id))
                                    <input type="hidden" name="campaign_id" value="{{ $campaign->id }}" />
                                    <input type="hidden" name="season_id" value="{{ $campaign->season_id }}" />
                                @endif
                                <input type="hidden" name="ticketOptionId" id="ticketOptionId" value="" />

                                <label class="form-label required">Title</label>
                                <input name="title" id="EditTicketTitle"
                                    class="EditTicketTitle form-control form-control-lg form-control-solid"
                                    value="" />
                            </div>

                            <div class="fv-row mb-10">
                                <label class="form-label required">Price</label>
                                <input name="price" id="EditTicketPrice" value="" type="number"
                                    class="form-control form-control-lg form-control-solid" />
                            </div>

                            <div class="fv-row mb-10">
                                <label class="form-label required">Entries</label>
                                <input name="entries" value="" id="EditTicketEntries" type="number"
                                    class="form-control form-control-lg form-control-solid" />
                            </div>
                            <div class="mb-10 fv-row">
                                <label class=" form-label mb-3">Add Prizes</label>
                                <select name="prizes_id[]" id="EditTicketPrizes"
                                    class="form-select  form-select-solid form-select-sm" multiple
                                    data-control="select2" data-placeholder="Add prizes..."
                                    data-hide-search="false"></select>
                            </div>
                            <div class="mb-10 fv-row">
                                <label class=" form-label mb-3">Grand Prizes</label>
                                <select name="grand_prize" id="EditGrandPrizes"
                                    class="form-select  form-select-solid form-select-sm" data-control="select2"
                                    data-hide-search="true"></select>
                            </div>
                            <div class="mb-10 fv-row">
                                <label class=" form-label mb-3">Add Coupon</label>
                                <select name="coupon_id" id="EditCoupons"
                                    class="form-select  form-select-solid form-select-sm" data-control="select2"
                                    data-hide-search="true"></select>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-block fw-semibold fs-6 mb-5">
                                    <span class=""> Icon</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="Icon"></i>
                                </label>
                                <style>

                                </style>
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder"
                                    data-kt-image-input="true">
                                    <div class="image-input-wrapper w-125px h-125px" id="EditTicketBgImage"
                                        style="background-image: url('');">
                                    </div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change">
                                        <i class="fas fa-pencil-alt fs-7"></i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg,.svg,.webp" />
                                        <input type="hidden" id="EditTicketOldImage" name="old_image"
                                            value="" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        title="Cancel  ">
                                        <i class="fas fa-times fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        title="Remove  ">
                                        <i class="fas fa-times fs-2"></i>
                                    </span>
                                </div>
                                <div class="form-text">Allowed file types: png, jpg, jpeg.,.svg,.webp</div>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Content</label>
                                <textarea name="content" id="EditTicketContent" cols="30" rows="10"
                                    class="area_editor form-control form-control-lg form-control-solid"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" id="UpdateTicketOptions" class="btn btn-lg btn-primary"
                            data-kt-element="type-next">
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
        $('#UpdateTicketOptions').click(function() {
            let formData = new FormData($('#UpdateTicketOptionForm')[0]);
            formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token if required

            let action = $('#UpdateTicketOptionForm').attr('action');

            ajaxCall(
                action, 'POST', formData,
                function(response) {
                    Swal.fire({
                        text: 'Ticket Option Updated',
                        icon: 'success',
                        confirmButtonText: "Ok",
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: "btn btn-light-primary"
                        }
                    })
                    $('#updateTicketOptionsModals').modal('hide');
                    location.reload();
                },
                function(xhr, status, error) {
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
                        html: errorMessage,
                        icon: 'error',
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-light-primary"
                        }
                    });
                }
            );
        });
    });
</script>
