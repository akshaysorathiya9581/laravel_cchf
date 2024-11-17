<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title') - {{ config('app.name', 'Masbia') }}
    </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  {{-- New Font --}}
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/frontend/templates/masbia/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/frontend/templates/masbia/css/style.bundle.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/frontend/templates/masbia/css/style.css') }}">
</head>

<body>
  <header class="header">
    <button class="hamburger-menu" id="hamburgerMenu">
      <img src="{{ asset('assets/frontend/templates/masbia/images/icons/hamburger-menu.svg') }}" alt="">
    </button>

    <div class="side-menu" id="sideMenu">
        <button class="close-btn" id="closeBtn">&times;</button>
        <ul class="header__menu">
            @foreach ($mainMenu as $m_key => $m_value)
              <li><a href="{{ $m_value['link'] }}">{{ $m_value['text'] }}</a></li>
            @endforeach
        </ul>
    </div>

    <a href="/" class="logo">
      <img src="{{ asset('assets/frontend/templates/masbia/images/logo.png') }}" alt="Masbia">
    </a>

    <div class="header-btns">
      <a href="#" class="btn btn--green">
        <img src="{{ asset('assets/frontend/templates/masbia/images/icons/donate.svg') }}" alt="">
        <span>Donate</span>
      </a>
      <a href="#" class="btn">
        <img src="{{ asset('assets/frontend/templates/masbia/images/icons/volunteer.svg') }}" alt="">
        <span>Volunteer</span>
      </a>
      <a href="#" class="btn">
        <img src="{{ asset('assets/frontend/templates/masbia/images/icons/store.svg') }}" alt="">
        <span>Store</span>
      </a>
    </div>

    <div class="header-btn-icons">
      <button type="button" class="btn-icon">
        <img src="{{ asset('assets/frontend/templates/masbia/images/icons/search.svg') }}" alt="image">
      </button>

      {{-- Old --}}
      {{-- <a href="{{ Auth::guard('web')->check() ? route('profile.edit') : route('login') }}" class="btn-icon">
        <img src="{{ asset('assets/frontend/templates/masbia/images/icons/person.svg') }}" alt="image">
      </a> --}}

      {{-- New --}}
      <a href="javascript:;" class="btn-icon openModalBtn" data-modal="createAccountModal">
        <img src="{{ asset('assets/frontend/templates/masbia/images/icons/person.svg') }}" alt="image">
      </a>
    </div>
  </header>

  <style>

    .baseModal {
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

    .baseModal::before {
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

    .baseModal .modalContent {
      background-color: #ffffff;
      padding: 40px 120px 70px 120px; 
      margin: auto;
      border-radius: 20px;
      width: 100%;
      max-width: 783px;
      max-height: 94vh;
      position: relative;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      overflow-y: scroll;
    }

    @media (max-width: 1550px) {
      .baseModal .modalContent {
        padding: 40px 80px 60px 80px; 
        max-width: 720px;
      } 
    }

    @media (max-width: 1370px) {
      .baseModal .modalContent {
        padding: 40px 60px 60px 60px; 
        max-width: 700px;
      } 
    }

    @media (max-width: 1280px) {
      .baseModal .modalContent {
        padding: 40px 40px;
        max-width: 650px;
      } 
    }

    @media (max-width: 768px) {
      .baseModal .modalContent {
        padding: 30px 30px;
        width: 90%;
      } 
    }

    @media (max-width: 420px) {
      .baseModal .modalContent {
        padding: 25px 25px;
      } 
    }

    @media (pointer: fine) {
      .baseModal .modalContent::-webkit-scrollbar {
        width: 2px;
      }
      .baseModal .modalContent::-moz-scrollbar {
        width: 2px;
      }
      .baseModal .modalContent::-ms-scrollbar {
        width: 2px;
      }
    }

    .baseModal .modalContent .imgContent {
      margin-bottom: 70px;
    }
    
    @media (max-width: 1550px) {
      .baseModal .modalContent .imgContent {
        margin-bottom: 60px;
      }
    }
    
    @media (max-width: 1480px) {
      .baseModal .modalContent .imgContent {
        margin-bottom: 45px;
      }
    }
    
    @media (max-width: 1370px) {
      .baseModal .modalContent .imgContent {
        margin-bottom: 35px;
      }
    }
    
    @media (max-width: 1280px) {
      .baseModal .modalContent .imgContent {
        margin-bottom: 30px;
      }
    }
    
    @media (max-width: 768px) {
      .baseModal .modalContent .imgContent {
        margin-bottom: 20px;
      }
    }

    .baseModal .modalContent .imgContent img {
      width: 144px;
      height: auto;
    }

    @media (max-width: 1370px) {
      .baseModal .modalContent .imgContent img {
        width: 120px;
      }
    }

    @media (max-width: 575px) {
      .baseModal .modalContent .imgContent img {
        width: 90px;
      }
    }

    .baseModal .modalContent .title {
      font-size: 45px;
      font-weight: 600;
      line-height: 45px;
      color: var(--accent-color);
      margin-bottom: 35px;
    }

    @media (max-width: 1550px) {
      .baseModal .modalContent .title {
        font-size: 40px;
        margin-bottom: 25px;
      } 
    }

    @media (max-width: 1370px) {
      .baseModal .modalContent .title {
        font-size: 38px;
      } 
    }

    @media (max-width: 1280px) {
      .baseModal .modalContent .title {
        font-size: 36px;
      } 
    }

    @media (max-width: 1199px) {
      .baseModal .modalContent .title {
        font-size: 34px;
      } 
    }

    @media (max-width: 991px) {
      .baseModal .modalContent .title {
        font-size: 32px;
      } 
    }

    @media (max-width: 768px) {
      .baseModal .modalContent .title {
        font-size: 30px;
        margin-bottom: 15px;
      } 
    }

    @media (max-width: 575px) {
      .baseModal .modalContent .title {
        font-size: 28px;
        line-height: 1.3;
      } 
    }

    @media (max-width: 420px) {
      .baseModal .modalContent .title {
        font-size: 26px;
      } 
    }

    @media (max-width: 380px) {
      .baseModal .modalContent .title {
        font-size: 24px;
      } 
    }

    @media (max-width: 340px) {
      .baseModal .modalContent .title {
        font-size: 22px;
      } 
    }

    .baseModal .authForm {
      font-family: "Montserrat", sans-serif;
    }

    .baseModal .authForm .formGroup {
      margin-bottom: 20px;
    }
    
    @media (max-width: 575px) {
      .baseModal .authForm .formGroup {
        margin-bottom: 15px;
      }
    }

    .baseModal .authForm .formGroup>div {
      position: relative;
    }

    .baseModal .authForm .formGroup>div .passProtect {
      position: absolute;
      right: 20px;
      top: 50%;
      width: 24px;
      height: 20px;
      transform: translateY(-50%);
      cursor: pointer;
    }

    @media (max-width: 575px) {
      .baseModal .authForm .formGroup>div .passProtect {
        width: 20px;
        right: 15px;
      } 
    }

    .baseModal .authForm .formGroup label {
      display: block;
      font-size: 18px;
      font-weight: 500;
      line-height: 21.6px;
      color: #171717;
      margin-bottom: 6px;
    }

    @media (max-width: 1370px) {
      .baseModal .authForm .formGroup label {
        font-size: 16px;
      } 
    }

    @media (max-width: 768px) {
      .baseModal .authForm .formGroup label {
        margin-bottom: 4px;
      } 
    }

    .baseModal .authForm .formGroup label span {
      color: #b3261e;
    }

    .baseModal .authForm .formGroup .formControl {
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
      .baseModal .authForm .formGroup .formControl {
        height: 50px;
      } 
    }

    @media (max-width: 1370px) {
      .baseModal .authForm .formGroup .formControl {
        height: 48px;
      } 
    }

    @media (max-width: 768px) {
      .baseModal .authForm .formGroup .formControl {
        height: 46px;
      } 
    }

    @media (max-width: 575px) {
      .baseModal .authForm .formGroup .formControl {
        height: 44px;
        font-size: 14px;
        padding: 5px 15px;
        padding-right: 40px;
      } 
    }

    .baseModal .authForm .formGroup .formControl:focus,
    .baseModal .authForm .formGroup .formControl:focus-visible {
      border-color: #323232;
      box-shadow: none;
      outline: none;
    }
    
    .baseModal .authForm .formGroup .error {
      display: block;
      font-size: 12px;
      font-weight: 600;
      color: #b3261e;
      margin-top: 5px;
    }

    .baseModal .formCheck {
      font-family: "Poppins", sans-serif;
    }

    .baseModal .formCheck input {
      padding: 0;
      height: initial;
      width: initial;
      margin-bottom: 0;
      display: none;
      cursor: pointer;
    }

    .baseModal .formCheck label {
      position: relative;
      cursor: pointer;
      font-size: 16px;
      font-weight: 400;
      line-height: 19.2px;
      color: #171717;
    }
    
    @media (max-width: 575px) {
      .baseModal .formCheck label {
        font-size: 14px;
        display: flex;
        align-items: flex-start;
      }
    }

    .baseModal .formCheck label a {
      text-decoration: underline;
      transition: all .25s ease-in-out;
    }

    .baseModal .formCheck label a:hover {
      color: var(--accent-color);
    }

    .baseModal .formCheck label:before {
      content:'';
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
      .baseModal .formCheck label:before {
        padding: 10px;
      }
    }

    @media (max-width: 575px) {
      .baseModal .formCheck label:before {
        margin-top: -1px;
      }
    }

    .baseModal .formCheck input:checked + label:after {
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
      .baseModal .formCheck input:checked + label:after {
        top: 1px;
        left: 8px;
        width: 6px;
        height: 12px;
      }
    }
    
    .btnGroup .btn {
      width: 100%;
      height: 60px;
      margin-top: 45px;
      margin-bottom: 5px;
      text-transform: inherit;
    }

    @media (max-width: 1550px) {
      .btnGroup .btn {
        height: 58px;
        margin-top: 40px;
      } 
    }

    @media (max-width: 1370px) {
      .btnGroup .btn {
        height: 56px;
        margin-top: 35px;
      } 
    }

    @media (max-width: 1280px) {
      .btnGroup .btn {
        height: 54px;
      } 
    }

    @media (max-width: 991px) {
      .btnGroup .btn {
        height: 50px;
        font-size: 18px;
      }
    }

    @media (max-width: 768px) {
      .btnGroup .btn {
        height: 46px;
        font-size: 16px;
      }
    }

    .btnGroup span {
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
      .btnGroup span {
        margin-top: 7px;
      }
    }

    @media (max-width: 575px) {
      .btnGroup span {
        font-size: 14px;
      }
    }

    .btnGroup span a {
      font-weight: 500;
      text-decoration: underline;
      transition: all .25s ease-in-out;
    }
    
    .btnGroup span a:hover {
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
      .baseModal .h-20 {
        height: 0;
      }
      .baseModal .h-10 {
        height: 0;
      }
    }
  </style>

  {{-- Register Form --}}
  <div id="createAccountModal" class="baseModal">
    <div class="modalContent">
      {{-- <span class="close-btn">&times;</span> --}}
      <div class="imgContent">
        <img src="{{ asset('assets/frontend/templates/masbia/images/authLogo.svg') }}" width="144" height="103" alt="Img">
      </div>
      <h2 class="title">Create your account</h2>
      <form action="#" class="authForm">
        <div class="formGroup">
          <label for="">Full Name<span>*</span></label>
          <input type="text" class="formControl" placeholder="Enter your Name">
          {{-- <span class="error">Name is required</span> --}}
        </div>
        <div class="formGroup">
          <label for="">Email Address<span>*</span></label>
          <input type="email" class="formControl" placeholder="Enter your mail address" value="alex@eample.com">
          {{-- <span class="error"></span> --}}
        </div>
        <div class="formGroup">
          <label for="">Enter Password<span>*</span></label>
          <div>
            <input type="text" class="formControl" placeholder="Enter Password" value="12345678">
            <span class="passProtect"><img src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24" height="20" alt="Password Protect"></span>
          </div>
          {{-- <span class="error"></span> --}}
        </div>
        <div class="formGroup">
          <label for="">Confirm Password<span>*</span></label>
          <div>
            <input type="text" class="formControl" placeholder="Enter Confirm Password">
            <span class="passProtect"><img src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24" height="20" alt="Password Protect"></span>
          </div>
          {{-- <span class="error"></span> --}}
        </div>
        <div class="formCheck">
          <input type="checkbox" id="privacyCheck">
          <label for="privacyCheck"><span>I agree with <a href="#">Terms of services & Privacy Policy</a></span></label>
        </div>
        <div class="btnGroup">
          <a href="#" class="btn btn--green">Sign up</a>
          <span>Already have an account? <a href="javascript:;" class="openModalBtn openNextModal" data-modal="LoginModal">Sign in</a></span>
        </div>
      </form>
    </div>
  </div>

  {{-- <a href="javascript:;" class="btn-icon openModalBtn" data-modal="ResetPassNewModal">
    <img src="{{ asset('assets/frontend/templates/masbia/images/icons/person.svg') }}" alt="image">
  </a> --}}

  {{-- Login Form --}}
  <div id="LoginModal" class="baseModal">
    <div class="modalContent">
      {{-- <span class="close-btn">&times;</span> --}}
      <div class="imgContent">
        <img src="{{ asset('assets/frontend/templates/masbia/images/authLogo.svg') }}" width="144" height="103" alt="Img">
      </div>
      <h2 class="title">Login to your account</h2>
      <form action="#" class="authForm">
        <div class="formGroup">
          <label for="">Email Address<span>*</span></label>
          <input type="email" class="formControl" placeholder="Enter your mail address" value="alex@eample.com">
          {{-- <span class="error"></span> --}}
        </div>
        <div class="formGroup">
          <label for="">Enter Password<span>*</span></label>
          <div>
            <input type="text" class="formControl" placeholder="Enter Password" value="12345678">
            <span class="passProtect"><img src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24" height="20" alt="Password Protect"></span>
          </div>
          {{-- <span class="error"></span> --}}
        </div>
        <div class="h-20"></div>
        <div class="btnGroup">
          <a href="#" class="btn btn--green">Sign In</a>
          <span><a href="javascript:;" class="openModalBtn openNextModal" data-modal="ResetPassModal">Forgot Password?</a></span>
        </div>
      </form>
    </div>
  </div>

  {{-- Reset Password Form --}}
  <div id="ResetPassModal" class="baseModal">
    <div class="modalContent">
      {{-- <span class="close-btn">&times;</span> --}}
      <div class="imgContent">
        <img src="{{ asset('assets/frontend/templates/masbia/images/authLogo.svg') }}" width="144" height="103" alt="Img">
      </div>
      <h2 class="title">Reset password</h2>
      <form action="#" class="authForm">
        <div class="formGroup">
          <label for="">Email Address<span>*</span></label>
          <input type="email" class="formControl" placeholder="Enter your mail address" value="alex@eample.com">
          {{-- <span class="error"></span> --}}
        </div>
        <div class="btnGroup">
          <a href="#" class="btn btn--green">Send Code</a>
          <span><a href="javascript:;" class="openModalBtn openNextModal" data-modal="LoginModal">Back to Login</a></span>
        </div>
      </form>
    </div>
  </div>
  
  {{-- Reset Password New Form --}}
  <div id="ResetPassNewModal" class="baseModal">
    <div class="modalContent">
      {{-- <span class="close-btn">&times;</span> --}}
      <div class="imgContent">
        <img src="{{ asset('assets/frontend/templates/masbia/images/authLogo.svg') }}" width="144" height="103" alt="Img">
      </div>
      <h2 class="title">Reset password</h2>
      <form action="#" class="authForm">
        <div class="formGroup">
          <label for="">Enter code</label>
          <div>
            <input type="text" class="formControl" placeholder="" value="">
            <span class="passProtect"><img src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24" height="20" alt="Password Protect"></span>
          </div>
          {{-- <span class="error"></span> --}}
        </div>
        <div class="formGroup">
          <label for="">Enter your new Password</label>
          <div>
            <input type="text" class="formControl" placeholder="" value="">
            <span class="passProtect"><img src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24" height="20" alt="Password Protect"></span>
          </div>
          {{-- <span class="error"></span> --}}
        </div>
        <div class="formGroup">
          <label for="">Retype your Password</label>
          <div>
            <input type="text" class="formControl" placeholder="" value="">
            <span class="passProtect"><img src="{{ asset('assets/frontend/templates/masbia/images/icons/eye.svg') }}" width="24" height="20" alt="Password Protect"></span>
          </div>
          {{-- <span class="error"></span> --}}
        </div>
        <div class="h-10"></div>
        <div class="btnGroup">
          <a href="#" class="btn btn--green">Reset Password</a>
          <span><a href="javascript:;" class="openModalBtn openNextModal" data-modal="LoginModal">Back to Login</a></span>
        </div>
      </form>
    </div>
  </div>