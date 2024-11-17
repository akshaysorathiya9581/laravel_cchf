{{-- UPDATE BLOG MODAL --}}
<div class="modal fade" id="update_blog_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>New Prize</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.updateBlog') }}" id="UpdateBlogForm" enctype="multipart/form-data" method="POST">
@csrf
                    <div class="card-body pt-">
                        <div class="w-100">
                            <div class="mb-10 fv-row">
                                <input type="hidden" id="EditblogId" name="blogId" value="">
                                <label class="required form-label mb-3">Seasons</label>
                                <select  id="Seasons" class="form-select form-select-solid form-select-sm" data-control="select2" data-placeholder="select season" data-hide-search="false" name="season_id">
                                </select>
                                @if ($errors->has('season_id'))
                                <div class="text-danger">{{ $errors->first('season_id') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                {{-- @if(isset($prize->id)) --}}
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                                {{-- @endif --}}
                                <label class="form-label required">Title</label>
                                <input name="title" class="form-control form-control-lg form-control-solid" id="editBlogtitle" value="" />

                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-block fw-semibold fs-6 mb-5">
                                    <span class="required"> Image</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""></i>
                                </label>

                                <div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
                                    <div id="bg_Blog_image" class="image-input-wrapper w-125px h-125px">
                                    </div>

                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change">
                                        <i class="fas fa-pencil-alt fs-7"></i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" id="OldBlogImage" name="old_image" value="" />
                                    </label>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel  ">
                                        <i class="fas fa-times fs-2"></i>
                                    </span>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove  ">
                                        <i class="fas fa-times fs-2"></i>
                                    </span>
                                </div>
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                @if ($errors->has('image'))
                                <div class="text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label required">Description</label>
                                <textarea name="description" id="blogDescription" class="area_editor form-control form-control-lg form-control-solid" cols="30" rows="10"></textarea>
                                @if ($errors->has('description'))
                                <div class="text-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-lg btn-primary" data-kt-element="type-next">
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
