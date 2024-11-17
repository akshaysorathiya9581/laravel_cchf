<div id="kt_activity_month" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_month_tab">
    <h3 class="mt-2">
        Organization Settings
    </h3>
    <div class="mb-3 mt-3">
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="">Organization Legal Name</span>
            </label>
            <input type="text" class="form-control form-control-solid" name="legal_name" value="@if(isset($campaign->organization->legal_name)) {{ $campaign->organization->legal_name }} @endif" />
        </div>
    </div>
    <div class="mb-3 mt-3">
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span>Organization Email</span>
            </label>
            <input type="email" class="form-control form-control-solid" name="email" value="@if(isset($campaign->organization->email)) {{ $campaign->organization->email }} @endif" />
        </div>
    </div>
    <div class="mb-3 mt-3">
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span>Bank Statement</span>
            </label>
            <input type="text" class="form-control form-control-solid" name="bank_statement" value="@if(isset($campaign->organization->bank_statement)) {{ $campaign->organization->bank_statement }} @endif" />
        </div>
    </div>
    <div class="mb-3 mt-3">
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span>Tax ID</span>
            </label>
            <input type="text" class="form-control form-control-solid" name="tax_id" value="@if(isset($campaign->organization->tax_id)) {{ $campaign->organization->tax_id }} @endif" />
        </div>
    </div>
    <div class="mb-3 mt-3">
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span>Organization Address Line 1</span>
            </label>
            <input type="text" class="form-control form-control-solid" name="org_address" value="@if(isset($campaign->organization->org_address)) {{ $campaign->organization->org_address }} @endif" />
        </div>
    </div>
    <div class="mb-3 mt-3">
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span>Organization Address Line 2</span>
            </label>
            <input type="text" class="form-control form-control-solid" name="org_address_2" value="@if(isset($campaign->organization->org_address_2)) {{ $campaign->organization->org_address_2 }} @endif" />
        </div>
    </div>
    <div class="mb-3 mt-3">
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span>Mailing Address</span>
            </label>
            <input type="text" class="form-control form-control-solid" name="mailing_address" value="@if(isset($campaign->organization->mailing_address)) {{ $campaign->organization->mailing_address }} @endif" />
        </div>
    </div>
    <div class="mb-3 mt-3">
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span>Phone Number</span>
            </label>
            <input type="text" class="form-control form-control-solid" name="org_phone" value="@if(isset($campaign->organization->org_phone)) {{ $campaign->organization->org_phone }} @endif" />
        </div>
    </div>
    <div class="mb-3 mt-3">
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span>Phone System Phone Number</span>
            </label>
            <input type="text" class="form-control form-control-solid" name="twilio_phone_number" value="@if(isset($campaign->organization->twilio_phone_number)) {{ $campaign->organization->twilio_phone_number }} @endif" />
        </div>
    </div>
    <div class="mb-3 mt-3">
        <div class="d-flex flex-column mb-b mt-4 fv-row">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span>Statement Descriptor</span>
            </label>
            <textarea name="statement_descriptor" class="area_editor form-control form-control-solid" cols="30" rows="10">@if(isset($campaign->organization->statement_descriptor)) {{ $campaign->organization->statement_descriptor }} @endif</textarea>
        </div>
    </div>
</div>