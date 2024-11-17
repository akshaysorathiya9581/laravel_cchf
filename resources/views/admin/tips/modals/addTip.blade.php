{{-- ADD NEW TIP MODAL --}}
<div class="modal fade" id="add_tip_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>New Yinderman </h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.storeTip') }}" id="addTipForm"  method="POST">

                    <div class="card-body pt-">
                        <div class="w-100">
                            @csrf
                            <div class="fv-row mb-10">
                                <input type="hidden" name="campaign_id" value="{{ $campaign->id }}" />
                                <label class="form-label required">Title</label>
                                <input name="title" class="form-control form-control-lg form-control-solid"  value="{{ old('title') }}" />
                                @if ($errors->has('title'))
                                    <div class="text-danger">{{ $errors->first('title') }}</div>
                                @endif
                            </div> 
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-lg btn-primary" >
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
