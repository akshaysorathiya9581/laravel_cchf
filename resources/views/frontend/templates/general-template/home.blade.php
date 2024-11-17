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

    <!-- Featured section start  -->
    <div class="featured-container">
        <div class="featured-sub-container">
            <div class="featured-hd-wrap">
                <p>Featured <span>In</span></p>
                <img class="slash-img" src="{{ asset('assets/frontend/templates/general/Assets/featured/featured-slash.svg') }}" alt="" />
            </div>
            <div class="customer-logos slider">
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
                <div class="blog-card d-none"></div>
                {{-- <div class="blog-card card-one">
                    <div class="card-img-wrap">
                        <img class="blog-card-img" src="./Assets/Blog/blog-card1-img.svg" alt="" />
                        <div class="blog-card-overlay-container">
                            <div class="arrow-wrap">
                                <img src="./Assets/Blog/blog-arrow-icon.svg" alt="" />
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
                        <img class="blog-card-img" src="./Assets/Blog/blog-card2-img.svg" alt="" />
                        <div class="blog-card-overlay-container">
                            <div class="arrow-wrap">
                                <img src="./Assets/Blog/blog-arrow-icon.svg" alt="" />
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
                        <img class="blog-card-img" src="./Assets/Blog/blog-card3-img.svg" alt="" />
                        <div class="blog-card-overlay-container">
                            <div class="arrow-wrap">
                                <img src="./Assets/Blog/blog-arrow-icon.svg" alt="" />
                            </div>
                        </div>
                    </div>
                    <p class="blog-card-date">OCTOBER 31, 2022</p>
                    <p class="blog-card-text">
                        It has survived not only five centuries
                    </p>
                </div> --}}
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

<!-- body section end  -->
@include('frontend.templates.general-template.includes.footer')

@section('scripts')

<script type="module" src="{{ asset('assets/frontend/templates/raffle/js/main.js') }}?v={{ time() }}"></script>

@endsection
