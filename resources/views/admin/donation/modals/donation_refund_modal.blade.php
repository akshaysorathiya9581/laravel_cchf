{{-- REFUND DONATION  --}}
<div class="modal fade" id="donation_refund_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-3 d-flex justify-content-between">
                <h2>Refund Donation</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.refundDonation') }}" method="POST">
                    <div class="card-body">
                        @csrf
                        <div class="w-100">
                            <div class="mb-7">
                                <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                    <input type="hidden" name="donationId" value="{{ $details->id }}">
                                    <span
                                        class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                        <input id="online_donation" class="form-check-input"
                                            @if ($details->type != 'offline') {{ 'checked' }} @endif type="radio"
                                            name="type" value="online">
                                    </span>
                                    <div class="fw-semibold mt-2 ms-3">
                                        <label for="online_donation">Online</label>
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <span
                                        class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                        <input id="offline_donation" class="form-check-input"
                                            @if ($details->type == 'offline') {{ 'checked' }} @endif type="radio"
                                            name="type" value="offline">
                                    </span>
                                    <div class="fw-semibold mt-2 ms-3">
                                        <label for="offline_donation">Offline</label>
                                    </div>
                                </div>
                            </div>

                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="required">Amount</span>
                                </label>
                                <input type="number" name="total_amount" id="total_amount"
                                    value="{{ $details->amount }}" />
                                @if ($errors->has('refund_notes'))
                                    <div class="text-danger">{{ $errors->first('refund_notes') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="required">Refund Notes</span>
                                </label>
                                <textarea class="form-control form-control-lg form-control-solid" name="refund_notes" cols="30" rows="10">{{ $details->refund_notes }}</textarea>
                                @if ($errors->has('refund_notes'))
                                    <div class="text-danger">{{ $errors->first('refund_notes') }}</div>
                                @endif
                            </div>
                            <div class="mb-7">
                                <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                    <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px">
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                        <input id="confirm_refund" class="form-check-input" name="refund_confirm"
                                            type="checkbox" value="1">
                                    </div>

                                    <input type="hidden" name="payment_method" id="payment_method"
                                        value="{{ $details->payment_gateway }}" />
                                    <input type="hidden" name="transaction_type" id="transaction_type"
                                        value="{{ $details->recurring }}" />
                                    <input type="hidden" name="txn_id" id="txn_id"
                                        value="{{ $details->transaction_id }}" />
                                    <input type="hidden" name="subs_id" id="subs_id"
                                        value="{{ $details->subscription_id }}" />
                                    <input type="hidden" name="campaign_id" id="campaign_id"
                                        value="{{ $details->campaign->id }}" />
                                    <input type="hidden" name="donCurrency" id="donCurrency"
                                        value="{{ $details->currency }}" />


                                    <?php if ($details->pay_with != 'offline') { ?>
                                    <input type="hidden" name="PayCusID" id="PayCusID"
                                        value="{{ $details->pay_cus_id }}" />
                                    <?php } ?>
                                    <div class="fw-semibold">
                                        <label for="confirm_refund"> I confirm that the amount has been refunded on the
                                            payment gateway </label>
                                    </div>
                                </div>
                                @if ($errors->has('refund_confirm'))
                                    <div class="text-danger">{{ $errors->first('refund_confirm') }}</div>
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

@yield('script')
