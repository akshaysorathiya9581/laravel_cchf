<div class="pledger_section payment-tab">
    <div class="form-group col-md-12 col-sm-12 paywithplg mb-2">
        <input type="text" name="plg_card_num" id="plg_card_num" placeholder="Card Number" onKeyPress="validateNum(event)" class="form-input">
    </div>
    <div class="form-group col-md-12 col-sm-12 paywithplg mb-2">
        <input type="text" name="plg_expiry" placeholder="MM/YY"
         {{-- onKeyUp="formatString(event)" --}}
          maxlength="5" id="plg_expiry" class="form-input">
    </div>
    <div class="form-group col-md-12 col-sm-12 paywithplg">
        <input type="text" name="plg_cvv" placeholder="CVV" onKeyUp="validateNum(event)" maxlength="5" id="plg_cvv" class="form-input">
    </div>
</div>
