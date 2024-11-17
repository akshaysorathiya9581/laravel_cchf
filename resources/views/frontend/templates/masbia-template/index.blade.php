@section('title', 'Masbia')
@include('frontend.templates.masbia-template.includes.header')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <main>
    <section class="hero">
      <div class="hero__wrapper">
        <div class="container">
          <div class="hero__inner">
            <h1 class="page-title">Help Masbia distribute<br>
              kosher for Passover food.</h1>
            <a href="{{ route('donation.index') }}" class="btn btn--white">Donate now</a>
            <img class="hero__hands-img" src="{{ asset('assets/frontend/templates/masbia/images/hands-white.svg') }}" alt="">
            <img class="hero-img" src="{{ asset('assets/frontend/templates/masbia/images/hero-img.png') }}" alt="">
          </div>
        </div>
      </div>
    </section>

    <div class="stats">
      <div class="container">
        <div class="stats__wrapper">
          <dl>
            <dt class="stats__number">15k+</dt>
            <dd>
              <p>People</p>
              <span>Prevention of Cruelty</span>
            </dd>
          </dl>
          <dl>
            <dt class="stats__number">150+</dt>
            <dd>
              <p>Society</p>
              <span>Direct relief</span>
            </dd>
          </dl>
          <dl>
            <dt class="stats__number">49k+</dt>
            <dd>
              <p>Project</p>
              <span>Research hospital</span>
            </dd>
          </dl>
        </div>
      </div>
    </div>

    <section class="brands">
      <div class="container">
        <div class="brands__wrapper">
          <div class="brands__heading">
            <h2 class="section-title"><strong>Featured</strong> In</h2>
            <svg width="49" height="170" viewBox="0 0 49 170" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 0H19L49 170H30L0 0Z" fill="white" />
            </svg>
          </div>
          <div class="swiper swiper-brands">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="{{ asset('assets/frontend/templates/masbia/images/brands/brand1.png') }}" alt="">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('assets/frontend/templates/masbia/images/brands/brand2.png') }}" alt="">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('assets/frontend/templates/masbia/images/brands/brand3.png') }}" alt="">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('assets/frontend/templates/masbia/images/brands/brand4.png') }}" alt="">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('assets/frontend/templates/masbia/images/brands/brand5.png') }}" alt="">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('assets/frontend/templates/masbia/images/brands/brand1.png') }}" alt="">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('assets/frontend/templates/masbia/images/brands/brand2.png') }}" alt="">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('assets/frontend/templates/masbia/images/brands/brand3.png') }}" alt="">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('assets/frontend/templates/masbia/images/brands/brand4.png') }}" alt="">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('assets/frontend/templates/masbia/images/brands/brand5.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="about">
      <div class="container">
        <div class="about__inner">
          <div>
            <img class="section-ic" src="{{ asset('assets/frontend/templates/masbia/images/icons/section-icon.svg') }}" alt="">
            <h2 class="section-title"><strong>Who is</strong> Masbia?</h2>
            <p class="text">Throughout the Passover season, Masbia expects to distribute <span>10,000</span> raw food
              packages, which
              will include special holiday staples for families to be able to prepare their own Seder and Kosher for
              Passover </p>
          </div>
          <div class="about__img">
            <button class="about__img-play">
              <img src="{{ asset('assets/frontend/templates/masbia/images/icons/play.svg') }}" alt="">
            </button>
            <img src="{{ asset('assets/frontend/templates/masbia/images/about-img.png') }}" alt="">
          </div>
        </div>
      </div>
    </section>

    <section class="get-involved">
      <div class="container">
        <div class="get-involved__inner">
          <img class="section-ic" src="{{ asset('assets/frontend/templates/masbia/images/icons/section-icon.svg') }}" alt="">
          <h2 class="section-title"><strong>Get</strong> Involved?</h2>
          <p class="text">Throughout the Passover season, Masbia expects to distribute <span>10,000</span> raw food
            packages, which
            will include special holiday staples for families to be able to prepare their own Seder and Kosher for
            Passover </p>
          <div class="btn-group">
            <a href="#" class="btn btn--green">Donate</a>
            <a href="#" class="btn btn--gray">Get food</a>
          </div>
        </div>
      </div>
      <div class="hands-images">
        <img src="{{ asset('assets/frontend/templates/masbia/images/hands-gray.svg') }}" alt="">
        <img src="{{ asset('assets/frontend/templates/masbia/images/hands-gray.svg') }}" alt="">
      </div>
    </section>

    <section class="campaigns">
      <div class="container">
        <img class="section-ic" src="{{ asset('assets/frontend/templates/masbia/images/icons/campaign-ic.svg') }}" alt="">
        <h2 class="section-title"><strong>Recent</strong> Campaigns</h2>
        <div class="swiper swiper-campaigns">
          <div class="campaigns__grid swiper-wrapper">
            <div class="swiper-slide campaign-item">
              <div class="campaign-item__img">
                <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/campaign/campaign1.jpg" alt="">
              </div>
              <div class="campaign-item__info">
                <div class="campaign-item__title">Passover</div>
                <a href="#" class="btn">View Campaign</a>
              </div>
            </div>

            <div class="swiper-slide campaign-item">
              <div class="campaign-item__img">
                <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/campaign/campaign2.jpg" alt="">
              </div>
              <div class="campaign-item__info">
                <div class="campaign-item__title">Summer</div>
                <a href="#" class="btn">View Campaign</a>
              </div>
            </div>

            <div class="swiper-slide campaign-item">
              <div class="campaign-item__img">
                <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/campaign/campaign3.jpg" alt="">
              </div>
              <div class="campaign-item__info">
                <div class="campaign-item__title">Winter</div>
                <a href="#" class="btn">View Campaign</a>
              </div>
            </div>

            <div class="swiper-slide campaign-item">
              <div class="campaign-item__img">
                <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/campaign/campaign1.jpg" alt="">
              </div>
              <div class="campaign-item__info">
                <div class="campaign-item__title">Passover</div>
                <a href="#" class="btn">View Campaign</a>
              </div>
            </div>

            <div class="swiper-slide campaign-item">
              <div class="campaign-item__img">
                <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/campaign/campaign2.jpg" alt="">
              </div>
              <div class="campaign-item__info">
                <div class="campaign-item__title">Summer</div>
                <a href="#" class="btn">View Campaign</a>
              </div>
            </div>

            <div class="swiper-slide campaign-item">
              <div class="campaign-item__img">
                <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/campaign/campaign3.jpg" alt="">
              </div>
              <div class="campaign-item__info">
                <div class="campaign-item__title">Winter</div>
                <a href="#" class="btn">View Campaign</a>
              </div>
            </div>
          </div>
        </div>

        <div class="campaign__btn">
          <a href="#" class="btn">View all</a>
        </div>
      </div>
    </section>

    <section class="media">
      <div class="container">
        <div class="media__heading">
          <div class="media__title">
            <img class="section-ic" src="{{ asset('assets/frontend/templates/masbia/images/icons/thumb-ic.svg') }}" alt="">
            <h2 class="section-title"><strong>In the</strong> Media</h2>
          </div>
          <div class="swiper-media__arrows">
            <div class="swiper-button-prev media-button-prev">
              <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.09468 1.68738L11.4075 11.0002L2.09467 20.313" stroke="currentColor" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <div class="swiper-button-next media-button-next">
              <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.09468 1.68738L11.4075 11.0002L2.09467 20.313" stroke="currentColor" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
          </div>
        </div>

        <div class="swiper swiper-media">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="media-card">
                <div class="media-card__img">
                  <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/media/media1.png" alt="">
                </div>
                <time datetime="">March 05/26/2024</time>
                <div class="media-card__title">Masbia Relief On Pix 11: Community Sets Up Welcome Center For Asylum
                  Seekers In Brooklyn</div>
                <a href="#" class="btn">View post</a>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="media-card">
                <div class="media-card__img">
                  <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/media/media2.png" alt="">
                </div>
                <time datetime="">March 05/26/2024</time>
                <div class="media-card__title">Masbia Mentioned In The NYT: What Today’s Migrant Crisis Looks Like to a
                  Holocaust Refugee</div>
                <a href="#" class="btn">View post</a>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="media-card">
                <div class="media-card__img">
                  <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/media/media3.png" alt="">
                </div>
                <time datetime="">March 05/26/2024</time>
                <div class="media-card__title">Masbia Press Release: Every Dollar Donate Is In Someone’s Stomach In Less
                  Than Two Weeks</div>
                <a href="#" class="btn">View post</a>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="media-card">
                <div class="media-card__img">
                  <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/media/media1.png" alt="">
                </div>
                <time datetime="">March 05/26/2024</time>
                <div class="media-card__title">Masbia Relief On Pix 11: Community Sets Up Welcome Center For Asylum
                  Seekers In Brooklyn</div>
                <a href="#" class="btn">View post</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="events">
      <div class="container">
        <img class="section-ic" src="{{ asset('assets/frontend/templates/masbia/') }}/images/icons/thumb-ic.svg" alt="">
        <h2 class="section-title"><strong>Events</strong> & Events</h2>
        <div class="events__grid">
          <div class="events__card">
            <div class="events__card-img">
              <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/events/event1.jpg" alt="">
            </div>
            <div class="events__card-title">Two Culinary Worlds Unite To Feed The Needy – Masbia’s Chop Hunger IV</div>
            <div class="events__card-overlay">
              <div class="events__card-overlay-inner">
                <div class="events__card-overlay-title">2023 Thanksgiving Pack-A-Thon</div>
                <time datetime="">March 05/26/2024</time>
                <p>We are proud to once again join with our community faith partners, The Jewish Center, West End
                  Church, and the Church of Jesus Christ of Latter-day Saints, to celebrate Thanksgiving in the true
                  spirit of the day – by giving to others.</p>
              </div>
            </div>
          </div>

          <div class="events__card">
            <div class="events__card-img">
              <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/events/event2.jpg" alt="">
            </div>
            <div class="events__card-title">2023 Thanksgiving Pack-A-Thon</div>
            <div class="events__card-overlay">
              <div class="events__card-overlay-inner">
                <div class="events__card-overlay-title">2023 Thanksgiving Pack-A-Thon</div>
                <time datetime="">March 05/26/2024</time>
                <p>We are proud to once again join with our community faith partners, The Jewish Center, West End
                  Church, and the Church of Jesus Christ of Latter-day Saints, to celebrate Thanksgiving in the true
                  spirit of the day – by giving to others.</p>
              </div>
            </div>
          </div>

          <div class="events__card">
            <div class="events__card-img">
              <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/events/event3.jpg" alt="">
            </div>
            <div class="events__card-title">Chop ‘n Pack: Cong. Orach Chaim Invites You To Volunteer With Masbia,
              Sponsored By Naomi & Steve Wolinsky</div>
            <div class="events__card-overlay">
              <div class="events__card-overlay-inner">
                <div class="events__card-overlay-title">2023 Thanksgiving Pack-A-Thon</div>
                <time datetime="">March 05/26/2024</time>
                <p>We are proud to once again join with our community faith partners, The Jewish Center, West End
                  Church, and the Church of Jesus Christ of Latter-day Saints, to celebrate Thanksgiving in the true
                  spirit of the day – by giving to others.</p>
              </div>
            </div>
          </div>
        </div>
        <div>
          <a href="#" class="btn">View all</a>
        </div>
      </div>
    </section>

    <section class="blog">
      <div class="blog__outer">
        <div class="swiper-media__arrows">
          <div class="swiper-button-next blog-button-next">
            <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.09468 1.68738L11.4075 11.0002L2.09467 20.313" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
        </div>
        <div class="container">
          <div class="blog__inner">
            <div class="blog__inner-desc">
              <img class="section-ic" src="{{ asset('assets/frontend/templates/masbia/') }}/images/icons/section-icon.svg" alt="">
              <h2 class="section-title"><strong>Our</strong> Blog</h2>
              <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut
                labore et dolore magna aliqua...</p>
              <a href="#" class="btn btn--green blog__inner-btn">View all</a>
            </div>

            <div class="swiper swiper-blog">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="swiper-blog__img">
                    <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/blog-slider/slider-blog1.jpg" alt="">
                    <a href="#" target="_blank" class="swiper-blog__img-link">
                      <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/icons/arrow-top-right.svg" alt="">
                    </a>
                  </div>
                  <time datetime="" class="swiper-blog__date">OCTOBER 31, 2022</time>
                  <p class="swiper-blog__title">It has survived not
                    only five centuries</p>
                </div>

                <div class="swiper-slide">
                  <div class="swiper-blog__img">
                    <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/blog-slider/slider-blog2.jpg" alt="">
                    <a href="#" target="_blank" class="swiper-blog__img-link">
                      <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/icons/arrow-top-right.svg" alt="">
                    </a>
                  </div>
                  <time datetime="" class="swiper-blog__date">OCTOBER 31, 2022</time>
                  <p class="swiper-blog__title">It has survived not
                    only five centuries</p>
                </div>

                <div class="swiper-slide">
                  <div class="swiper-blog__img">
                    <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/blog-slider/slider-blog3.jpg" alt="">
                    <a href="#" target="_blank" class="swiper-blog__img-link">
                      <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/icons/arrow-top-right.svg" alt="">
                    </a>
                  </div>
                  <time datetime="" class="swiper-blog__date">OCTOBER 31, 2022</time>
                  <p class="swiper-blog__title">It has survived not
                    only five centuries</p>
                </div>

                <div class="swiper-slide">
                  <div class="swiper-blog__img">
                    <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/blog-slider/slider-blog1.jpg" alt="">
                    <a href="#" target="_blank" class="swiper-blog__img-link">
                      <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/icons/arrow-top-right.svg" alt="">
                    </a>
                  </div>
                  <time datetime="" class="swiper-blog__date">OCTOBER 31, 2022</time>
                  <p class="swiper-blog__title">It has survived not
                    only five centuries</p>
                </div>
              </div>
            </div>

            <div class="swiper-media__arrows">
              <div class="swiper-button-prev blog-button-prev">
                <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2.09468 1.68738L11.4075 11.0002L2.09467 20.313" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="donation">
      <div class="container">
        <div class="donation__inner">
          <div class="donation__inner-img">
            <img src="{{ asset('assets/frontend/templates/masbia/') }}/images/donation-img.jpg" alt="">
          </div>
          <div class="donation__inner-content">
            <h2 class="donation__inner-title"><strong>Ready to</strong> do incredible!</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. </p>
            <a href="" class="btn btn--white">Donate now</a>
          </div>
        </div>
      </div>
    </section>
  </main>

  @include('frontend.templates.masbia-template.includes.footer')

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="{{ asset('assets/frontend/templates/masbia/js/js.js') }}"></script>
</body>

</html>