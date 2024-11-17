@extends('frontend.layout')
@section('title', 'CCHF')

@section('main_content')
<main>


    <section class="promo">
        <div class="promo__images">
            <img alt="img">
        </div>
        <div class="promo__images promo__video ">
            <video autoplay loop muted>
                <source src="your-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class="promo__content">
            <div class="container-lg g-0">
                <div class="promo__content-wrapper d-flex flex-column flex-md-row justify-content-between align-items-center gap-5 py-5 py-md-0">
                    <div class="promo-content">
                        <h1 class="promo__title"> WIN <mark>$100,000</mark>CASH! <mark></mark></h1>
                        <p class="promo__subtitle"> +10 Additional Prizes </p>
                        <div class="d-flex align-items-center flex-wrap gap-30">
                            <a href="#GiftsSection" class="btn overlay">Free Gifts for Donation of $100+</a>
                            <a href="#aboutSection" class="promo__link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357" viewBox="0 0 19.071 11.357">
                                    <g id="arrow" transform="translate(-382.929 -510.314)">
                                        <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2" transform="translate(400.586 517.385) rotate(-135)" fill="var(--accent-color)"></rect>
                                        <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2" transform="translate(402 516.014) rotate(135)" fill="var(--accent-color)"></rect>
                                        <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2" transform="translate(394.586 517.385) rotate(-135)" fill="var(--accent-color)"></rect>
                                        <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2" transform="translate(396 516.014) rotate(135)" fill="var(--accent-color)"></rect>
                                        <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2" transform="translate(388.586 517.385) rotate(-135)" fill="var(--accent-color)"></rect>
                                        <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2" transform="translate(390 516.014) rotate(135)" fill="var(--accent-color)"></rect>
                                    </g>
                                </svg>
                                <span>About Chofetz Chaim Heritage Foundation</span>
                            </a>
                        </div>
                    </div>

                    <div class="raffle-offer">
                        <div class="raffle-offer__timer overlay">
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
                            <span class="raffle-offer__subtitle">$30% of <span class=""> $323,33 Raised</span></span>
                            <span class="raffle-offer__subtitle bonus__amount "> $4343 Raised</span>
                        </div>
                        <div class="raffle-offer__btn">
                            <button class="btn overlay" data-bs-toggle="collapse" data-bs-target="#collapseCart">Donate</button>

                        </div>
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
                                    <dd id="fabulousPrizes">10</dd>
                                    <dt>Fabulous Prizes</dt>
                                </dl>
                                <span class="divider"></span>
                                <dl>
                                    <dd id="totalDonors">5,905</dd>
                                    <dt>Total<br>Donors</dt>
                                </dl>
                                <span class="divider"></span>
                                <dl>
                                    <dd id="ticketsSold">9,562</dd>
                                    <dt>Tickets<br>Sold</dt>
                                </dl>
                                <span class="divider"></span>
                                <dl>
                                    <dd id="largestDonation">5,000</dd>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357" viewBox="0 0 19.071 11.357">
                        <g id="arrow" transform="translate(-382.929 -510.314)">
                            <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2" transform="translate(400.586 517.385) rotate(-135)" fill="var(--accent-color)" />
                            <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2" transform="translate(402 516.014) rotate(135)" fill="var(--accent-color)" />
                            <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2" transform="translate(394.586 517.385) rotate(-135)" fill="var(--accent-color)" />
                            <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2" transform="translate(396 516.014) rotate(135)" fill="var(--accent-color)" />
                            <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2" transform="translate(388.586 517.385) rotate(-135)" fill="var(--accent-color)" />
                            <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2" transform="translate(390 516.014) rotate(135)" fill="var(--accent-color)" />
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
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione quo nesciunt perspiciatis accusantium voluptates. Rem accusantium ullam cumque? Minus commodi suscipit tempore ullam esse sed harum impedit ducimus voluptatum ipsum! Nobis debitis aliquid obcaecati? Similique exercitationem dolorem sapiente. Doloremque.
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
                        </div>
                    </div>
                    <div class="swiper-sponsorship__btns">
                        <div class="swiper-button-prev swiper-sponsorship-button-prev overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357" viewBox="0 0 19.071 11.357">
                                <g id="arrow" transform="translate(0 0)">
                                    <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2" transform="translate(0 5.657) rotate(-45)" fill="currentColor" />
                                    <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2" transform="translate(1.414 4.286) rotate(45)" fill="currentColor" />
                                    <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2" transform="translate(6 5.657) rotate(-45)" fill="currentColor" />
                                    <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2" transform="translate(7.414 4.286) rotate(45)" fill="currentColor" />
                                    <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2" transform="translate(12 5.657) rotate(-45)" fill="currentColor" />
                                    <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2" transform="translate(13.414 4.286) rotate(45)" fill="currentColor" />
                                </g>
                            </svg>
                        </div>
                        <div class="swiper-button-next swiper-sponsorship-button-next overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357" viewBox="0 0 19.071 11.357">
                                <g id="arrow" transform="translate(0 0)">
                                    <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2" transform="translate(0 5.657) rotate(-45)" fill="currentColor" />
                                    <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2" transform="translate(1.414 4.286) rotate(45)" fill="currentColor" />
                                    <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2" transform="translate(6 5.657) rotate(-45)" fill="currentColor" />
                                    <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2" transform="translate(7.414 4.286) rotate(45)" fill="currentColor" />
                                    <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2" transform="translate(12 5.657) rotate(-45)" fill="currentColor" />
                                    <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2" transform="translate(13.414 4.286) rotate(45)" fill="currentColor" />
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
                            <label class="option-card " data-id="48">
                                <input class="card-input" type="radio" name="option-card">
                                <div class="card-body">
                                    <span class="option-card__checkbox overlay">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                                            <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                                <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5" transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                                <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5" transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="option-card__header d-flex align-items-center justify-content-between">
                                        <span class="option-card__amount">$1,000</span>
                                        <span class="currency__amount__mobile d-none"></span>
                                        <input type="hidden" class="ticket_amount_usd" value="1000">
                                        <div class="voucher discounted discountedVoucherWidth" data-previousentries="15">

                                            <div class="voucher-amount voucher-amount--discounted">
                                                <span class="discounted-entry-number">15</span>
                                                <span class="entry-label">Entries</span>
                                            </div>
                                            <div class="voucher-amount voucher-amount--regular">
                                                <span class="entry-number discount-color">0</span>
                                                <span class="entry-label">Entries</span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="currency__amount py-1"></span>

                                    <span class="divider"></span>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="option-card__grand-prize blue ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="37.074" height="29.372" viewBox="0 0 37.074 29.372">
                                                <path id="Path_20" data-name="Path 20" d="M13.959,13.892a10.2,10.2,0,0,0,9.249,0c2.552-1.478,2.53-3.878-.03-5.356a10.2,10.2,0,0,0-9.249,0C11.384,10.014,11.4,12.407,13.959,13.892Zm1.173-2.56c.2-.061.389-.13.579-.19a.4.4,0,0,1,.29-.023.259.259,0,0,1,.091.107,2.049,2.049,0,0,0,.61.655.97.97,0,0,0,.145.1,1.774,1.774,0,0,0,.5.19c.5.107.937-.084.884-.389a.7.7,0,0,0-.137-.3,5.506,5.506,0,0,1-.5-.747c-.183-.427-.1-.808.488-1.112a3.024,3.024,0,0,1,2.2-.152c.32.091.32.091.571-.053.084-.046.168-.1.251-.145a.356.356,0,0,1,.45,0c.061.03.114.069.175.1.4.229.4.229.008.465-.282.16-.282.16-.046.35a2.062,2.062,0,0,1,.434.465c.061.091.023.16-.122.206-.221.069-.442.145-.663.213a.407.407,0,0,1-.282.015.39.39,0,0,1-.091-.1,1.848,1.848,0,0,0-.663-.61c-.038-.023-.084-.046-.13-.069a1.668,1.668,0,0,0-.312-.122c-.427-.1-.8.061-.747.328a.9.9,0,0,0,.19.381,5.574,5.574,0,0,1,.427.648c.358.716-.419,1.417-1.661,1.486a3.439,3.439,0,0,1-1.265-.16.481.481,0,0,0-.434.038c-.13.084-.274.16-.4.236a.365.365,0,0,1-.373.008c-.091-.046-.175-.1-.267-.145-.061-.038-.122-.069-.183-.107-.13-.076-.114-.152.008-.229.1-.061.2-.114.29-.175.221-.13.221-.137.038-.282a2.4,2.4,0,0,1-.564-.587C14.843,11.462,14.866,11.424,15.133,11.332Zm8.907,3.032a2.809,2.809,0,0,1,2.56,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0A.785.785,0,0,1,24.039,14.365Zm-13.5-7.794a2.825,2.825,0,0,1,2.568,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0C9.838,7.645,9.83,6.982,10.538,6.571ZM.946,9.748,21.159,21.412a4.633,4.633,0,0,0,4.221,0l10.827-6.293a1.294,1.294,0,0,0-.008-2.446L15.986,1a4.673,4.673,0,0,0-4.229,0L.931,7.3A1.294,1.294,0,0,0,.946,9.748ZM5.335,7.271a3.42,3.42,0,0,0-.411-.2l6.469-3.756a2.453,2.453,0,0,0,.343.236,4.721,4.721,0,0,0,4.274,0,1.8,1.8,0,0,0,.35-.251L32.1,12.391a3.437,3.437,0,0,0-.587.267,1.307,1.307,0,0,0,.015,2.476,3.518,3.518,0,0,0,.594.267l-6.529,3.794a2.535,2.535,0,0,0-.465-.343,4.7,4.7,0,0,0-4.274,0,1.958,1.958,0,0,0-.244.168L4.916,9.953a3.165,3.165,0,0,0,.427-.206A1.308,1.308,0,0,0,5.335,7.271ZM.42,12.079a2.06,2.06,0,0,1,1.806.061l21.12,12.19,11.421-6.636a1.97,1.97,0,0,1,1.8,0,.551.551,0,0,1,.008,1.044L24.435,25.793a2.389,2.389,0,0,1-2.156,0l-.427-.244-.3-.175L.375,13.153C-.136,12.848-.128,12.361.42,12.079ZM36.6,22.555,24.458,29.61a2.389,2.389,0,0,1-2.156,0l-.427-.244-.3-.175L.4,16.963c-.518-.3-.5-.785.046-1.074a2.06,2.06,0,0,1,1.806.061l21.12,12.19,11.413-6.628a1.986,1.986,0,0,1,1.806,0A.552.552,0,0,1,36.6,22.555Z" transform="translate(0 -0.495)" fill="currentColor"></path>
                                            </svg>
                                            <span class="option-card__grand-prize-amount">$100k Cash</span>
                                        </div>
                                        <span class="option-card__plus">+</span>
                                        <div class="option-card__prizes">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19.813" height="20" viewBox="0 0 19.813 20">
                                                <g id="Group_28" data-name="Group 28" transform="translate(-3.112 -3)">
                                                    <path id="Path_18" data-name="Path 18" d="M21.456,6.861h-2.15A2.708,2.708,0,0,0,19.269,4.5a2.741,2.741,0,0,0-4.649-.38l-1.6,2.178-1.6-2.176a2.741,2.741,0,0,0-4.648.375,2.711,2.711,0,0,0-.038,2.369H4.574A1.466,1.466,0,0,0,3.112,8.33v1.56a1.459,1.459,0,0,0,1.461,1.461H21.456a1.466,1.466,0,0,0,1.469-1.461V8.33A1.473,1.473,0,0,0,21.456,6.861Zm-5.5-1.768a1.089,1.089,0,0,1,1.846.151,1.094,1.094,0,0,1-.959,1.591l-2.18.015ZM8.239,5.24a1.088,1.088,0,0,1,1.845-.146L11.377,6.85,9.2,6.835A1.093,1.093,0,0,1,8.239,5.24Z" fill="var(--accent-color)"></path>
                                                    <path id="Path_19" data-name="Path 19" d="M4.787,22.582A2.424,2.424,0,0,0,7.214,25H19.382a2.424,2.424,0,0,0,2.427-2.419V15H4.787Z" transform="translate(-0.279 -2.001)" fill="var(--accent-color)"></path>
                                                </g>
                                            </svg>
                                            <p class="option-card__prizes-desc desktop">All 10 Prizes</p>
                                            <p class="option-card__prizes-desc mobile">10/<span>10</span> Prizes</p>
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <label class="option-card " data-id="48">
                                <input class="card-input" type="radio" name="option-card">
                                <div class="card-body">
                                    <span class="option-card__checkbox overlay">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                                            <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                                <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5" transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                                <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5" transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="option-card__header d-flex align-items-center justify-content-between">
                                        <span class="option-card__amount">$1,000</span>
                                        <span class="currency__amount__mobile d-none"></span>
                                        <input type="hidden" class="ticket_amount_usd" value="1000">
                                        <div class="voucher discounted discountedVoucherWidth" data-previousentries="15">

                                            <div class="voucher-amount voucher-amount--discounted">
                                                <span class="discounted-entry-number">15</span>
                                                <span class="entry-label">Entries</span>
                                            </div>
                                            <div class="voucher-amount voucher-amount--regular">
                                                <span class="entry-number discount-color">0</span>
                                                <span class="entry-label">Entries</span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="currency__amount py-1"></span>

                                    <span class="divider"></span>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="option-card__grand-prize blue ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="37.074" height="29.372" viewBox="0 0 37.074 29.372">
                                                <path id="Path_20" data-name="Path 20" d="M13.959,13.892a10.2,10.2,0,0,0,9.249,0c2.552-1.478,2.53-3.878-.03-5.356a10.2,10.2,0,0,0-9.249,0C11.384,10.014,11.4,12.407,13.959,13.892Zm1.173-2.56c.2-.061.389-.13.579-.19a.4.4,0,0,1,.29-.023.259.259,0,0,1,.091.107,2.049,2.049,0,0,0,.61.655.97.97,0,0,0,.145.1,1.774,1.774,0,0,0,.5.19c.5.107.937-.084.884-.389a.7.7,0,0,0-.137-.3,5.506,5.506,0,0,1-.5-.747c-.183-.427-.1-.808.488-1.112a3.024,3.024,0,0,1,2.2-.152c.32.091.32.091.571-.053.084-.046.168-.1.251-.145a.356.356,0,0,1,.45,0c.061.03.114.069.175.1.4.229.4.229.008.465-.282.16-.282.16-.046.35a2.062,2.062,0,0,1,.434.465c.061.091.023.16-.122.206-.221.069-.442.145-.663.213a.407.407,0,0,1-.282.015.39.39,0,0,1-.091-.1,1.848,1.848,0,0,0-.663-.61c-.038-.023-.084-.046-.13-.069a1.668,1.668,0,0,0-.312-.122c-.427-.1-.8.061-.747.328a.9.9,0,0,0,.19.381,5.574,5.574,0,0,1,.427.648c.358.716-.419,1.417-1.661,1.486a3.439,3.439,0,0,1-1.265-.16.481.481,0,0,0-.434.038c-.13.084-.274.16-.4.236a.365.365,0,0,1-.373.008c-.091-.046-.175-.1-.267-.145-.061-.038-.122-.069-.183-.107-.13-.076-.114-.152.008-.229.1-.061.2-.114.29-.175.221-.13.221-.137.038-.282a2.4,2.4,0,0,1-.564-.587C14.843,11.462,14.866,11.424,15.133,11.332Zm8.907,3.032a2.809,2.809,0,0,1,2.56,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0A.785.785,0,0,1,24.039,14.365Zm-13.5-7.794a2.825,2.825,0,0,1,2.568,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0C9.838,7.645,9.83,6.982,10.538,6.571ZM.946,9.748,21.159,21.412a4.633,4.633,0,0,0,4.221,0l10.827-6.293a1.294,1.294,0,0,0-.008-2.446L15.986,1a4.673,4.673,0,0,0-4.229,0L.931,7.3A1.294,1.294,0,0,0,.946,9.748ZM5.335,7.271a3.42,3.42,0,0,0-.411-.2l6.469-3.756a2.453,2.453,0,0,0,.343.236,4.721,4.721,0,0,0,4.274,0,1.8,1.8,0,0,0,.35-.251L32.1,12.391a3.437,3.437,0,0,0-.587.267,1.307,1.307,0,0,0,.015,2.476,3.518,3.518,0,0,0,.594.267l-6.529,3.794a2.535,2.535,0,0,0-.465-.343,4.7,4.7,0,0,0-4.274,0,1.958,1.958,0,0,0-.244.168L4.916,9.953a3.165,3.165,0,0,0,.427-.206A1.308,1.308,0,0,0,5.335,7.271ZM.42,12.079a2.06,2.06,0,0,1,1.806.061l21.12,12.19,11.421-6.636a1.97,1.97,0,0,1,1.8,0,.551.551,0,0,1,.008,1.044L24.435,25.793a2.389,2.389,0,0,1-2.156,0l-.427-.244-.3-.175L.375,13.153C-.136,12.848-.128,12.361.42,12.079ZM36.6,22.555,24.458,29.61a2.389,2.389,0,0,1-2.156,0l-.427-.244-.3-.175L.4,16.963c-.518-.3-.5-.785.046-1.074a2.06,2.06,0,0,1,1.806.061l21.12,12.19,11.413-6.628a1.986,1.986,0,0,1,1.806,0A.552.552,0,0,1,36.6,22.555Z" transform="translate(0 -0.495)" fill="currentColor"></path>
                                            </svg>
                                            <span class="option-card__grand-prize-amount">$100k Cash</span>
                                        </div>
                                        <span class="option-card__plus">+</span>
                                        <div class="option-card__prizes">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19.813" height="20" viewBox="0 0 19.813 20">
                                                <g id="Group_28" data-name="Group 28" transform="translate(-3.112 -3)">
                                                    <path id="Path_18" data-name="Path 18" d="M21.456,6.861h-2.15A2.708,2.708,0,0,0,19.269,4.5a2.741,2.741,0,0,0-4.649-.38l-1.6,2.178-1.6-2.176a2.741,2.741,0,0,0-4.648.375,2.711,2.711,0,0,0-.038,2.369H4.574A1.466,1.466,0,0,0,3.112,8.33v1.56a1.459,1.459,0,0,0,1.461,1.461H21.456a1.466,1.466,0,0,0,1.469-1.461V8.33A1.473,1.473,0,0,0,21.456,6.861Zm-5.5-1.768a1.089,1.089,0,0,1,1.846.151,1.094,1.094,0,0,1-.959,1.591l-2.18.015ZM8.239,5.24a1.088,1.088,0,0,1,1.845-.146L11.377,6.85,9.2,6.835A1.093,1.093,0,0,1,8.239,5.24Z" fill="var(--accent-color)"></path>
                                                    <path id="Path_19" data-name="Path 19" d="M4.787,22.582A2.424,2.424,0,0,0,7.214,25H19.382a2.424,2.424,0,0,0,2.427-2.419V15H4.787Z" transform="translate(-0.279 -2.001)" fill="var(--accent-color)"></path>
                                                </g>
                                            </svg>
                                            <p class="option-card__prizes-desc desktop">All 10 Prizes</p>
                                            <p class="option-card__prizes-desc mobile">10/<span>10</span> Prizes</p>
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <label class="option-card " data-id="48">
                                <input class="card-input" type="radio" name="option-card">
                                <div class="card-body">
                                    <span class="option-card__checkbox overlay">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                                            <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                                <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5" transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                                <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5" transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="option-card__header d-flex align-items-center justify-content-between">
                                        <span class="option-card__amount">$1,000</span>
                                        <span class="currency__amount__mobile d-none"></span>
                                        <input type="hidden" class="ticket_amount_usd" value="1000">
                                        <div class="voucher discounted discountedVoucherWidth" data-previousentries="15">

                                            <div class="voucher-amount voucher-amount--discounted">
                                                <span class="discounted-entry-number">15</span>
                                                <span class="entry-label">Entries</span>
                                            </div>
                                            <div class="voucher-amount voucher-amount--regular">
                                                <span class="entry-number discount-color">0</span>
                                                <span class="entry-label">Entries</span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="currency__amount py-1"></span>

                                    <span class="divider"></span>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="option-card__grand-prize blue ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="37.074" height="29.372" viewBox="0 0 37.074 29.372">
                                                <path id="Path_20" data-name="Path 20" d="M13.959,13.892a10.2,10.2,0,0,0,9.249,0c2.552-1.478,2.53-3.878-.03-5.356a10.2,10.2,0,0,0-9.249,0C11.384,10.014,11.4,12.407,13.959,13.892Zm1.173-2.56c.2-.061.389-.13.579-.19a.4.4,0,0,1,.29-.023.259.259,0,0,1,.091.107,2.049,2.049,0,0,0,.61.655.97.97,0,0,0,.145.1,1.774,1.774,0,0,0,.5.19c.5.107.937-.084.884-.389a.7.7,0,0,0-.137-.3,5.506,5.506,0,0,1-.5-.747c-.183-.427-.1-.808.488-1.112a3.024,3.024,0,0,1,2.2-.152c.32.091.32.091.571-.053.084-.046.168-.1.251-.145a.356.356,0,0,1,.45,0c.061.03.114.069.175.1.4.229.4.229.008.465-.282.16-.282.16-.046.35a2.062,2.062,0,0,1,.434.465c.061.091.023.16-.122.206-.221.069-.442.145-.663.213a.407.407,0,0,1-.282.015.39.39,0,0,1-.091-.1,1.848,1.848,0,0,0-.663-.61c-.038-.023-.084-.046-.13-.069a1.668,1.668,0,0,0-.312-.122c-.427-.1-.8.061-.747.328a.9.9,0,0,0,.19.381,5.574,5.574,0,0,1,.427.648c.358.716-.419,1.417-1.661,1.486a3.439,3.439,0,0,1-1.265-.16.481.481,0,0,0-.434.038c-.13.084-.274.16-.4.236a.365.365,0,0,1-.373.008c-.091-.046-.175-.1-.267-.145-.061-.038-.122-.069-.183-.107-.13-.076-.114-.152.008-.229.1-.061.2-.114.29-.175.221-.13.221-.137.038-.282a2.4,2.4,0,0,1-.564-.587C14.843,11.462,14.866,11.424,15.133,11.332Zm8.907,3.032a2.809,2.809,0,0,1,2.56,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0A.785.785,0,0,1,24.039,14.365Zm-13.5-7.794a2.825,2.825,0,0,1,2.568,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0C9.838,7.645,9.83,6.982,10.538,6.571ZM.946,9.748,21.159,21.412a4.633,4.633,0,0,0,4.221,0l10.827-6.293a1.294,1.294,0,0,0-.008-2.446L15.986,1a4.673,4.673,0,0,0-4.229,0L.931,7.3A1.294,1.294,0,0,0,.946,9.748ZM5.335,7.271a3.42,3.42,0,0,0-.411-.2l6.469-3.756a2.453,2.453,0,0,0,.343.236,4.721,4.721,0,0,0,4.274,0,1.8,1.8,0,0,0,.35-.251L32.1,12.391a3.437,3.437,0,0,0-.587.267,1.307,1.307,0,0,0,.015,2.476,3.518,3.518,0,0,0,.594.267l-6.529,3.794a2.535,2.535,0,0,0-.465-.343,4.7,4.7,0,0,0-4.274,0,1.958,1.958,0,0,0-.244.168L4.916,9.953a3.165,3.165,0,0,0,.427-.206A1.308,1.308,0,0,0,5.335,7.271ZM.42,12.079a2.06,2.06,0,0,1,1.806.061l21.12,12.19,11.421-6.636a1.97,1.97,0,0,1,1.8,0,.551.551,0,0,1,.008,1.044L24.435,25.793a2.389,2.389,0,0,1-2.156,0l-.427-.244-.3-.175L.375,13.153C-.136,12.848-.128,12.361.42,12.079ZM36.6,22.555,24.458,29.61a2.389,2.389,0,0,1-2.156,0l-.427-.244-.3-.175L.4,16.963c-.518-.3-.5-.785.046-1.074a2.06,2.06,0,0,1,1.806.061l21.12,12.19,11.413-6.628a1.986,1.986,0,0,1,1.806,0A.552.552,0,0,1,36.6,22.555Z" transform="translate(0 -0.495)" fill="currentColor"></path>
                                            </svg>
                                            <span class="option-card__grand-prize-amount">$100k Cash</span>
                                        </div>
                                        <span class="option-card__plus">+</span>
                                        <div class="option-card__prizes">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19.813" height="20" viewBox="0 0 19.813 20">
                                                <g id="Group_28" data-name="Group 28" transform="translate(-3.112 -3)">
                                                    <path id="Path_18" data-name="Path 18" d="M21.456,6.861h-2.15A2.708,2.708,0,0,0,19.269,4.5a2.741,2.741,0,0,0-4.649-.38l-1.6,2.178-1.6-2.176a2.741,2.741,0,0,0-4.648.375,2.711,2.711,0,0,0-.038,2.369H4.574A1.466,1.466,0,0,0,3.112,8.33v1.56a1.459,1.459,0,0,0,1.461,1.461H21.456a1.466,1.466,0,0,0,1.469-1.461V8.33A1.473,1.473,0,0,0,21.456,6.861Zm-5.5-1.768a1.089,1.089,0,0,1,1.846.151,1.094,1.094,0,0,1-.959,1.591l-2.18.015ZM8.239,5.24a1.088,1.088,0,0,1,1.845-.146L11.377,6.85,9.2,6.835A1.093,1.093,0,0,1,8.239,5.24Z" fill="var(--accent-color)"></path>
                                                    <path id="Path_19" data-name="Path 19" d="M4.787,22.582A2.424,2.424,0,0,0,7.214,25H19.382a2.424,2.424,0,0,0,2.427-2.419V15H4.787Z" transform="translate(-0.279 -2.001)" fill="var(--accent-color)"></path>
                                                </g>
                                            </svg>
                                            <p class="option-card__prizes-desc desktop">All 10 Prizes</p>
                                            <p class="option-card__prizes-desc mobile">10/<span>10</span> Prizes</p>
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <label class="option-card " data-id="48">
                                <input class="card-input" type="radio" name="option-card">
                                <div class="card-body">
                                    <span class="option-card__checkbox overlay">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                                            <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                                <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5" transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                                <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5" transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="option-card__header d-flex align-items-center justify-content-between">
                                        <span class="option-card__amount">$1,000</span>
                                        <span class="currency__amount__mobile d-none"></span>
                                        <input type="hidden" class="ticket_amount_usd" value="1000">
                                        <div class="voucher discounted discountedVoucherWidth" data-previousentries="15">

                                            <div class="voucher-amount voucher-amount--discounted">
                                                <span class="discounted-entry-number">15</span>
                                                <span class="entry-label">Entries</span>
                                            </div>
                                            <div class="voucher-amount voucher-amount--regular">
                                                <span class="entry-number discount-color">0</span>
                                                <span class="entry-label">Entries</span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="currency__amount py-1"></span>

                                    <span class="divider"></span>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="option-card__grand-prize blue ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="37.074" height="29.372" viewBox="0 0 37.074 29.372">
                                                <path id="Path_20" data-name="Path 20" d="M13.959,13.892a10.2,10.2,0,0,0,9.249,0c2.552-1.478,2.53-3.878-.03-5.356a10.2,10.2,0,0,0-9.249,0C11.384,10.014,11.4,12.407,13.959,13.892Zm1.173-2.56c.2-.061.389-.13.579-.19a.4.4,0,0,1,.29-.023.259.259,0,0,1,.091.107,2.049,2.049,0,0,0,.61.655.97.97,0,0,0,.145.1,1.774,1.774,0,0,0,.5.19c.5.107.937-.084.884-.389a.7.7,0,0,0-.137-.3,5.506,5.506,0,0,1-.5-.747c-.183-.427-.1-.808.488-1.112a3.024,3.024,0,0,1,2.2-.152c.32.091.32.091.571-.053.084-.046.168-.1.251-.145a.356.356,0,0,1,.45,0c.061.03.114.069.175.1.4.229.4.229.008.465-.282.16-.282.16-.046.35a2.062,2.062,0,0,1,.434.465c.061.091.023.16-.122.206-.221.069-.442.145-.663.213a.407.407,0,0,1-.282.015.39.39,0,0,1-.091-.1,1.848,1.848,0,0,0-.663-.61c-.038-.023-.084-.046-.13-.069a1.668,1.668,0,0,0-.312-.122c-.427-.1-.8.061-.747.328a.9.9,0,0,0,.19.381,5.574,5.574,0,0,1,.427.648c.358.716-.419,1.417-1.661,1.486a3.439,3.439,0,0,1-1.265-.16.481.481,0,0,0-.434.038c-.13.084-.274.16-.4.236a.365.365,0,0,1-.373.008c-.091-.046-.175-.1-.267-.145-.061-.038-.122-.069-.183-.107-.13-.076-.114-.152.008-.229.1-.061.2-.114.29-.175.221-.13.221-.137.038-.282a2.4,2.4,0,0,1-.564-.587C14.843,11.462,14.866,11.424,15.133,11.332Zm8.907,3.032a2.809,2.809,0,0,1,2.56,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0A.785.785,0,0,1,24.039,14.365Zm-13.5-7.794a2.825,2.825,0,0,1,2.568,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0C9.838,7.645,9.83,6.982,10.538,6.571ZM.946,9.748,21.159,21.412a4.633,4.633,0,0,0,4.221,0l10.827-6.293a1.294,1.294,0,0,0-.008-2.446L15.986,1a4.673,4.673,0,0,0-4.229,0L.931,7.3A1.294,1.294,0,0,0,.946,9.748ZM5.335,7.271a3.42,3.42,0,0,0-.411-.2l6.469-3.756a2.453,2.453,0,0,0,.343.236,4.721,4.721,0,0,0,4.274,0,1.8,1.8,0,0,0,.35-.251L32.1,12.391a3.437,3.437,0,0,0-.587.267,1.307,1.307,0,0,0,.015,2.476,3.518,3.518,0,0,0,.594.267l-6.529,3.794a2.535,2.535,0,0,0-.465-.343,4.7,4.7,0,0,0-4.274,0,1.958,1.958,0,0,0-.244.168L4.916,9.953a3.165,3.165,0,0,0,.427-.206A1.308,1.308,0,0,0,5.335,7.271ZM.42,12.079a2.06,2.06,0,0,1,1.806.061l21.12,12.19,11.421-6.636a1.97,1.97,0,0,1,1.8,0,.551.551,0,0,1,.008,1.044L24.435,25.793a2.389,2.389,0,0,1-2.156,0l-.427-.244-.3-.175L.375,13.153C-.136,12.848-.128,12.361.42,12.079ZM36.6,22.555,24.458,29.61a2.389,2.389,0,0,1-2.156,0l-.427-.244-.3-.175L.4,16.963c-.518-.3-.5-.785.046-1.074a2.06,2.06,0,0,1,1.806.061l21.12,12.19,11.413-6.628a1.986,1.986,0,0,1,1.806,0A.552.552,0,0,1,36.6,22.555Z" transform="translate(0 -0.495)" fill="currentColor"></path>
                                            </svg>
                                            <span class="option-card__grand-prize-amount">$100k Cash</span>
                                        </div>
                                        <span class="option-card__plus">+</span>
                                        <div class="option-card__prizes">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19.813" height="20" viewBox="0 0 19.813 20">
                                                <g id="Group_28" data-name="Group 28" transform="translate(-3.112 -3)">
                                                    <path id="Path_18" data-name="Path 18" d="M21.456,6.861h-2.15A2.708,2.708,0,0,0,19.269,4.5a2.741,2.741,0,0,0-4.649-.38l-1.6,2.178-1.6-2.176a2.741,2.741,0,0,0-4.648.375,2.711,2.711,0,0,0-.038,2.369H4.574A1.466,1.466,0,0,0,3.112,8.33v1.56a1.459,1.459,0,0,0,1.461,1.461H21.456a1.466,1.466,0,0,0,1.469-1.461V8.33A1.473,1.473,0,0,0,21.456,6.861Zm-5.5-1.768a1.089,1.089,0,0,1,1.846.151,1.094,1.094,0,0,1-.959,1.591l-2.18.015ZM8.239,5.24a1.088,1.088,0,0,1,1.845-.146L11.377,6.85,9.2,6.835A1.093,1.093,0,0,1,8.239,5.24Z" fill="var(--accent-color)"></path>
                                                    <path id="Path_19" data-name="Path 19" d="M4.787,22.582A2.424,2.424,0,0,0,7.214,25H19.382a2.424,2.424,0,0,0,2.427-2.419V15H4.787Z" transform="translate(-0.279 -2.001)" fill="var(--accent-color)"></path>
                                                </g>
                                            </svg>
                                            <p class="option-card__prizes-desc desktop">All 10 Prizes</p>
                                            <p class="option-card__prizes-desc mobile">10/<span>10</span> Prizes</p>
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <div id="options-grid__label" class="ticket-options__control">
                                <p class="ticket-options__control-title">Enter <mark>custom amount</mark> to see entry details</p>
                            </div>
                            <div id="customAmountCard" class="ticket-options__control text-center">
                                <span class="option-card__checkbox overlay">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                                        <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                            <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5" transform="translate(438.979 1654) rotate(45)" fill="#fff" />
                                            <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5" transform="translate(442 1660.95) rotate(-45)" fill="#fff" />
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
                        <p class="ticket-container__subtitle prizes__subtitle">Select a ticket<br> to see included prizes</p>
                        <div class="floating-btn__wrapper">
                            <a id="viewTicketOptions" href="#ticketOptionsSection" class="floating-btn overlay animate">
                                <span>Ticket<br>Options</span>
                            </a>
                        </div>
                        <span class="divider"></span>

                        <div class="prizes-grid">
                            <div class="prize grand-prize selected">
                                <div class="prize__body">
                                    <span class="option-card__checkbox overlay">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                                            <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                                <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5" transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                                <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5" transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="grand-prize__img">
                                        <img src="https://cdn.100kgoral.org/uploads/grand_prizes/grand_prizes17105232660.jpg" alt="">
                                        <div class="position-relative z-1">
                                            <p class="grand-prize__amount">$100,000</p>
                                            <span class="grand-prize__subtitle">Grand Prize</span>
                                            <!-- <p class="grand-prize__desc">100k</p> -->
                                            <button class="btn">Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prize" data-number="1">
                                <div class="prize__body">
                                    <span class="option-card__checkbox overlay">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                                            <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                                <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5" transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                                <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5" transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="prize__image">
                                        <img src="https://cdn.100kgoral.org/uploads/gifts_prizes/ey tickets_darker.png" alt="">
                                    </div>
                                    <div class="prize__desc">
                                        <div class="d-flex align-items-start">
                                            <span class="prize__number overlay">1</span>
                                            <p class="prize__name">4 Tickets to Eretz Yisrael or $5,000 Cash</p>
                                        </div>
                                        <div class="prize__btns">
                                            <button class="btn">Details</button>
                                            <button class="btn overlay">Upgrade</button>
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

                                <button type="button" class="btn overlay prize-split__btn"><span class="prize-split__btn-price">$100 <span class="prize-split__btn-entries">for 20 entries</span></span></button>
                                <button type="button" class="btn overlay prize-split__btn"><span class="prize-split__btn-price">$72 <span class="prize-split__btn-entries">for 10 entries</span></span></button>
                                <button type="button" class="btn overlay prize-split__btn"><span class="prize-split__btn-price">$54 <span class="prize-split__btn-entries">for 3 entries</span></span></button>
                                <button type="button" class="btn overlay prize-split__btn"><span class="prize-split__btn-price">$36 <span class="prize-split__btn-entries">for 2 entries</span></span></button>
                                <button type="button" class="btn overlay prize-split__btn"><span class="prize-split__btn-price">$18 <span class="prize-split__btn-entries">for 1 entry</span></span></button>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="GiftsSection" class="ticket-container gift-container">
                    <h3 class="ticket-container__title">Free Gifts</h3>
                    <p class="gift-subtitle">For your donation of $100 or more</p>
                    <div class="container tabs p-0">
                        <div class="row d-flex flex-wrap m-auto tab_row">


                            <div class="col-md-4 col-6 amountTabsButtons col-lg-2" data-amounttab="100">
                                <div class="gift_tab" data-amount="100">$100+<span class="notify_amount" style="display: none;">0</span></div>
                            </div>

                            <div class="col-md-4 col-6 amountTabsButtons col-lg-2" data-amounttab="180">
                                <div class="gift_tab" data-amount="180">$180+<span class="notify_amount" style="display: none;">0</span></div>
                            </div>

                            <div class="col-md-4 col-6 amountTabsButtons col-lg-2" data-amounttab="250">
                                <div class="gift_tab" data-amount="250">$250+<span class="notify_amount" style="display: none;">0</span></div>
                            </div>

                            <div class="col-md-4 col-6 amountTabsButtons col-lg-2" data-amounttab="375">
                                <div class="gift_tab" data-amount="375">$375+<span class="notify_amount" style="display: none;">0</span></div>
                            </div>

                            <div class="col-md-4 col-6 amountTabsButtons col-lg-2" data-amounttab="500">
                                <div class="gift_tab" data-amount="500">$500+<span class="notify_amount" style="display: none;">0</span></div>
                            </div>
                        </div>
                    </div>
                    <p class="gift-info-choose "><span> </span></p>
                    <div class="swiper-container">
                        <div class="swiper swiper-gift">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide giftsSlide" data-id="55" data-amount="100">
                                    <label class="gift">
                                        <input class="card-input" type="checkbox" name="gift-card">
                                        <div class="prize__body gift_card_body">
                                            <div class="overlay_section">
                                                <div class="button_group">
                                                    <button class="detail_btn" type="button" data-details="This audio speech for women by Mrs. Mindy Blumenfeld provides the oportunity to examine the perpetual child in all of us. Think young and stay young!" data-giftimg="https://cdn.100kgoral.org/uploads/gifts_prizes/how old.png">Details</button>
                                                    <button class="select_btn selectButton">Select</button>
                                                    <div class="show_select_gift">
                                                        <div class="d-flex justify-content-between">
                                                            <button class="btn minusButton">-</button>
                                                            <input type="text" disabled="" class="numberInput" data-giftid="55" data-gifttitle="Digital Audio: How Old Are You?" value="0">
                                                            <button class="btn plusButton">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="option-card__checkbox overlay">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                                                    <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                                        <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5" transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                                        <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5" transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                                    </g>
                                                </svg>
                                            </span>
                                            <div class="prize__image">
                                                <img src="https://cdn.100kgoral.org/uploads/gifts_prizes/how old.png" alt="">
                                            </div>
                                            <div class="prize__desc">
                                                <div class="d-flex align-items-start">
                                                    <p class="prize__name">Digital Audio: How Old Are You?</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="swiper-slide giftsSlide" data-id="62" data-amount="100">
                                    <label class="gift">
                                        <input class="card-input" type="checkbox" name="gift-card">
                                        <div class="prize__body gift_card_body">
                                            <div class="overlay_section">
                                                <div class="button_group">
                                                    <button class="detail_btn" type="button" data-details="As the Geulah we long for peeks around the next bend, let these shiurim be the compass that will guide you on the right path. By Rabbi Zev Smith" data-giftimg="https://cdn.100kgoral.org/uploads/gifts_prizes/Emunah-the-compass-of-our-lives 1.png">Details</button>
                                                    <button class="select_btn selectButton">Select</button>
                                                    <div class="show_select_gift">
                                                        <div class="d-flex justify-content-between">
                                                            <button class="btn minusButton">-</button>
                                                            <input type="text" disabled="" class="numberInput" data-giftid="62" data-gifttitle="Digital Audio: Emunah - The Compass of our Lives Vol. 7" value="0">
                                                            <button class="btn plusButton">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="option-card__checkbox overlay">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                                                    <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                                        <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5" transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                                        <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5" transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                                    </g>
                                                </svg>
                                            </span>
                                            <div class="prize__image">
                                                <img src="https://cdn.100kgoral.org/uploads/gifts_prizes/Emunah-the-compass-of-our-lives 1.png" alt="">
                                            </div>
                                            <div class="prize__desc">
                                                <div class="d-flex align-items-start">
                                                    <p class="prize__name">Digital Audio: Emunah - The Compass of our Lives Vol. 7</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="swiper-slide giftsSlide" data-id="75" data-amount="100">
                                    <label class="gift">
                                        <input class="card-input" type="checkbox" name="gift-card">
                                        <div class="prize__body gift_card_body">
                                            <div class="overlay_section">
                                                <div class="button_group">
                                                    <button class="detail_btn" type="button" data-details="This series guides us in the next stage along the path of life, marrying off our children. This milestone is an opportunity for growth for us as parents. By Mrs. Debbie Selengut" data-giftimg="https://cdn.100kgoral.org/uploads/gifts_prizes/Chuppa1.png">Details</button>
                                                    <button class="select_btn selectButton">Select</button>
                                                    <div class="show_select_gift">
                                                        <div class="d-flex justify-content-between">
                                                            <button class="btn minusButton">-</button>
                                                            <input type="text" disabled="" class="numberInput" data-giftid="75" data-gifttitle="Digital Audio: The Chuppah and Beyond" value="0">
                                                            <button class="btn plusButton">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="option-card__checkbox overlay">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                                                    <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                                        <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5" transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                                        <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5" transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                                    </g>
                                                </svg>
                                            </span>
                                            <div class="prize__image">
                                                <img src="https://cdn.100kgoral.org/uploads/gifts_prizes/Chuppa1.png" alt="">
                                            </div>
                                            <div class="prize__desc">
                                                <div class="d-flex align-items-start">
                                                    <p class="prize__name">Digital Audio: The Chuppah and Beyond</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="swiper-slide giftsSlide" data-id="45" data-amount="180">
                                    <label class="gift">
                                        <input class="card-input" type="checkbox" name="gift-card">
                                        <div class="prize__body gift_card_body">
                                            <div class="overlay_section">
                                                <div class="button_group">
                                                    <button class="detail_btn" type="button" data-details="Use this classic Lucite and silver washing cup each time you make hamotzi." data-giftimg="https://cdn.100kgoral.org/uploads/gifts_prizes/washing cup2.png">Details</button>
                                                    <button class="select_btn selectButton">Select</button>
                                                    <div class="show_select_gift">
                                                        <div class="d-flex justify-content-between">
                                                            <button class="btn minusButton">-</button>
                                                            <input type="text" disabled="" class="numberInput" data-giftid="45" data-gifttitle="Lucite and Silver Washing Cup" value="0">
                                                            <button class="btn plusButton">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="option-card__checkbox overlay">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                                                    <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                                        <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5" transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                                        <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5" transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                                    </g>
                                                </svg>
                                            </span>
                                            <div class="prize__image">
                                                <img src="https://cdn.100kgoral.org/uploads/gifts_prizes/washing cup2.png" alt="">
                                            </div>
                                            <div class="prize__desc">
                                                <div class="d-flex align-items-start">
                                                    <p class="prize__name">Lucite and Silver Washing Cup</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>

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

    <section class="team" id="teamsSection">
        <div class="container-lg g-0 p-lg">
            <h2 class="section-title mb-md-5 mb-4"></h2>

            <div class="tabs-wrapper">
                <ul class="team__tabs" role="tablist">

                    <li role="presentation">
                        <button class="nav-link active" id="team-donors-btn" data-bs-toggle="pill" data-bs-target="#team-donors" type="button" role="tab" aria-controls="pills-team-donors" aria-selected="true">Donors(5666)</button>
                    </li>
                    <li role="presentation">
                        <button class="nav-link " id="donors-btn" data-bs-toggle="pill" data-bs-target="#donors" type="button" role="tab" aria-controls="pills-donors" aria-selected="true">Teams</button>
                    </li>
                    <li role="presentation">
                        <button class="nav-link" id="members-btn" data-bs-toggle="pill" data-bs-target="#members" type="button" role="tab" aria-controls="pills-members" aria-selected="false">
                            Members
                        </button>
                    </li>
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
                        <input type="search" name="q" class="search-text" placeholder="Search Donors..." autocomplete="off" data-id="7">
                    </form>
                </div>
            </div>

            <div class="tab-content">

                <div class="tab-pane fade show active" id="team-donors" role="tabpanel" aria-labelledby="team-donors-btn" tabindex="0">
                    <div class="team-donors">
                        <div class="donor-card" data-donationid="2223492">
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
                        </div>
                        <div class="donor-card" data-donationid="2217901">
                            <div class="team-card__header">
                                <span class="title">Anonymous</span>
                                <span class="amount">$18.00</span>
                            </div>
                            <div class="donor-card__body">





                                <p class="donor-card__info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14.346" height="12.552" viewBox="0 0 14.346 12.552">
                                        <g id="history" transform="translate(0 -32.222)">
                                            <path id="Path_44" data-name="Path 44" d="M8.069,32.222a6.281,6.281,0,0,0-6.2,5.38H0l2.69,2.69L5.38,37.6h-1.7a4.482,4.482,0,1,1,.752,3.514L2.974,42.163a6.276,6.276,0,1,0,5.1-9.941Z" fill="#999"></path>
                                            <path id="Path_45" data-name="Path 45" d="M257.778,161.111v3.646l2.677,1.606.923-1.538-1.806-1.084v-2.63Z" transform="translate(-250.605 -125.303)" fill="#999"></path>
                                        </g>
                                    </svg>
                                    <time>May 12</time>
                                </p>
                            </div>
                        </div>
                        <div class="donor-card" data-donationid="2217753">
                            <div class="team-card__header">
                                <span class="title">Anonymous</span>
                                <span class="amount">$36.00</span>
                            </div>
                            <div class="donor-card__body">





                                <p class="donor-card__info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14.346" height="12.552" viewBox="0 0 14.346 12.552">
                                        <g id="history" transform="translate(0 -32.222)">
                                            <path id="Path_44" data-name="Path 44" d="M8.069,32.222a6.281,6.281,0,0,0-6.2,5.38H0l2.69,2.69L5.38,37.6h-1.7a4.482,4.482,0,1,1,.752,3.514L2.974,42.163a6.276,6.276,0,1,0,5.1-9.941Z" fill="#999"></path>
                                            <path id="Path_45" data-name="Path 45" d="M257.778,161.111v3.646l2.677,1.606.923-1.538-1.806-1.084v-2.63Z" transform="translate(-250.605 -125.303)" fill="#999"></path>
                                        </g>
                                    </svg>
                                    <time>May 8</time>
                                </p>
                            </div>
                        </div>
                        <div class="donor-card" data-donationid="2217738">
                            <div class="team-card__header">
                                <span class="title">Michael Rozenberg</span>
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
                                    <span class="description">Channa Moskowitz</span>
                                </p>



                                <p class="donor-card__info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14.346" height="12.552" viewBox="0 0 14.346 12.552">
                                        <g id="history" transform="translate(0 -32.222)">
                                            <path id="Path_44" data-name="Path 44" d="M8.069,32.222a6.281,6.281,0,0,0-6.2,5.38H0l2.69,2.69L5.38,37.6h-1.7a4.482,4.482,0,1,1,.752,3.514L2.974,42.163a6.276,6.276,0,1,0,5.1-9.941Z" fill="#999"></path>
                                            <path id="Path_45" data-name="Path 45" d="M257.778,161.111v3.646l2.677,1.606.923-1.538-1.806-1.084v-2.63Z" transform="translate(-250.605 -125.303)" fill="#999"></path>
                                        </g>
                                    </svg>
                                    <time>May 7</time>
                                </p>
                            </div>
                        </div>
                        <div class="donor-card" data-donationid="2217727">
                            <div class="team-card__header">
                                <span class="title">Anonymous</span>
                                <span class="amount">$100.00</span>
                            </div>
                            <div class="donor-card__body">




                                <p class="donor-card__info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14.346" height="12.552" viewBox="0 0 14.346 12.552">
                                        <g id="history" transform="translate(0 -32.222)">
                                            <path id="Path_44" data-name="Path 44" d="M8.069,32.222a6.281,6.281,0,0,0-6.2,5.38H0l2.69,2.69L5.38,37.6h-1.7a4.482,4.482,0,1,1,.752,3.514L2.974,42.163a6.276,6.276,0,1,0,5.1-9.941Z" fill="#999"></path>
                                            <path id="Path_45" data-name="Path 45" d="M257.778,161.111v3.646l2.677,1.606.923-1.538-1.806-1.084v-2.63Z" transform="translate(-250.605 -125.303)" fill="#999"></path>
                                        </g>
                                    </svg>
                                    <time>May 3</time>
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="text-center">
                            <button type="button" class="btn overlay load-more-team-donors">Load More</button>
                        </div> --}}
                </div>
                <div class="tab-pane fade gg " id="donors" role="tabpanel" aria-labelledby="donors-btn" tabindex="0">
                    <div class="team-members-grid">
                        <div class="team-member-card" data-id="888" data-name="Ruchie Perlstein" data-slug="rperl">
                            <span class="option-card-teams overlay">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                                    <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                        <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5" transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                        <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5" transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
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
                        <div class="team-member-card" data-id="6655" data-name="Michael Rothschild" data-slug="mrothschild">
                            <span class="option-card-teams overlay">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                                    <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                                        <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5" transform="translate(438.979 1654) rotate(45)" fill="#fff"></rect>
                                        <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5" transform="translate(442 1660.95) rotate(-45)" fill="#fff"></rect>
                                    </g>
                                </svg>
                            </span>
                            <div class="team-member__wrapper">
                                <div class="team-card__header">

                                    <div class="left">
                                        <span class="title">Michael Rothschild</span>
                                        <span class="donors"> 15 donors</span>
                                    </div>
                                    <div class="right">
                                        <span class="amount"> $8,130</span>
                                        <span class="raised">of $10,000 raised</span>
                                    </div>
                                </div>
                                <div class="progress" role="progressbar">
                                    <div class="progress-bar" style="width: 81%"></div>
                                </div>
                                <div class="team-card__btns">
                                    <button type="button" class="btn overlay select-team">Select Team</button>
                                    <a href="https://100kgoral.org/campaign/cchf/mrothschild">
                                        <button type="button" class="btn overlay donate-btn">Visit Team</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" class="btn overlay load-more-donors">Load More</button>
                </div>
            </div>

            <div class="tab-pane fade  " id="members" role="tabpanel" aria-labelledby="members-btn" tabindex="0">
                <div class="team-wrapper">
                    <div class="team-members-grid"></div>
                </div>
                {{-- <div class="text-center">
                        <button type="button" class="btn overlay load-more-teams">Load More</button>
                    </div> --}}
            </div>
        </div>
        </div>
    </section>

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
                    <div class="swiper-slide">
                        <a href="#" class="swiper-slide gallery-item no-pointer">
                            <span class="gallery-item__media">
                                {{-- Media --}}
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
                                {{-- Media --}}
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
                                {{-- Media --}}
                                <img src="{{ asset('assets/frontend/images/img2.png') }}" alt="">
                            </span>
                            <span class="gallery-item__description">
                                <p>Gallery Title</p>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="swiper-gallery__btns">
                    <div class="swiper-button-prev swiper-gallery-button-prev overlay">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357" viewBox="0 0 19.071 11.357">
                            <g id="arrow" transform="translate(0 0)">
                                <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2" transform="translate(0 5.657) rotate(-45)" fill="currentColor" />
                                <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2" transform="translate(1.414 4.286) rotate(45)" fill="currentColor" />
                                <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2" transform="translate(6 5.657) rotate(-45)" fill="currentColor" />
                                <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2" transform="translate(7.414 4.286) rotate(45)" fill="currentColor" />
                                <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2" transform="translate(12 5.657) rotate(-45)" fill="currentColor" />
                                <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2" transform="translate(13.414 4.286) rotate(45)" fill="currentColor" />
                            </g>
                        </svg>
                    </div>
                    <div class="swiper-button-next swiper-gallery-button-next overlay">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357" viewBox="0 0 19.071 11.357">
                            <g id="arrow" transform="translate(0 0)">
                                <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2" transform="translate(0 5.657) rotate(-45)" fill="currentColor" />
                                <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2" transform="translate(1.414 4.286) rotate(45)" fill="currentColor" />
                                <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2" transform="translate(6 5.657) rotate(-45)" fill="currentColor" />
                                <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2" transform="translate(7.414 4.286) rotate(45)" fill="currentColor" />
                                <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2" transform="translate(12 5.657) rotate(-45)" fill="currentColor" />
                                <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2" transform="translate(13.414 4.286) rotate(45)" fill="currentColor" />
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

    <div class="cart d-block">
        <button class="cart-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCart" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="11.357" height="7.071" viewBox="0 0 11.357 7.071">
                <g id="arrow" transform="translate(521.671 -394.929) rotate(90)">
                    <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2" transform="translate(400.586 517.385) rotate(-135)" fill="currentColor" />
                    <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2" transform="translate(402 516.014) rotate(135)" fill="currentColor" />
                </g>
            </svg>
        </button>
        <button type="button" class="drag-icon" data-bs-toggle="collapse" data-bs-target="#collapseCart" aria-expanded="false">
            <span></span>
        </button>
        <div class="cart__inner">
            <div class="container-lg g-0">
                <div class="cart__summary">
                    <div class="d-flex gap-5">
                        <div class="selected-tickets">
                            <h3 class="cart__title js-cart-summary-amount"></h3>
                            <div class="cart__summary-block gap-3 gap-md-5">
                                <p class="cart__team">7jhjdjsdhs </p>
                                <div class="cart__subtitle-wrapper">
                                    <p class="cart__subtitle--discounted"></p>
                                    <p class="cart__subtitle"></p>
                                </div>
                                <ul class="cart__summary-list"></ul>
                            </div>
                        </div>

                        <div class="selected-gifts">
                            <h3 class="cart__title"></h3>
                            <ul class="cart__summary-list">
                            </ul>
                        </div>

                        <div class="selected-pot-prizes">
                            <h3 class="cart__title pot-section-title"></h3>
                            <p class="pot-entries-count"></p>
                            <ul class="cart__summary-list pot-prizes-count"></ul>
                        </div>
                    </div>

                    <div class="cart__summary-btn">
                        <a id="gift-btn" href="#GiftsSection" class="btn btn--gray overlay">Choose Gift</a>
                        <button id="summaryCheckoutBtn" class="btn checkout-btn overlay" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCart" aria-expanded="false">
                            <span>Checkout</span>
                            <span class="divider"></span>
                            <span class="checkout-btn__amount" id="pop_checkout_1"></span>
                        </button>
                    </div>
                </div>

                <div class="cart-mobile__summary">
                    <div class="cart-mobile__summary-inner">
                        <div>
                            <div class="js-cart-summary-amount summary-amount"></div>

                            <div class="items-quantity">
                                <div class="item-quantity">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9.653" viewBox="0 0 14 9.653">
                                        <path id="voucher" d="M23.936,94.025a.858.858,0,0,0,.73-.851v-.548a1.294,1.294,0,0,0-1.293-1.293H16.54v.215a.431.431,0,1,1-.862,0v-.215H11.96a1.294,1.294,0,0,0-1.293,1.293v.548a.858.858,0,0,0,.73.851,2.155,2.155,0,0,1,0,4.268.858.858,0,0,0-.73.852v.548a1.294,1.294,0,0,0,1.293,1.293h3.719v-.215a.431.431,0,1,1,.862,0v.215h6.834a1.294,1.294,0,0,0,1.293-1.293v-.548a.858.858,0,0,0-.73-.851,2.155,2.155,0,0,1,0-4.268ZM16.54,98.1a.431.431,0,1,1-.862,0V97.093a.431.431,0,1,1,.862,0Zm0-2.873a.431.431,0,1,1-.862,0V94.22a.431.431,0,1,1,.862,0Z" transform="translate(-10.667 -91.333)" fill="currentColor" />
                                    </svg>
                                    <p class="item-quantity__title entry-quantity"></p>
                                </div>
                                <div class="item-quantity">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14">
                                        <defs>
                                            <clipPath id="clip-path">
                                                <path id="Path_72" data-name="Path 72" d="M0,0H14V14H0Z" fill="none" />
                                            </clipPath>
                                        </defs>
                                        <g id="trophy" clip-path="url(#clip-path)">
                                            <path id="Path_71" data-name="Path 71" d="M0,.75A.75.75,0,0,1,.75,0H3.635L3.69,0h6.621l.054,0H13.25A.75.75,0,0,1,14,.75V3.635a3.635,3.635,0,0,1-3.2,3.609A4.006,4.006,0,0,1,7.75,9.93V12.5h2.615a.75.75,0,0,1,0,1.5H3.635a.75.75,0,0,1,0-1.5H6.25V9.93A4.006,4.006,0,0,1,3.2,7.244,3.635,3.635,0,0,1,0,3.635ZM2.885,5.634V1.5H1.5V3.635A2.135,2.135,0,0,0,2.885,5.634ZM11.115,1.5V5.634a2.135,2.135,0,0,0,1.385-2V1.5Z" fill="currentColor" fill-rule="evenodd" />
                                        </g>
                                    </svg>
                                    <p class="item-quantity__title prizes-quantity"></p>
                                </div>
                                <div class="item-quantity hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14.133" viewBox="0 0 14 14.133">
                                        <g id="Group_38" data-name="Group 38" transform="translate(-52 330)">
                                            <path id="Path_18" data-name="Path 18" d="M16.074,5.728H14.555a1.914,1.914,0,0,0-.025-1.672,1.937,1.937,0,0,0-3.285-.268L10.111,5.327,8.979,3.79a1.937,1.937,0,0,0-3.285.265,1.916,1.916,0,0,0-.027,1.674H4.145A1.036,1.036,0,0,0,3.112,6.767v1.1A1.031,1.031,0,0,0,4.145,8.9H16.074a1.036,1.036,0,0,0,1.038-1.032v-1.1A1.041,1.041,0,0,0,16.074,5.728Zm-3.89-1.249a.769.769,0,0,1,1.3.107.773.773,0,0,1-.678,1.124l-1.54.01Zm-5.449.1a.769.769,0,0,1,1.3-.1l.913,1.24L7.415,5.71A.772.772,0,0,1,6.735,4.583Z" transform="translate(48.888 -333)" fill="currentColor" />
                                            <path id="Path_19" data-name="Path 19" d="M4.787,20.359A1.713,1.713,0,0,0,6.5,22.068h8.6a1.713,1.713,0,0,0,1.715-1.709V15H4.787Z" transform="translate(48.199 -337.935)" fill="currentColor" />
                                        </g>
                                    </svg>
                                    <p class="item-quantity__title gifts-quantity"></p>
                                </div>

                                <div class="item-quantity hidden">
                                    <svg viewBox="0 0 64 67" width="14" height="18.133" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_398_17)">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M61.956 14.7961C61.948 14.8021 61.95 14.8081 61.941 14.8141C60.759 15.6251 59.984 16.9851 59.984 18.5271C59.984 19.2261 60.145 19.8871 60.43 20.4771C62.171 23.9381 64 29.1141 64 36.7651C64 45.9861 60.039 53.0321 53.719 57.6461L55.733 61.0611C56.285 61.9991 55.958 63.1971 55.001 63.7381C54.044 64.2791 52.821 63.9581 52.269 63.0201L50.347 59.7581C45.15 62.5441 38.827 63.9951 32 63.9951C25.173 63.9951 18.85 62.5441 13.654 59.7581L11.732 63.0201C11.18 63.9571 9.957 64.2781 9 63.7371C8.043 63.1961 7.716 61.9981 8.268 61.0601L10.281 57.6451C3.961 53.0311 0 45.9851 0 36.7651C0 29.1141 1.829 23.9391 3.57 20.4771C3.854 19.8871 4.016 19.2261 4.016 18.5271C4.016 16.9851 3.241 15.6251 2.059 14.8141C2.05 14.8081 2.052 14.8021 2.044 14.7961C0.736 13.9241 0 12.9821 0 11.9961C0 9.54212 4.436 7.35112 11.396 5.88412C10.41 7.25012 9.851 8.66612 9.812 10.0371C7.552 10.6401 6.196 11.3421 6.033 12.0951C6.378 14.2581 17.858 15.9961 32 15.9961C46.138 15.9961 57.614 14.2591 57.967 12.0971C57.8 11.3191 56.354 10.5961 53.963 9.97812C53.823 8.35512 52.757 6.84112 51.06 5.56912C58.911 7.02712 64 9.36312 64 11.9961C64 12.9821 63.264 13.9241 61.956 14.7961ZM51.902 10.9561C51.15 13.5561 46.723 14.0911 41.807 12.8701C41.389 12.7661 40.985 12.6501 40.589 12.5281C41.486 11.5381 41.999 10.3541 41.999 8.99612C41.999 6.89412 40.771 5.21312 38.779 4.02212C40.376 3.93512 42.243 4.13812 44.191 4.62212C49.109 5.84212 52.653 8.35612 51.902 10.9561ZM40 8.99612C40 12.1481 35.522 13.9961 30 13.9961C27.786 13.9961 25.747 13.6941 24.09 13.1361C24.178 13.0881 24.266 13.0451 24.353 12.9951C28.642 10.5591 31.537 7.19612 31.688 4.06112C36.405 4.40012 40 6.17312 40 8.99612ZM23.474 11.0831C18.741 13.8441 13.989 14.4831 12.429 11.7531C10.869 9.02312 13.792 5.18412 18.526 2.42312C23.259 -0.337879 28.011 -0.976879 29.571 1.75312C31.131 4.48312 28.208 8.32212 23.474 11.0831Z" fill="currentColor" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_398_17">
                                                <rect width="64" height="67" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <p class="item-quantity__title pot-quantity"></p>
                                </div>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="cart-mobile__summary-btns">
                            <button id="detailsSummaryBtnMobile" type="button" class="btn details-btn">Details</button>
                            <button id="checkoutSummaryBtnMobile" type="button" class="btn mobile-checkout-btn overlay" data-bs-toggle="collapse" data-bs-target="#collapseCart" aria-expanded="false">
                                <span>Checkout</span>
                                <span class="checkout-btn__amount" id="pop_checkout_2"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="collapse all-fields" id="collapseCart">
                    <div class="cart__body">
                        <h2 class="cart__heading"></h2>
                        <div class="checkout-form">
                            <form method="post" action="" id="donate_form" class="donate-form">
                                <div class="w-100 d-flex flex-column gap-40">
                                    <div>
                                        <p class="checkout-form__label">
                                            <span>Personal Info</span>
                                        </p>
                                        <div class="checkout-form__inputs">
                                            <input class="form-input" type="text" placeholder="First Name" autocomplete="given-name" name="first_name" id="first_name" required>
                                            <input class="form-input" type="text" placeholder="Last Name" name="last_name" id="last_name" required>
                                            <input class="form-input" type="email" placeholder="Email Address" name="email" id="email" required>
                                            <input class="form-input" type="tel" placeholder="Phone Number" id="phone" name="phone">

                                            <input class="form-input wide" type="text" placeholder="Comments and Dedications..." id="comments" name="comments">
                                        </div>
                                        <!-- <label class="checkbox-container mt-3">Donate Anonymously
                      <input type="checkbox">
                      <span class="checkbox-checkmark"></span>
                    </label> -->
                                        <div class="form-check" style="margin-top:10px">
                                            <input type="checkbox" class="form-check-input" id="donate-anonymously">
                                            <label class="form-check-label" style="margin-top:6px;font-size:14px;font-weight:600;" for="donate-anonymously">Donate Anonymously</label>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="checkout-form__label">
                                            <span>Billing Info</span>
                                        </p>
                                        <div class="checkout-form__inputs">
                                            <input class="form-input wide controls" type="text" placeholder="Enter Your Address" name="address_search" id="pac-input" onchange="this.setAttribute('autocomplete', 'off');" onfocus="this.setAttribute('autocomplete', 'new-password');" required>
                                            <input class="form-input" type="text" placeholder="City" id="city" name="city">
                                            <input class="form-input" type="text" placeholder="State" id="state" name="state">
                                            <input class="form-input" type="text" placeholder="ZIP / Postal Code" name="zipcode" id="zipcode">
                                            <input class="form-input" type="text" placeholder="Country" id="country" name="country">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="{{ url('payment/process/1') }}" method="POST" id="payment-form" class="donate-form">

                                <div class="checkout-form__payment">
                                    <p class="checkout-form__label">
                                        <span>Payment Info</span>
                                    </p>
                                    <div class="credit-cards-wrapper">
                                        <label class="checkbox-container"> <i class="fa "></i>
                                            <input type="radio" name="payment_gateway" id="nav--tab">
                                            <span class="checkbox-checkmark"></span>
                                        </label>

                                    </div>


                                    <div class="checkout-form__inputs">

                                        <div class="ckcc_section payment-tab" style="display:">
                                            <input class="form-input" type="text" name="xName" id="xName" autocomplete="cc-name" placeholder="Cardholder Name">

                                            <iframe class="placeHolder" data-ifields-id="card-number" autocomplete="nothing" data-ifields-placeholder="Card Number" src="https://cdn.cardknox.com/ifields/2.6.2006.0102/ifield.htm"></iframe>
                                            <input data-ifields-id="card-number-token" name="xCardNum" type="hidden">

                                            <div class=" d-flex">
                                                <!-- <input class="form-input" type="text" style="width: 50% !important;" name="expiry" placeholder="MM/YY" autocomplete="off" onKeyUp="formatString(event)" maxlength="5" id="expiryCC"> -->
                                                <input class="form-input expiryCard" type="text" style="font-size: 17px;font-weight: 600;color: var(--secondary-color);background-color: #fafafa;border: 2px solid;border-color: #ccc;border-radius: calc(infinity * 1px);outline: 0;padding: 12px 30px !important;;height: 33px;width: 172px;height: 58px;    margin-top: 10px;margin-right: 8px;" name="expiry" placeholder="MM/YY" autocomplete="off" onkeyup="formatString(event)" maxlength="5" id="expiryCC">
                                                <div>
                                                    <iframe data-ifields-id="cvv" class="placeHolder" data-ifields-placeholder="CVV" src="https://cdn.cardknox.com/ifields/2.6.2006.0102/ifield.htm"></iframe>
                                                </div>
                                            </div>
                                            <input data-ifields-id="cvv-token" name="xCVV" type="hidden">

                                            <label data-ifields-id="card-data-error" style="color: red;"></label>
                                        </div>


                                        <div class="ckach_section payment-tab" style="">
                                            <input class="form-input" type="text" name="xAchName" id="xAchName" autocomplete="cc-name" placeholder="Account Holder Name">

                                            <iframe data-ifields-id="ach" data-ifields-placeholder="Checking Account Number" src="https://cdn.cardknox.com/ifields/2.6.2006.0102/ifield.htm"></iframe>
                                            <input data-ifields-id="ach-token" name="xACH" type="hidden" />

                                            <input class="form-input" type="text" name="xRouting" autocomplete="cc-routing" placeholder="Routing Number" id="xrouting">

                                            <label data-ifields-id="card-data-error" style="color: red;"></label>
                                        </div>


                                        <div class="bankquest  payment-tab" id="card-form-container">

                                        </div>

                                        <div class="authnet_section payment-tab" style="">
                                            <div class="form-group col-md-12 col-sm-12 mb-2 paywithauthnet">
                                                <input type="text" name="cardholdername" id="authnet_cardholderName" placeholder="Cardholder Name" class="form-input" autocomplete="cc-name">
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 mb-2 paywithauthnet">
                                                <input type="text" name="cardnumber" id="authnet_card_num" placeholder="Card Number" class="form-input" autocomplete="cc-number">
                                            </div>
                                            <div class="align-side-by-side">
                                                <div class="form-group col-md-6 col-sm-6 mb-2 paywithauthnet">
                                                    <input type="text" name="cardexpiry" onKeyUp="formatString(event)" placeholder="MM/YY" autocomplete="cc-exp" maxlength="5" id="authnet_exp" class="form-input">
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6 mb-2 paywithauthnet">
                                                    <input type="text" name="cvc" placeholder="CVC" onKeyUp="validateNum(event)" maxlength="5" id="authnet_cvc" class="form-input" autocomplete="cc-csc">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="uepcc_section payment-tab">
                                            <div id="paymentCardContainer">
                                                <!-- PaymentCard iFrame content will go here. -->
                                            </div>
                                            <div id="paymentCardErrorContainer" vrole="alert">
                                                <!-- Any error messages will be inserted here. -->
                                            </div>
                                        </div>

                                        <div class="stripe_section payment-tab">
                                            <div id="card-element"></div>
                                            <div id="card-errors" class="text-center text-danger mt-2" role="alert"></div>

                                            <input type="hidden" id="ccToken" name="ccToken">

                                            <input type="hidden" id="ccType" name="ccType">
                                            <input type="hidden" id="ccExM" name="ccExM">
                                            <input type="hidden" id="ccExY" name="ccExY">
                                            <input type="hidden" id="ccL4" name="ccL4">
                                        </div>
                                        <div class="pp_section payment-tab">
                                            <div id="paymentMethods" style="display: none;"></div>
                                            <div id="recurring_pp" style="display: none;">
                                                <button type="button" class="btn btn-warning" name="submit" value="paywithpp" alt="Pay with PayPal"><img src="/images/paypal-logo.svg" height="24" onClick="submitRecPP('')"> Checkout</button>
                                            </div>
                                        </div>

                                        <div class="ojc_section payment-tab">
                                            <div class="form-group col-md-12 col-sm-12 paywithojc mb-2">
                                                <input type="text" name="ojc_card_num" id="ojc_card_num" placeholder="Card Number" onKeyPress="validateNum(event)" class="form-input">
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 paywithojc">
                                                <input type="text" name="ojc_expiry" placeholder="MM/YY" onKeyUp="formatString(event)" maxlength="5" id="ojc_expiry" class="form-input">
                                            </div>
                                        </div>





                                        <div class="matbia_section payment-tab">
                                            <div class="form-group col-md-12 col-sm-12 paywithmtb mb-2">
                                                <input type="text" name="mtb_card_num" id="mtb_card_num" placeholder="Card Number" onKeyPress="validateNum(event)" class="form-input">
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 paywithmtb">
                                                <input type="text" name="mtb_expiry" placeholder="MM/YY" onKeyUp="formatString(event)" maxlength="5" id="mtb_expiry" class="form-input">
                                            </div>
                                        </div>

                                        <div class="donfund_section payment-tab">
                                            <div class="form-group col-md-12 col-sm-12 paywithdfd mb-2">
                                                <input type="text" name="dfd_card_num" id="dfd_card_num" placeholder="Card Number / Username" class="form-input">
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 paywithdfd">
                                                <input type="text" name="dfd_cvc" placeholder="CVC" onKeyUp="validateNum(event)" maxlength="5" id="dfd_cvc" class="form-input">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="hiddenFields">


                                    </div>

                                    <div class="divider"></div>

                                    <div class="currency-changer" style="">
                                        <p class="d-inline">Pay in</p>
                                        <div class="select-wrapper">
                                            <select class="form-input" id="donate_currency" name="donate_currency">
                                                <option value="USD">$ (USD)</option>
                                                <option value="CAD">C$ (CAD)</option>
                                                <option value="GBP">£ (GBP)</option>
                                                <option value="EUR">€ (EUR)</option>
                                                <option value="ILS">₪ (ILS)</option>
                                                <option value="PKR">₨ (PKR)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-check processing-fee">
                                        <input class="form-check-input" type="checkbox" id="process_fee_check" name="process_fee_check" value="1">
                                        <label class="form-check-label" for="process_fee_check">
                                            <span id="process_fee">Add $0.00 to your payment to cover the 7% credit card processing fee</span>
                                        </label>
                                        <input type="hidden" name="don_process_fee" id="don_process_fee" value="0.00" />
                                        <input type="hidden" name="fee_percentage" id="fee_percentage" value="7" />
                                    </div>


                                    <div class="form-check recurring-option">
                                        <input class="form-check-input" type="checkbox" id="don_recurring" name="don_recurring" value="1" onClick="makeRecurring()">
                                        <label class="form-check-label" for="don_recurring">
                                            Pay in Installments
                                        </label>
                                    </div>

                                    <div class="rec_btns">
                                        <div class="rec_options mt-2">
                                            <p class="d-inline">
                                                Split <span id="rec_amount_full">$0.00</span> over
                                                <input type="number" min="2" value="2" class="custom-select d-inline p-1" id="custom_recurring_cycle" name="custom_recurring_cycle" onKeyPress="validateNum(event)" /> /
                                                <select name="recurring_interval" id="recurring_interval" class="recurring-interval">
                                                    <option value="Monthly" selected>Months</option>
                                                    <option value="Weekly">Weeks</option>
                                                    <option value="Daily">Days</option>
                                                </select>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="g-recaptcha" data-sitekey="" data-size="invisible">
                                    </div>

                                    <button class="w-100 btn checkout-btn overlay" type="submit">
                                        <span>Checkout</span>
                                        <span class="divider"></span>
                                        <span class="checkout-btn__amount" id="pop_checkout_3">$1,200.00</span>
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripeKey = 'pk_test_51OKoCkBuX8S01OQkht2LOMGIMUcg5XCb9jjmykQQDc6N3rRZ66ppitKw3eyeIDK56W7fhgyTJGkZKkciyeVPqr9j00xINZmc8z'
    var stripe = Stripe(stripeKey);

    var elements = stripe.elements();

    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
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

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', result.token.id);
                form.appendChild(hiddenInput);

                form.submit();
            }
        });
    });
</script>

@endsection
