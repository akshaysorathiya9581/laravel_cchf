@section('title', 'Masbia')
@include('frontend.templates.masbia-template.includes.header')

    <main>
        
        <section class="user">
            @include('frontend.templates.masbia-template.components.user-sidebar')

            <div class="user__content">
                <h1 class="user-title">Notifications</h1>
                <div class="notifications-heading">
                <p class="notifications-title">General Notifications</p>
                <p class="notifications-subtitle">Sed ut perspiciatis unde omnis iste natus accusantium.</p>
                </div>
                <div class="toggle-wrapper">
                    @foreach (get_user_notification_list() as $value)
                        <div class="toggle-container">
                            <label class="switch">
                                @php
                                    $checked = (isset($notification[$value['id']]) && $notification[$value['id']]) ? 'checked' : '';
                                @endphp
                            <input type="checkbox" class="switch-notification" name="{{ $value['id'] }}" id="{{ $value['id'] }}" value="1" {{ $checked }}>
                            <span class="slider"></span>
                            </label>
                            <label class="switch-label" for="{{ $value['id'] }}">{{ $value['text'] }}</label>
                        </div>                    
                    @endforeach
                </div>
                <button type="button" class="btn btn--green turn-all-off">Turn All Off</button>
            </div>
        </section>
  </main>

  @section('scripts')
        <script>
            var allChecked = $('.user__content').find('.switch-notification:checked').length === $('.user__content').find('.switch-notification').length;
            $('.turn-all-off').text(!(allChecked) ? 'Turn All On' : 'Turn All Off');
            
            $('body').on('click','.turn-all-off',function() {
                var _this = $(this);
                // Check if all checkboxes are checked
                var allChecked = _this.closest('.user__content').find('.switch-notification:checked').length === _this.closest('.user__content').find('.switch-notification').length;
                if (allChecked) {
                    _this.closest('.user__content').find('.switch-notification').prop('checked', false).trigger('change');
                    _this.text('Turn All On'); // Change button text
                } else {
                    _this.closest('.user__content').find('.switch-notification').prop('checked', true).trigger('change');;
                    _this.text('Turn All Off'); // Change button text
                }
            });

            $('body').on('change','.switch-notification',function() {
                var _this = $(this);
                formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append(_this.attr('name'), +_this.is(':checked'));

                $.ajax({
                    type: "POST",
                    url: "{{ route('notification.update') }}",
                    data: formData,
                    dataType: "JSON",
                    processData: false,
                    contentType: false, 
                    success: function (response) {
                    },
                    error: function(xhr, status, error) {
                        // Handle validation errors when the status is 422
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            for (let field in errors) {
                                if (errors.hasOwnProperty(field)) {
                                    let errorMessages = errors[field];
                                    errorMessages.forEach(function(message) {
                                        $('input[name="'+field+'"]').after('<p class="field-error mt-2 text-danger">'+message+'</p>')
                                    });
                                }
                            }
                        } else {
                            console.log('An error occurred: ', error);
                        }
                    }
                });
            });
        </script>
  @endsection

  @include('frontend.templates.masbia-template.includes.footer')