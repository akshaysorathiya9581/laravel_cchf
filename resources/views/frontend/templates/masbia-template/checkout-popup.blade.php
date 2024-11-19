
<div class="cart">
    <button class="cart-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCart" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="11.357" height="7.071" viewBox="0 0 11.357 7.071">
            <g id="arrow" transform="translate(521.671 -394.929) rotate(90)">
                <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2" transform="translate(400.586 517.385) rotate(-135)" fill="currentColor" />
                <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2" transform="translate(402 516.014) rotate(135)" fill="currentColor" />
            </g>
        </svg>
    </button>
    <button type="button" class="drag-icon" data-bs-toggle="collapse" data-bs-target="#collapseCart" aria-expanded="false">
        <span></span>
    </button>
    <div class="cart__inner">
        <div class="container-lg g-0">
            <div class="cart__summary">
                <div class="d-flex gap-5">
                    <div class="selected-tickets">
                        {{-- <h3 class="cart__title js-cart-summary-amount"></h3> --}}
                        <div class="cart__summary-block gap-3 gap-md-5">
                            <p class="cart__team"> </p>
                            <div class="cart__subtitle-wrapper">
                                <p class="cart__subtitle--discounted"></p>
                                <p class="cart__subtitle"></p>
                            </div>
                            <ul class="cart__summary-list"></ul>
                        </div>
                    </div>

                    <div class="selected-gifts">
                        <h3 class="cart__title"></h3>
                        <ul class="cart__summary-list">
                        </ul>
                    </div>

                    <div class="selected-tips">
                        <div class="d-flex">
                            <h3 class="cart__title"></h3> &nbsp;<h3 id="total-tips-amount" > </h3>
                        </div>
                        <ul class="cart__summary-list">
                        </ul>
                    </div>

                    <div class="selected-pot-prizes">
                        <h3 class="cart__title pot-section-title"></h3>
                        <p class="pot-entries-count"></p>
                        <ul class="cart__summary-list pot-prizes-count"></ul>
                    </div>
                </div>

                <div class="cart__summary-btn">
                    {{-- <a id="gift-btn" href="javascript:;" class="btn btn--gray overlay">Choose Gift</a> --}}
                    @if($campaign->meta->allow_tip === 1)
                    <a id="donateNow" href="#" class="btn btn--gray overlay">Support Yungerleit</a>
                    @endif
                    <button id="summaryCheckoutBtn" class="btn checkout-btn overlay" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCart" aria-expanded="false">
                        <span>Checkout</span>
                        <span class="divider"></span>
                        <span class="checkout-btn__amount" id="pop_checkout_1"></span>
                    </button>
                </div>
            </div>

            <div class="cart-mobile__summary">
                <div class="cart-mobile__summary-inner">
                    <div>
                        <div class="js-cart-summary-amount summary-amount"></div>

                        <div class="items-quantity">
                            <div class="item-quantity">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9.653" viewBox="0 0 14 9.653">
                                    <path id="voucher" d="M23.936,94.025a.858.858,0,0,0,.73-.851v-.548a1.294,1.294,0,0,0-1.293-1.293H16.54v.215a.431.431,0,1,1-.862,0v-.215H11.96a1.294,1.294,0,0,0-1.293,1.293v.548a.858.858,0,0,0,.73.851,2.155,2.155,0,0,1,0,4.268.858.858,0,0,0-.73.852v.548a1.294,1.294,0,0,0,1.293,1.293h3.719v-.215a.431.431,0,1,1,.862,0v.215h6.834a1.294,1.294,0,0,0,1.293-1.293v-.548a.858.858,0,0,0-.73-.851,2.155,2.155,0,0,1,0-4.268ZM16.54,98.1a.431.431,0,1,1-.862,0V97.093a.431.431,0,1,1,.862,0Zm0-2.873a.431.431,0,1,1-.862,0V94.22a.431.431,0,1,1,.862,0Z" transform="translate(-10.667 -91.333)" fill="currentColor" />
                                </svg>
                                <p class="item-quantity__title entry-quantity"></p>
                            </div>
                            <div class="item-quantity">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14">
                                    <defs>
                                        <clipPath id="clip-path">
                                            <path id="Path_72" data-name="Path 72" d="M0,0H14V14H0Z" fill="none" />
                                        </clipPath>
                                    </defs>
                                    <g id="trophy" clip-path="url(#clip-path)">
                                        <path id="Path_71" data-name="Path 71" d="M0,.75A.75.75,0,0,1,.75,0H3.635L3.69,0h6.621l.054,0H13.25A.75.75,0,0,1,14,.75V3.635a3.635,3.635,0,0,1-3.2,3.609A4.006,4.006,0,0,1,7.75,9.93V12.5h2.615a.75.75,0,0,1,0,1.5H3.635a.75.75,0,0,1,0-1.5H6.25V9.93A4.006,4.006,0,0,1,3.2,7.244,3.635,3.635,0,0,1,0,3.635ZM2.885,5.634V1.5H1.5V3.635A2.135,2.135,0,0,0,2.885,5.634ZM11.115,1.5V5.634a2.135,2.135,0,0,0,1.385-2V1.5Z" fill="currentColor" fill-rule="evenodd" />
                                    </g>
                                </svg>
                                <p class="item-quantity__title prizes-quantity"></p>
                            </div>
                            <div class="item-quantity hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14.133" viewBox="0 0 14 14.133">
                                    <g id="Group_38" data-name="Group 38" transform="translate(-52 330)">
                                        <path id="Path_18" data-name="Path 18" d="M16.074,5.728H14.555a1.914,1.914,0,0,0-.025-1.672,1.937,1.937,0,0,0-3.285-.268L10.111,5.327,8.979,3.79a1.937,1.937,0,0,0-3.285.265,1.916,1.916,0,0,0-.027,1.674H4.145A1.036,1.036,0,0,0,3.112,6.767v1.1A1.031,1.031,0,0,0,4.145,8.9H16.074a1.036,1.036,0,0,0,1.038-1.032v-1.1A1.041,1.041,0,0,0,16.074,5.728Zm-3.89-1.249a.769.769,0,0,1,1.3.107.773.773,0,0,1-.678,1.124l-1.54.01Zm-5.449.1a.769.769,0,0,1,1.3-.1l.913,1.24L7.415,5.71A.772.772,0,0,1,6.735,4.583Z" transform="translate(48.888 -333)" fill="currentColor" />
                                        <path id="Path_19" data-name="Path 19" d="M4.787,20.359A1.713,1.713,0,0,0,6.5,22.068h8.6a1.713,1.713,0,0,0,1.715-1.709V15H4.787Z" transform="translate(48.199 -337.935)" fill="currentColor" />
                                    </g>
                                </svg>
                                <p class="item-quantity__title gifts-quantity"></p>
                            </div>

                            <div class="item-quantity hidden">
                                <svg viewBox="0 0 64 67" width="14" height="18.133" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_398_17)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M61.956 14.7961C61.948 14.8021 61.95 14.8081 61.941 14.8141C60.759 15.6251 59.984 16.9851 59.984 18.5271C59.984 19.2261 60.145 19.8871 60.43 20.4771C62.171 23.9381 64 29.1141 64 36.7651C64 45.9861 60.039 53.0321 53.719 57.6461L55.733 61.0611C56.285 61.9991 55.958 63.1971 55.001 63.7381C54.044 64.2791 52.821 63.9581 52.269 63.0201L50.347 59.7581C45.15 62.5441 38.827 63.9951 32 63.9951C25.173 63.9951 18.85 62.5441 13.654 59.7581L11.732 63.0201C11.18 63.9571 9.957 64.2781 9 63.7371C8.043 63.1961 7.716 61.9981 8.268 61.0601L10.281 57.6451C3.961 53.0311 0 45.9851 0 36.7651C0 29.1141 1.829 23.9391 3.57 20.4771C3.854 19.8871 4.016 19.2261 4.016 18.5271C4.016 16.9851 3.241 15.6251 2.059 14.8141C2.05 14.8081 2.052 14.8021 2.044 14.7961C0.736 13.9241 0 12.9821 0 11.9961C0 9.54212 4.436 7.35112 11.396 5.88412C10.41 7.25012 9.851 8.66612 9.812 10.0371C7.552 10.6401 6.196 11.3421 6.033 12.0951C6.378 14.2581 17.858 15.9961 32 15.9961C46.138 15.9961 57.614 14.2591 57.967 12.0971C57.8 11.3191 56.354 10.5961 53.963 9.97812C53.823 8.35512 52.757 6.84112 51.06 5.56912C58.911 7.02712 64 9.36312 64 11.9961C64 12.9821 63.264 13.9241 61.956 14.7961ZM51.902 10.9561C51.15 13.5561 46.723 14.0911 41.807 12.8701C41.389 12.7661 40.985 12.6501 40.589 12.5281C41.486 11.5381 41.999 10.3541 41.999 8.99612C41.999 6.89412 40.771 5.21312 38.779 4.02212C40.376 3.93512 42.243 4.13812 44.191 4.62212C49.109 5.84212 52.653 8.35612 51.902 10.9561ZM40 8.99612C40 12.1481 35.522 13.9961 30 13.9961C27.786 13.9961 25.747 13.6941 24.09 13.1361C24.178 13.0881 24.266 13.0451 24.353 12.9951C28.642 10.5591 31.537 7.19612 31.688 4.06112C36.405 4.40012 40 6.17312 40 8.99612ZM23.474 11.0831C18.741 13.8441 13.989 14.4831 12.429 11.7531C10.869 9.02312 13.792 5.18412 18.526 2.42312C23.259 -0.337879 28.011 -0.976879 29.571 1.75312C31.131 4.48312 28.208 8.32212 23.474 11.0831Z" fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_398_17">
                                            <rect width="64" height="67" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <p class="item-quantity__title pot-quantity"></p>
                            </div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="cart-mobile__summary-btns">
                        <button id="detailsSummaryBtnMobile" type="button" class="btn details-btn">Details</button>
                        <button id="checkoutSummaryBtnMobile" type="button" class="btn mobile-checkout-btn overlay" data-bs-toggle="collapse" data-bs-target="#collapseCart" aria-expanded="false">
                            <span>Checkout</span>
                            <span class="checkout-btn__amount" id="pop_checkout_2"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="collapse all-fields" id="collapseCart">
                <div class="cart__content">
                    {{-- <h2 class="cart__heading"></h2> --}}
                    <h3 class="cart_donation-total js-cart-summary-amount"></h3>
                    <div class="checkout-form">
                        <form action="{{ route('payment.process', ['campaign' => $campaign->id]) }}" method="POST" id="payment-form">
                            <div class="bill-content">
                                <div class="user-auth-btn">
                                    <a href="#" class="btn btn--green">Log in</a>
                                    <a href="#" class="btn btn--green-transparent">Continue as a guest</a>
                                </div>
                                <h6 class="info-title">Personal Information <span></span></h6>
                                <div class="custom-form">
                                    <div class="form-group">
                                        <input type="text" placeholder="First Name" id="donor_first_name" value="" name="donor_first_name" class="form-control">
                                        @if ($errors->has('donor_first_name'))
                                        <span class="text-danger">{{ $errors->first('donor_first_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="last Name" id="donor_last_name" value="" name="donor_last_name" class="form-control">
                                    </div>
                                    <div class="form-group full-width">
                                        <input type="text" placeholder="Company" id="donor_company" value="" name="donor_company" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" id="donor_email" value="" name="donor_email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" placeholder="Phone Number" value="" id="donor_phone" name="donor_phone" class="form-control">
                                    </div>
                                </div>
                                <div class="custom-checkbox">
                                    <input type="checkbox" value="1" name="is_anonymous" class="form-check-input" id="donate-anonymously">
                                    <label class="form-check-label" for="donate-anonymously">Donate Anonymously*</label>
                                </div>
                                <h6 class="info-title">Billing Info <span></span></h6>
                                <div class="custom-form">
                                    <div class="form-group full-width">
                                        <input type="text" class="form-control" value="" placeholder="Enter your Address" name="address" id="address">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="City" value="" name="city" id="city" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="State" value="" name="state" id="state" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Zip / Postalcode" value="" name="zipcode" id="zipcode" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Country" value="" name="country" id="country" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <h6 class="info-title info-title--bill">Payment Info <span></span></h6>
                                <div>
                                    @include('frontend.templates.masbia-template.PaymentMethods.payment_methods')
                                    <input type="hidden" id="donate_amount" name="amount" value="">
                                    <input type="hidden" id="only_donation" value="">
                                    <input type="hidden" id="currency" name="currency" value="usd">
                                    <input type="hidden" name="anonymousDonation" id="anonymousDonation" value="0">
                                    <input type="hidden" name="teamId" id="teamId" value="">
                                    <input type="hidden" name="teamName" id="teamName" value="">
                                    <input type="hidden" id="usd_amount" name="usd_amount" value="">
                                    <input type="hidden" id="environment" name="environment" value="{{ config('app.payment_env') }}">
                                    <input type="hidden" name="ticket_option_id" id="pricing_options" value="">
                                    <input type="hidden" name="tips" id="tipsInput">
                                    <input type="hidden" id="tipsAmount">
                                    <input type="hidden" id="season_id" name="season_id" value="{{ $campaign->season_id }}">
                                    <input type="hidden" id="letter_amount" name="letter_amount">
                                    <input type="hidden" id="recognition_amount" name="recognition_amount">
                                    <input type="hidden" id="donation_masbia_details" name="donation_masbia_details" value="">
                                    {{-- <div class="hiddenFields">
                                        <input type="hidden" id="address" name="address">
                                        <input type="hidden" id="street" name="street">
                                        <input type="hidden" id="neighbor" name="neighbor">
                                        <input type="hidden" name="paidbyid" id="paidbyid" value="0">
                                        <input type="hidden" name="teamSlugId" id="teamSlugId" value="">
                                        <input type="hidden" name="paidby" id="paidby" value="0">
                                        <input type="hidden" name="ccid" id="ccid" value="0">
                                        <input type="hidden" name="isRec" id="isRec" value="0">
                                        <input type="hidden" name="couponID" id="couponID" value="0">
                                        <input type="hidden" name="recurring_type" value="No">
                                        <input type="hidden" id="recurring_cycle" name="recurring_cycle" value="0">
                                        <input type="hidden" name="donate_amount" id="donate_amount" value="518">
                                        <input type="hidden" name="usd_amount" id="usd_amount" value="518">
                                        <input type="hidden" name="sponsor_oppertunity" id="sponsor_oppertunity" value="">
                                        <input type="hidden" name="anonymousDonation" id="anonymousDonation" value="0">
                                        <input type="hidden" name="prize_split_amount" id="prize_split_amount" value="18">
                                        <input type="hidden" name="prize_split_usd_amount" id="prize_split_usd_amount"  value="18">
                                        <input type="hidden" name="prize_split_entries" id="prize_split_entries" value="1">  -->
                                    </div> --}}
                                    <!-- <input type="hidden" name="multi_currency" id="multi_currency" value="1">
                                    <input type="hidden" name="userAction" value="causeDonation">

                                    <input type="hidden" name="cause_name" id="cause_name" value="Camp Testing">
                                    <input type="hidden" name="visitorID" id="visitorID" value="f91936ed-6c08-48bd-8d7f-36969da5802c">
                                    <input type="hidden" name="baseURL" id="baseURL" value="https://100kgoral.org/admin">
                                    <input type="hidden" name="teamId" id="teamId" value="6835">
                                    <input type="hidden" name="teamSlugId" id="teamSlugId" value="">
                                    <input type="hidden" name="teamName" id="teamName" value="">
                                    <input type="hidden" name="teamSlug" id="teamSlug" value="">
                                    <input type="hidden" name="raffleslug" id="raffleslug" value="camptest"> -->
                                    <input type="hidden" name="campaing_id" id="campaing_id" value="{{ $campaign->id }}">
                                    <input type="hidden" name="pay_with" id="pay_with" value="@if ($payment_gateways->count() > 0) {{ $payment_gateways[0]['payment_method'] }} @endif">
                                    {{--  --}}
                                    @if ($campaign->meta->multi_currency == 1)
                                    <div class="currency-changer" style="display: flex;">
                                        <p class="d-inline">Pay in</p>
                                        <div class="select-wrapper">
                                            <select class="form-input" id="donate_currency" name="donate_currency" fdprocessedid="d6c3tn">
                                                <option value="USD" selected="">$ (USD) </option>
                                                <option value="CAD">C$ (CAD)</option>
                                                <option value="GBP">£ (GBP)</option>
                                                <option value="EUR">€ (EUR)</option>
                                                <option value="ILS">₪ (ILS)</option>
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    {{--  --}}
                                    <div class="form-check processing-fee" style="display: none;">
                                        @if ($campaign->meta->allow_fee == 1)
                                        <input class="form-check-input" type="checkbox" id="process_fee_check" name="process_fee_check" value="1">
                                        <label class="form-check-label" for="process_fee_check">
                                            <span id="process_fee">Add $
                                                155.40 to your payment to cover the 30% credit card
                                                processing
                                                fee</span>
                                        </label>
                                        @endif
                                        <input type="hidden" name="don_process_fee" id="don_process_fee" value="0">
                                        <input type="hidden" name="fee_percentage" id="fee_percentage" value="0">
                                        <input type="hidden" name="don_allow_fee" id="don_allow_fee" value="0">
                                    </div>
                                    {{--  --}}
                                    @if ($campaign->meta->is_recurring == 1)
                                        <div class="form-check recurring-option">
                                            <input class="form-check-input" type="checkbox" id="don_recurring" name="don_recurring" value="1" onclick="makeRecurring()">
                                            <label class="form-check-label" for="don_recurring">
                                                Pay in Installments
                                            </label>
                                        </div>
                                    @endif
                                    <div class="rec_btns" style="display:none;">
                                        <div class="rec_options mt-2">
                                            <p class="d-inline"> Split <span id="rec_amount_full">$518</span>
                                                over
                                                <input type="number" value="0" class="custom-select d-inline p-1" id="custom_recurring_cycle" name="recurring_intervals" onkeypress="validateNum(event)"> /
                                                <select name="recurring" id="recurring_interval" class="recurring-interval" fdprocessedid="dgamao">
                                                    <option value="Monthly">Months</option>
                                                    <option value="Weekly">Weeks</option>
                                                    <option value="Daily">Days</option>
                                                </select>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="grecaptcha-badge" data-style="bottomright">
                                        <div class="grecaptcha-logo"><iframe title="reCAPTCHA" width="256" height="60" role="presentation" name="a-dlpsdpl12kb" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfF4ikpAAAAAHlmS9WnkN5udzau-S0S7ZhA9hSJ&amp;co=aHR0cHM6Ly8xMDBrZ29yYWwub3JnOjQ0Mw..&amp;hl=en&amp;v=rKbTvxTxwcw5VqzrtN-ICwWt&amp;size=invisible&amp;cb=fp188cexjcq0"></iframe>
                                        </div>
                                        <div class="grecaptcha-error"></div>
                                        <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                    </div>
                                    <iframe style="display: none;"></iframe>
                                    <div class="seprator"></div>
                                    <div class="custom-checkbox">
                                        <input type="checkbox" value="1" name="" class="form-check-input" id="">
                                        <label class="form-check-label" for="">Add $3.00 to your payment to cover the 3% credit 
                                            card processing fee</label>
                                    </div>
                                    <div class="custom-checkbox">
                                        <input type="checkbox" value="1" name="" class="form-check-input" id="">
                                        <label class="form-check-label" for="">Pay in Installments</label>
                                    </div>
                                    <button class="btn btn--green" type="submit">
                                        <span class="standard_checkout">Checkout</span>
                                        {{-- <span class="standard_checkout divider"></span> --}}
                                        {{-- <span class="standard_checkout checkout-btn__amount" id="pop_checkout_3"></span> --}}
                                        {{-- <span class="other_checkout" id="other_checkout" style="display: none"></span> --}}
                                    </button>
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
