@section('title', 'Masbia')
@include('frontend.templates.masbia-template.includes.header')

<main>
    <section class="hero">
      <div class="hero__wrapper donate">
        <div class="container">
          <div class="hero__inner">
            <img class="section-ic" src="images/icons/donate-section-ic.svg" alt="">
            <h2 class="section-title"><strong>Sponsor Food</strong> to Masbia</h2>
            <p class="text">Throughout the Passover season, Masbia expects to distribute raw food packages, which will
              include special holiday staples for families to be able to prepare their own Seder and Kosher for Passover
            </p>
            <div class="hero-btns">
              <a href="#" class="btn btn--white">
                <span>Donate</span>
                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="0.506188" y="0.493735" width="21" height="21" rx="10.5"
                    transform="matrix(0.0124527 0.999922 0.999922 -0.0124527 0.00618757 0.631674)" fill="#1D6E65"
                    stroke="white" />
                  <path d="M7.68376 10.3882L11.1638 13.7826L14.5582 10.3026" stroke="white" stroke-width="1.4"
                    stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </a>
              <a href="#" class="btn btn--outlined">DONATION CATALOG</a>
            </div>
            <a href="#" class="hero__link">View current campaigns</a>
            <img class="hero__hands-img" src="images/hands-white.svg" alt="">
            <img class="hero-img" src="images/hero-img.png" alt="">
          </div>
        </div>
      </div>
    </section>

    <section class="sponsor-s">
      <div class="sponsor">
        <div class="sponsor__heading">
          <img class="section-ic" src="images/icons/thumb-ic.svg" alt="">
          <h2 class="section-title"><strong>Sponsor</strong> Food</h2>
          <p class="sponsor__heading-subtitle">Choose a donation amount</p>
        </div>
        <div class="sponsor__donation">
          <div class="sponsor__donation-btns tickets options-grid">
{{--        @foreach ($ticket_options_masbia as $to_key => $to_value)
              <button class="<?= (!$to_key) ? 'donation-amount ' : 'donation-amount '; ?>" data-price="{{ $to_value['price']; }}">{{ $to_value['title'] }}</button>
            @endforeach --}}
            {{-- <button class="donation-amount other option-card ticket_item" data-price="0">Other<br>Amount</button> --}}
          </div>
          <div class="sponsor__donation-custom">
            <div class="sponsor__donation-customBox">
              {{-- <span>$</span> --}}
              <input type="text" id="customAmount" name="DonateAmount">
            </div>
            <button class="btn btn--brown sponsor__donate-now" data-bs-toggle="collapse" data-bs-target="#collapseCart" aria-expanded="false">Donate Now</button>

          </div>
        </div>
        <div class="sponsor__payment-method">
          <div>
            <a href="#">
              <img src="images/payment/visa.svg" alt="">
            </a>
            <a href="#">
              <img src="images/payment/amex.svg" alt="">
            </a>
            <a href="#">
              <img src="images/payment/discover.svg" alt="">
            </a>
            <a href="#">
              <img src="images/payment/mastercard.svg" alt="">
            </a>
            <a href="#">
              <img src="images/payment/PayPal.svg" alt="">
            </a>
            <a href="#">
              <img src="images/payment/ojcfund.svg" alt="">
            </a>
            <a href="#">
              <img src="images/payment/paypal2.svg" alt="">
            </a>
            <a href="#">
              <img src="images/payment/pledger.svg" alt="">
            </a>
            <a href="#">
              <img src="images/payment/donorsfund.svg" alt="">
            </a>
          </div>
          <p>All donations are tax deductible.<br> <strong>Tax ID: <span>20-1923521</span></strong></p>
        </div>
        <div class="sponsor__options">
          <h3 class="sponsor__options-title"><strong>Sustainer</strong> Options</h3>
          <div class="sponsor__options-tabs">
            <ul class="tab-list" data-active-tab="tab1">
              @foreach (get_sustainer_options_list() as $key => $value)
                <li><a href="#tab{{$value['id']}}" class="tab-link btn-filter" data-tab="tab{{ $value['id'] }}" data-id="{{ $value['id'] }}" data-name="sustainer_option_id">{{ $value['text']}}</a></li>
              @endforeach
            </ul>
            <div class="tac">
              <button class="sponsor__tooltip tooltip">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M12 2C17.523 2 22 6.477 22 12C22 17.523 17.523 22 12 22C6.477 22 2 17.523 2 12C2 6.477 6.477 2 12 2ZM11.99 10H11C10.7451 10.0003 10.5 10.0979 10.3146 10.2728C10.1293 10.4478 10.0178 10.687 10.0028 10.9414C9.98789 11.1958 10.0707 11.4464 10.2343 11.6418C10.3979 11.8373 10.6299 11.9629 10.883 11.993L11 12V16.99C11 17.51 11.394 17.94 11.9 17.994L12.01 18H12.5C12.7103 18 12.9153 17.9337 13.0857 17.8105C13.2562 17.6873 13.3835 17.5135 13.4495 17.3139C13.5155 17.1142 13.5169 16.8988 13.4534 16.6982C13.3899 16.4977 13.2649 16.3223 13.096 16.197L13 16.134V11.01C13 10.49 12.606 10.06 12.1 10.006L11.99 10ZM12 7C11.7348 7 11.4804 7.10536 11.2929 7.29289C11.1054 7.48043 11 7.73478 11 8C11 8.26522 11.1054 8.51957 11.2929 8.70711C11.4804 8.89464 11.7348 9 12 9C12.2652 9 12.5196 8.89464 12.7071 8.70711C12.8946 8.51957 13 8.26522 13 8C13 7.73478 12.8946 7.48043 12.7071 7.29289C12.5196 7.10536 12.2652 7 12 7Z"
                    fill="#979797" />
                </svg>
                <p>It it works?</p>
                <span class="tooltiptext tooltip-top">Your card will be charged 15 minutes before sunset every
                  Friday</span>
              </button>
            </div>
          </div>
          @foreach (get_sustainer_options_list() as $key => $value)
            @if ($value['is_notification'])
              <div id="tab{{ $value['id'] }}" class="tab-content">
                <div class="sponsor__tab-content-wrapper">
                  <div class="donation__dedication">
                    <input type="checkbox" id="notification" />
                    <label for="notification">
                      Receive a notification each time your card is charged
                    </label>
                  </div>
                  <form class="sponsor__notification-form">
                    <input type="text" class="custom-input" placeholder="Enter your Email or Mobile">
                    <input type="submit" value="Submit" class="btn">
                  </form>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
      </div>
    </section>

    <section class="donation-options-s">
      <div class="tac">
        <h2 class="section-title"><strong>More Donation</strong> Options</h2>
        <div>
          <a href="#" class="btn btn--green donation-options__btn">For <strong>Gift Donations,</strong> click here</a>
        </div>
      </div>

      <div class="spoiler-list" data-spoiler-list="accordion">
        <div class="spoiler" data-spoiler="active">
          <div class="spoiler__heading" data-spoiler-trigger="">
            <div class="spoiler__title">Donation Location</div>
            <div class="spoiler__arrow"></div>
          </div>
          <div class="spoiler__container">
            <div class="spoiler__content">
              <div class="location-wrapper">
                @foreach (get_donation_location_list() as $key => $value)
                    <button data-id="{{ $value['id'] }}" data-name="donation_location_id" class="donation_location">{{ $value['text'] }}</button>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <div class="spoiler" data-spoiler>
          <div class="spoiler__heading" data-spoiler-trigger="">
            <div class="spoiler__title">Allocate Donation</div>
            <div class="spoiler__arrow"></div>
          </div>
          <div class="spoiler__container">
            <div class="spoiler__content">
              <div class="custom-select">
                <select class="custom-input" id="allocate_donation" name="allocate_donation">
                  <option value="">Select</option>
                  @foreach ($allocate_donation as $k => $value)
                    <option value="{{ $value->id }}" data-name="{{$value->name}}">{{ $value->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="spoiler" data-spoiler>
          <div class="spoiler__heading" data-spoiler-trigger="">
            <div class="spoiler__title">Dedication / Comments</div>
            <div class="spoiler__arrow"></div>
          </div>
          <div class="spoiler__container">
            <div class="spoiler__content">
              <input type="text" class="custom-input" id="dedication_comments" name="dedication_comments" placeholder="Dedication to">
            </div>
          </div>
        </div>

        <div class="spoiler" data-spoiler>
          <div class="spoiler__heading" data-spoiler-trigger="">
            <div class="spoiler__title">Letter</div>
            <div class="spoiler__arrow"></div>
          </div>
          <div class="spoiler__container">
            <div class="spoiler__content">
              <div class="donation__dedication accordion-checkbox">
                <input type="checkbox" id="letter" name="letter" value="1" />
                <label for="letter">
                  Get a letter
                  <span data-price="{{$campaign->meta->letter_price}}">With a donation of ${{$campaign->meta->letter_price}}+ (for paper?)</span>
                </label>
              </div>
            </div>
          </div>
        </div>

        @if ($campaign->meta->enable_recognition)
          <div class="spoiler" data-spoiler>
            <div class="spoiler__heading" data-spoiler-trigger="">
              <div class="spoiler__title">Recognition</div>
              <div class="spoiler__arrow"></div>
            </div>
            <div class="spoiler__container">
              <div class="spoiler__content">
                <div class="donation__dedication accordion-checkbox">
                  <input type="checkbox" id="recognition" name="recognition" value="1" />
                  <label for="recognition">
                    Display your sponsorship in our dining rooms at a time of your choosing.
                    <span data-price="{{$campaign->meta->recognition_price}}">With a donation of ${{$campaign->meta->recognition_price}}+</span>
                  </label>
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
    </section>
  </main>

@include('frontend.templates.masbia-template.includes.footer')
{{-- <script type="module" src="{{ asset('assets/frontend/templates/masbia/js/main.js') }}?v={{ time() }}"></script> --}}
<script type="module" src="{{ asset('assets/frontend/templates/masbia/js/main_new.js') }}?v={{ time() }}"></script>
@section('scripts')
  <script>
    // setTimeout(function() {
    //     let $donationButton = $('.sponsor__donation-btns').find('.donation-amount').first();
    //     if ($donationButton.length > 0) {
    //         $donationButton.click();
    //     } else {
    //         console.warn('Donation button not found.');
    //     }
    // }, 200); // Delay in milliseconds

    // $(document).ready(function() {
    //     $(document).on('click', '.donation-amount', function() {
    //       console.log('okok');
    //        var _this = $(this);
    //        var price = _this.data('price');
    //        $(_this).closest('.sponsor__donation-btns').find('.selected').removeClass('selected');
    //        $(_this).addClass('selected');
    //        if(!_this.hasClass('other')) {
    //           price = '';
    //           renderTicketPages();
    //        }
    //        $('#customAmount').val(price);
    //     });
    // });
  </script>
@endsection
