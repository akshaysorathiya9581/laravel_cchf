{{-- Register Form --}}
<div id="createAccountModal" class="custom-modal">
    <div class="custom-modal__overlay"></div>
    <div class="custom-modal__dialog custom-modal__dialog--auth">
      <div class="custom-modal__content custom-modal__content--auth">
        <button type="button" class="custom-modal__close">
          <img src="{{ asset('assets/frontend/templates/masbia/images/icons/close.svg') }}" width="18" height="18" alt="Img">
        </button>
        <div class="custom-modal__auth--logo">
            <img src="{{ asset('assets/frontend/templates/masbia/images/authLogo.svg') }}" width="144" height="103" alt="Img">
        </div>
        <p class="custom-modal__auth-title">Create your account</p>
        <form action="{{ route('register') }}" id="frm-customer-register" method="POST" class="auth-form">
          <div class="auth-form-group">
              <label for="">Full Name<span>*</span></label>
              <input type="text" class="auth-form-input" name="username" placeholder="Enter your Name">
              {{-- <span class="error">Name is required</span> --}}
          </div>
          <div class="auth-form-group">
              <label for="">Email Address<span>*</span></label>
              <input type="email" class="auth-form-input" name="email" placeholder="Enter your mail address">
              {{-- <span class="error"></span> --}}
          </div>
          <div class="auth-form-group">
              <label for="">Enter Password<span>*</span></label>
              <div>
                  <input type="password" class="auth-form-input" name="password" placeholder="Enter Password">
                  <span class="passProtect"><img src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24" height="20" alt="Password Protect"></span>
              </div>
              {{-- <span class="error"></span> --}}
          </div>
          <div class="auth-form-group">
              <label for="">Confirm Password<span>*</span></label>
              <div>
                  <input type="password" class="auth-form-input" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm Password">
                  <span class="passProtect"><img src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24" height="20" alt="Password Protect"></span>
              </div>
              {{-- <span class="error"></span> --}}
          </div>
          <div class="form-checkbox">
              <div>
                  <input type="checkbox" class="auth-form-input" id="privacy_check" name="privacy_check">
                  <label for="privacy_check"><span>I agree with <a href="javascript:;">Terms of services & Privacy Policy</a></span></label>
              </div>
          </div>
          <div class="btn-grp">
              <button type="submit" class="btn btn--green">Sign up</button>
              <span>Already have an account? <a href="javascript:;" class="openModalBtn openNextModal" data-modal="LoginModal">Sign in</a></span>
          </div>
        </form>
      </div>
    </div>
</div>

{{-- Login Form --}}
<div id="LoginModal" class="custom-modal">
    <div class="custom-modal__overlay"></div>
    <div class="custom-modal__dialog custom-modal__dialog--auth">
      <div class="custom-modal__content custom-modal__content--auth">
        <button type="button" class="custom-modal__close">
            <img src="{{ asset('assets/frontend/templates/masbia/images/icons/close.svg') }}" width="18" height="18" alt="Img">
        </button>
        <div class="custom-modal__auth--logo">
            <img src="{{ asset('assets/frontend/templates/masbia/images/authLogo.svg') }}" width="144" height="103" alt="Img">
        </div>
        <p class="custom-modal__auth-title">Login to your account</p>
        <form action="{{ route('login') }}" id="frm-customer-login" class="auth-form" method="POST">
          <div class="auth-form-group">
              <label for="">Email Address<span>*</span></label>
              <input type="email" name="email" class="auth-form-input" placeholder="Enter your mail address" value="">
              {{-- <span class="error"></span> --}}
          </div>
          <div class="auth-form-group">
              <label for="">Enter Password<span>*</span></label>
              <div>
                  <input type="password" name="password" class="auth-form-input" placeholder="Enter Password"
                      value="">
                  <span class="passProtect"><img src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24" height="20" alt="Password Protect"></span>
              </div>
              {{-- <span class="error"></span> --}}
          </div>
          <div class="form-checkbox">
              <div>
                  <input type="checkbox" class="auth-form-input" id="remember_device" name="remember_device">
                  <label for="remember_device"><span>Remember for this device</span></label>
              </div>
          </div>
          <div class="btn-grp">
              <button type="submit" class="btn btn--green">Sign In</button>
              <span><a href="javascript:;" class="openModalBtn openNextModal" data-modal="ResetPassModal">Forgot Password?</a></span>
              <span><a href="javascript:;" class="openModalBtn openNextModal" data-modal="createAccountModal">Sign up</a></span>
          </div>
        </form>
      </div>
    </div>
</div>

{{-- Reset Password Form --}}
<div id="ResetPassModal" class="custom-modal">
    <div class="custom-modal__overlay"></div>
    <div class="custom-modal__dialog custom-modal__dialog--auth">
      <div class="custom-modal__content custom-modal__content--auth">
        <button type="button" class="custom-modal__close">
            <img src="{{ asset('assets/frontend/templates/masbia/images/icons/close.svg') }}" width="18" height="18" alt="Img">
        </button>
        <div class="custom-modal__auth--logo">
            <img src="{{ asset('assets/frontend/templates/masbia/images/authLogo.svg') }}" width="144" height="103" alt="Img">
        </div>
        <p class="custom-modal__auth-title">Reset password</p>
        <form action="{{ route('password.email') }}" method="POST" id="frm-forget-password" class="auth-form">
            <div class="auth-form-group resetpass">
                <label for="">Email Address<span>*</span></label>
                <input type="email" class="auth-form-input" name="email" placeholder="Enter your mail address" value="">
                <span class="error"></span>
            </div>
            <div class="btn-grp">
                <button type="submit" class="btn btn--green">Send Code</button>
                <span><a href="javascript:;" class="openModalBtn openNextModal" data-modal="LoginModal">Back to Login</a></span>
            </div>
        </form>
      </div>
    </div>
</div>

@if(session('passwordtoken'))

    {{-- Reset Password New Form --}}

    <div id="ResetPassNewModal" class="custom-modal">
        <div class="custom-modal__overlay"></div>
        <div class="custom-modal__dialog custom-modal__dialog--auth">
            <div class="custom-modal__content custom-modal__content--auth">
                <button type="button" class="custom-modal__close">
                    <img src="{{ asset('assets/frontend/templates/masbia/images/icons/close.svg') }}" width="18" height="18" alt="Img">
                </button>
                <div class="custom-modal__auth--logo">
                    <img src="{{ asset('assets/frontend/templates/masbia/images/authLogo.svg') }}" width="144" height="103" alt="Img">
                </div>
                <p class="custom-modal__auth-title">Reset password</p>
                <form action="{{ route('password.store') }}" id="frm-change-password" method="POST" class="auth-form">
                    <input type="hidden" name="token" value="{{ session('passwordtoken') }}">
                    <div class="auth-form-group">
                        <label for="">Enter code</label>
                        <div>
                            <input type="text" name="email" class="auth-form-input" placeholder="Enter code">
                            <span class="passProtect"><img
                                    src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}"
                                    width="24" height="20" alt="Password Protect"></span>
                        </div>
                        <!-- <span class="error"></span> -->
                    </div>
                    <div class="auth-form-group">
                        <label for="">Enter your new Password</label>
                        <div>
                            <input type="password" class="auth-form-input" name="password" placeholder="Enter your new Password">
                            <span class="passProtect"><img
                                    src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}"
                                    width="24" height="20" alt="Password Protect"></span>
                        </div>
                        <!-- <span class="error"></span> -->
                    </div>
                    <div class="auth-form-group">
                        <label for="">Retype your Password</label>
                        <div>
                            <input type="password" name="password_confirmation" class="auth-form-input" placeholder="Retype your Password">
                            <span class="passProtect"><img
                                    src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}"
                                    width="24" height="20" alt="Password Protect"></span>
                        </div>
                        <!-- <span class="error"></span> -->
                    </div>
                    <div class="h-10"></div>
                    <div class="btn-grp">
                        <button type="submit" class="btn btn--green">Reset Password</button>
                        <span><a href="javascript:;" class="openModalBtn openNextModal" data-modal="LoginModal">Back to Login</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endif

<script>
    $(document).ready(function() {

        if($('#ResetPassNewModal').length) {
            $('#ResetPassNewModal').fadeIn().css("display", "flex");
        }

        $('.openModalBtn').click(function() {
            $('.error-msg').remove();
            var modalId = $(this).data('modal');
            $('#' + modalId).fadeIn().css("display", "flex");
            $('body').css('overflow', 'hidden');
        });


        $('.custom-modal__close').click(function() {
            $(this).closest('.custom-modal').fadeOut();
            $('body').css('overflow', 'auto');
        });
        
        $(window).click(function(event) {
            if ($(event.target).is('.custom-modal')) {
                $(event.target).fadeOut();
                $('body').css('overflow', 'auto');
            }
        });

        $(".openNextModal").click(function(e) {
            e.preventDefault();

            var nextModal = $(this).data("modal");
            $(this).closest(".custom-modal").fadeOut(function() {
                $(nextModal).fadeIn().css("display", "flex");
            });
        });

        // password hide show 
        $(document).on('mousedown', '.passProtect', function() {
            var _this = $(this);
            var passwordInput = _this.closest('div').find('.auth-form-input');
            passwordInput.attr('type', 'text');
        });

        $(document).on('mouseup', '.passProtect', function() {
            var _this = $(this);
            var passwordInput = _this.closest('div').find('.auth-form-input');
            passwordInput.attr('type', 'password');
        });

        // register form submit
        $(document).on('submit', '#frm-customer-register', function(e) {
            e.preventDefault();
            var _this = $(this);
            var url = $(this).attr("action");
            var formData = $(this).serializeArray();

            blockUI_page(_this.closest('.custom-modal__content'), true);
            send_ajax_request(url, formData).done(function(data) {
                blockUI_page(_this.closest('.custom-modal__content'), false);
                if (data.status) {
                    toastr_show(data.message, 'success');
                    $('#createAccountModal').fadeOut();
                    $('body').css('overflow', 'auto');
                    location.reload();
                }
                formValidation(data.message);
            });
        });

        // login form submit
        $(document).on('submit', '#frm-customer-login', function(e) {
            e.preventDefault();
            var _this = $(this);
            var url = $(this).attr("action");
            var formData = $(this).serializeArray();

            blockUI_page(_this.closest('.custom-modal__content'), true);
            send_ajax_request(url, formData).done(function(data) {
                blockUI_page(_this.closest('.custom-modal__content'), false);
                if (data.status) {
                    toastr_show(data.message, 'success');
                    location.reload();
                }
                formValidation(data.message);
            }).fail(function(xhr, textStatus, errorThrown) {

                blockUI_page(_this.closest('.custom-modal__content'), false);
                if (xhr.status === 422) {
                    var responseJSON = xhr.responseJSON;
                    toastr_show(responseJSON.message, 'error');
                } else {
                    toastr_show("An error occurred. Please try again later.", 'error');
                }
            });
        });

        // forget-password form submit
        $(document).on('submit', '#frm-forget-password', function(e) {
            e.preventDefault();
            var _this = $(this);
            var url = $(this).attr("action");
            var formData = $(this).serializeArray();

            blockUI_page(_this.closest('.custom-modal__content'), true);
            send_ajax_request(url, formData).done(function(data) {
                blockUI_page(_this.closest('.custom-modal__content'), false);
                if (data.status) {
                    toastr_show(data.message, 'success');
                    location.reload();
                }
                formValidation(data.message);
            }).fail(function(xhr, textStatus, errorThrown) {
                console.log('xhr=',xhr);
                blockUI_page(_this.closest('.custom-modal__content'), false);
                if (xhr.status === 404) {
                    var responseJSON = xhr.responseJSON;
                    toastr_show(responseJSON.message, 'error');
                } else {
                    toastr_show("An error occurred. Please try again later.", 'error');
                }
            });
        });

        // change password form submit
        $(document).on('submit', '#frm-change-password', function(e) {
            e.preventDefault();
            var _this = $(this);
            var url = $(this).attr("action");
            var formData = $(this).serializeArray();

            blockUI_page(_this.closest('.custom-modal__content'), true);
            send_ajax_request(url, formData).done(function(data) {

                blockUI_page(_this.closest('.custom-modal__content'), false);

                if (data.status) {
                    toastr_show(data.message, 'success');
                    $('#ResetPassNewModal').fadeOut();
                    $('body').css('overflow', 'auto');
                    location.reload();
                } else {
                    toastr_show(data.errors, 'error');
                }

            }).fail(function(xhr, textStatus, errorThrown) {

                blockUI_page(_this.closest('.custom-modal__content'), false);

                if (xhr.status === 422) {

                    var errors = xhr.responseJSON.errors;
					$('.err-resetpass').remove();  // Remove existing error messages
					$.each(errors, function (key, value) {
						var errorElement = _this.find('input[name=' + key + ']');
						errorElement.after('<div class="err-resetpass text-danger">' + value[0] + '</div>'); // Display the first error message
					});
                } else {
                    toastr_show("An error occurred. Please try again later.", 'error');
                }
            });
        });

        // Close Modal
        $('.custom-modal__close').click(function() {
            $(this).closest('.custom-modal').fadeOut();
            $('body').css('overflow', 'auto');
        });

    });
</script>
