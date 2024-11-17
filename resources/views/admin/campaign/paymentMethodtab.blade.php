<div id="kt_activity_week" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_week_tab">
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="payment_CC"
                 data-modal="#cardknox_modal"
                 data-gateway="cardknox_cc"
                 data-route="{{ route('admin.getPaymentData') }}"
                 class="form-check-input loadPaymentModalByCheckBox"
                 name="gateways[cardknox_cc][status]"
                 type="checkbox"
                 value="1" {{ $payments->where('payment_method', 'cardknox_cc')->isNotEmpty() && $payments->where('payment_method', 'cardknox_cc')->first()->status === 1 ? 'checked' : '' }}>

                 <input class="form-check-input "
                 name="gateways[cardknox_cc][payment_method]"
                 value="cardknox_cc"
                 type="hidden">

            </div>
            <div class="fw-semibold">
                <label for="payment_CC">CC</label>
            </div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="payment_ACH"
                data-modal="#cardknox_modal"
                data-gateway="cardknox_ach"
                data-route="{{ route('admin.getPaymentData') }}"
                class="form-check-input loadPaymentModalByCheckBox"
                name="gateways[cardknox_ach][status]"
                type="checkbox"
                value="1" {{ $payments->where('payment_method', 'cardknox_ach')->isNotEmpty() && $payments->where('payment_method', 'cardknox_ach')->first()->status === 1 ? 'checked' : '' }}>

                <input class="form-check-input"
                name="gateways[cardknox_ach][payment_method]"
                value="cardknox_ach"
                type="hidden">
            </div>
            <div class="fw-semibold">
                <label for="payment_ACH">ACH</label>
            </div>
        </div>
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <div class="card-toolbar m-0">
                <button type="button" class="btn btn btn-dark w-100 show menu-dropdown" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <i class="fas text-white fa-credit-card "></i>  CardKnox
                </button>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3 show" data-kt-menu="true" style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-740px, 252.5px, 0px);" data-popper-placement="bottom-end">
                    <div class="menu-item px-3">
                        <button type="button" class="loadPaymentModal btn btn-dark" data-modal="#cardknox_modal" data-gateway="cardknox_cc" data-route="{{ route('admin.getPaymentData') }}">
                            <i class="fas text-white fa-credit-card "></i> CardKnox CC</button>
                    </div>
                    <div class="menu-item px-3">
                        <button type="button" class="loadPaymentModal btn btn-dark" data-modal="#cardknox_modal" data-gateway="cardknox_ach" data-route="{{ route('admin.getPaymentData') }}">
                            <i class="fas text-white fa-credit-card "></i> CardKnox ACH</button>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <hr>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="payment_banquest"
                data-modal="#banquest_modal"
                data-gateway="banquest"
                data-route="{{ route('admin.getPaymentData') }}"
                class="form-check-input loadPaymentModalByCheckBox"
                name="gateways[banquest][status]"
                type="checkbox"
                value="1" {{ $payments->where('payment_method', 'banquest')->isNotEmpty() && $payments->where('payment_method', 'banquest')->first()->status === 1 ? 'checked' : '' }}>

                <input class="form-check-input"
                name="gateways[banquest][payment_method]"
                value="banquest"
                type="hidden">
            </div>
        </div>
        <div class="fw-semibold">
            <label for="payment_banquest">Banquest</label>
        </div>

        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <button type="button" class="loadPaymentModal btn btn-primary" data-modal="#banquest_modal" data-gateway="banquest" data-route="{{ route('admin.getPaymentData') }}"> <i class="fas fa-money-check"></i>Banquest</button>
        </div>
    </div>

    <hr>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="payment_authorize"
                data-modal="#authorize_modal"
                data-gateway="authorize_net"
                data-route="{{ route('admin.getPaymentData') }}"
                class="form-check-input loadPaymentModalByCheckBox"
                name="gateways[authorize_net][status]"
                type="checkbox"
                value="1" {{ $payments->where('payment_method', 'authorize_net')->isNotEmpty() && $payments->where('payment_method', 'authorize_net')->first()->status === 1 ? 'checked' : '' }}>

                <input class="form-check-input"
                name="gateways[authorize_net][payment_method]"
                value="authorize_net"
                type="hidden">
            </div>
            <div class="fw-semibold">
                <label for="payment_authorize">Authorize.net</label>
            </div>
        </div>
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <button type="button" class="loadPaymentModal btn btn-primary" data-modal="#authorize_modal" data-gateway="authorize_net" data-route="{{ route('admin.getPaymentData') }}" class="btn btn-success">
                <i class="fas fa-credit-card"></i>Authorize.net</button>

        </div>
    </div>
    <hr>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="payment_usaePay"
                data-modal="#usaepay_modal"
                data-gateway="usaepay"
                data-route="{{ route('admin.getPaymentData') }}"
                class="form-check-input loadPaymentModalByCheckBox"
                name="gateways[usaepay][status]"
                type="checkbox"
                value="1" {{ $payments->where('payment_method', 'usaepay')->isNotEmpty() && $payments->where('payment_method', 'usaepay')->first()->status === 1 ? 'checked' : '' }}>

                <input class="form-check-input"
                name="gateways[usaepay][payment_method]"
                value="usaepay"
                type="hidden">
            </div>
            <div class="fw-semibold">
                <label for="payment_usaePay">USAePay</label>
            </div>
        </div>
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <button type="button" data-modal="#usaepay_modal" data-gateway="usaepay" data-route="{{ route('admin.getPaymentData') }}" class=" loadPaymentModal btn btn-success"> <i class="fas fa-credit-card"></i>USAePay</button>
        </div>
    </div>
    <hr>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="payment_stripe"
                data-modal="#stripe_modal"
                data-gateway="stripe"
                data-route="{{ route('admin.getPaymentData') }}"
                class="form-check-input loadPaymentModalByCheckBox"
                name="gateways[stripe][status]"
                type="checkbox"
                value="1" {{ $payments->where('payment_method', 'stripe')->isNotEmpty() && $payments->where('payment_method', 'stripe')->first()->status === 1 ? 'checked' : '' }}>
                <input class="form-check-input" name="gateways[stripe][payment_method]" value="stripe" type="hidden">
            </div>
            <div class="fw-semibold">
                <label for="payment_stripe">Stripe</label>
            </div>
        </div>
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <button type="button" data-modal="#stripe_modal" data-gateway="stripe" data-route="{{ route('admin.getPaymentData') }}" class="loadPaymentModal btn btn-primary"> <i class="bi bi-stripe"></i>Stripe</button>
        </div>
    </div>
    <hr>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="payment_paypal"
                class="form-check-input"
                data-modal="#paypal_modal"
                data-gateway="paypal"
                data-route="{{ route('admin.getPaymentData') }}"
                class="form-check-input loadPaymentModalByCheckBox"
                name="gateways[paypal][status]"
                type="checkbox"
                value="1" {{ $payments->where('payment_method', 'paypal')->isNotEmpty() && $payments->where('payment_method', 'paypal')->first()->status === 1 ? 'checked' : '' }}>

                <input class="form-check-input"
                name="gateways[paypal][payment_method]"
                value="paypal"
                type="hidden">
            </div>
            <div class="fw-semibold">
                <label for="payment_paypal">PayPal</label>
            </div>
        </div>
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <button type="button" data-modal="#paypal_modal" data-gateway="paypal" data-route="{{ route('admin.getPaymentData') }}" class="loadPaymentModal btn btn-warning"><i class="bi bi-paypal"></i>PayPal</button>
        </div>
    </div>
    <hr>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="payment_ojc_fund"
                data-modal="#ojc_fund_modal"
                data-gateway="ojc_fund"
                data-route="{{ route('admin.getPaymentData') }}"
                class="form-check-input loadPaymentModalByCheckBox"
                name="gateways[ojc_fund][status]"
                type="checkbox" value="1" {{ $payments->where('payment_method', 'ojc_fund')->isNotEmpty() && $payments->where('payment_method', 'ojc_fund')->first()->status === 1 ? 'checked' : '' }}>

                <input class="form-check-input"
                name="gateways[ojc_fund][payment_method]"
                value="ojc_fund"
                type="hidden">
            </div>
            <div class="fw-semibold">
                <label for="payment_ojc_fund">OJC Fund</label>
            </div>
        </div>
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <button type="button" data-modal="#ojc_fund_modal" data-gateway="ojc_fund" data-route="{{ route('admin.getPaymentData') }}" class="loadPaymentModal btn btn-light border"> <i class="fas fa-gift"></i> OJC Fund</button>
        </div>
    </div>
    <hr>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="payment_matbia"
                data-modal="#matbia_modal"
                data-gateway="matbia"
                data-route="{{ route('admin.getPaymentData') }}"
                class="form-check-input loadPaymentModalByCheckBox"
                name="gateways[matbia][status]"
                type="checkbox"
                value="1" {{ $payments->where('payment_method', 'matbia')->isNotEmpty() && $payments->where('payment_method', 'matbia')->first()->status === 1 ? 'checked' : '' }}>

                <input class="form-check-input"
                name="gateways[matbia][payment_method]"
                value="matbia"
                type="hidden">
            </div>
            <div class="fw-semibold">
                <label for="payment_matbia">Matbia</label>
            </div>
        </div>
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <button type="button" data-modal="#matbia_modal" data-gateway="matbia" data-route="{{ route('admin.getPaymentData') }}" class="loadPaymentModal btn btn-info border"><i class="fas fa-money-check"></i>Matbia</button>
        </div>
    </div>
    <hr>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="payment_donorsFund"
                data-modal="#donors_fund_modal"
                data-gateway="donors_fund"
                data-route="{{ route('admin.getPaymentData') }}"
                class="form-check-input loadPaymentModalByCheckBox"
                name="gateways[donors_fund][status]"
                type="checkbox"
                value="1" {{ $payments->where('payment_method', 'donors_fund')->isNotEmpty() && $payments->where('payment_method', 'donors_fund')->first()->status === 1 ? 'checked' : '' }}>

                <input class="form-check-input"
                name="gateways[donors_fund][payment_method]"
                value="donors_fund"
                type="hidden">
            </div>
            <div class="fw-semibold">
                <label for="payment_donorsFund">Donors Fund</label>
            </div>
        </div>
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <button type="button" data-modal="#donors_fund_modal" data-gateway="donors_fund" data-route="{{ route('admin.getPaymentData') }}" class="loadPaymentModal btn btn-danger"><i class="fas fa-recycle"></i>Donors Fund</button>
        </div>
    </div>
    <hr>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="payment_pledger"
                data-modal="#pledger_modal"
                data-gateway="pledger"
                data-route="{{ route('admin.getPaymentData') }}"
                class="form-check-input loadPaymentModalByCheckBox"
                name="gateways[pledger][status]"
                type="checkbox"
                value="1" {{ $payments->where('payment_method', 'pledger')->isNotEmpty() && $payments->where('payment_method', 'pledger')->first()->status === 1 ? 'checked' : '' }}>
                <input class="form-check-input"
                name="gateways[pledger][payment_method]"
                value="pledger"
                type="hidden">
            </div>
            <div class="fw-semibold">
                <label for="payment_pledger">Pledger</label>
            </div>
        </div>
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <button type="button" data-modal="#pledger_modal" data-gateway="pledger" data-route="{{ route('admin.getPaymentData') }}" class="loadPaymentModal btn btn-warning">
                <i class="fas fa-leaf"></i>Pledger
            </button>
        </div>
    </div>
    <hr>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="otherPayment"
                data-modal="#other_modal"
                data-gateway="other"
                data-route="{{ route('admin.getPaymentData') }}"
                class="form-check-input loadPaymentModalByCheckBox"
                class="form-check-input"
                name="other_payment_on"
                type="checkbox"
                value="1" {{ old('other_payment_on') ? 'checked' : '' }}>
            </div>
            <div class="fw-semibold">
                <label for="otherPayment">Other</label>
            </div>
        </div>
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <button type="button" data-bs-toggle="modal" data-bs-target="#other_modal" class="btn btn-dark"><i style="color:white;" class="fas fa-money-check text-white"></i> Other</button>
        </div>
    </div>
</div>
<script></script>
