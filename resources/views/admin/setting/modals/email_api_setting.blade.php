{{--  MODAL --}}
<div class="modal fade" id="email_api_setting_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>UPDATE INFORMATION</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.updateApiEmailSettings') }}" method="POST">
                    <div class="card-body pt-">
                        <div class="w-100">
                            <div class="fv-row mb-10">
                                @csrf
                                <input type="hidden" name="emailApiID" value="{{ $settings->id ?? '' }}" >
                                <label class="form-label">Api Key</label>
                                <input name="api_key"  class="form-control form-control-lg form-control-solid" value="{{ $settings->api_key ?? '' }}" />
                                @if ($errors->has('api_key'))
                                <div class="text-danger">{{ $errors->first('api_key') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label">From Email</label>
                                <input name="from_email"  type="email" value="{{ $settings->from_email ?? '' }}" class="form-control form-control-lg form-control-solid" />
                                @if ($errors->has('from_email'))
                                <div class="text-danger">{{ $errors->first('from_email') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label">From Name</label>
                                <input name="from_name" type="text" class="form-control form-control-lg form-control-solid" value="{{ $settings->from_name ?? '' }}" />
                                @if ($errors->has('from_name'))
                                <div class="text-danger">{{ $errors->first('from_name') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label">Reply To</label>
                                <input name="reply_to" type="text" class="form-control form-control-lg form-control-solid" value="{{ $settings->reply_to ?? '' }}" />
                                @if ($errors->has('reply_to'))
                                <div class="text-danger">{{ $errors->first('reply_to') }}</div>
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
