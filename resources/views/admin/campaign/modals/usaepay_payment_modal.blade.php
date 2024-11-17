
{{-- USAEPAY MODAL --}}
<div class="modal fade" id="usaepay_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>USAePay Configurations</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">

                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.updatePaymentMethodForm') }}" method="post"  class="updatePaymentMethodForm">
                    <div class="card-body pt-">

                        <div class="w-100">
                            <h3>Test Account</h3>
                            <div class="fv-row mb-10">
                                <input type="hidden" class="paymentCampaignId" name="campaignId">
                                <input type="hidden" value="usaepay" name="payment_method">
                                <label class="form-label ">API Key</label>
                                <input name="test_api_key" class="testApiKey form-control form-control-lg form-control-solid" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">Public Key</span>

                                </label>
                                <input name="test_public_key" class="testPublicKey  form-control form-control-lg form-control-solid" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">Pin</span>

                                </label>
                                <input name="test_pin" class="testPin form-control form-control-lg form-control-solid" />
                            </div>


                        </div>
                        <div class="w-100">
                            <h3>Live Account</h3>
                            <div class="fv-row mb-10">
                                <label class="form-label ">API Key</label>
                                <input name="live_api_key" class="liveApiKey form-control form-control-lg form-control-solid" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">Public Key</span>

                                </label>
                                <input name="live_public_key" class="livePublicKey form-control form-control-lg form-control-solid" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">Pin</span>

                                </label>
                                <input name="live_pin" class="livePin form-control form-control-lg form-control-solid" />
                            </div>


                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" data-modal="#usaepay_modal" class="btn updatePaymentModal btn-lg btn-primary" data-kt-element="type-next">
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
