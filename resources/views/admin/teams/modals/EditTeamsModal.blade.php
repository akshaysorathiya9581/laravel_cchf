{{-- UPDATE TEAM MODAL --}}
<div class="modal fade" id="update_team_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>Edit Team</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.updateTeam') }}" id="updateTeamForm" method="POST">
                    <div class="card-body pt-">
                        <div class="w-100 mb-10">
                            @csrf
                            <input type="hidden" name="teamId" value="" id="teamId">
                           <input type="hidden" id="campaign_id" name="campaign_id" value="{{ $campaign->id }}">
                            <label class="form-label required">Team First Name</label>
                            <input name="first_name" type="text" id="EditTeamFirstName" class="form-control form-control-lg form-control-solid" value="{{ old('first_name') }}" />
                            @if ($errors->has('first_name'))
                            <div class="text-danger">{{ $errors->first('first_name') }}</div>
                            @endif
                        </div>
                        <div class="w-100 mb-10">
                            <label class="form-label ">Team Last Name</label>
                            <input name="last_name" type="text" id="EditTeamLastName" class="form-control form-control-lg form-control-solid" value="{{ old('last_name') }}" />
                            @if ($errors->has('last_name'))
                            <div class="text-danger">{{ $errors->first('last_name') }}</div>
                            @endif
                        </div>
                        <div class="w-100 mb-10">
                            <label class="form-label required">Team Display Name</label>
                            <input name="display_name" type="text" id="EditTeamDisplayName" class="form-control form-control-lg form-control-solid" value="{{ old('display_name') }}" />
                            @if ($errors->has('display_name'))
                            <div class="text-danger">{{ $errors->first('display_name') }}</div>
                            @endif
                        </div>
                        <div class="w-100 mb-10">
                            <label class="form-label required">Team Email</label>
                            <input name="email" type="email" id="EditTeamEmail" class="form-control form-control-lg form-control-solid" value="{{ old('email') }}" />
                            @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label">Currency</label>
                            <select name="currency" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Currency..." data-allow-clear="true" data-hide-search="false">
                                <option></option>
                                <option value="usd" id="editUsd">USD</option>
                                <option value="cad" id="editCad">CAD</option>

                            </select>
                        </div>
                        <div class="w-100 mb-10">
                            <label class="form-label required">Team Slug</label>
                            <input name="slug" type="text" id="EditTeamSlug" class="form-control form-control-lg form-control-solid" value="{{ old('slug') }}" />
                            @if ($errors->has('slug'))
                            <div class="text-danger">{{ $errors->first('slug') }}</div>
                            @endif
                        </div>
                        <div class="w-100 mb-10">
                            <label class="form-label">Phone System Code</label>
                            <input name="phone_system_code" id="EditTeamPhoneSystemCode" type="number" class="form-control form-control-lg form-control-solid" value="{{ old('phone_system_code') }}" />
                            @if ($errors->has('phone_system_code'))
                            <div class="text-danger">{{ $errors->first('phone_system_code') }}</div>
                            @endif
                        </div>
                        <div class="w-100 mb-10">
                            <label class="form-label required">Team Goal</label>
                            <input name="goal" type="number" id="EditTeamGoal" class="form-control form-control-lg form-control-solid" value="{{ old('goal') }}" />
                            @if ($errors->has('goal'))
                            <div class="text-danger">{{ $errors->first('goal') }}</div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" id="updateTeam" class="btn btn-lg btn-primary" data-kt-element="type-next">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        </div>

                    </div>

                </form>
            </div>
            <!--begin::Modal body-->
        </div>
    </div>
</div>
<script>
       $(document).ready(function() {
     $('#updateTeam').click(function() {
         let formData = new FormData($('#updateTeamForm')[0]);
         formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token if required

         let action = $('#updateTeamForm').attr('action');

         ajaxCall(
             action
             , 'POST'
             , formData
             , function(response) {
                 Swal.fire({
                     text: 'Team Updated Successfully'
                     , icon: 'success'
                     , confirmButtonText: "Ok"
                     , buttonsStyling: false
                     , customClass: {
                         confirmButton: "btn btn-light-primary"
                     }
                 })
                 $('#update_team_modal').modal('hide');
                 location.reload();
             }
             , function(xhr, status, error) {
                 console.error('Error:', error);
                 let errorMessage = 'An error occurred. Please try again.';
                 if (xhr.responseJSON && xhr.responseJSON.messages) {
                     errorMessage = '<ul>';
                     $.each(xhr.responseJSON.messages, function(key, messages) {
                         $.each(messages, function(index, message) {
                             errorMessage += '<li>' + message + '</li>';
                         });
                     });
                     errorMessage += '</ul>';
                 }
                 Swal.fire({
                     html: errorMessage
                     , icon: 'error'
                     , buttonsStyling: false
                     , confirmButtonText: "Ok, got it!"
                     , customClass: {
                         confirmButton: "btn btn-light-primary"
                     }
                 });
             }
         );
     });
 });
</script>