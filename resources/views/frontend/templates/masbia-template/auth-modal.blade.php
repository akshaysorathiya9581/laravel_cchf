<style>
    .base-modal {
        display: none;
        position: fixed;
        z-index: 99;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow: auto;
        align-content: center;
        justify-content: center;
    }

    .base-modal::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(10px);
    }

    .base-modal .modal-content {
        background-color: #ffffff;
        margin: auto;
        border-radius: 20px;
        width: 100%;
        max-width: 783px;
        max-height: 94vh;
        position: relative;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 1550px) {
        .base-modal .modal-content {
            max-width: 720px;
        }
    }

    @media (max-width: 1370px) {
        .base-modal .modal-content {
            max-width: 700px;
        }
    }

    @media (max-width: 1280px) {
        .base-modal .modal-content {
            max-width: 650px;
        }
    }

    @media (max-width: 768px) {
        .base-modal .modal-content {
            width: 90%;
        }
    }

    .base-modal .modal-content .modal-box {
        padding: 40px 120px 70px 120px;
        overflow-y: scroll;
    }

    @media (max-width: 1550px) {
        .base-modal .modal-content .modal-box {
            padding: 40px 80px 60px 80px;
        }
    }

    @media (max-width: 1370px) {
        .base-modal .modal-content .modal-box {
            padding: 40px 60px 60px 60px;
        }
    }

    @media (max-width: 1280px) {
        .base-modal .modal-content .modal-box {
            padding: 40px 40px;
        }
    }

    @media (max-width: 768px) {
        .base-modal .modal-content .modal-box {
            padding: 30px 30px;
        }
    }

    @media (max-width: 420px) {
        .base-modal .modal-content .modal-box {
            padding: 25px 25px;
        }
    }

    @media (pointer: fine) {
        .base-modal .modal-content .modal-box::-webkit-scrollbar {
            width: 2px;
        }

        .base-modal .modal-content .modal-box::-moz-scrollbar {
            width: 2px;
        }

        .base-modal .modal-content .modal-box::-ms-scrollbar {
            width: 2px;
        }
    }

    .base-modal .modal-content .img-content {
        margin-bottom: 70px;
    }

    @media (max-width: 1550px) {
        .base-modal .modal-content .img-content {
            margin-bottom: 60px;
        }
    }

    @media (max-width: 1480px) {
        .base-modal .modal-content .img-content {
            margin-bottom: 45px;
        }
    }

    @media (max-width: 1370px) {
        .base-modal .modal-content .img-content {
            margin-bottom: 35px;
        }
    }

    @media (max-width: 1280px) {
        .base-modal .modal-content .img-content {
            margin-bottom: 30px;
        }
    }

    @media (max-width: 768px) {
        .base-modal .modal-content .img-content {
            margin-bottom: 20px;
        }
    }

    .base-modal .modal-content .img-content img {
        width: 144px;
        height: auto;
    }

    @media (max-width: 1370px) {
        .base-modal .modal-content .img-content img {
            width: 120px;
        }
    }

    @media (max-width: 575px) {
        .base-modal .modal-content .img-content img {
            width: 90px;
        }
    }

    .base-modal .modal-content .title {
        font-size: 45px;
        font-weight: 600;
        line-height: 45px;
        color: var(--accent-color);
        margin-bottom: 35px;
    }

    @media (max-width: 1550px) {
        .base-modal .modal-content .title {
            font-size: 40px;
            margin-bottom: 25px;
        }
    }

    @media (max-width: 1370px) {
        .base-modal .modal-content .title {
            font-size: 38px;
        }
    }

    @media (max-width: 1280px) {
        .base-modal .modal-content .title {
            font-size: 36px;
        }
    }

    @media (max-width: 1199px) {
        .base-modal .modal-content .title {
            font-size: 34px;
        }
    }

    @media (max-width: 991px) {
        .base-modal .modal-content .title {
            font-size: 32px;
        }
    }

    @media (max-width: 768px) {
        .base-modal .modal-content .title {
            font-size: 30px;
            margin-bottom: 15px;
        }
    }

    @media (max-width: 575px) {
        .base-modal .modal-content .title {
            font-size: 28px;
            line-height: 1.3;
        }
    }

    @media (max-width: 420px) {
        .base-modal .modal-content .title {
            font-size: 26px;
        }
    }

    @media (max-width: 380px) {
        .base-modal .modal-content .title {
            font-size: 24px;
        }
    }

    @media (max-width: 340px) {
        .base-modal .modal-content .title {
            font-size: 22px;
        }
    }

    .base-modal .auth-form {
        font-family: "Montserrat", sans-serif;
    }

    .base-modal .auth-form .form-group {
        margin-bottom: 20px;
    }

    @media (max-width: 575px) {
        .base-modal .auth-form .form-group {
            margin-bottom: 15px;
        }
    }

    .base-modal .auth-form .form-group>div {
        position: relative;
    }

    .base-modal .auth-form .form-group>div .passProtect {
        position: absolute;
        right: 20px;
        top: 50%;
        width: 24px;
        height: 20px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    @media (max-width: 575px) {
        .base-modal .auth-form .form-group>div .passProtect {
            width: 20px;
            right: 15px;
        }
    }

    .base-modal .auth-form .form-group label {
        display: block;
        font-size: 18px;
        font-weight: 500;
        line-height: 21.6px;
        color: #171717;
        margin-bottom: 6px;
    }

    @media (max-width: 1370px) {
        .base-modal .auth-form .form-group label {
            font-size: 16px;
        }
    }

    @media (max-width: 768px) {
        .base-modal .auth-form .form-group label {
            margin-bottom: 4px;
        }
    }

    .base-modal .auth-form .form-group label span {
        color: #b3261e;
    }

    .base-modal .auth-form .form-group .form-input {
        width: 100%;
        height: 53px;
        font-size: 16px;
        font-weight: 500;
        line-height: 19.2px;
        background-color: #ffffff;
        color: #787878;
        border: 1px solid #c5c5c5;
        border-radius: 6px;
        padding: 5px 20px;
        padding-right: 50px;
    }

    @media (max-width: 1550px) {
        .base-modal .auth-form .form-group .form-input {
            height: 50px;
        }
    }

    @media (max-width: 1370px) {
        .base-modal .auth-form .form-group .form-input {
            height: 48px;
        }
    }

    @media (max-width: 768px) {
        .base-modal .auth-form .form-group .form-input {
            height: 46px;
        }
    }

    @media (max-width: 575px) {
        .base-modal .auth-form .form-group .form-input {
            height: 44px;
            font-size: 14px;
            padding: 5px 15px;
            padding-right: 40px;
        }
    }

    .base-modal .auth-form .form-group .form-input:focus,
    .base-modal .auth-form .form-group .form-input:focus-visible {
        border-color: #323232;
        box-shadow: none;
        outline: none;
    }

    .base-modal .auth-form .form-group .error {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: #b3261e;
        margin-top: 5px;
    }

    .base-modal .form-checkbox {
        font-family: "Poppins", sans-serif;
    }

    .base-modal .form-checkbox input {
        padding: 0;
        height: initial;
        width: initial;
        margin-bottom: 0;
        display: none;
        cursor: pointer;
    }

    .base-modal .form-checkbox label {
        position: relative;
        cursor: pointer;
        font-size: 16px;
        font-weight: 400;
        line-height: 19.2px;
        color: #171717;
    }

    @media (max-width: 575px) {
        .base-modal .form-checkbox label {
            font-size: 14px;
            display: flex;
            align-items: flex-start;
        }
    }

    .base-modal .form-checkbox label a {
        text-decoration: underline;
        transition: all .25s ease-in-out;
    }

    .base-modal .form-checkbox label a:hover {
        color: var(--accent-color);
    }

    .base-modal .form-checkbox label:before {
        content: '';
        -webkit-appearance: none;
        background-color: transparent;
        background: #E8E8E8;
        padding: 13px;
        display: inline-block;
        position: relative;
        vertical-align: middle;
        cursor: pointer;
        margin-top: -3px;
        margin-right: 10px;
        border-radius: 2px
    }

    @media (max-width: 768px) {
        .base-modal .form-checkbox label:before {
            padding: 10px;
        }
    }

    @media (max-width: 575px) {
        .base-modal .form-checkbox label:before {
            margin-top: -1px;
        }
    }

    .base-modal .form-checkbox input:checked+label:after {
        content: '';
        display: block;
        position: absolute;
        top: 2px;
        left: 10px;
        width: 7px;
        height: 14px;
        border: solid #6b6b66;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    @media(max-width: 768px) {
        .base-modal .form-checkbox input:checked+label:after {
            top: 1px;
            left: 8px;
            width: 6px;
            height: 12px;
        }
    }

    .btn-grp .btn {
        width: 100%;
        height: 60px;
        margin-top: 45px;
        margin-bottom: 5px;
        text-transform: inherit;
    }

    @media (max-width: 1550px) {
        .btn-grp .btn {
            height: 58px;
            margin-top: 40px;
        }
    }

    @media (max-width: 1370px) {
        .btn-grp .btn {
            height: 56px;
            margin-top: 35px;
        }
    }

    @media (max-width: 1280px) {
        .btn-grp .btn {
            height: 54px;
        }
    }

    @media (max-width: 991px) {
        .btn-grp .btn {
            height: 50px;
            font-size: 18px;
        }
    }

    @media (max-width: 768px) {
        .btn-grp .btn {
            height: 46px;
            font-size: 16px;
        }
    }

    .btn-grp span {
        font-family: "Poppins", sans-serif;
        display: block;
        text-align: center;
        font-size: 16px;
        font-weight: 400;
        line-height: 19.2px;
        color: #171717;
        margin-top: 10px;
    }

    @media (max-width: 768px) {
        .btn-grp span {
            margin-top: 7px;
        }
    }

    @media (max-width: 575px) {
        .btn-grp span {
            font-size: 14px;
        }
    }

    .btn-grp span a {
        font-weight: 500;
        text-decoration: underline;
        transition: all .25s ease-in-out;
    }

    .btn-grp span a:hover {
        color: var(--accent-color);
    }

    @media (pointer: fine) {
        .cart .cart__inner::-webkit-scrollbar {
            width: 0;
        }

        .cart .cart__inner::-moz-scrollbar {
            width: 0;
        }

        .cart .cart__inner::-ms-scrollbar {
            width: 0;
        }
    }

    .h-20 {
        height: 20px;
    }

    .h-10 {
        height: 10px;
    }

    @media (max-width: 991px) {
        .base-modal .h-20 {
            height: 0;
        }

        .base-modal .h-10 {
            height: 0;
        }
    }

    .blockUI.blockMsg {
        background: rgba(29, 110, 101, 0.7) !important;
        color: white !important;
        font-size: 20px !important;
        padding: 30px !important;
        border-radius: 5px !important;
        text-align: center !important;
        width: 100% !important;
        height: 100% !important;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Make sure that BlockUI does not cover scrollable content */
    .blockUI.blockMsg {
        pointer-events: none; /* Allow interaction with the scrollable content */
    }
</style>

{{-- Register Form --}}
<div id="createAccountModal" class="base-modal">
    <div class="modal-content">
        <div class="modal-box">
            {{-- <span class="close-btn">&times;</span> --}}
            <div class="img-content">
                <img src="{{ asset('assets/frontend/templates/masbia/images/authLogo.svg') }}" width="144" height="103"
                    alt="Img">
            </div>
            <h2 class="title">Create your account</h2>
            <form action="{{ route('register') }}" id="frm-customer-register" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="">Full Name<span>*</span></label>
                    <input type="text" class="form-input" name="username" placeholder="Enter your Name">
                    {{-- <span class="error">Name is required</span> --}}
                </div>
                <div class="form-group">
                    <label for="">Email Address<span>*</span></label>
                    <input type="email" class="form-input" name="email" placeholder="Enter your mail address">
                    {{-- <span class="error"></span> --}}
                </div>
                <div class="form-group">
                    <label for="">Enter Password<span>*</span></label>
                    <div>
                        <input type="password" class="form-input" name="password" placeholder="Enter Password" >
                        <span class="passProtect"><img src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24" height="20" alt="Password Protect"></span>
                    </div>
                    {{-- <span class="error"></span> --}}
                </div>
                <div class="form-group">
                    <label for="">Confirm Password<span>*</span></label>
                    <div>
                        <input type="password" class="form-input" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm Password">
                        <span class="passProtect"><img
                                src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24"
                                height="20" alt="Password Protect"></span>
                    </div>
                    {{-- <span class="error"></span> --}}
                </div>
                <div class="form-checkbox">
                    <input type="checkbox" class="form-input" id="privacyCheck" name="privacy_check">
                    <label for="privacyCheck"><span>I agree with <a href="#">Terms of services & Privacy Policy</a></span></label>
                </div>
                <div class="btn-grp">
                    <button type="submit" class="btn btn--green">Sign up</button>
                    <span>Already have an account? <a href="javascript:;" class="openModalBtn openNextModal" data-modal="LoginModal">Sign in</a></span>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <a href="javascript:;" class="btn-icon openModalBtn" data-modal="ResetPassNewModal">
    <img src="{{ asset('assets/frontend/templates/masbia/images/icons/person.svg') }}" alt="image">
  </a> --}}

{{-- Login Form --}}
<div id="LoginModal" class="base-modal">
    <div class="modal-content">
        <div class="modal-box">
            {{-- <span class="close-btn">&times;</span> --}}
            <div class="img-content">
                <img src="{{ asset('assets/frontend/templates/masbia/images/authLogo.svg') }}" width="144" height="103"
                    alt="Img">
            </div>
            <h2 class="title">Login to your account</h2>
            <form action="{{ route('login') }}" id="frm-customer-login" class="auth-form" method="POST">
                <div class="form-group">
                    <label for="">Email Address<span>*</span></label>
                    <input type="email" class="form-input" placeholder="Enter your mail address" value="alex@eample.com">
                    {{-- <span class="error"></span> --}}
                </div>
                <div class="form-group">
                    <label for="">Enter Password<span>*</span></label>
                    <div>
                        <input type="text" class="form-input" placeholder="Enter Password" value="12345678">
                        <span class="passProtect"><img
                                src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24"
                                height="20" alt="Password Protect"></span>
                    </div>
                    {{-- <span class="error"></span> --}}
                </div>
                <div class="h-20"></div>
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
<div id="ResetPassModal" class="base-modal">
    <div class="modal-content">
        <div class="modal-box">
            {{-- <span class="close-btn">&times;</span> --}}
            <div class="img-content">
                <img src="{{ asset('assets/frontend/templates/masbia/images/authLogo.svg') }}" width="144" height="103"
                    alt="Img">
            </div>
            <h2 class="title">Reset password</h2>
            <form action="#" class="auth-form">
                <div class="form-group">
                    <label for="">Email Address<span>*</span></label>
                    <input type="email" class="form-input" placeholder="Enter your mail address"
                        value="alex@eample.com">
                    {{-- <span class="error"></span> --}}
                </div>
                <div class="btn-grp">
                    <a href="#" class="btn btn--green">Send Code</a>
                    <span><a href="javascript:;" class="openModalBtn openNextModal" data-modal="LoginModal">Back to
                            Login</a></span>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Reset Password New Form --}}
<div id="ResetPassNewModal" class="base-modal">
    <div class="modal-content">
        <div class="modal-box">
            {{-- <span class="close-btn">&times;</span> --}}
            <div class="img-content">
                <img src="{{ asset('assets/frontend/templates/masbia/images/authLogo.svg') }}" width="144"
                    height="103" alt="Img">
            </div>
            <h2 class="title">Reset password</h2>
            <form action="#" class="auth-form">
                <div class="form-group">
                    <label for="">Enter code</label>
                    <div>
                        <input type="text" class="form-input" placeholder="" value="">
                        <span class="passProtect"><img
                                src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24"
                                height="20" alt="Password Protect"></span>
                    </div>
                    {{-- <span class="error"></span> --}}
                </div>
                <div class="form-group">
                    <label for="">Enter your new Password</label>
                    <div>
                        <input type="text" class="form-input" placeholder="" value="">
                        <span class="passProtect"><img
                                src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24"
                                height="20" alt="Password Protect"></span>
                    </div>
                    {{-- <span class="error"></span> --}}
                </div>
                <div class="form-group">
                    <label for="">Retype your Password</label>
                    <div>
                        <input type="text" class="form-input" placeholder="" value="">
                        <span class="passProtect"><img
                                src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24"
                                height="20" alt="Password Protect"></span>
                    </div>
                    {{-- <span class="error"></span> --}}
                </div>
                <div class="h-10"></div>
                <div class="btn-grp">
                    <a href="#" class="btn btn--green">Reset Password</a>
                    <span><a href="javascript:;" class="openModalBtn openNextModal" data-modal="LoginModal">Back to
                            Login</a></span>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.openModalBtn').click(function() {
            var modalId = $(this).data('modal');
            $('#' + modalId).fadeIn().css("display", "flex");
            $('body').css('overflow', 'hidden');
        });

        // $('.close-btn').click(function() {
        //   $(this).closest('.base-modal').fadeOut();
        //   $('body').css('overflow', 'auto');
        // });

        // $('.closeModalBtn').click(function() {
        //   $(this).closest('.base-modal').fadeOut();
        //   $('body').css('overflow', 'auto');
        // });

        $(window).click(function(event) {
            if ($(event.target).is('.base-modal')) {
                $(event.target).fadeOut();
                $('body').css('overflow', 'auto');
            }
        });

        $(".openNextModal").click(function(e) {
            e.preventDefault();

            var nextModal = $(this).data("modal");
            $(this).closest(".base-modal").fadeOut(function() {
                $(nextModal).fadeIn().css("display", "flex");
            });
        });

        // register form submit
        $(document).on('submit', '#frm-customer-register', function (e) {
            e.preventDefault();
            var _this = $(this);
            var url  = $(this).attr("action");
            var formData = $(this).serializeArray();

            blockUI_page(_this.closest('.modal-content'), true);
            send_ajax_request(url,formData).done(function(data){
                if(data.status){
                    toastr_show(data.message, 'success');
                }
                blockUI_page(_this.closest('.modal-content'));
                formValidation(data.message);
            });
        });

         // login form submit
         $(document).on('submit', '#frm-customer-login', function (e) {
            e.preventDefault();
            var _this = $(this);
            blockUI_page(_this.closest('.modal-content'), true);
        });

    });
</script>