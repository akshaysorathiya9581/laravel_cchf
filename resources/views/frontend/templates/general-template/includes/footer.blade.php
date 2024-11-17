      <!-- footer section start  -->
      <div class="footer-container">
          <div class="footer-sub-container">
              <div class="footer">
                  <div class="text-img-wrap">
                      <div class="footer-logo-wrap">
                          <img src="{{ asset('assets/frontend/templates/general/Assets/footer/FooterLogo.svg') }}" alt="" />
                      </div>
                      <div class="footer-text-wrap">
                          <p class="footer-text">
                              Make Tax Deductible Donations Payable to:
                          </p>
                          <p class="footer-text">Masbia (Tax ID: 20-1923521)</p>
                          <p class="footer-text">
                              Mailing Address: P.O. Box 191181, Brooklyn NY, 11219
                          </p>
                          <br />
                          <p class="footer-text">
                              For More Sponsorship Opportunities: Click Here
                          </p>
                          <p class="footer-text">
                              Masbia is a non-profit 501(c)(3)federally
                          </p>
                          <p class="footer-text">tax-exempt charitable organization.</p>
                      </div>
                  </div>
                  <div class="footer-about-links-wrap">
                      <p class="footer-about-hd">ABOUT MASBIA</p>
                      <a href="">What We Do </a>
                      <a href="">History</a>
                      <a href="">Kosher Certifying Agency </a>
                      <a href="">Tzedakah</a>
                      <a href="">Supporters And Benefactors </a>
                      <a href="">Who We Are </a>
                      <a href="">Board</a>
                  </div>
                  <div class="footer-getinvolved-links-wrap">
                      <p class="footer-getinvolved-hd">GET INVOLVED</p>
                      <a href="">Donation Catalog </a>
                      <a href="">Volunteer</a>
                      <a href="">Volunteer FAQ </a>
                      <a href="">Wishlist</a>
                  </div>
                  <div class="footer-contact-links-wrap">
                      <p class="footer-contact-hd">CONTACT US</p>
                      <a href="">Masbia Of Flatbush </a>
                      <a href="">Masbia Of Queens </a>
                      <a href="">Masbia Boro Park </a>
                      <a href="">Corporate Office</a>
                  </div>
              </div>
              <div class="footer-res">
                  <div class="footer-about-text-wrap">
                      <div class="text-img-wrap">
                          <div class="footer-logo-wrap">
                              <img src="{{ asset('assets/frontend/templates/general/Assets/footer/FooterLogo.svg') }}" alt="" />
                          </div>
                          <div class="footer-text-wrap">
                              <p class="footer-text">
                                  Make Tax Deductible Donations Payable to:
                              </p>
                              <p class="footer-text">Masbia (Tax ID: 20-1923521)</p>
                              <p class="footer-text">
                                  Mailing Address: P.O. Box 191181, Brooklyn NY, 11219
                              </p>
                              <br />
                              <p class="footer-text">
                                  For More Sponsorship Opportunities: Click Here
                              </p>
                              <p class="footer-text">
                                  Masbia is a non-profit 501(c)(3)federally
                              </p>
                              <p class="footer-text">tax-exempt charitable organization.</p>
                          </div>
                      </div>
                      <div class="footer-about-links-wrap">
                          <p class="footer-about-hd">ABOUT MASBIA</p>
                          <a href="">What We Do </a>
                          <a href="">History</a>
                          <a href="">Kosher Certifying Agency </a>
                          <a href="">Tzedakah</a>
                          <a href="">Supporters And Benefactors </a>
                          <a href="">Who We Are </a>
                          <a href="">Board</a>
                      </div>
                  </div>
                  <div class="footer-getinvolved-contact-wrap">
                      <div class="footer-getinvolved-links-wrap">
                          <p class="footer-getinvolved-hd">GET INVOLVED</p>
                          <a href="">Donation Catalog </a>
                          <a href="">Volunteer</a>
                          <a href="">Volunteer FAQ </a>
                          <a href="">Wishlist</a>
                      </div>
                      <div class="footer-contact-links-wrap">
                          <p class="footer-contact-hd">CONTACT US</p>
                          <a href="">Masbia Of Flatbush </a>
                          <a href="">Masbia Of Queens </a>
                          <a href="">Masbia Boro Park </a>
                          <a href="">Corporate Office</a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="footer-copywrite-text-wrap">
              <p class="copywrite-text">© 2024 / Masbia. All rights reserved.</p>
          </div>
      </div>
      <!-- footer section end  -->
      </div>



      <style>
          .has-global-padding {
              padding: 0 !important;
          }

          body.is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
              max-width: 100% !important;
          }

          :where(body .is-layout-constrained)> :first-child:first-child {
              height: auto !important;
          }

      </style>

      <!-- script link start  -->
      <script src="{{ asset('assets/frontend/templates/general/Css/bootstrap-5.0.2-dist/js/bootstrap.bundle.js') }}"></script>
      <script src="{{ asset('assets/frontend/templates/general/Js/jquery.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/frontend/templates/general/Js/slick.js') }}"></script>
      <script src="{{ asset('assets/frontend/templates/general/Js/index.js') }}"></script>
      {{-- <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script> --}}

      <!-- script link end  -->

      {{-- <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script> --}}
      <!-- script link end  -->
      <script>
          $("#installment_checkbox").on('change', function() {
              $('.installment_div').toggleClass('d-block');
          });

      </script>
      <script>
          //       $(function(){
          //     $("#don_recurring").change(function() {
          //       $(".rec_btns").toggleClass("d-block", this.checked)
          //     }).change();
          //   });​

      </script>
      </body>

      </html>
