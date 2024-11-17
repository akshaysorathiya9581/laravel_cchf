{{--  UPDATE MODAL --}}
<div class="modal fade" id="update_sponsorship_opportunities" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>Update Sponorship Opportunities</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.updateSponsorShipOpportunities') }}"
                    id="updateSponsorShipOpportunitiesForm" enctype="multipart/form-data" method="POST">
                    <div class="card-body pt-">
                        <div class="w-100">
                            <div class="fv-row mb-10">
                                <input type="hidden" name="sponsorshipId" id="sponsorshipId" value="">
                                <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                                <label class="form-label required">Title</label>
                                <input name="title" class="form-control form-control-lg form-control-solid"
                                    id="EditSponsorshipTitle" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-block fw-semibold fs-6 mb-5">
                                    <span class=""> Image</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="Select Gallery Image"></i>
                                </label>
                                <style>

                                </style>
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder"
                                    data-kt-image-input="true">
                                    <div class="image-input-wrapper w-125px h-125px" id="EditSponsorshipBgImage"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change image">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg, .svg, .webp" />
                                        <input type="hidden" id="EditSponsorshipOld" name="old_image" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        title="Cancel image">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        title="Remove image">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="required">Amount</span>

                                </label>
                                <input class="form-control form-control-lg form-control-solid" name="amount"
                                    id="EditSponsorshipAmount" type="number">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" id="updateSponsorShipOpportunities" class="btn btn-lg btn-primary"
                            data-kt-element="type-next">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#updateSponsorShipOpportunities').click(function() {
            let formData = new FormData($('#updateSponsorShipOpportunitiesForm')[0]);
            formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token if required

            let action = $('#updateSponsorShipOpportunitiesForm').attr('action');

            ajaxCall(
                action, 'POST', formData,
                function(response) {
                    Swal.fire({
                        text: 'Sponsorship updated',
                        icon: 'success',
                        confirmButtonText: "Ok",
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: "btn btn-light-primary"
                        }
                    })
                    $('#update_sponsorship_opportunities').modal('hide');
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
