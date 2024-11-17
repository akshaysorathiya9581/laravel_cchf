@section('title', 'CCHF')
{{-- @section('raffle_template') --}}
@include('frontend.templates.general-template.includes.header')

<!-- body section start  -->
<div class="body-container">
    <!-- hero section start -->
    <div class="hero-container">
        <div class="hero-sub-container">
            <div class="hero-text-btn-wrap">
                <div class="hero-hd-wrap">
                    <p class="hero-hd">Help Masbia distribute</p>
                    <p class="hero-hd">kosher for Passover food.</p>
                </div>
                <button class="hero-btn">DONATE NOW</button>
            </div>
            <div class="hero-img-wrap">
                <img src="{{ asset('assets/frontend/templates/general/Assets/hero-section/hero-img2.svg') }}" alt="" />
            </div>
        </div>
    </div>
    <!-- hero section end  -->

    <!-- Acheivements start  -->
    <div class="achievement-container">
        <div class="achievement-text-container people-text-wrap">
            <p class="achievement-hd">15k+</p>
            <div class="achievement-text-wrap">
                <p class="achievement-sub-hd">People</p>
                <p class="achievement-text">Prevension of Cruelty</p>
            </div>
        </div>
        <div class="achievement-text-container society-text-wrap">
            <p class="achievement-hd">150+</p>
            <div class="achievement-text-wrap">
                <p class="achievement-sub-hd">Society</p>
                <p class="achievement-text">Direct relief</p>
            </div>
        </div>
        <div class="achievement-text-container">
            <p class="achievement-hd">49k+</p>
            <div class="achievement-text-wrap">
                <p class="achievement-sub-hd">Project</p>
                <p class="achievement-text">Research hospital</p>
            </div>
        </div>
    </div>
    <!-- Acheivements end  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js?v=<?= rand() ?>"></script>
    <!-- Featured section start  -->
    <div class="featured-container">
        <div class="featured-sub-container">
            <div class="featured-hd-wrap">
                <p>Featured <span>In</span></p>
                <img class="slash-img" src="{{ asset('assets/frontend/templates/general/Assets/featured/featured-slash.svg') }}" alt="" />
            </div>
            <div class="customer-logos slider ">
                <div class="slide">
                    <img src="{{ asset('assets/frontend/templates/general/Assets/featured/Slider/slider1.svg') }}" alt="" />
                </div>
                <div class="slide">
                    <img src="{{ asset('assets/frontend/templates/general/Assets/featured/Slider/slider2.svg') }}" alt="" />
                </div>
                <div class="slide">
                    <img src="{{ asset('assets/frontend/templates/general/Assets/featured/Slider/slider3.svg') }}" alt="" />
                </div>
                <div class="slide">
                    <img src="{{ asset('assets/frontend/templates/general/Assets/featured/Slider/slider4.svg') }}" alt="" />
                </div>
                <div class="slide">
                    <img src="{{ asset('assets/frontend/templates/general/Assets/featured/Slider/slider.svg') }}" alt="" />
                </div>
                <div class="slide">
                    <img src="{{ asset('assets/frontend/templates/general/Assets/featured/Slider/slider1.svg') }}" alt="" />
                </div>
                <div class="slide">
                    <img src="{{ asset('assets/frontend/templates/general/Assets/featured/Slider/slider2.svg') }}" alt="" />
                </div>
                <div class="slide">
                    <img src="{{ asset('assets/frontend/templates/general/Assets/featured/Slider/slider3.svg') }}" alt="" />
                </div>
                <div class="slide">
                    <img src="{{ asset('assets/frontend/templates/general/Assets/featured/Slider/slider4.svg') }}" alt="" />
                </div>
                <div class="slide">
                    <img src="{{ asset('assets/frontend/templates/general/Assets/featured/Slider/slider.svg') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Featured section end -->

    <!-- about masbia section  start -->
    <div class="about-masbia-container" id="about-masbia">
        <div class="about-masbia-sub-container">
            <div class="about-container">
                <img class="about-img" src="{{ asset('assets/frontend/templates/general/Assets/AboutMasbia/hand-img.svg') }}" alt="" />
                <p class="about-masbia-hd"><span>Who is </span>Masbia?</p>
                <p class="about-masbia-text">
                    Throughout the Passover season, Masbia expects to distribute
                    <span class="about-masbia-value">10,000</span> raw food
                    packages, which will include special holiday staples for
                    families to be able to prepare their own Seder and Kosher for
                    Passover
                </p>
            </div>

            <div class="video-container">
                <video width="100%" autoplay loop muted controls>
                    <source src="{{ asset('assets/frontend/templates/general/Assets/AboutMasbia/masbiaVideo.mp4') }}" type="video/mp4" />
                </video>
            </div>
        </div>
    </div>
    <!-- about masbia section  end -->

    <!-- get involved section start  -->
    <div class="get-involved-container" id="getInvolved">
        <div class="get-involved-bg-img-wrap">
            <img class="get-involved-bg-img" src="{{ asset('assets/frontend/templates/general/Assets/GetInvolved/getInvolved-bg.svg') }}" alt="" />
            <img class="get-involved-bg-img display-none" src="{{ asset('assets/frontend/templates/general/Assets/GetInvolved/getInvolved-bg.svg') }}" alt="" />
        </div>
        <div class="get-involved-img-text-wrap">
            <img class="get-involved-img" src="{{ asset('assets/frontend/templates/general/Assets/AboutMasbia/hand-img.svg') }}" alt="" />
            <p class="get-involved-hd">
                <span class="get-hd">Get</span>
                Involved
            </p>
            <p class="get-involved-text">
                Throughout the Passover season, Masbia expects to distribute
                <span>10,000</span> raw food packages, which will include special
                holiday staples for families to be able to prepare their own Seder
                and Kosher for Passover
            </p>
        </div>
        <div class="get-involved-btn-container">
            <button class="get-involved-btn donate-btn">DONATE</button>
            <button class="get-involved-btn food-btn">GET FOOD</button>
        </div>
    </div>
    <!-- get involved section end  -->

    <!-- Recent Compaign section start  -->
    <div class="compaign-container" id="compaigns">
        <div class="compaign-sub-container">
            <div class="compaign-img-text-wrap">
                <img src="{{ asset('assets/frontend/templates/general/Assets/RecentCompaign/thumb-img.svg') }}" alt="" />
                <p class="compaign-text"><span>Recent</span> Compaigns</p>
            </div>
            <div class="compaign-all-cards-container">
                <div class="compaign-cards-wrap">
                    <div class="compaign-card card-one">
                        <div class="compaign-card-text-btn-wrap">
                            <p class="compaign-card-hd">Passover</p>
                            <button class="compaign-card-btn">VIEW COMPAIGN</button>
                        </div>
                    </div>
                    <div class="compaign-card card-two">
                        <div class="compaign-card-text-btn-wrap">
                            <p class="compaign-card-hd">Summer</p>
                            <button class="compaign-card-btn">VIEW COMPAIGN</button>
                        </div>
                    </div>
                    <div class="compaign-card card-three">
                        <div class="compaign-card-text-btn-wrap">
                            <p class="compaign-card-hd">Winter</p>
                            <button class="compaign-card-btn">VIEW COMPAIGN</button>
                        </div>
                    </div>
                </div>
                <div class="compaign-cards-wrap">
                    <div class="compaign-card card-one">
                        <div class="compaign-card-text-btn-wrap">
                            <p class="compaign-card-hd">Passover</p>
                            <button class="compaign-card-btn">VIEW COMPAIGN</button>
                        </div>
                    </div>
                    <div class="compaign-card card-two">
                        <div class="compaign-card-text-btn-wrap">
                            <p class="compaign-card-hd">Summer</p>
                            <button class="compaign-card-btn">VIEW COMPAIGN</button>
                        </div>
                    </div>
                    <div class="compaign-card card-three">
                        <div class="compaign-card-text-btn-wrap">
                            <p class="compaign-card-hd">Winter</p>
                            <button class="compaign-card-btn">VIEW COMPAIGN</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="compaign-view-all-btn-wrap">
                <button class="compaign-view-all-btn">VIEW ALL</button>
            </div>
        </div>
    </div>
    <!-- Recent Compaign section end  -->

    <!-- media section start  -->
    <div class="media-container" id="media">
        <div class="media-sub-container">
            <div class="media-card-btn-and-data-wrap">
                <div class="media-text-img-container">
                    <img class="media-thumb-img" src="{{ asset('assets/frontend/templates/general/Assets/RecentCompaign/thumb-img.svg') }}" alt="" />
                    <p class="media-hd"><span>In the</span> Media</p>
                </div>
                <div class="card-control-btn">
                    <button class="media-arrow left-arrow">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="media-arrow right-arrow">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            <div id="mediaAllCardsContainer" class="media-all-cards-container">
                <div class="media-card">
                    <img class="media-card-img" src="{{ asset('assets/frontend/templates/general/Assets/Media//mediaCard3-img.svg') }}" alt="" />
                    <p class="media-card-date">March 05/26/2024</p>
                    <p class="media-card-text">
                        Masbia Relief On Pix 11: Community Sets Up Welcome Center For
                        Asylum Seekers In Brooklyn
                    </p>
                    <button class="media-card-btn">VIEW POST</button>
                </div>
                <div class="media-card">
                    <img class="media-card-img" src="{{ asset('assets/frontend/templates/general/Assets/Media/mediaCard4-img.svg') }}" alt="" />
                    <p class="media-card-date">March 05/26/2024</p>
                    <p class="media-card-text">
                        Masbia Mentioned In The NYT: What Today’s Migrant Crisis Looks
                        Like to a Holocaust Refugee
                    </p>
                    <button class="media-card-btn">VIEW POST</button>
                </div>
                <div class="media-card">
                    <img class="media-card-img" src="{{ asset('assets/frontend/templates/general/Assets/Media/mediaCard2-img.svg') }}" alt="" />
                    <p class="media-card-date">March 05/26/2024</p>
                    <p class="media-card-text">
                        Masbia Press Release: Every Dollar Donate Is In Someone’s
                        Stomach In Less Than Two Weeks
                    </p>
                    <button class="media-card-btn">VIEW POST</button>
                </div>
                <div class="media-card">
                    <img class="media-card-img" src="{{ asset('assets/frontend/templates/general/Assets/Media/mediaCard1-img.svg') }}" alt="" />
                    <p class="media-card-date">March 05/26/2024</p>
                    <p class="media-card-text">
                        Masbia Relief On Pix 11: Community Sets Up Welcome Center For
                        Asylum Seekers In Brooklyn
                    </p>
                    <button class="media-card-btn">VIEW POST</button>
                </div>
            </div>
        </div>
    </div>
    <!-- media section end  -->

    <!-- Events Section start  -->
    <div class="events-container">
        <div class="events-sub-container">
            <div class="event-hd-img-container">
                <img class="events-thumb-img" src="{{ asset('assets/frontend/templates/general/Assets/RecentCompaign/thumb-img.svg') }}" alt="" />
                <p class="events-hd"><span>Events</span> & Events</p>
            </div>
            <div class="events-card-container">
                <div class="event-card card-one">
                    <p class="event-card-text">
                        Two Culinary Worlds Unite To Feed The Needy – Masbia’s Chop
                        Hunger IV
                    </p>
                </div>
                <div class="event-card card-two">
                    <div class="event-card-data-wrap">
                        <p class="event-card-hd">2023 Thanksgiving Pack-A-Thon</p>
                        <p class="event-card-date">March 05/26/2024</p>
                        <p class="card-two-text">
                            We are proud to once again join with our community faith
                            partners, The Jewish Center, West End Church, and the Church
                            of Jesus Christ of Latter-day Saints, to celebrate
                            Thanksgiving in the true spirit of the day – by giving to
                            others.
                        </p>
                    </div>
                </div>
                <div class="event-card card-three">
                    <p class="event-card-text">
                        Chop‘n Pack: Cong. Orach Chaim Invites You To Volunteer With
                        Masbia, Sponsored By Naomi & Steve Wolinsky
                    </p>
                </div>
            </div>
            <div class="event-view-all-btn-wrap">
                <button class="event-view-all-btn">VIEW ALL</button>
            </div>
        </div>
    </div>
    <!-- Events Section end  -->

    <!-- Blog Section start  -->
    <div class="blog-container" id="blog">
        <div class="blog-sub-container">
            <div class="blog-data-container">
                <img class="blog-hand-img" src="{{ asset('assets/frontend/templates/general/Assets/AboutMasbia/hand-img.svg') }}" alt="" />
                <p class="blog-hd"><span>Our</span> Blog</p>
                <p class="blog-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua...
                </p>
                <div class="blog-view-all-btn-wrap">
                    <button class="blog-view-all-btn">VIEW ALL</button>
                </div>
            </div>
            <div class="blog-cards-wrap">
                <div class="blog-slider-button">
                    <button class="blog-arrow blog-left-arrow">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="blog-arrow blog-right-arrow">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
                <div class="blog-card card-one">
                    <div class="card-img-wrap">
                        <img class="blog-card-img" src="{{ asset('assets/frontend/templates/general/Assets/Blog/blog-card1-img.svg') }}" alt="" />
                        <div class="blog-card-overlay-container">
                            <div class="arrow-wrap">
                                <img src="{{ asset('assets/frontend/templates/general/Assets/Blog/blog-arrow-icon.svg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                    <p class="blog-card-date">OCTOBER 31, 2022</p>
                    <p class="blog-card-text">
                        It has survived not only five centuries
                    </p>
                </div>
                <div class="blog-card card-two">
                    <div class="card-img-wrap">
                        <img class="blog-card-img" src="{{ asset('assets/frontend/templates/general/Assets/Blog/blog-card2-img.svg') }}" alt="" />
                        <div class="blog-card-overlay-container">
                            <div class="arrow-wrap">
                                <img src="{{ asset('assets/frontend/templates/general/Assets/Blog/blog-arrow-icon.svg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                    <p class="blog-card-date">OCTOBER 31, 2022</p>
                    <p class="blog-card-text">
                        It has survived not only five centuries
                    </p>
                </div>
                <div class="blog-card card-three">
                    <div class="card-img-wrap">
                        <img class="blog-card-img" src="{{ asset('assets/frontend/templates/general/Assets/Blog/blog-card3-img.svg') }}" alt="" />
                        <div class="blog-card-overlay-container">
                            <div class="arrow-wrap">
                                <img src="{{ asset('assets/frontend/templates/general/Assets/Blog/blog-arrow-icon.svg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                    <p class="blog-card-date">OCTOBER 31, 2022</p>
                    <p class="blog-card-text">
                        It has survived not only five centuries
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Section end  -->

    <!-- ReadyIncredible section start  -->
    <div class="ready-icredible-container">
        <div class="ready-icredible-sub-container">
            <div class="incredible-img-wrap">
                <img class="incredible-img" src="{{ asset('assets/frontend/templates/general/Assets/Incredible/incredible-img.svg') }}" alt="" />
            </div>
            <div class="incredible-data-wrap">
                <p class="incredible-hd"><span>Ready to</span> do incredible!</p>
                <p class="incredible-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="incredible-img-responsive">
                    <img class="incredible-img" src="{{ asset('assets/frontend/templates/general/Assets/Incredible/incredible-img.svg') }}" alt="" />
                </div>
                <div>
                    <button class="incredible-btn">DONATE NOW</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ReadyIncredible section end  -->
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="checkoutForm" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content p-lg-4 p-md-3">
            <div class="modal-outer">
                <div class="modal-header p-0">
                    <!-- <h5 class="modal-title" id="modalTitleId">
                        Checkout
                    </h5> -->
                    <button type="button" class="btn-closes checkout_modal_button m-auto" data-bs-dismiss="modal" aria-label="Close">↺</button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <h4>Your Donation: $534</h4>

                        <div class="row mt-2">
                            <div class="col-lg-4 col-md-6">
                                <ul>
                                    <li>$100k Grand Prize</li>
                                    <li>$100k Grand Prize</li>
                                    <li>$100k Grand Prize</li>
                                    <li>$100k Grand Prize</li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <ul>
                                    <li>$2,500 Luxury Kosher Villa Stay</li>
                                    <li>$2,500 Luxury Kosher Villa Stay</li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-6"></div>
                            <!-- <div class="col-lg-3 col-md-6"></div> -->
                        </div>
                    </div>
                    <hr>
                    <form action="{{ url('payment/process/1') }}" method="POST" id="payment-form" class="donate-form">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <h4>CHECKOUT</h4>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-7">
                                    <div class="row">
                                        <div class="col-auto">
                                            <h6>Personal Info</h5>
                                        </div>
                                        <div class="col">
                                            <hr>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group mt-3">
                                                <input type="text" placeholder="First Name" id="donor_first_name" value="" name="donor_first_name" class="form-control">
                                            </div>
                                            @if ($errors->has('donor_first_name'))
                                            <div class="text-danger">{{ $errors->first('donor_first_name') }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mt-3">
                                                <input type="text" placeholder="last Name" id="donor_last_name" value="" name="donor_last_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mt-3">
                                                <input type="email" placeholder="Email" id="donor_email" value="" name="donor_email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mt-3">
                                                <input type="number" placeholder="Phone Number" value="" id="donor_phone" name="donor_phone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mt-3">
                                                <input type="text" class="form-control" id="comments" value="" name="comments" placeholder="Comments">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-auto">
                                            <h6>Billing Info</h5>
                                        </div>
                                        <div class="col">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mt-3">
                                                <input type="text" class="form-control" value="" placeholder="Enter your Address" name="address" id="address">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mt-3">
                                                <input type="text" placeholder="City" value="" name="city" id="city" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mt-3">
                                                <input type="text" placeholder="State" value="" name="state" id="state" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mt-3">
                                                <input type="text" placeholder="Zip / Postalcode" value="" name="zipcode" id="zipcode" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mt-3">
                                                <input type="text" placeholder="Country" value="" name="country" id="country" class="form-control">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="checkout_payment_form py-5 px-3 radius-5">
                                        <div class="row">
                                            <div class="col-auto">
                                                <h6>Payment Info</h5>
                                            </div>
                                            <div class="col">
                                                <hr>
                                            </div>

                                        </div>
                                        <div class="row">
                                            @if ($payment_gateways->count() > 0)
                                            <!-- Nav tabs -->
                                            <ul class="nav payment_tabs_checkbox nav-tabs" id="myTab" role="tablist">
                                                @foreach ($payment_gateways as $index => $gateway)
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link @if ($index == 0) active @endif" id="tab_{{ $index + 1 }}-tab" data-bs-toggle="tab" data-bs-target="#tab_{{ $index + 1 }}" type="button" role="tab" aria-controls="tab_{{ $index + 1 }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                                        <label class="checkbox-container d-flex">
                                                            <input type="radio" name="payment_gateway" value="{{ $gateway->payment_method }}" @if ($index==0) checked @endif>
                                                            @if ($gateway->payment_method == 'stripe')
                                                            <i class="fab fa-cc-stripe"></i>
                                                            <p>Credit Card</p>
                                                            @elseif($gateway->payment_method == 'ach' || $gateway->payment_method == 'cardknox')
                                                            <i class="fas fa-landmark"></i>
                                                            <p>ACH</p>
                                                            @elseif($gateway->payment_method == 'authorize')
                                                            <i class="fab fa-cc-mastercard"></i>
                                                            <p>Authorize.net</p>
                                                            @elseif($gateway->payment_method == 'banquest')
                                                            <i class="fab fa-cc-mastercard"></i>
                                                            <p>Banquest</p>
                                                            @elseif($gateway->payment_method == 'matbia')
                                                            <i class="fas fa-credit-card"></i>
                                                            <p>Matbia Card</p>
                                                            @elseif($gateway->payment_method == 'ojc')
                                                            <i class="fas fa-gift"></i>
                                                            <p>OJC Card</p>
                                                            @elseif($gateway->payment_method == 'donors_fund')
                                                            <i class="fas fa-recycle"></i>
                                                            <p>Donors Fund</p>
                                                            @elseif($gateway->payment_method == 'usaepay')
                                                            <i class="fas fa-credit-card"></i>
                                                            <p>USAePay</p>
                                                            @elseif($gateway->payment_method == 'paypal')
                                                            <i class="fab fa-cc-paypal"></i>
                                                            <p>PayPal</p>
                                                            @endif
                                                            <span class="checkbox-checkmark"></span>
                                                        </label>
                                                    </button>
                                                </li>
                                                @endforeach
                                            </ul>

                                            <div class="tab-content mt-5" id="myTabContent">
                                                @foreach ($payment_gateways as $index => $gateway)
                                                <div class="tab-pane fade @if ($index == 0) show active @endif" id="tab_{{ $index + 1 }}" role="tabpanel" aria-labelledby="tab_{{ $index + 1 }}-tab">
                                                    @if ($gateway->payment_method == 'stripe')
                                                    <div id="card-element">
                                                    </div>
                                                    @elseif($gateway->payment_method == 'ach' || $gateway->payment_method == 'cardknox')
                                                    <?php
                                                                // $ifield = $gateway->public_key;
                                                                // $softwareName = $gateway->pin;
                                                                ?>

                                                    <div id="cardknox-card-element">
                                                        <input class="form-input" type="text" name="xName" id="xName" autocomplete="cc-name" placeholder="Cardholder Name">

                                                        <iframe class="placeHolder" data-ifields-id="card-number" autocomplete="nothing" data-ifields-placeholder="Card Number" src="https://cdn.cardknox.com/ifields/2.6.2006.0102/ifield.htm"></iframe>
                                                        <input data-ifields-id="card-number-token" name="xCardNum" type="hidden">

                                                        <div class=" d-flex">
                                                            <input class="form-input expiryCard" type="text" style="font-size: 17px;font-weight: 600;color: var(--secondary-color);background-color: #fafafa;border: 2px solid;border-color: #ccc;border-radius: calc(infinity * 1px);outline: 0;padding: 12px 30px !important;;height: 33px;width: 172px;height: 58px;    margin-top: 10px;margin-right: 8px;" name="expiry" placeholder="MM/YY" autocomplete="off" maxlength="5" id="expiryCC">
                                                            <div>
                                                                <iframe data-ifields-id="cvv" class="placeHolder" data-ifields-placeholder="CVV" src="https://cdn.cardknox.com/ifields/2.6.2006.0102/ifield.htm"></iframe>
                                                            </div>
                                                        </div>
                                                        <input data-ifields-id="cvv-token" name="xCVV" type="hidden">

                                                        <label data-ifields-id="card-data-error" style="color: red;"></label>
                                                        <label id="transaction-status"></label>
                                                        <label data-ifields-id="card-data-error" style="color: red;"></label>


                                                    </div>
                                                    @elseif($gateway->payment_method == 'authorize')
                                                    Authorize.net
                                                    <div id="authorize">
                                                        <div class="form-group      mt-3">
                                                            <input type="text" placeholder="Card Number" class="form-control" id="card_number">
                                                        </div>
                                                    </div>
                                                    @elseif($gateway->payment_method == 'banquest')
                                                    <div id="banquest">
                                                        <div class="form-group mt-3">
                                                            <input type="text" placeholder="Card Number" class="form-control" id="card_number">
                                                        </div>
                                                    </div>
                                                    @elseif($gateway->payment_method == 'matbia')
                                                    Matbia
                                                    @elseif($gateway->payment_method == 'ojc')
                                                    OJC Fund
                                                    @elseif($gateway->payment_method == 'donors_fund')
                                                    Donors Fund
                                                    @elseif($gateway->payment_method == 'usaepay')
                                                    USAePay
                                                    @elseif($gateway->payment_method == 'paypal')
                                                    PayPal
                                                    @endif
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif







                                            <div class="row">
                                                <div class="col">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6"></div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Pay In</label>
                                                        <select class="form-select form-select-lg" name="currency" id="currency">
                                                            <option selected value="usd">USD</option>
                                                            <option value="cad">CAD</option>
                                                            <option value="euro">EURO</option>
                                                        </select>
                                                    </div>

                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button class="checkout_btn" type="submit">
                                                        Checkout
                                                    </button>
                                                </div>
                                            </div>

                                            <input type="hidden" name="environment" value="test">
                                            <input type="hidden" id="amount" name="amount" value="2">
                                            <input type="hidden" id="usd_amount" name="usd_amount" value="4">
                                            <input type="hidden" id="environment" name="environment" value="test">
                                            <input type="hidden" id="campaign_id" name="campaign_id" value="1">
                                            <input type="hidden" id="season_id" name="season_id" value="1">
                                            <input type="hidden" name="payment_method" id="payment_method" value="stripe">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @csrf
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@section('scripts')
<script src="https://cdn.cardknox.com/ifields/2.6.2006.0102/ifields.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        const CK_iFieldsKey = '{{ $ifield }}';
        const CK_SoftwareName = '{{ $softwareName }}';

        let defaultStyle = {
            'width': 'calc(100% - 64px)'
            , 'height': '33px'
            , 'font-size': '17px'
            , 'font-weight': '600'
            , 'color': '#333'
            , 'background-color': '#fafafa'
            , 'border': '2px solid'
            , 'border-color': '#ccc'
            , 'border-radius': 'calc(infinity * 1px)'
            , 'outline': '0'
            , 'padding': '10px 30px'
        };

        let validStyle = {
            border: '1px solid green'
            , 'font-size': '14px'
            , padding: '3px'
            , width: '250px'
        };

        let invalidStyle = {
            border: '1px solid red'
            , 'font-size': '14px'
            , padding: '3px'
            , width: '250px'
        };




        enableAutoSubmit('payment-form');
        setIfieldStyle('ach', defaultStyle);
        setIfieldStyle('card-number', defaultStyle);
        setIfieldStyle('cvv', defaultStyle);
        setAccount(CK_iFieldsKey, CK_SoftwareName, '2.0');
        enableAutoFormatting();

        addIfieldKeyPressCallback(function(data) {
            setIfieldStyle('card-number', data.cardNumberFormattedLength <= 0 ? defaultStyle : data
                .cardNumberIsValid ? validStyle : invalidStyle);
            if (data.lastIfieldChanged === 'cvv') {
                setIfieldStyle('cvv', data.issuer === 'unknown' || data.cvvLength <= 0 ? defaultStyle :
                    data.cvvIsValid ? validStyle : invalidStyle);
            } else if (data.lastIfieldChanged === 'card-number') {
                if (data.issuer === 'unknown' || data.cvvLength <= 0) {
                    setIfieldStyle('cvv', defaultStyle);
                } else if (data.issuer === 'amex') {
                    setIfieldStyle('cvv', data.cvvLength === 4 ? validStyle : invalidStyle);
                } else {
                    setIfieldStyle('cvv', data.cvvLength === 3 ? validStyle : invalidStyle);
                }
            } else if (data.lastIfieldChanged === 'ach') {
                setIfieldStyle('ach', data.achLength === 0 ? defaultStyle : data.achIsValid ?
                    validStyle : invalidStyle);
            }
        });

        let checkCardLoaded = setInterval(function() {
            clearInterval(checkCardLoaded);
            focusIfield('card-number');
        }, 1000);

        document.getElementById('clear-btn').addEventListener('click', function(e) {
            e.preventDefault();
            clearIfield('card-number');
            clearIfield('cvv');
            clearIfield('ach');
        });


    });

</script>
@endsection

<script>
    var modalId = document.getElementById('modalId');

    modalId.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        let button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        let recipient = button.getAttribute('data-bs-whatever');

        // Use above variables to manipulate the DOM
    });

</script>
<script src="https://js.stripe.com/v3/"></script>

<script>
    var stripeKey =
        'pk_test_51OKoCkBuX8S01OQkht2LOMGIMUcg5XCb9jjmykQQDc6N3rRZ66ppitKw3eyeIDK56W7fhgyTJGkZKkciyeVPqr9j00xINZmc8z'
    var stripe = Stripe(stripeKey);
    var elements = stripe.elements();

    var style = {
        base: {
            color: '#32325d'
            , lineHeight: '18px'
            , fontFamily: '"Helvetica Neue", Helvetica, sans-serif'
            , fontSmoothing: 'antialiased'
            , fontSize: '16px'
            , '::placeholder': {
                color: '#aab7c4'
            }
        }
        , invalid: {
            color: '#fa755a'
            , iconColor: '#fa755a'
        }
    };

    var card = elements.create('card', {
        style: style
    });
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // let url = "https://jadecuisine.com/api/payment/process/1"
    let url = "api/payment/process/1"

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        if (document.getElementById('payment_method').value == 'stripe') {


            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    let formData = new FormData(form);
                    let formDataObject = {};
                    formData.forEach((value, key) => {
                        formDataObject[key] = value;
                    });
                    let tokenId = {
                        stripeToken: result.token.id
                    }
                    // formDataObject.append(tokenId)
                    Object.assign(formDataObject, tokenId)
                    // console.log(formDataObject)
                    fetch(url, {
                        method: 'POST'
                        , headers: {
                            'Content-Type': 'application/json'
                            , 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                        , body: JSON.stringify(formDataObject)
                        // amount: document.getElementById('amount').value
                        // ,usd_amount: document.getElementById('usd_amount').value
                        // ,donor_first_name: document.getElementById('donor_first_name').value
                        // ,donor_last_name: document.getElementById('donor_last_name').value
                        // ,donor_email: document.getElementById('donor_email').value
                        // ,donor_phone: document.getElementById('donor_phone').value
                        // ,comments: document.getElementById('comments').value
                        // ,address: document.getElementById('address').value
                        // ,city: document.getElementById('city').value
                        // ,state: document.getElementById('state').value
                        // ,zipcode: document.getElementById('zipcode').value
                        // ,country: document.getElementById('country').value
                        // ,currency: document.getElementById('currency').value
                        // ,season_id: document.getElementById('season_id').value
                        // ,campaign_id: document.getElementById('campaign_id').value
                        // ,payment_gateway: document.getElementByName('payment_gateway').value
                        // ,stripeToken: result.token.id
                        // ,payment_method: 'stripe'
                        // ,environment: 'test'
                    }).then(function(response) {
                        return response.json();
                    }).then(function(result) {
                        console.log(result);
                        if (result.success == false) {
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error;
                            alert("Error" + result.error);
                        } else {
                            alert('Payment successful!');

                        }
                    });
                }
            });
        }
        if (document.getElementById('payment_method').value == 'cardknox') {
            document.getElementById('transaction-status').innerHTML = 'Processing Transaction...';

            getTokens(function() {
                    let formData = new FormData(form);
                    let formDataObject = {};
                    formData.forEach((value, key) => {
                        formDataObject[key] = value;
                    });
                    fetch(url, {
                        method: 'POST'
                        , headers: {
                            'Content-Type': 'application/json'
                            , 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                        , body: JSON.stringify(formDataObject)
                    }).then(response => response.json()).then(data => {
                        if (data.success) {
                            alert('Payment successful!');
                        } else {
                            alert('Payment failed: ' + data.message);
                        }
                    }).catch(error => {
                        console.error('Error:', error);
                        alert('Payment failed: ' + error.message);
                    });
                }
                , function(error) {
                    console.error('Error:', error);
                    alert('Payment failed: ' + error.message);
                }
            );
        }
    });

</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var triggerTabList = [].slice.call(document.querySelectorAll('#myTab button'))
        triggerTabList.forEach(function(triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function(event) {
                event.preventDefault()
                tabTrigger.show()

                var radioButton = triggerEl.querySelector('input[type="radio"]');
                if (radioButton) {
                    radioButton.checked = true;
                }
                $('#payment_method').val(radioButton.value);
            })
        })
    });

</script>


<!-- @section('scripts') -->


{{-- <!-- @endsection --> --}}

<!-- body section end  -->
@include('frontend.templates.general-template.includes.footer')
