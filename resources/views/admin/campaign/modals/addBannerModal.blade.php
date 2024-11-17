<div class="modal fade" id="add_banner" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>Add Banner</h2>
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
            <div class="modal-body scroll-y m-5">
                <form id="uploadForm" action="{{ route('admin.storebanner', ['slug' => $campaign->slug]) }}"
                    enctype="multipart/form-data">
                    <div class="card-body pt-">
                        <h3>Banner Type</h3>
                        <ul id="addBannerType" class="nav nav-pills nav-pills-custom mb-3">
                            <li class="nav-item mb-3 me-3 me-lg-6">
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2 active"
                                    id="kt_stats_widget_16_tab_link_1" data-bs-toggle="pill"
                                    href="#kt_stats_widget_16_tab_1">
                                    <div class="nav-icon mb-3">
                                        <i class="fa fa-file fs-1 p-0"></i>
                                    </div>
                                    <span data-type="file" class="nav-text text-gray-800 fw-bold fs-6 lh-1">File</span>
                                    <span
                                        class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>

                                </a>
                            </li>
                            <li class="nav-item mb-3 me-3 me-lg-6">
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2"
                                    id="kt_stats_widget_16_tab_link_2" data-bs-toggle="pill"
                                    href="#kt_stats_widget_16_tab_2">
                                    <div class="nav-icon mb-3">
                                        <i class="fonticon-like-1 fs-1 p-0"></i>
                                    </div>
                                    <span data-type="text" class="nav-text text-gray-800 fw-bold fs-6 lh-1">Text
                                        Based</span>
                                    <span
                                        class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                                <div class="w-100">
                                    <div class="mb-10 fv-row d-none">
                                        <label class=" form-label mb-3">Name</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            name="file_title" placeholder="" value="" />
                                        {{-- <input type="hidden" id="bannerType" name="bannerType" value="File"> --}}
                                    </div>
                                    <h3>Select Banners</h3>

                                    <ul class="banner_file_type nav nav-pills nav-pills-custom mb-3">
                                        {{-- <li class="nav-item mb-3 me-3 me-lg-6 ">
                                            <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w- h-40px pt-3 pb-2 active" id="type_uploadd" data-bs-toggle="pill" href="#type_upload">
                                                Upload file

                                            </a>
                                        </li> --}}
                                        <li class="nav-item mb-3 me-3 me-lg-6 d-none">
                                            <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-x h-40px pt-3 pb-2"
                                                id="type_embedd" data-bs-toggle="pill" href="#type_embed">
                                                Embed Video

                                            </a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="type_upload">
                                            <div class="fv-row mb-10">
                                                <label class="d-block fw-semibold fs-6 mb-5">
                                                    <span class=""> Desktop Image</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                        data-bs-toggle="tooltip" title="Desktop Image."></i>
                                                </label>
                                                <div class="image-input image-input-empty image-input-outline image-input-placeholder"
                                                    data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        id="Preview_file_desktop_image"></div>
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change">
                                                        <i class="fas fa-pencil-alt fs-7"></i>
                                                        <input type="file"  class="image-field" name="file_desktop_image"
                                                            accept=".png, .jpg, .jpeg" />
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
                                                @if ($errors->has('file_desktop_image'))
                                                    <div class="text-danger">{{ $errors->first('file_desktop_image') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="fv-row mb-10">
                                                <label class="d-block fw-semibold fs-6 mb-5">
                                                    <span class=""> Mobile Image</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                        data-bs-toggle="tooltip" title="Mobile Image."></i>
                                                </label>
                                                <div class="image-input image-input-empty image-input-outline image-input-placeholder"
                                                    data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-125px h-125px" id="Previewfile_mobile_image"></div>
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change">
                                                        <i class="fas fa-pencil-alt fs-7"></i>
                                                        <input type="file"  class="image-field" name="file_mobile_image"
                                                            accept=".png, .jpg, .jpeg" />
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
                                                @if ($errors->has('file_mobile_image'))
                                                    <div class="text-danger">{{ $errors->first('file_mobile_image') }}
                                                    </div>
                                                @endif
                                            </div>

                                            {{-- <div class="mb-10 fv-row">
                                                <label class=" form-label mb-3">Desktop Image</label>
                                                <input type="file" class="form-control form-control-lg form-control-solid" name="file_desktop_image" />
                                            </div>
                                             <div class="mb-10 fv-row">
                                                <label class=" form-label mb-3">Mobile Image</label>
                                                <input type="file" class="form-control form-control-lg form-control-solid" name="file_mobile_image" />
                                            </div> --}}
                                        </div>
                                        <div class="tab-pane fade" id="type_embed">
                                            <div class="mb-10 fv-row">
                                                <label class=" form-label mb-3">Embed </label>
                                                <textarea name="" class="form-control" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_stats_widget_16_tab_2">
                                <div class="w-100">
                                    <div class="mb-10 fv-row">
                                        <label class=" form-label mb-3">Main Content</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            name="text_main_content" placeholder="" value="" />
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class=" form-label mb-3">Sub Content</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            name="text_sub_content" placeholder="" value="" />
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class=" form-label mb-3">Amount</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="text_amount" placeholder="" value="" />
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class=" form-label mb-3">Main Button Content</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            name="text_button" placeholder="" value="" />
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class=" form-label mb-3">Main Button URL</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            name="text_button_link" placeholder="" value="" />
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class=" form-label mb-3">Secondary Button Content</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            name="secondary_button_content" placeholder="" value="" />
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class=" form-label mb-3">Secondary Button URL</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            name="secondary_button_url" placeholder="" value="" />
                                    </div>

                                    <h3>Custom Background</h3>
                                   <div class="fv-row mb-10">
                                        <label class="d-block fw-semibold fs-6 mb-5">
                                            <span class="">Upload Custom background</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Upload Custom background."></i>
                                        </label>
                                        <div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
                                            <div class="image-input-wrapper w-125px h-125px" id="Preview_text_desktop_image"></div>
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change">
                                                <i class="fas fa-pencil-alt fs-7"></i>
                                                <input type="file"  class="image-field" name="text_desktop_image" accept=".png, .jpg, .jpeg" /> 
                                            </label>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel  ">
                                                <i class="fas fa-times fs-2"></i>
                                            </span>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove  ">
                                                <i class="fas fa-times fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                        @if ($errors->has('text_desktop_image'))
                                        <div class="text-danger">{{ $errors->first('text_desktop_image') }}</div>
                                        @endif
                                    </div>
                                     <div class="fv-row mb-10">
                                        <label class="d-block fw-semibold fs-6 mb-5">
                                            <span class="">Upload Custom background Mobile</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Mobile Image."></i>
                                        </label>
                                        <div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
                                            <div class="image-input-wrapper w-125px h-125px" id="Previewtext_mobile_image"></div>
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change">
                                                <i class="fas fa-pencil-alt fs-7"></i>
                                                <input type="file" class="image-field" name="text_mobile_image" accept=".png, .jpg, .jpeg" /> 
                                            </label>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel  ">
                                                <i class="fas fa-times fs-2"></i>
                                            </span>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove  ">
                                                <i class="fas fa-times fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                        @if ($errors->has('text_mobile_image'))
                                        <div class="text-danger">{{ $errors->first('text_mobile_image') }}</div>
                                        @endif
                                    </div>
                                    {{-- <div class="mb-10 fv-row">
                                        <label class=" form-label mb-3">Upload Custom background</label>
                                        <input type="file" class="form-control form-control-lg form-control-solid"
                                            name="text_desktop_image" placeholder="" value="" />
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class=" form-label mb-3">Upload Custom background Mobile</label>
                                        <input type="file" class="form-control form-control-lg form-control-solid"
                                            name="text_mobile_image" placeholder="" value="" />
                                    </div> --}}
                                </div>
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="required form-label mb-3">Start Date</label>
                                <input type="datetime-local" class="form-control form-control-lg form-control-solid"
                                    name="start_date" placeholder="" value="" />
                            </div>
                            <div class="mb-10 fv-row">
                                <label class=" form-label mb-3">End Date</label>
                                <input type="datetime-local" class="form-control form-control-lg form-control-solid"
                                    name="end_date" placeholder="" value="" />
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="banner_type" value="file" id="bannerType">
                    <div class="d-flex justify-content-end">
                        <button type="button" id="uploadButton" class="btn btn-lg btn-primary"
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

<style>
    .banner_file_type li a {
        font-weight: 700 !important;
    }
</style>

<script>
    $(document).ready(function() {
        $('#uploadButton').click(function() {
            let formData = new FormData($('#uploadForm')[0]);
            formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token if required

            let action = $('#uploadForm').attr('action');

            ajaxCall(
                action, 'POST', formData,
                function(response) {
                    Swal.fire({
                        text: 'Banner added',
                        icon: 'success',
                        confirmButtonText: "Ok",
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: "btn btn-light-primary"
                        }
                    })
                    $('#add_banner').modal('hide');
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

    // $(document).ready(function() {
    //     $('#BannerType .nav-link').click(function() {
    //         var bannerType = $(this).find('.nav-text').text();

    //         $('#bannerType').val(bannerType);
    //     });
    // });
    $(document).ready(function() {
        $('#addBannerType .nav-link').click(function() {
            // var bannerType = $(this).find('.nav-text').text();
            var dataType = $(this).find('.nav-text').data('type');


            $('#bannerType').val(dataType);
        });
    });


    // $(document).ready(function() {
    //     $('#editBanner').click(function() {
    //         let formData = new FormData($('#uploadForm')[0]);
    //         formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token if required

    //         let action = $('#uploadForm').attr('action');

    //         ajaxCall(
    //             action,
    //             'POST',
    //             formData,
    //             function(response) {
    //                 Swal.fire({
    //                     text: 'Banner added',
    //                     icon: 'success',
    //                     confirmButtonText: "Ok",
    //                     buttonsStyling: false,
    //                     customClass: {
    //                         confirmButton: "btn btn-light-primary"
    //                     }
    //                 })
    //                 $('#add_banner').modal('hide');
    //             },
    //             function(xhr, status, error) {
    //                 console.error('Error:', error);

    //                 swal.fire({
    //                     text: 'Error:' + error,
    //                     icon: "error",
    //                     buttonsStyling: false,
    //                     confirmButtonText: "Ok, got it!",
    //                     customClass: {
    //                         confirmButton: "btn btn-light-primary"
    //                     }
    //                 });
    //             }
    //         );
    //     });
    // });
   
</script>
