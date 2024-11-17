<div class="ojc_section payment-tab" >
    <div class="form-group col-md-12 col-sm-12 paywithojc mb-2">
      <input type="text" name="ojc_card_num" id="ojc_card_num" placeholder="Card Number"
      {{-- onKeyPress="validateNum(event)" --}}
       class="form-input">
    </div>
    <div class="form-group col-md-12 col-sm-12 paywithojc">
      <input type="text" name="ojc_expiry" placeholder="MM/YY"
       {{-- onKeyUp="formatString(event)"  --}}
       maxlength="5" id="ojc_expiry" class="form-input">
    </div>
  </div>
