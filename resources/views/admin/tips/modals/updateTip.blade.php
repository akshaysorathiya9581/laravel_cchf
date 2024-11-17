{{-- UPDATE TIP MODAL --}}
<div class="modal fade" id="update_tip_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>update yinderman </h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.updateTip') }}" id="UpdateTipForm"  method="POST">
                   @csrf
                    <div class="card-body pt-">
                        <div class="w-100">
                            <div class="fv-row mb-10">
                                <input type="hidden" name="tipID" id="tipID" value="" />
                                <input type="hidden" name="campaign_id" id="EditCampaignId" value="" />
                                <label class="form-label required">Title</label>
                                <input name="title" id="editTipTitle" required class="form-control form-control-lg form-control-solid" value="" />
                                @if ($errors->has('title'))
                                <div class="text-danger">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                          
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" id="updateTip" class="btn btn-lg btn-primary" data-kt-element="type-next">
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

