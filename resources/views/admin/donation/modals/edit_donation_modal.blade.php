{{-- EDIT DONATIOS MODAL --}}
<div class="modal fade" id="edit_donation_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>Update Donation</h2>
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
                <form action="{{ route('admin.edit_donation') }}" method="post">
                    <div class="card-body pt-">
                        @csrf
                        <div class="w-100">
                            <div class="mb-10">
                                <input type="hidden" value="{{ $details->id }}" name="donationId">
                                <label class="form-label fw-semibold">Anonymous Donor</label>
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" @if($details->is_anonymous == '1')
                                    checked
                                    @endif name="is_anonymous" />
                                    <label class="form-check-label">Enable</label>
                                </div>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Donor First Name</label>
                                <input name="donor_first_name" class="form-control form-control-lg form-control-solid" value="{{ $details->donor_first_name }}" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Donor Last Name</label>
                                <input name="donor_last_name" class="form-control form-control-lg form-control-solid" value="{{ $details->donor_last_name }}" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Donor Email</label>
                                <input name="donor_email" class="form-control form-control-lg form-control-solid" value="{{ $details->donor_email }}" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Donation USD Amount</label>
                                <input name="usd_amount" type="number" class="form-control form-control-lg form-control-solid" value="{{ $details->usd_amount }}" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Donation Amount</label>
                                <input name="amount" type="number" class="form-control form-control-lg form-control-solid" value="{{ $details->amount }}" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Tickets</label>
                                <input name="entries" class="form-control form-control-lg form-control-solid" value="@if(isset($details->entries)) {{ $details->entries }} @endif" />
                            </div>
                            {{-- {{dd($stp)}} --}}
                            <div class="fv-row mb-10">
                                <label class="form-label ">STP USD Amount</label>
                                <input name="stp_usd_amount" class="form-control form-control-lg form-control-solid" value="@if(isset($stp->stp_usd_amount)){{ $stp->stp_usd_amount }}  @endif" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">STP Amount</label>
                                <input name="stp_amount" class="form-control form-control-lg form-control-solid" value="@if(isset($stp->stp_amount)) {{ $stp->stp_amount }} @endif" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">STP Entries</label>
                                <input name="stp_entries" class="form-control form-control-lg form-control-solid" value="@if(isset($stp->stp_entries)) {{ $stp->stp_entries }} @endif" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Donor Phone</label>
                                <input name="donor_phone" class="form-control form-control-lg form-control-solid" value="{{ $details->donor_phone }}" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Donor Address</label>
                                <input name="address" class="form-control form-control-lg form-control-solid" value="{{ $details->address }}" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Donor Zipcode</label>
                                <input name="zipcode" class="form-control form-control-lg form-control-solid" value="{{ $details->zipcode }}" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Donor Street</label>
                                <input name="street" class="form-control form-control-lg form-control-solid" value="{{ $details->street }}" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Donor City</label>
                                <input name="city" class="form-control form-control-lg form-control-solid" value="{{ $details->city }}" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Donor State</label>
                                <input name="state" class="form-control form-control-lg form-control-solid" value="{{ $details->state }}" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label ">Donor Country</label>
                                <input name="country" class="form-control form-control-lg form-control-solid" value="{{ $details->country }}" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">Comments</span>

                                </label>
                                <textarea class="form-control form-control-lg form-control-solid" name="comments" cols="30" rows="5">{{ $details->comments }}</textarea>
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
