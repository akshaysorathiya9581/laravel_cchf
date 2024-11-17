{{-- ADD MODAL --}}
<div class="modal fade" id="donor_email_content" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>
                    Donor Email Content
                </h2>
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
                <form action="{{ route('admin.updateEmailTemplate') }}" id="updateEmailContentForm" enctype="multipart/form-data" method="POST">
                    <div class="card-body pt-">
                        @csrf
                        <div class="w-100">
                            <input type="hidden" value="{{ $campaign->id }}" name="campaign_id">
                            <div class="form-group mb-3">
                                <label for="email_editor1">Before donation details</label>
                                <textarea name="before_donation_details" class="area_editor mb-4">@if(isset($email_template->before_donation_details)){{ $email_template->before_donation_details }}@endif</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email_editor2">After donation details</label>
                                <textarea name="after_donation_details" class="area_editor mt-4"> @if(isset($email_template->after_donation_details)){{ $email_template->after_donation_details }}@endif</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" id="updateEmailContent" class="btn btn-lg btn-primary" data-kt-element="type-next">
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
{{-- <script>
    $(document).ready(function() {
        $('#updateEmailContent').click(function() {
            let formData = new FormData($('#updateEmailContentForm')[0]);
            formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token if required
            let action = $('#updateEmailContentForm').attr('action');
            ajaxCall(
                action
                , 'POST'
                , formData
                , function(response) {
                    Swal.fire({
                        text: 'Email Template updated'
                        , icon: 'success'
                        , confirmButtonText: "Ok"
                        , buttonsStyling: false
                        , customClass: {
                            confirmButton: "btn btn-light-primary"
                        }
                    })
                    $('#donor_email_content').modal('hide');
                    // location.reload();
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
    });

</script> --}}
