@section('title', 'Raffle Template')
@include('frontend.templates.raffle-template.includes.header')
<main>
    <section class="promo">
        <div class="promo__images">
            <img alt="img" src="" >
        </div>
        <div class="promo__images promo__video ">
            <video autoplay loop muted>
                <source src="" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class="promo__content">
            <div class="container-lg g-0">
                <div
                    class="promo__content-wrapper d-flex flex-column flex-md-row justify-content-between align-items-center gap-5 py-5 py-md-0">
                    <div class="promo-content">
                        <h1 class="promo__title"> WIN <mark>$100,000</mark>CASH! <mark></mark></h1>
                        <p class="promo__subtitle"> +10 Additional Prizes </p>
                        <div class="d-flex align-items-center flex-wrap gap-30">
                            <a href="#GiftsSection" class="btn overlay">Free Gifts for Donation of $100+</a>
                            <a href="#aboutSection" class="promo__link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357"
                                    viewBox="0 0 19.071 11.357">
                                    <g id="arrow" transform="translate(-382.929 -510.314)">
                                        <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2"
                                            transform="translate(400.586 517.385) rotate(-135)"
                                            fill="var(--accent-color)"></rect>
                                        <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2"
                                            transform="translate(402 516.014) rotate(135)" fill="var(--accent-color)">
                                        </rect>
                                        <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2"
                                            transform="translate(394.586 517.385) rotate(-135)"
                                            fill="var(--accent-color)"></rect>
                                        <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2"
                                            transform="translate(396 516.014) rotate(135)" fill="var(--accent-color)">
                                        </rect>
                                        <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2"
                                            transform="translate(388.586 517.385) rotate(-135)"
                                            fill="var(--accent-color)"></rect>
                                        <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2"
                                            transform="translate(390 516.014) rotate(135)" fill="var(--accent-color)">
                                        </rect>
                                    </g>
                                </svg>
                                <span>About Chofetz Chaim Heritage Foundation</span>
                            </a>
                        </div>
                    </div>

                    <div class="raffle-offer">
                        {{-- <div class="raffle-offer__timer overlay">
                            <p class="raffle-offer__body-title">Drawing in:</p>
                            <ul class="timer__items">
                                <li class="timer__item timer__days">00</li>
                                <li class="timer__item timer__hours">00</li>
                                <li class="timer__item timer__minutes">00</li>
                                <li class="timer__item timer__seconds">00</li>
                            </ul>
                        </div>
                        <div class="raffle-offer__body">
                            <div class="raffle-offer__progress">
                                <div class="raffle-offer__progress-inner" style="width:50%"></div>
                            </div>
                            <p class="raffle-offer__amount">$323,332</p>
                            <span class="raffle-offer__subtitle">$30% of <span class=""> $323,33
                                    Raised</span></span>
                            <span class="raffle-offer__subtitle bonus__amount "> $4343 Raised</span>
                        </div>
                        <div class="raffle-offer__btn">
                            <button class="btn overlay" data-bs-toggle="collapse" data-bs-target="#collapseCart">Donate</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about p-lg" id="aboutSection">
        <div class="about__mobile-container">
            <div class="about__statistics">
                <div class="container-lg g-0">
                    <div class="about__statistics">
                        <div class="container-lg g-0">
                            <div class="about__statistics-list">
                                <dl>
                                    <dd id="fabulousPrizes"></dd>
                                    <dt>Fabulous Prizes</dt>
                                </dl>
                                <span class="divider"></span>
                                <dl>
                                    <dd id="totalDonors"></dd>
                                    <dt>Total<br>Donors</dt>
                                </dl>
                                <span class="divider"></span>
                                <dl>
                                    <dd id="ticketsSold"></dd>
                                    <dt>Tickets<br>Sold</dt>
                                </dl>
                                <span class="divider"></span>
                                <dl>
                                    <dd id="largestDonation"></dd>
                                    <dt>Largest<br>Donation</dt>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="team-overview-wrapper">
            <div class="container-lg g-0">
                <a href="#" class="text-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357"
                        viewBox="0 0 19.071 11.357">
                        <g id="arrow" transform="translate(-382.929 -510.314)">
                            <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2"
                                transform="translate(400.586 517.385) rotate(-135)" fill="var(--accent-color)" />
                            <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2"
                                transform="translate(402 516.014) rotate(135)" fill="var(--accent-color)" />
                            <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2"
                                transform="translate(394.586 517.385) rotate(-135)" fill="var(--accent-color)" />
                            <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2"
                                transform="translate(396 516.014) rotate(135)" fill="var(--accent-color)" />
                            <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2"
                                transform="translate(388.586 517.385) rotate(-135)" fill="var(--accent-color)" />
                            <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2"
                                transform="translate(390 516.014) rotate(135)" fill="var(--accent-color)" />
                        </g>
                    </svg>
                    <span>Campaign Homepage</span>
                </a>
                <div class="team-overview">
                    <div class="team-overview__person overlay">
                        <p class="team-overview__title">Team Page</p>
                        <p class="team-overview__owner"></p>
                    </div>

                    <div class="team-overview__details">
                        <div class="team-overview__list">
                            <dl>
                                <dt>Raised:</dt>
                                <dd id="team-overview-raised"></dd>
                            </dl>
                            <dl>
                                <dt>Goal:</dt>
                                <dd id="team-overview-goal"></dd>
                            </dl>
                            <dl>
                                <dt>Donors:</dt>
                                <dd id="team-overview-donors"></dd>
                            </dl>
                        </div>
                        <div class="team-overview__progress-wrapper">
                            <div class="team-overview__progress-bar">
                                <div class="progress-inner overlay"></div>
                            </div>
                            <div class="team-overview__progress">
                                <span class="percentage"></span>
                                <span class="goal"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about__info">
            <div class="container-lg g-0 about-info__wrapper">
                <div class="text-center">
                    <h2 class="section-title">Section title</h2>
                    <p class="text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione quo nesciunt perspiciatis
                        accusantium voluptates. Rem accusantium ullam cumque? Minus commodi suscipit tempore ullam esse
                        sed harum impedit ducimus voluptatum ipsum! Nobis debitis aliquid obcaecati? Similique
                        exercitationem dolorem sapiente. Doloremque.
                    </p>
                    <a href="#" class="btn overlay">More about d</a>
                </div>
            </div>
        </div>

        <div class="about__banner">
            <div class="container-lg g-0 ">

            </div>
        </div>
    </section>

    <section class="sponsorship">
        <div class="container-lg g-0">
            <div class="sponsorship-inner">
                <h2 class="section-title mb-md-5 mb-4">Sponsorship opportunities</h2>
                <div class="swiper-sponsorship__wrapper">
                    <div class="swiper swiper-sponsorship">
                        <div class="swiper-wrapper">
                            {{-- <div class="swiper-slide">
                                <div class="sponsorship-card">
                                    <div class="sponsorship-img">
                                        <img class="sponsorship-img--background"
                                            src="{{asset('assets/frontend/images/banner.png')}}" alt="">
                            <img class="sponsorship-img--main" src="{{asset('assets/frontend/images/banner.png')}}" alt="">
                        </div>
                        <div class="sponsorship-title">
                            <p>Testing title</p>
                        </div>
                        <button class="btn overlay sponsorship-btn">$545</button>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="sponsorship-card">
                        <div class="sponsorship-img">
                            <img class="sponsorship-img--background" src="{{asset('assets/frontend/images/banner.png')}}" alt="">
                            <img class="sponsorship-img--main" src="{{asset('assets/frontend/images/banner.png')}}" alt="">
                        </div>
                        <div class="sponsorship-title">
                            <p>Testing title</p>
                        </div>
                        <button class="btn overlay sponsorship-btn">$545</button>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="sponsorship-card">
                        <div class="sponsorship-img">
                            <img class="sponsorship-img--background" src="{{asset('assets/frontend/images/banner.png')}}" alt="">
                            <img class="sponsorship-img--main" src="{{asset('assets/frontend/images/banner.png')}}" alt="">
                        </div>
                        <div class="sponsorship-title">
                            <p>Testing title</p>
                        </div>
                        <button class="btn overlay sponsorship-btn">$545</button>
                    </div>
                </div> --}}
                        </div>
                    </div>
                    <div class="swiper-sponsorship__btns">
                        <div class="swiper-button-prev swiper-sponsorship-button-prev overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357"
                                viewBox="0 0 19.071 11.357">
                                <g id="arrow" transform="translate(0 0)">
                                    <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2"
                                        transform="translate(0 5.657) rotate(-45)" fill="currentColor" />
                                    <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2"
                                        transform="translate(1.414 4.286) rotate(45)" fill="currentColor" />
                                    <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2"
                                        transform="translate(6 5.657) rotate(-45)" fill="currentColor" />
                                    <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2"
                                        transform="translate(7.414 4.286) rotate(45)" fill="currentColor" />
                                    <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2"
                                        transform="translate(12 5.657) rotate(-45)" fill="currentColor" />
                                    <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2"
                                        transform="translate(13.414 4.286) rotate(45)" fill="currentColor" />
                                </g>
                            </svg>
                        </div>
                        <div class="swiper-button-next swiper-sponsorship-button-next overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357"
                                viewBox="0 0 19.071 11.357">
                                <g id="arrow" transform="translate(0 0)">
                                    <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2"
                                        transform="translate(0 5.657) rotate(-45)" fill="currentColor" />
                                    <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2"
                                        transform="translate(1.414 4.286) rotate(45)" fill="currentColor" />
                                    <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2"
                                        transform="translate(6 5.657) rotate(-45)" fill="currentColor" />
                                    <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2"
                                        transform="translate(7.414 4.286) rotate(45)" fill="currentColor" />
                                    <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2"
                                        transform="translate(12 5.657) rotate(-45)" fill="currentColor" />
                                    <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2"
                                        transform="translate(13.414 4.286) rotate(45)" fill="currentColor" />
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tickets" id="ticketsSection">
        <div class="container-lg g-0">
            <h2 class="section-title mb-5 px-4 px-md-5 px-lg-0"></h2>
            <div class="d-flex flex-wrap gap-20">
                <section id="ticketOptionsSection" class="ticket-container flex-1">
                    <h3 class="ticket-container__title">Ticket Options</h3>
                    <p class="ticket-container__subtitle">Explore exclusive<br>
                        <b>Ticket Packages</b> below
                    </p>
                    <span class="divider"></span>

                    <div class="position-relative">
                        <div class="options-grid">

                            <div id="options-grid__label" class="ticket-options__control">
                                <p class="ticket-options__control-title">Enter <mark>custom amount</mark> to see entry
                                    details</p>
                            </div>
                            <div id="customAmountCard" class="ticket-options__control text-center">
                                <span class="option-card__checkbox overlay">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849"
                                        viewBox="0 0 17.87 12.849">
                                        <g id="Group_2" data-name="Group 2"
                                            transform="translate(-436.858 -1650.344)">
                                            <rect id="Rectangle_31" data-name="Rectangle 31" width="10"
                                                height="3" rx="1.5"
                                                transform="translate(438.979 1654) rotate(45)" fill="#fff" />
                                            <rect id="Rectangle_32" data-name="Rectangle 32" width="15"
                                                height="3" rx="1.5"
                                                transform="translate(442 1660.95) rotate(-45)" fill="#fff" />
                                        </g>
                                    </svg>
                                </span>
                                <label for="customAmount" class="fw-bold mb-3">Custom Amount:</label>
                                <div class="input-wrapper">
                                    <span><i class="fa fa-caret-down"></i>
                                        <p class="currency-code d-inline">$</p>
                                    </span>

                                    <select class="currency-select" id="currency-select">
                                        <option value="USD">$</option>
                                        <option value="CAD">C$</option>
                                        <option value="GBP">£</option>
                                        <option value="EUR">€</option>
                                        <option value="ILS">₪</option>
                                        <option value="PKR">₨</option>
                                    </select>
                                    <input id="customAmount" class="form-input" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="floating-btn__wrapper">
                            <a id="viewPrizes" href="#prizesSection" class="floating-btn overlay">
                                <span>View<br>Prizes</span>
                            </a>
                        </div>
                    </div>
                </section>


                <section class="ticket-container flex-1">
                    <h3 id="prizesSection" class="ticket-container__title">Prizes</h3>
                    <div class="position-relative">
                        <p class="ticket-container__subtitle prizes__subtitle">Select a ticket<br> to see included
                            prizes</p>
                        <div class="floating-btn__wrapper">
                            <a id="viewTicketOptions" href="#ticketOptionsSection"
                                class="floating-btn overlay animate">
                                <span>Ticket<br>Options</span>
                            </a>
                        </div>
                        <span class="divider"></span>

                        <div class="prizes-grid">
                            <div class="prize grand-prize selected">
                                <div class="prize__body">
                                    <span class="option-card__checkbox overlay">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849"
                                            viewBox="0 0 17.87 12.849">
                                            <g id="Group_2" data-name="Group 2"
                                                transform="translate(-436.858 -1650.344)">
                                                <rect id="Rectangle_31" data-name="Rectangle 31" width="10"
                                                    height="3" rx="1.5"
                                                    transform="translate(438.979 1654) rotate(45)" fill="#fff">
                                                </rect>
                                                <rect id="Rectangle_32" data-name="Rectangle 32" width="15"
                                                    height="3" rx="1.5"
                                                    transform="translate(442 1660.95) rotate(-45)" fill="#fff">
                                                </rect>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="grand-prize__img">
                                        <img src="https://cdn.100kgoral.org/uploads/grand_prizes/grand_prizes17105232660.jpg"
                                            alt="">
                                        <div class="position-relative z-1">
                                            <p class="grand-prize__amount">$100,000</p>
                                            <span class="grand-prize__subtitle">Grand Prize</span>
                                            <!-- <p class="grand-prize__desc">100k</p> -->
                                            <button class="btn">Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <section class="ticket-container prize-split-container">
                    <div class="prize-split">

                        <div class="prize-split__description">
                            <h3 class="prize-split__title">Split the Pot</h3>
                            <p class="prize-split__subtitle">Winner takes half</p>
                            <div>
                                <p class="prize-split__info">Expected to reach</p>
                                <p class="prize-split__price">$25,000</p>
                                <p class="prize-split__info">at least!</p>
                            </div>
                        </div>
                        <div class="prize-split__img">
                            <img src="https://100kgoral.org/images/pit.png" alt="">
                        </div>

                        <div class="prize-split__options">
                            <p class="prize-split__options-title">Choose from one of the following packages</p>
                            <div class="prize-split__btns">


                            </div>
                        </div>
                    </div>
                </section>

                <section id="GiftsSection" class="ticket-container gift-container">
                    <h3 class="ticket-container__title">Free Gifts</h3>
                    <p class="gift-subtitle">For your donation of $100 or more</p>
                    <div class="container tabs p-0">
                        <div class="row d-flex flex-wrap m-auto tab_row">


                            {{-- <div class="col-md-4 col-6 amountTabsButtons col-lg-2" data-amounttab="100">
                                <div class="gift_tab" data-amount="100">$100+<span class="notify_amount"
                                        style="display: none;">0</span></div>
                            </div>

                            <div class="col-md-4 col-6 amountTabsButtons col-lg-2" data-amounttab="180">
                                <div class="gift_tab" data-amount="180">$180+<span class="notify_amount"
                                        style="display: none;">0</span></div>
                            </div>

                            <div class="col-md-4 col-6 amountTabsButtons col-lg-2" data-amounttab="250">
                                <div class="gift_tab" data-amount="250">$250+<span class="notify_amount"
                                        style="display: none;">0</span></div>
                            </div>

                            <div class="col-md-4 col-6 amountTabsButtons col-lg-2" data-amounttab="375">
                                <div class="gift_tab" data-amount="375">$375+<span class="notify_amount"
                                        style="display: none;">0</span></div>
                            </div>

                            <div class="col-md-4 col-6 amountTabsButtons col-lg-2" data-amounttab="500">
                                <div class="gift_tab" data-amount="500">$500+<span class="notify_amount"
                                        style="display: none;">0</span></div>
                            </div> --}}
                        </div>
                    </div>
                    <p class="gift-info-choose "><span> </span></p>
                    <div class="swiper-container">
                        <div class="swiper swiper-gift">
                            <div class="swiper-wrapper">

                            </div>
                        </div>

                    </div>
                    <p class="gift-info"></p>


                    <!-- <div class="gift-btn-wrapper">
                              <a href="#" class="btn btn--gray">View All Gifts</a>
                            </div> -->
                </section>
            </div>
            <!-- <div class="tickets__checkout-btn">
          <button type="button" class="btn overlay">Checkout Now</button>
        </div> -->
    </section>
    @if ($campaign->meta->show_recent_donations === 1)
    <section class="team" id="teamsSection">
        <div class="container-lg g-0 p-lg">

            <h2 class="section-title mb-md-5 mb-4">Donors &amp; Teams</h2>

            <div class="tabs-wrapper">
                <ul class="team__tabs" role="tablist">
                    <li role="presentation">
                        <button class="nav-link active" id="donors-btn" data-bs-toggle="pill"
                            data-bs-target="#donors" type="button" role="tab" aria-controls="pills-donors"
                            aria-selected="true">Donors ( {{ count($donationData) }})</button>
                    </li>
                    @if (count($campaign->teams) > 0)
                      <li role="presentation">
                        <button class="nav-link" id="members-btn" data-bs-toggle="pill" data-bs-target="#members"  type="button" role="tab" aria-controls="pills-members" aria-selected="false"  tabindex="-1">Teams ({{ count($campaign->teams) }})</button>
                     </li>
                    @endif
                </ul>

                <div class="team__filter-wrapper">
                    <div class="select-wrapper">
                        <select class="team__select form-input">
                            <option value="newest">Sort by Latest</option>
                            <option value="alphabatics">Sort by Name</option>
                            <option value="oldest">Sort by Oldest</option>
                            <option value="largest">Sort by Highest</option>
                        </select>
                    </div>

                    <form role="search" class="search-form">
                        <input type="button" value="" class="search-submit">
                        <input type="search" name="q" class="search-text" placeholder="Search Donors..."
                            autocomplete="off" data-id="donor">
                    </form>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade gg show active" id="donors" role="tabpanel"
                    aria-labelledby="donors-btn" tabindex="0">
                    <div class="donors-grid" style="max-height: 451px;">
                        {{-- <div class="donor-card" data-donationid="2223492">
                            <div class="team-card__header">
                                <span class="title">Solomon Vegh</span>
                                <span class="amount">$18.00</span>
                            </div>
                            <div class="donor-card__body">

                                <p class="donor-card__info">
                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_341_5)">
                                            <path d="M11.1238 9.28305C10.753 8.91202 10.3199 8.6092 9.84408 8.38845C10.515 7.84488 10.9431 7.01545 10.9431 6.08531C10.9431 4.44423 9.57452 3.09789 7.93344 3.12307C6.31753 3.14825 5.01563 4.46496 5.01563 6.08531C5.01563 7.01545 5.44515 7.84488 6.11462 8.38845C5.63875 8.60903 5.20554 8.91188 4.83493 9.28305C4.02624 10.0932 3.56709 11.1626 3.53747 12.303C3.53708 12.3189 3.53985 12.3346 3.54563 12.3493C3.5514 12.364 3.56007 12.3774 3.57111 12.3888C3.58215 12.4001 3.59535 12.4091 3.60992 12.4152C3.6245 12.4213 3.64015 12.4245 3.65596 12.4245H4.48539C4.54908 12.4245 4.6024 12.3741 4.60388 12.3105C4.63202 11.4514 4.98008 10.6472 5.59179 10.0369C5.9048 9.72225 6.27713 9.47278 6.68721 9.30295C7.09729 9.13312 7.53698 9.04631 7.98083 9.04755C8.88283 9.04755 9.73151 9.39857 10.3699 10.0369C10.9801 10.6472 11.3282 11.4514 11.3578 12.3105C11.3593 12.3741 11.4126 12.4245 11.4763 12.4245H12.3057C12.3215 12.4245 12.3372 12.4213 12.3517 12.4152C12.3663 12.4091 12.3795 12.4001 12.3906 12.3888C12.4016 12.3774 12.4103 12.364 12.416 12.3493C12.4218 12.3346 12.4246 12.3189 12.4242 12.303C12.3946 11.1626 11.9354 10.0932 11.1238 9.28305ZM7.98083 7.98114C7.47429 7.98114 6.99737 7.78415 6.64042 7.42572C6.46128 7.248 6.31978 7.03601 6.22435 6.80241C6.12893 6.5688 6.08153 6.31837 6.085 6.06605C6.08944 5.58025 6.28347 5.11073 6.62264 4.76267C6.97811 4.39831 7.45355 4.1954 7.96158 4.18948C8.46368 4.18503 8.95097 4.38054 9.3094 4.73156C9.67671 5.09148 9.87815 5.57284 9.87815 6.08531C9.87815 6.59185 9.68116 7.06729 9.32273 7.42572C9.14688 7.60241 8.93773 7.74248 8.7074 7.83782C8.47707 7.93315 8.23011 7.98187 7.98083 7.98114ZM4.27063 6.47632C4.2573 6.34747 4.24989 6.21713 4.24989 6.08531C4.24989 5.84981 4.27211 5.62024 4.31358 5.39659C4.32395 5.34327 4.29581 5.28847 4.24693 5.26625C4.0455 5.1759 3.86036 5.05149 3.7004 4.89449C3.51191 4.71173 3.36359 4.49169 3.26489 4.2484C3.1662 4.00511 3.11931 3.74392 3.1272 3.4815C3.14053 3.00606 3.3316 2.55432 3.66485 2.21366C4.03069 1.83894 4.52242 1.63454 5.04525 1.64047C5.51773 1.64491 5.97391 1.82709 6.31901 2.14997C6.43602 2.25958 6.53674 2.38103 6.62116 2.51137C6.65079 2.55728 6.70855 2.57654 6.75891 2.55876C7.01958 2.46841 7.29507 2.40473 7.57797 2.3751C7.66091 2.36622 7.70831 2.27735 7.67128 2.20329C7.18991 1.25093 6.20645 0.593316 5.06895 0.575543C3.42639 0.550364 2.05783 1.8967 2.05783 3.5363C2.05783 4.46644 2.48588 5.29587 3.15682 5.83944C2.68583 6.05717 2.25186 6.35783 1.87566 6.73404C1.064 7.54421 0.604855 8.61358 0.575232 9.75552C0.574837 9.77133 0.57761 9.78706 0.583387 9.80178C0.589165 9.8165 0.59783 9.82991 0.608872 9.84123C0.619915 9.85255 0.633111 9.86154 0.647683 9.86768C0.662256 9.87382 0.677909 9.87698 0.693722 9.87697H1.52463C1.58832 9.87697 1.64164 9.82662 1.64312 9.76293C1.67126 8.90388 2.01932 8.09963 2.63103 7.48941C3.06648 7.05396 3.59968 6.75181 4.18176 6.60518C4.23952 6.59037 4.27803 6.53557 4.27063 6.47632Z" fill="#999999"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_341_5">
                                                <rect width="13" height="13" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <span class="description">Ruchie Perlstein</span>
                                </p>



                                <p class="donor-card__info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14.346" height="12.552" viewBox="0 0 14.346 12.552">
                                        <g id="history" transform="translate(0 -32.222)">
                                            <path id="Path_44" data-name="Path 44" d="M8.069,32.222a6.281,6.281,0,0,0-6.2,5.38H0l2.69,2.69L5.38,37.6h-1.7a4.482,4.482,0,1,1,.752,3.514L2.974,42.163a6.276,6.276,0,1,0,5.1-9.941Z" fill="#999"></path>
                                            <path id="Path_45" data-name="Path 45" d="M257.778,161.111v3.646l2.677,1.606.923-1.538-1.806-1.084v-2.63Z" transform="translate(-250.605 -125.303)" fill="#999"></path>
                                        </g>
                                    </svg>
                                    <time>Jun 17</time>
                                </p>
                            </div>
                        </div> --}}
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn overlay load-more-donors">Load More</button>
                    </div>
                </div>

                <div class="tab-pane fade  " id="members" role="tabpanel" aria-labelledby="members-btn"
                    tabindex="0">
                    <div class="team-wrapper">
                        <div class="team-members-grid">
                            <div class="team-member-card" data-id="888" data-name="Ruchie Perlstein"
                                data-slug="rperl">
                                <span class="option-card-teams overlay">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849"
                                        viewBox="0 0 17.87 12.849">
                                        <g id="Group_2" data-name="Group 2"
                                            transform="translate(-436.858 -1650.344)">
                                            <rect id="Rectangle_31" data-name="Rectangle 31" width="10"
                                                height="3" rx="1.5"
                                                transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                            <rect id="Rectangle_32" data-name="Rectangle 32" width="15"
                                                height="3" rx="1.5"
                                                transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                        </g>
                                    </svg>
                                </span>
                                <div class="team-member__wrapper">
                                    <div class="team-card__header">

                                        <div class="left">
                                            <span class="title">Ruchie Perlstein</span>
                                            <span class="donors"> 179 donors</span>
                                        </div>
                                        <div class="right">
                                            <span class="amount"> $22,660</span>
                                            <span class="raised">of $20,000 raised</span>
                                        </div>
                                    </div>
                                    <div class="progress" role="progressbar">
                                        <div class="progress-bar" style="width: 113%"></div>
                                    </div>
                                    <div class="team-card__btns">
                                        <button type="button" class="btn overlay select-team">Select Team</button>
                                        <a href="https://100kgoral.org/campaign/cchf/rperl">
                                            <button type="button" class="btn overlay donate-btn">Visit Team</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn overlay load-more-teams">Load More</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- <div class="blog-sub-container d-none">
        <div class="blog-cards-wrap"></div>
    </div> --}}

    <section class="additionalContent" id="additionalContent">
        <div class="additional__info">
            <div class="container-lg g-0 p-lg additional-info__wrapper">
                <div class="text-center">
                    <p class="text"> </p>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery">
        <div class="container-lg g-0 p-lg">
            <h2 class="section-title mb-5">Gallery</h2>
            <div class="swiper swiper-gallery">
                <div class="swiper-wrapper gallery-grid">
                    {{-- <div class="swiper-slide">
                        <a href="#" class="swiper-slide gallery-item no-pointer">
                            <span class="gallery-item__media">

                                <img src="{{ asset('assets/frontend/images/img1.png') }}" alt="">
                            </span>
                            <span class="gallery-item__description">
                                <p>Gallery Title</p>
                            </span>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="swiper-slide gallery-item no-pointer">
                            <span class="gallery-item__media">
                                <img src="{{ asset('assets/frontend/images/banner.png') }}" alt="">
                            </span>
                            <span class="gallery-item__description">
                                <p>Gallery Title</p>
                            </span>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="swiper-slide gallery-item no-pointer">
                            <span class="gallery-item__media">
                                <img src="{{ asset('assets/frontend/images/img2.png') }}" alt="">
                            </span>
                            <span class="gallery-item__description">
                                <p>Gallery Title</p>
                            </span>
                        </a>
                    </div> --}}
                </div>
                <div class="swiper-gallery__btns">
                    <div class="swiper-button-prev swiper-gallery-button-prev overlay">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357"
                            viewBox="0 0 19.071 11.357">
                            <g id="arrow" transform="translate(0 0)">
                                <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2"
                                    transform="translate(0 5.657) rotate(-45)" fill="currentColor" />
                                <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2"
                                    transform="translate(1.414 4.286) rotate(45)" fill="currentColor" />
                                <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2"
                                    transform="translate(6 5.657) rotate(-45)" fill="currentColor" />
                                <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2"
                                    transform="translate(7.414 4.286) rotate(45)" fill="currentColor" />
                                <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2"
                                    transform="translate(12 5.657) rotate(-45)" fill="currentColor" />
                                <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2"
                                    transform="translate(13.414 4.286) rotate(45)" fill="currentColor" />
                            </g>
                        </svg>
                    </div>
                    <div class="swiper-button-next swiper-gallery-button-next overlay">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357"
                            viewBox="0 0 19.071 11.357">
                            <g id="arrow" transform="translate(0 0)">
                                <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2"
                                    transform="translate(0 5.657) rotate(-45)" fill="currentColor" />
                                <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2"
                                    transform="translate(1.414 4.286) rotate(45)" fill="currentColor" />
                                <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2"
                                    transform="translate(6 5.657) rotate(-45)" fill="currentColor" />
                                <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2"
                                    transform="translate(7.414 4.286) rotate(45)" fill="currentColor" />
                                <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2"
                                    transform="translate(12 5.657) rotate(-45)" fill="currentColor" />
                                <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2"
                                    transform="translate(13.414 4.286) rotate(45)" fill="currentColor" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <!-- <a href="" class="btn overlay">Load More</a> -->
            </div>
        </div>
    </section>

    <style>
        .cart {
            display: none;
        }
    </style>
</main>
@include('frontend.templates.raffle-template.includes.footer')
{{-- @endsection --}}

@section('scripts')

    <script type="module" src="{{ asset('assets/frontend/templates/raffle/js/main.js') }}?v={{ time() }}"></script>

@endsection
