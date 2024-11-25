{{-- UPDATE MEDIA MODAL --}}
<div class="modal fade" id="update_media_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="margin: 12px;min-width: calc(100% - 20px);">
        <div class="modal-content modal-rounded">
            <div class="modal-header d-flex justify-content-between" style="padding: 12px 14px 8px 18px;">
                <h2>Update Media</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <form action="{{ route('media.save') }}" id="frm-update-media" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body scroll-y m-3" style="max-height: 70vh;overflow: auto;">
                    <div class="card-body pt-">
                        <div class="w-100">
                            <div class="mb-10 fv-row">
                                <input type="hidden" id="editMediaId" name="mediaId" value="">
                                <label class="required form-label mb-3">Seasons</label>
                                <select id="seasons" class="form-select form-select-solid form-select-sm" data-control="select2" data-placeholder="select season" data-hide-search="false" name="season_id">
                                    @foreach ($seasons as $season)
                                        <option value="{{ $season->id }}">{{ $season->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="fv-row row mb-10">
                                <div class="col-md-6">
                                    <label class="form-label required">Publish Date</label>
                                    <input type="date" name="publish_date" id="publishDate" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control form-control-lg form-control-solid" />
                                </div>
                                <div class="col-md-6">
                                    {{-- @if(isset($prize->id)) --}}
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                                    {{-- @endif --}}
                                    <label class="form-label required">Title</label>
                                    <input name="title" class="form-control form-control-lg form-control-solid" id="editMediatitle" value="" />
                                </div>
                            </div>

                            <div class="fv-row row mb-10">
                                <div class="col-md-6">
                                    <label class="form-label">Author</label>
                                    <input name="author" class="form-control form-control-lg form-control-solid" id="editMediaauthor" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Video Link</label>
                                    <input name="video_link" class="form-control form-control-lg form-control-solid" id="videoLink" />
                                </div>
                            </div>

                            <div class="fv-row mb-10">
                                <label class="d-block fw-semibold fs-6 mb-5">
                                    <span class=""> Image</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""></i>
                                </label>

                                <div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
                                    <div id="bg_Media_image" class="image-input-wrapper w-125px h-125px">
                                    </div>

                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change">
                                        <i class="fas fa-pencil-alt fs-7"></i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" id="OldMediaImage" name="old_image" value="" />
                                    </label>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel  ">
                                        <i class="fas fa-times fs-2"></i>
                                    </span>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove  ">
                                        <i class="fas fa-times fs-2"></i>
                                    </span>
                                </div>
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label">Description</label>
                                <textarea name="description" id="mediaDescription" class="description_editor form-control form-control-lg form-control-solid" cols="30" rows="10"></textarea>
                                @if ($errors->has('description'))
                                <div class="text-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-body" style="text-align: right">
                    <button type="submit" class="btn btn-submit btn-lg btn-primary" data-kt-element="type-next">
                        <span class="indicator-label">Submit</span>
                    </button>
                </div>
            </form>
            <!--begin::Modal body-->
        </div>
    </div>
</div>
