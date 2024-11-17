{{-- CHANGE TEAM MODAL --}}
<div class="modal fade" id="donation_change_team_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded" style="height: 70vh">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h3>Change Team</h3>
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
                <form action="{{ route('admin.changeDonationTeam') }}" method="POST">
                    <div class="card-body pt-" id="kt_menu_63de8accb151e">
                        @csrf
                        <input type="hidden" name="donationId" value="{{ $details->id }}" id="">
                        <div class="mb-5">
                            <label class="form-label fw-semibold">Choose Team</label>
                            <div>
                                <select class="form-select form-select-solid" name="team_id" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_63de8accb151e" data-allow-clear="true">
                                    @if (!empty($teams))
                                    @foreach ($teams as $team)
                                    {{ $selected = ''  }}
                                    @if ($team->id == $details->team_id)
                                    {{ $selected = "selected" }}
                                    @endif
                                    <option {{ $selected }} value="{{ $team->id }}">{{ $team->display_name }}</option>
                                    @endforeach
                                    @endif
                                </select>
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
