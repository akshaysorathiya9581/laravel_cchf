{{-- ADD NEW SEASON MODAL --}}
<div class="modal fade" id="UpdateSeasonModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>New Season</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.updateSeason') }}" method="POST">
                    <div class="card-body pt-">
                        <div class="w-100">
                            <div class="fv-row mb-10">
                                @csrf
                               <input type="hidden" name="seasonId" id="seasonId">
                                <label class="form-label required">Name</label>
                                <input id="name" name="name" value="" class="form-control form-control-lg form-control-solid" value="" />
                                @if ($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label required">Start Date</label>
                                <input name="start_date" id="start_date" type="datetime-local" class="form-control form-control-lg form-control-solid" />
                                @if ($errors->has('start_date'))
                                <div class="text-danger">{{ $errors->first('start_date') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label required">End Date</label>
                                <input name="end_date" id="end_date" type="datetime-local" class="form-control form-control-lg form-control-solid" />
                                @if ($errors->has('end_date'))
                                <div class="text-danger">{{ $errors->first('end_date') }}</div>
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
        </div>
    </div>
</div>
