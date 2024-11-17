<div class="modal fade show" id="addTeam" tabindex="-1" aria-labelledby="addTeamLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header add_team_modal">
                <h5 class="modal-title" id="addTeamLabel">Create Team</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('campaign.create_team') }}" id="addTeamForm" class="addTeamForm">

                    <div class="d-flex flex-wrap  row">
                        @csrf
                        <div class="col-md-6 mt-3">
                            <div class="form-group form-group-default">
                                {{-- <label>Team first name</label> --}}
                                <input name="first_name" placeholder="Team first name" type="text" class="form-control" value="">
                                @if ($errors->has('first_name'))
                                <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-group form-group-default">
                                {{-- <label>Team last name</label> --}}
                                <input name="last_name" placeholder="Team last name" type="text" class="form-control" value="">
                                @if ($errors->has('last_name'))
                                <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                {{-- <label>Team display name</label> --}}
                                <input name="display_name" type="text" placeholder="Team display name" class="form-control" value="" required="">
                                @if ($errors->has('display_name'))
                                <div class="text-danger">{{ $errors->first('display_name') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                {{-- <label>Team email</label> --}}
                                <input name="email" placeholder="Team Email" type="email" class="form-control" value="">
                                @if ($errors->has('email'))
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                {{-- <label> Team Goal</label> --}}
                                <input name="goal" placeholder=" Team Goal" type="number" class="form-control " value="" required="">
                                @if ($errors->has('goal'))
                                <div class="text-danger">{{ $errors->first('goal') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                        <div class="row justify-content-center p-2"></div>
                        <input type="hidden" value="{{ $campaign->id }}" name="campaign_id">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="createTeam" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>

        </div>
    </div>
</div>
<script>
    $('#createTeamModal').on('click',function(){
        $('#addTeam').modal('show');
    });

    $(document).ready(function() {
     $('#createTeam').click(function() {
         let formData = new FormData($('#addTeamForm')[0]);
         formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token if required

         let action = $('#addTeamForm').attr('action');

         ajaxCall(
             action
             , 'POST'
             , formData
             , function(response) {
                 Swal.fire({
                     text: 'Team Added Successfully'
                     , icon: 'success'
                     , confirmButtonText: "Ok"
                     , buttonsStyling: false
                     , customClass: {
                         confirmButton: "btn btn-light-primary"
                     }
                 })
                 $('#add_team_modal').modal('hide');
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
