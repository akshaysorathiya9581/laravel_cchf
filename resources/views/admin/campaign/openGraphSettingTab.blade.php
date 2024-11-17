
<div id="kt_activity_year" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_year_tab">
    <h3 class="mt-2">
        Open Graph (og) Settings
    </h3>
    <div class="mb-3 mt-3">
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="">Group OG Title</span>
            </label>
            <input type="text" class="form-control form-control-solid" name="group_og_title" value="@if(isset($campaign->openGraph->og_title)){{ $campaign->openGraph->og_title }}@endif" />
        </div>
    </div>
    <div class="mb-3 mt-3">
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="">Group OG Description</span>
            </label>
            <textarea name="group_og_description" class="area_editor form-control form-control-solid" cols="30" rows="10">@if(isset($campaign->openGraph->og_description)){{ $campaign->openGraph->og_description }}@endif</textarea>
        </div>
    </div>
    <div class="fv-row mb-10">
        <label class="d-block fw-semibold fs-6 mb-5">
            <span class=""> Group OG Image</span>
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
            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('@if(isset($campaign->openGraph->og_image)){{ $campaign->openGraph->og_image }}@endif');"></div>
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                <i class="bi bi-pencil-fill fs-7"></i>
                <input type="file" name="og_image" accept=".png, .jpg, .jpeg,.webp,.svg" />
                <input type="hidden" value="@if(isset($campaign->openGraph->og_image)){{ $campaign->openGraph->og_image }}@endif" name="old_og_image" />
            </label>
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                <i class="bi bi-x fs-2"></i>
            </span>
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                <i class="bi bi-x fs-2"></i>
            </span>
        </div>
        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
    </div>
</div>
