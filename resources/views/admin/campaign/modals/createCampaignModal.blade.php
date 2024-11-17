<div class="modal fade" id="kt_modal_create_campaign" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>Create Campaign</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y m-5">
                <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_campaign_stepper">
                    <div class="stepper-nav justify-content-center py-2">
                        <div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav">
                            <h3 class="stepper-title"> Configure Campaign</h3>
                        </div>
                        <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Banner</h3>
                        </div>
                        <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Tickets</h3>
                        </div>
                        <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Settings</h3>
                        </div>
                        <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Content</h3>
                        </div>
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Complete</h3>
                        </div>
                    </div>
                    <form class="mx-auto w-100 mw-600px pt-15 pb-10" method="post" action="{{route('admin.storeCampaign')}}" novalidate="novalidate" id="kt_modal_create_campaign_stepper_form">

                        <div class="current" data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-15">
                                    <h2 class="fw-bold d-flex align-items-center text-dark">Setup Campaign
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Campaign name will be used as reference within your campaign reports"></i>
                                    </h2>
                                </div>

                                <div class="mb-10 fv-row">
                                    <label class="required form-label mb-3">Organization Name</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="organization_name" placeholder="" value="" />
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="required form-label mb-3">Campaign Name</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="campaign_name" placeholder="" value="" />
                                </div>

                                <div class="mb-10 fv-row">
                                    <label class="required form-label mb-3">Slug</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="slug" placeholder="" value="" />
                                </div>

                                <div class="mb-10 fv-row">
                                    <label class="required form-label mb-3">Users</label>
                                    <select class="form-select form-select-solid form-select-sm" multiple data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <div class="fv-row mb-10">
                                    <label class="d-block fw-semibold fs-6 mb-5">
                                        <span class="required"> Logo</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="E.g. Select a logo to represent the company that's running the campaign."></i>
                                    </label>

                                    <style>
                                        .image-input-placeholder {
                                            background-image: url('assets/media/svg/files/blank-image.svg');
                                        }

                                        [data-bs-theme="dark"] .image-input-placeholder {
                                            background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                        }
                                    </style>
                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Input group-->

                            </div>
                        </div>
                        <div data-kt-stepper-element="content">
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12 d-flex">
                                    <!--begin::Title-->
                                    <h1 class="fw-bold text-dark"> Banner </h1>
                                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#add_banner">Add Banner</button>

                                    <!--end::Title-->
                                    <!--begin::Description-->

                                    <!--end::Description-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->

                                    <!--End::Label-->
                                    <!--begin::Files-->
                                    <div class="mh-300px scroll-y me-n7 pe-7">
                                        <!--begin::File-->
                                        <div class="d-flex flex-stack py-4 border border-top-0 border-left-0 border-right-0 border-dashed">
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px">
                                                    <img src="assets/media/svg/files/pdf.svg" alt="icon" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Product Specifications</a>
                                                    <div class="fw-semibold text-muted">230kb</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--begin::Menu-->
                                            <div class="min-w-100px">
                                                <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true" data-placeholder="Edit">
                                                    <option></option>
                                                    <option value="1">Remove</option>
                                                    <option value="2">Modify</option>
                                                    <option value="3">Select</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <!--end::Files-->
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <div data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-12">
                                    <h1 class="fw-bold text-dark">Ticket/Prizes</h1>

                                </div>
                            </div>
                        </div>
                        <div data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-12">
                                    <h1 class="fw-bold text-dark">Settings</h1>
                                </div>
                            </div>
                        </div>
                        <div data-kt-stepper-element="content">
                            <div class="w-100">

                            </div>
                        </div>
                        <div data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-12 text-center">
                                    <h1 class="fw-bold text-dark">Campaign Created!</h1>
                                </div>
                                <div class="d-flex flex-center pb-20">
                                    <button id="kt_modal_create_campaign_create_new" type="button" class="btn btn-lg btn-light me-3" data-kt-element="complete-start">Create New Campaign</button>
                                    <a href="" class="btn btn-lg btn-primary" data-bs-toggle="tooltip" title="Coming Soon">View Campaign</a>
                                </div>
                                <div class="text-center px-4">
                                    <img src="assets/media/illustrations/sketchy-1/9.png" alt="" class="mww-100 mh-350px" />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-stack pt-10">
                            <div class="me-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">

                                    <span class="svg-icon svg-icon-3 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                            <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    Back</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                    <span class="indicator-label">Submit
                                        <span class="svg-icon svg-icon-3 ms-2 me-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                            </svg>
                                        </span></span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                                    <span class="svg-icon svg-icon-3 ms-1 me-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>