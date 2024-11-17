{{-- ADD NEW GRAND PRIZE MODAL --}}
<div class="modal fade" id="Edit_grandPrize_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>Edit grand Prize</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.editGrandPrize') }}" id="EditGrandPrizeForm" enctype="multipart/form-data"
                    method="POST">

                    <div class="card-body pt-">
                        <div class="w-100">
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
                            <div class="fv-row mb-10">

                                <input type="hidden" name="grandPrizeId" id="grandPrizeId" value="" />

                                <label class="form-label required">Title</label>
                                <input name="title" id="title"
                                    class="form-control form-control-lg form-control-solid" value="" />
                                @if ($errors->has('title'))
                                    <div class="text-danger">{{ $errors->first('title') }}</div>
                                @endif
                            </div>

                            <div class="fv-row mb-10">
                                <label class="form-label required">Amount</label>
                                <input name="amount" id="amount" type="number"
                                    class="form-control form-control-lg form-control-solid" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-block fw-semibold fs-6 mb-5">
                                    <span class=""> Image</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="grand Prize Image"></i>
                                </label>

                                <style>

                                </style>
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder"
                                    data-kt-image-input="true">
                                    <div id="bg_image" class="image-input-wrapper w-125px h-125px">
                                    </div>

                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change">
                                        <i class="fas fa-pencil-alt fs-7"></i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg" />


                                        <input type="hidden" name="old_image" id="old_image" value="" />


                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel  ">
                                        <i class="fas fa-times fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove  ">
                                        <i class="fas fa-times fs-2"></i>
                                    </span>
                                </div>
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>

                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" id="EditGrandPrize" class="btn btn-lg btn-primary"
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
        $('#EditGrandPrize').click(function() {
            let formData = new FormData($('#EditGrandPrizeForm')[0]);
            formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token if required
            let action = $('#EditGrandPrizeForm').attr('action');
            ajaxCall(
                action, 'POST', formData,
                function(response) {
                    Swal.fire({
                        text: 'Grand Prize Updated',
                        icon: 'success',
                        confirmButtonText: "Ok",
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: "btn btn-light-primary"
                        }
                    })
                    $('#Edit_grandPrize_modal').modal('hide');

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
