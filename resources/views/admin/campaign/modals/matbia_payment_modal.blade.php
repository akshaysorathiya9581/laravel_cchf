{{-- MATBIA MODAL --}}
<div class="modal fade" id="matbia_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>Matbia Configurations</h2>
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
                <form action="{{ route('admin.updatePaymentMethodForm') }}"  method="post"  class="updatePaymentMethodForm">
                    <div class="card-body pt-">

                        <div class="w-100">
                            <h3>Test Account</h3>
                            <div class="fv-row mb-10">
                                <input type="hidden" class="paymentCampaignId" name="campaignId">
                                <input type="hidden" value="matbia" name="payment_method">
                                <label class="form-label ">API Token</label>
                                <input name="test_api_key" class="testApiKey form-control form-control-lg form-control-solid" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">Org. Tax ID</span>

                                </label>
                                <input name="test_pin" class="testPin form-control form-control-lg form-control-solid" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">Org. Email</span>

                                </label>
                                <input name="test_public_key" class="testPublicKey form-control form-control-lg form-control-solid" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">Org. Name</span>
                                </label>
                                <input name="test_private_key" class="testPrivateKey form-control form-control-lg form-control-solid" value="" />
                            </div>

                        </div>

                        <div class="w-100">
                            <h3>Live Account</h3>
                            <div class="fv-row mb-10">
                                <label class="form-label ">API Token</label>
                                <input name="live_api_key" class="liveApiKey form-control form-control-lg form-control-solid" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">Org. Tax ID</span>

                                </label>
                                <input name="live_pin" class="livePin form-control form-control-lg form-control-solid" value=""/>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">Org. Email</span>
                                </label>
                                <input name="live_public_key" class="livePublicKey form-control form-control-lg form-control-solid" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">Org. Name</span>
                                </label>
                                <input name="live_private_key" class="livePrivateKey form-control form-control-lg form-control-solid" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" data-modal="#matbia_modal" class="btn btn-lg btn-primary updatePaymentModal"  data-kt-element="type-next">
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
