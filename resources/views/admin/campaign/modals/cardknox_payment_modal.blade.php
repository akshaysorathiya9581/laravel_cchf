{{-- CARDKNOX MODAL --}}
<div class="modal fade" id="cardknox_modal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>CardKnox Configurations</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" id="modalCloseCardKNox" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.updatePaymentMethodForm') }}" method="post" class="updatePaymentMethodForm">
                    <div class="card-body pt-">
                        <div class="w-100">
                            <h3>Test Account</h3>
                            <div class="fv-row mb-10">
                                <input type="hidden" class="paymentCampaignId" name="campaignId">
                                <input type="hidden" id="cardKnoxPaymentMethod" value="cardknox_cc" name="payment_method">
                                <label class="form-label ">API Key</label>
                                <input name="test_api_key" id="cardKnoxTestApiKey" class="form-control form-control-lg form-control-solid testApiKey" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">iFields Key</span>

                                </label>
                                <input name="test_public_key" id="cardKnoxTestPublicKey" class="form-control form-control-lg form-control-solid testPublicKey" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">Software Name</span>

                                </label>
                                <input name="test_pin" id="cardKnoxTestPin" class="form-control form-control-lg form-control-solid testPin" />
                            </div>
                        </div>
                        <div class="w-100">
                            <h3>Live Account</h3>
                            <div class="fv-row mb-10">
                                <label class="form-label ">API Key</label>
                                <input name="live_api_key" id="cardKnoxLiveApiKey" class="form-control form-control-lg form-control-solid liveApiKey" value="" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">iFields Key</span>

                                </label>
                                <input name="live_public_key" id="cardKnoxLivePublicKey" class="form-control form-control-lg form-control-solid livePublicKey" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="d-flex align-items-center form-label">
                                    <span class="">Software Name</span>

                                </label>
                                <input name="live_pin" id="cardKnoxLivePin" class="form-control form-control-lg form-control-solid livePin" />
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" data-modal="#authorize_modal" class="btn updatePaymentModal btn-lg btn-primary" data-kt-element="type-next">
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
<script>
    $('#modalCloseCardKNox').on('click', function() {
        let modal = $('#cardknox_modal');
        $(modal).find('.testApiKey').val('');
        $(modal).find('.testPublicKey').val('');
        $(modal).find('.testPin').val('');
        $(modal).find('.testPrivateKey').val('');
        $(modal).find('.liveApiKey').val('');
        $(modal).find('.livePublicKey').val('');
        $(modal).find('.livePin').val('');
        $(modal).find('.livePrivateKey').val('');
    });

</script>
{{-- <script>
    $(document).ready(function() {
        $('#updateCardKnoxButton').click(function() {
            let formData = new FormData($('#updateCardKnox')[0]);
            alert('{{ csrf_token() }}')
formData.append('_token', '{{ csrf_token() }}');
let action = $('#updateCardKnox').attr('action');

ajaxCall(
action, 'POST', formData,
function(response) {
Swal.fire({
text: 'CardKnox Updated',
icon: 'success',
confirmButtonText: "Ok",
buttonsStyling: false,
customClass: {
confirmButton: "btn btn-light-primary"
}
})
$('#cardknox_modal').modal('hide');
},
function(xhr, status, error) {
console.error('Error:', error);

swal.fire({
text: 'Error:' + error,
icon: "error",
buttonsStyling: false,
confirmButtonText: "Ok, got it!",
customClass: {
confirmButton: "btn btn-light-primary"
}
});
}
);
});
});
</script> --}}
