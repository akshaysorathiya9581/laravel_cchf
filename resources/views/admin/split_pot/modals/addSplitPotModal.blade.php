{{-- ADD NEW TEAM MODAL --}}
<div class="modal fade" id="add_stp_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>Add STP</h2>
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
                <form action="{{ route('admin.storeSTP') }}" method="POST">
                    <div class="card-body pt-">
                        <div class="w-100 mb-10">
                            @csrf
                           <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                            <label class="form-label required">Title</label>
                            <input name="title" type="text" class="form-control form-control-lg form-control-solid" value="{{ old('title') }}" />
                            @if ($errors->has('title'))
                            <div class="text-danger">{{ $errors->first('title') }}</div>
                            @endif
                        </div>


                        <div class="w-100 mb-10">
                            <label class="form-label required">Amount</label>
                            <input name="amount" type="number" class="form-control form-control-lg form-control-solid" value="{{ old('amount') }}" />
                            @if ($errors->has('amount'))
                            <div class="text-danger">{{ $errors->first('amount') }}</div>
                            @endif
                        </div>
                        <div class="w-100 mb-10">
                            <label class="form-label required">Entries</label>
                            <input name="entries" type="number" class="form-control form-control-lg form-control-solid" value="{{ old('entries') }}" />
                            @if ($errors->has('entries'))
                            <div class="text-danger">{{ $errors->first('entries') }}</div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-lg btn-primary" data-kt-element="type-next">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        </div>

                    </div>

                </form>
            </div>
            <!--begin::Modal body-->
        </div>
    </div>
</div>
