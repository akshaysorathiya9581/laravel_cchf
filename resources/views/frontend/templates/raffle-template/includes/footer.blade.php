<footer class="footer">
    <div class="container-lg g-0">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap gap-4">
            <div class="footer__columns">
                <a href="https://100kgoral.org/campaign/breslovusa" class="logo">
                    <span class="overlay">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32.003" height="41.998" viewBox="0 0 32.003 41.998">
                            <path id="Union_1" data-name="Union 1" d="M13917.336,16965.664a5.334,5.334,0,1,1,5.337,5.336A5.336,5.336,0,0,1,13917.336,16965.664Zm-21.334-7.658a8,8,0,1,1,8,8A8,8,0,0,1,13896,16958.006Zm28-6.67a1.333,1.333,0,1,1,1.333,1.334A1.334,1.334,0,0,1,13924.006,16951.336Zm-12-3.334a4.668,4.668,0,1,1,4.668,4.668A4.669,4.669,0,0,1,13912,16948Zm-16-7.336a6.667,6.667,0,1,1,6.665,6.67A6.666,6.666,0,0,1,13896,16940.666Zm24-2.666a4,4,0,1,1,4,4A4,4,0,0,1,13920,16938Zm-7.33-7a2,2,0,1,1,2,2A2,2,0,0,1,13912.672,16931Z" transform="translate(-13896.002 -16929.002)" fill="var(--accent-color)"></path>
                        </svg></span>
                    <span class="logo-content"><b>Breslov</b> USA</span>
                </a>
                <div class="footer__address">
                    <h2>Breslev</h2>
                    <address>
                        <p>48 Secor St<br>
                            Monsey, NY 10952<br>

                        </p><br>
                        <a class="footer__email" href="mailto:donatebreslev@gmail.com">donatebreslev@gmail.com</a>
                        <a href="tel:845-418-5532">845-418-5532</a>
                    </address>
                    <br>
                    <h2>Tax ID : 88-3462901</h2>
                </div>
                <ul class="footer__menu main-menu secondary-menu">

                </ul>
                <!-- <ul class="footer__menu secondary-menu"></ul> -->
            </div>
            <div class="footer__terms">
                <p id="text"><strong>NO PURCHASE OR DONATION NECESSARY TO ENTER OR WIN. <br>A PURCHASE OR DONATION WILL NOT IMPROVE YOUR CHANCES OF WINNING</strong>.</p>
            </div>
        </div>
    </div>




    <div class="modal fade giftModal" id="giftDetailModal" aria-hidden="true" aria-labelledby="giftDetailModal" tabindex="-1" style="z-index: 99999;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-dark fs-5" id="giftModal">Gift Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="GiftDetails">

                </div>

            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/frontend/templates/raffle/js/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/templates/raffle/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/templates/raffle/js/swiper-bundle.min.js') }}" type="module"></script>
 <script src="{{ asset('assets/frontend/templates/raffle/js/ua-parser.js') }}"></script>
<script src="{{ asset('assets/frontend/templates/raffle/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/frontend/templates/raffle/js/hint-css.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.3"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script> --}}


</body>
</html>
