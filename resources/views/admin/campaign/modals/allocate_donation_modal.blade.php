{{--  ADD MODAL --}}
<div class="modal fade" id="mdl-add-update-allocate-donation" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">

                <h2 class="modal-title">Add Allocate Donation</h2>

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
                <form action="{{ route('allocate-donation.store') }}" id="frm-allocate-donation" method="POST" class="fresh">
                    <div class="card-body pt-">
                        <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                        <input type="hidden" name="edit_id" value="">
                        <div class="w-100">
                            <div class="fv-row mb-10">
                                <label class="form-label required">Name</label>
                                <input type="text" name="name" class="form-control form-control-lg form-control-solid"/>
                                @if ($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-lg btn-primary btn-submit">Submit</button>
                    </div>
                </form>
            </div>
              </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-add-allocate-donation', function () {
            $('#mdl-add-update-allocate-donation').modal('show');
            $('#frm-allocate-donation').find('input[name="edit_id"]').val('');
            $('#frm-allocate-donation').find('input[name="name"]').val('');
        });

        $(document).on('click', '.btn-edit-allocate-donation', function () {
            var _this = $(this);
            var id = _this.data('id');
            $('#frm-allocate-donation').find('input[name="edit_id"]').val(id);
            $('#frm-allocate-donation').find('input[name="name"]').val(_this.closest('tr').find('.donation-name').text());
            $('#mdl-add-update-allocate-donation').modal('show');
        });


        $(document).on('submit', '#frm-allocate-donation', function (e) {
            e.preventDefault();
            var _this = $(this);
            var formData = new FormData($(_this)[0]);
            formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token if required
            var action = $(_this).attr('action');
            console.log('action=',action);

            // return;
            if(_this.hasClass('fresh')) {
                _this.find('.btn-submit').text('processing...').prop('disabled', true);
                _this.removeClass('fresh');
                ajaxCall(
                  action
                  , 'POST'
                  , formData
                  , function(response) {
                    _this.find('.btn-submit').text('Submit').prop('disabled', false);
                    _this.addClass('fresh');
                    if(response.status) {
                        $('#mdl-add-update-update-allocate-donation').modal('hide');
                        Swal.fire({
                              text: response.message
                              , icon: 'success'
                              , confirmButtonText: "Ok"
                              , buttonsStyling: false
                              , customClass: {
                                  confirmButton: "btn btn-light-primary"
                              }
                         })
                        location.reload();
                    }
                  }
                  , function(xhr, status, error) {
                    _this.addClass('fresh');
                    _this.find('.btn-submit').text('Submit').prop('disabled', false);
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
            }
        });
  });

    function makeDotToArrayStr(str) {
        if (!str.includes('.')) return str;
        let regex = /(\w+)/g;
        let matches = str.match(regex);

        let arr = [];

        matches.forEach((match, index) => {
            if (index === 0) {
                arr.push(match);
            } else {
                if (parseInt(match) > -1) match = '';
                arr.push(`[${match}]`);
            }
        });

        return arr.join('');
    }

    function formValidation(errors) {
      if (!typeof errors === 'object') return;

      console.log(errors);

      $.each(errors, (el, el_errors) => {
          var like_name = makeDotToArrayStr(el);
          var _elem = $('[name="' + like_name + '"]');
          if (!_elem.length) _elem = $('[name*="' + like_name + '"]');
          var i = 0;
          var f_elem = _elem[Object.keys(_elem)[i++]];

          var _parent = $(f_elem).parent();
          while (_parent.children('.error-msg').length > 0 || (!['radio'].includes($(f_elem).attr('type')) && $(f_elem).val() != '')) {
              f_elem = _elem[Object.keys(_elem)[i++]];
              _parent = $(f_elem).parent();
          }
          if (_parent.hasClass('form-check')) _parent = _parent.parent();

          var msg = (el_errors.constructor === Array) ? el_errors[0] : el_errors;
          var label = _parent.find('label').html();
          msg = msg.replaceAll(el, label);
          msg = msg.replaceAll(':', '');

          _parent.append('<span class="m-form__help text-danger error-msg d-block">' + msg + '</span>');
      });
  }
</script>

