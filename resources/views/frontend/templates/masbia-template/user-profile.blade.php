@section('title', 'Masbia')
@include('frontend.templates.masbia-template.includes.header')

    <style>
        .profile-form-group {
            align-items: baseline;
        }
    </style>

    <main>

        <section class="user">
            @include('frontend.templates.masbia-template.components.user-sidebar')

            <div class="user__content">
                <h1 class="user-title">User Profile</h1>
                <div class="user-profile">
                    <div class="profile-form-group">
                        <label for="">First Name</label>
                        <div class="sc-input">
                            <input type="text" name="name" class="w-100 profile-form-input" value="{{ $user->name }}" disabled>
                        </div>
                        <div class="sc-edit" data-col="name">
                            <button type="button" class="profile-edit">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.475 3.40783L15.592 5.52483M14.836 1.54283L9.109 7.26983C8.81309 7.56533 8.61128 7.94181 8.529 8.35183L8 10.9998L10.648 10.4698C11.058 10.3878 11.434 10.1868 11.73 9.89083L17.457 4.16383C17.6291 3.99173 17.7656 3.78742 17.8588 3.56256C17.9519 3.33771 17.9998 3.09671 17.9998 2.85333C17.9998 2.60994 17.9519 2.36895 17.8588 2.14409C17.7656 1.91923 17.6291 1.71492 17.457 1.54283C17.2849 1.37073 17.0806 1.23421 16.8557 1.14108C16.6309 1.04794 16.3899 1 16.1465 1C15.9031 1 15.6621 1.04794 15.4373 1.14108C15.2124 1.23421 15.0081 1.37073 14.836 1.54283Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M16 13V16C16 16.5304 15.7893 17.0391 15.4142 17.4142C15.0391 17.7893 14.5304 18 14 18H3C2.46957 18 1.96086 17.7893 1.58579 17.4142C1.21071 17.0391 1 16.5304 1 16V5C1 4.46957 1.21071 3.96086 1.58579 3.58579C1.96086 3.21071 2.46957 3 3 3H6"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <div class="profile-form-btns edt-buttons"></div>
                        </div>
                    </div>

                    <div class="profile-form-group">
                        <label for="">Last Name</label>
                        <input type="text" class="profile-form-input" value="" disabled>
                        <div class="profile-form-btns">
                            <button type="button" class="profile-edit">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.475 3.40783L15.592 5.52483M14.836 1.54283L9.109 7.26983C8.81309 7.56533 8.61128 7.94181 8.529 8.35183L8 10.9998L10.648 10.4698C11.058 10.3878 11.434 10.1868 11.73 9.89083L17.457 4.16383C17.6291 3.99173 17.7656 3.78742 17.8588 3.56256C17.9519 3.33771 17.9998 3.09671 17.9998 2.85333C17.9998 2.60994 17.9519 2.36895 17.8588 2.14409C17.7656 1.91923 17.6291 1.71492 17.457 1.54283C17.2849 1.37073 17.0806 1.23421 16.8557 1.14108C16.6309 1.04794 16.3899 1 16.1465 1C15.9031 1 15.6621 1.04794 15.4373 1.14108C15.2124 1.23421 15.0081 1.37073 14.836 1.54283Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M16 13V16C16 16.5304 15.7893 17.0391 15.4142 17.4142C15.0391 17.7893 14.5304 18 14 18H3C2.46957 18 1.96086 17.7893 1.58579 17.4142C1.21071 17.0391 1 16.5304 1 16V5C1 4.46957 1.21071 3.96086 1.58579 3.58579C1.96086 3.21071 2.46957 3 3 3H6"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="profile-form-group">
                        <label for="">Email Address</label>
                        <div class="sc-input">
                            <input type="email" name="email" class="w-100 profile-form-input" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="sc-edit" data-col="email">
                            <button type="button" class="profile-edit">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.475 3.40783L15.592 5.52483M14.836 1.54283L9.109 7.26983C8.81309 7.56533 8.61128 7.94181 8.529 8.35183L8 10.9998L10.648 10.4698C11.058 10.3878 11.434 10.1868 11.73 9.89083L17.457 4.16383C17.6291 3.99173 17.7656 3.78742 17.8588 3.56256C17.9519 3.33771 17.9998 3.09671 17.9998 2.85333C17.9998 2.60994 17.9519 2.36895 17.8588 2.14409C17.7656 1.91923 17.6291 1.71492 17.457 1.54283C17.2849 1.37073 17.0806 1.23421 16.8557 1.14108C16.6309 1.04794 16.3899 1 16.1465 1C15.9031 1 15.6621 1.04794 15.4373 1.14108C15.2124 1.23421 15.0081 1.37073 14.836 1.54283Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M16 13V16C16 16.5304 15.7893 17.0391 15.4142 17.4142C15.0391 17.7893 14.5304 18 14 18H3C2.46957 18 1.96086 17.7893 1.58579 17.4142C1.21071 17.0391 1 16.5304 1 16V5C1 4.46957 1.21071 3.96086 1.58579 3.58579C1.96086 3.21071 2.46957 3 3 3H6"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <div class="profile-form-btns edt-buttons"></div>
                        </div>
                    </div>

                    <div class="profile-form-group">
                        <label for="">Phone</label>
                        <div class="sc-input">
                            <input type="tel" name="phone" class="w-100 profile-form-input" value="{{ $user->phone }}" disabled>
                        </div>
                        <div class="sc-edit" data-col="phone">
                            <button type="button" class="profile-edit">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.475 3.40783L15.592 5.52483M14.836 1.54283L9.109 7.26983C8.81309 7.56533 8.61128 7.94181 8.529 8.35183L8 10.9998L10.648 10.4698C11.058 10.3878 11.434 10.1868 11.73 9.89083L17.457 4.16383C17.6291 3.99173 17.7656 3.78742 17.8588 3.56256C17.9519 3.33771 17.9998 3.09671 17.9998 2.85333C17.9998 2.60994 17.9519 2.36895 17.8588 2.14409C17.7656 1.91923 17.6291 1.71492 17.457 1.54283C17.2849 1.37073 17.0806 1.23421 16.8557 1.14108C16.6309 1.04794 16.3899 1 16.1465 1C15.9031 1 15.6621 1.04794 15.4373 1.14108C15.2124 1.23421 15.0081 1.37073 14.836 1.54283Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M16 13V16C16 16.5304 15.7893 17.0391 15.4142 17.4142C15.0391 17.7893 14.5304 18 14 18H3C2.46957 18 1.96086 17.7893 1.58579 17.4142C1.21071 17.0391 1 16.5304 1 16V5C1 4.46957 1.21071 3.96086 1.58579 3.58579C1.96086 3.21071 2.46957 3 3 3H6"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <div class="profile-form-btns edt-buttons"></div>
                        </div>
                    </div>

                    <div class="profile-form-group">
                        <label for="">Physical Address</label>
                        <div class="sc-input">
                            <input type="text" name="address" class="w-100 profile-form-input" value="{{ $user->address }}" disabled>
                        </div>
                        <div class="sc-edit" data-col="address">
                            <button type="button" class="profile-edit">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.475 3.40783L15.592 5.52483M14.836 1.54283L9.109 7.26983C8.81309 7.56533 8.61128 7.94181 8.529 8.35183L8 10.9998L10.648 10.4698C11.058 10.3878 11.434 10.1868 11.73 9.89083L17.457 4.16383C17.6291 3.99173 17.7656 3.78742 17.8588 3.56256C17.9519 3.33771 17.9998 3.09671 17.9998 2.85333C17.9998 2.60994 17.9519 2.36895 17.8588 2.14409C17.7656 1.91923 17.6291 1.71492 17.457 1.54283C17.2849 1.37073 17.0806 1.23421 16.8557 1.14108C16.6309 1.04794 16.3899 1 16.1465 1C15.9031 1 15.6621 1.04794 15.4373 1.14108C15.2124 1.23421 15.0081 1.37073 14.836 1.54283Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M16 13V16C16 16.5304 15.7893 17.0391 15.4142 17.4142C15.0391 17.7893 14.5304 18 14 18H3C2.46957 18 1.96086 17.7893 1.58579 17.4142C1.21071 17.0391 1 16.5304 1 16V5C1 4.46957 1.21071 3.96086 1.58579 3.58579C1.96086 3.21071 2.46957 3 3 3H6"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <div class="profile-form-btns edt-buttons"></div>
                        </div>
                    </div>

                    <div class="profile-form-group">
                        <label for="">Password</label>
                        <input type="password" class="profile-form-input" value="passwordpassword" disabled>
                        <div class="profile-form-btns">
                            <button type="button" class="profile-edit">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.475 3.40783L15.592 5.52483M14.836 1.54283L9.109 7.26983C8.81309 7.56533 8.61128 7.94181 8.529 8.35183L8 10.9998L10.648 10.4698C11.058 10.3878 11.434 10.1868 11.73 9.89083L17.457 4.16383C17.6291 3.99173 17.7656 3.78742 17.8588 3.56256C17.9519 3.33771 17.9998 3.09671 17.9998 2.85333C17.9998 2.60994 17.9519 2.36895 17.8588 2.14409C17.7656 1.91923 17.6291 1.71492 17.457 1.54283C17.2849 1.37073 17.0806 1.23421 16.8557 1.14108C16.6309 1.04794 16.3899 1 16.1465 1C15.9031 1 15.6621 1.04794 15.4373 1.14108C15.2124 1.23421 15.0081 1.37073 14.836 1.54283Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M16 13V16C16 16.5304 15.7893 17.0391 15.4142 17.4142C15.0391 17.7893 14.5304 18 14 18H3C2.46957 18 1.96086 17.7893 1.58579 17.4142C1.21071 17.0391 1 16.5304 1 16V5C1 4.46957 1.21071 3.96086 1.58579 3.58579C1.96086 3.21071 2.46957 3 3 3H6"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
  </main>

  @section('scripts')
    <script>
        $('body').on('click','.profile-edit',function() {

            var actionBtn = `
                <button type="button" class="update-data profile-save">Save</button>
                <button type="button" class="cancel-edit profile-cancel">Cancel</button>
            `;

            $(this).hide();
            $(this).closest('.sc-edit').find('.edt-buttons').show().html(actionBtn);
            var input = $(this).closest('.sc-edit').data('col');
            $('input[name="'+input+'"]').prop('disabled', false).focus();
        });

        $('body').on('click','.update-data',function() {

            var colName = $(this).closest('.sc-edit').data('col');
            var value = $('input[name="'+colName+'"]').val().trim();

            formData = new FormData();
            formData.append(colName,value);
            formData.append('_token', '{{ csrf_token() }}');

            $('.field-error').remove();
            _this = $(this);

            $.ajax({
                type: "POST",
                url: "{{ route('profile.update') }}",
                data: formData,
                dataType: "JSON",
                processData: false,
                contentType: false, 
                success: function (response) {
                    _this.closest('.sc-edit').find('.edt-buttons').hide();
                    _this.closest('.sc-edit').find('.profile-edit').show();
                    _this.closest('.profile-form-group').find('input').prop('disabled',true)
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

        $('body').on('click','.cancel-edit',function() {

            $(this).closest('.sc-edit').find('.edt-buttons').hide();
            $(this).closest('.sc-edit').find('.profile-edit').show();
            $(this).closest('.profile-form-group').find('input').prop('disabled',true)
            $('.field-error').remove();
        });

    </script>
  @endsection

  @include('frontend.templates.masbia-template.includes.footer')