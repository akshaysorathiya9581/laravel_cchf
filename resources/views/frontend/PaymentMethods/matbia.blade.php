<div class="matbia_section payment-tab">
    <div class="form-group col-md-12 col-sm-12 paywithmtb mb-2">
      <input type="text" name="mtb_card_num" id="mtb_card_num" placeholder="Card Number"
      {{-- onKeyPress="validateNum(event)" --}}
       class="form-input">
    </div>
    <div class="form-group col-md-12 col-sm-12 paywithmtb">
      <input type="text" name="mtb_expiry" placeholder="MM/YY"
      {{-- onKeyUp="formatString(event)" --}}
       maxlength="5" id="mtb_expiry" class="form-input">
    </div>
  </div>
