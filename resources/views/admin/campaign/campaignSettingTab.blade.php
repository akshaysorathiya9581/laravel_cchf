
<div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab">
    <div class="mb-7 mt-4">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="goalAmountCheckbox" class="form-check-input" name="show_goal" type="checkbox" value="1" @if(isset($campaign->meta->show_goal) && $campaign->meta->show_goal == '1') checked @endif>
            </div>
            <div class="fw-semibold">
                <label for="goalAmountCheckbox">Goal</label>
            </div>
        </div>
        <div id="goalAmountInput" class="d-flex flex-column mb-b mt-4 fv-row @if(!isset($campaign->meta->show_goal) || $campaign->meta->show_goal != '1') d-none @endif">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="">Goal Amount</span>
            </label>
            <input type="number" class="form-control form-control-solid" name="goal" value="{{ isset($campaign->meta->goal) ? $campaign->meta->goal : '0' }}" />
        </div>



    </div>
    <div class="mb-7 mt-4">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="bonusGoalAmountCheckbox" class="form-check-input" name="bonus_goal" type="checkbox" value="1" @if(isset($campaign->meta->bonus_goal) && $campaign->meta->bonus_goal == '1') checked @endif>
            </div>
            <div class="fw-semibold">
                <label for="bonusGoalAmountCheckbox">Bonus Goal</label>
            </div>
        </div>
        <div id="BonusgoalAmountInput" class="d-flex flex-column mb-b mt-4 fv-row @if(!isset($campaign->meta->bonus_goal) || $campaign->meta->bonus_goal != '1') d-none @endif">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="">Bonus Goal Amount</span>
            </label>
            <input type="number" class="form-control form-control-solid" name="bonus_amount" value="{{ isset($campaign->meta->bonus_amount) ? $campaign->meta->bonus_amount : '' }}" />
        </div>
    </div>


    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="enableGifts" class="form-check-input" name="enable_gifts" type="checkbox" value="1" @if(isset($campaign->meta->enable_gifts) && $campaign->meta->enable_gifts == '1') checked @endif>

            </div>
            <div class="fw-semibold">
                <label for="enableGifts">Enable Gift</label>
            </div>
        </div>
    </div>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="endDate" class="form-check-input" name="show_end_date" type="checkbox" value="1" @if(isset($campaign->meta->show_end_date) && $campaign->meta->show_end_date == '1') checked @endif>

            </div>
            <div class="fw-semibold">
                <label for="endDate">End Date</label>
            </div>
        </div>
        <div id="endDateInput" class="d-flex flex-column mb-b mt-4 fv-row @if(!isset($campaign->meta->show_end_date) || $campaign->meta->show_end_date != '1') d-none @endif">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="">End Date</span>
            </label>
            <input type="datetime-local" class="form-control form-control-solid" value="{{ isset($campaign->meta->end_date) ? $campaign->meta->end_date : '' }}" name="end_date" />
        </div>

    </div>
    <div class="mb-7 mt-4">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="ExtendDate" class="form-check-input" name="is_extented" type="checkbox" value="1" @if(isset($campaign->meta->is_extented) && $campaign->meta->is_extented == '1') checked @endif>
            </div>
            <div class="fw-semibold">
                <label for="ExtendDate">Extend Date</label>
            </div>
        </div>
        <div id="ExtendDateInput" class="d-flex flex-column mb-b mt-4 fv-row @if(!isset($campaign->meta->is_extented) || $campaign->meta->is_extented != '1') d-none @endif">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="">Extend Date</span>
            </label>
            <input type="datetime-local" class="form-control form-control-solid" name="extend_date" value="{{ isset($campaign->meta->extend_date) ? $campaign->meta->extend_date : '' }}" />
        </div>
    </div>

    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="CountDown" class="form-check-input" name="count_down" type="checkbox" value="1" @if(isset($campaign->meta->count_down) && $campaign->meta->count_down == '1') checked @endif>
            </div>
            <div class="fw-semibold">
                <label for="CountDown">Countdown</label>
            </div>
        </div>
    </div>

    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                <input id="menuFixed" class="form-check-input" type="radio" name="menuPosition" value="fixed" @if(!isset($campaign->meta->menuPosition) || $campaign->meta->menuPosition != 'floating') checked @endif>
            </span>
            <div class="fw-semibold mt-2 ms-3">
                <label for="menuFixed">Menu Fixed</label>
            </div>&nbsp;&nbsp;&nbsp;
            <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                <input id="menuFloating" class="form-check-input" type="radio" name="menuPosition" value="floating" @if(isset($campaign->meta->menuPosition) && $campaign->meta->menuPosition == 'floating') checked @endif>
            </span>
            <div class="fw-semibold mt-2 ms-3">
                <label for="menuFloating">Menu Floating</label>
            </div>
        </div>
    </div>

    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="totalAmountCAD" class="form-check-input" name="total_amount_currency" type="checkbox" value="cad" @if( isset($campaign->meta->total_amount_currency) && $campaign->meta->total_amount_currency == 'cad') {{ 'checked="checked"' }} @endif>
            </div>
            <div class="fw-semibold">
                <label for="totalAmountCAD">Total Amount in CAD</label>
            </div>
        </div>
    </div>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="customAmount" class="form-check-input" name="manual_amount" type="checkbox" @if( isset($campaign->meta->manual_amount) && $campaign->meta->manual_amount == '1') {{ 'checked="checked"' }} @endif value="1">
            </div>
            <div class="fw-semibold">
                <label for="customAmount">Custom Amount</label>
            </div>
        </div>
    </div>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="donationInstallments" class="form-check-input" name="is_recurring" type="checkbox" @if( isset($campaign->meta->is_recurring) && $campaign->meta->is_recurring == '1') {{ 'checked="checked"' }} @endif value="1">
            </div>
            <div class="fw-semibold">
                <label for="donationInstallments">Turn on donation installments</label>
            </div>
        </div>
    </div>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="processingFee" class="form-check-input" name="allow_fee" type="checkbox" value="1" @if( isset($campaign->meta->allow_fee) && $campaign->meta->allow_fee == '1') {{ 'checked="checked"' }} @endif>
            </div>
            <div class="fw-semibold">
                <label for="processingFee">Turn on processing fee</label>
            </div>
        </div>
    </div>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="showDonation" class="form-check-input" name="show_recent_donations" type="checkbox" value="1" @if( isset($campaign->meta->show_recent_donations) && $campaign->meta->show_recent_donations == '1') {{ 'checked="checked"' }} @endif>
            </div>
            <div class="fw-semibold">
                <label for="showDonation">Show Donation</label>
            </div>
        </div>
    </div>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="multiCurrencies" class="form-check-input" name="multi_currency" type="checkbox" value="1" @if( isset($campaign->meta->multi_currency) && $campaign->meta->multi_currency == '1') {{ 'checked="checked"' }} @endif>
            </div>
            <div class="fw-semibold">
                <label for="multiCurrencies">Turn on Multiple Currencies</label>
            </div>
        </div>
    </div>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="blogsEnable" class="form-check-input" name="enable_blogs" type="checkbox" value="1" @if( isset($campaign->meta->enable_blogs) && $campaign->meta->enable_blogs == '1') {{ 'checked="checked"' }} @endif>
            </div>
            <div class="fw-semibold">
                <label for="blogsEnable">Enable Blogs</label>
            </div>
        </div>
    </div>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="allowTip" class="form-check-input" name="allow_tip" type="checkbox" value="1" @if( isset($campaign->meta->allow_tip) && $campaign->meta->allow_tip == '1') {{ 'checked="checked"' }} @endif>
            </div>
            <div class="fw-semibold">
                <label for="allowTip">Allow Tips</label>
            </div>
        </div>
    </div>
    <div class="mb-7">
        <div class="d-flex mb-4 d-flex align-items-center position-relative">
            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
            <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                <input id="teamButton" class="form-check-input" name="show_team_button" type="checkbox" value="1" @if( isset($campaign->meta->show_team_button) && $campaign->meta->show_team_button == '1') {{ 'checked="checked"' }} @endif>
            </div>
            <div class="fw-semibold">
                <label for="teamButton">Show Create team button</label>
            </div>
        </div>
    </div>
</div>
