<div id="cardknox-card-element">
    <input class="form-input" type="text" name="xName" id="xName" autocomplete="cc-name"
        placeholder="Cardholder Name">
    <iframe class="placeHolder" data-ifields-id="card-number" autocomplete="nothing" data-ifields-placeholder="Card Number"
        src="https://cdn.cardknox.com/ifields/2.6.2006.0102/ifield.htm"></iframe>
    <input data-ifields-id="card-number-token" name="xCardNum" type="hidden">
    <div class=" d-flex">
        <input class="form-input expiryCard" type="text"
            style="font-size: 17px;font-weight: 600;color: var(--secondary-color);background-color: #fafafa;border: 2px solid;border-color: #ccc;border-radius: calc(infinity * 1px);outline: 0;padding: 12px 30px !important;height: 33px;width: 172px;height: 58px;margin-top: 10px;margin-right: 8px;"
            name="expiry" placeholder="MM/YY" autocomplete="off" maxlength="5" id="expiryCC">
        <div>
            <iframe data-ifields-id="cvv" class="placeHolder" data-ifields-placeholder="CVV"
                src="https://cdn.cardknox.com/ifields/2.6.2006.0102/ifield.htm"></iframe>
        </div>
    </div>
    <input data-ifields-id="cvv-token" name="xCVV" type="hidden">
    <label data-ifields-id="card-data-error" style="color: red;"></label>
</div>
