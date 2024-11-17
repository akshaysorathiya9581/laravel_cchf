<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="footer__col">
                <img class="footer__logo" src="{{ asset('assets/frontend/templates/masbia/images/footer-logo.svg') }}"
                    alt="">
                <address class="address">Make Tax Deductible Donations Payable to:<br>
                    Masbia (Tax ID: 20-1923521)<br>
                    Mailing Address: P.O. Box 191181, Brooklyn NY, 11219</address>
                <p>For More Sponsorship Opportunities: Click <a href="#">Here</a></p>
                <p>Masbia is a non-profit 501(c)(3)federally<br>
                    tax-exempt charitable organization.</p>
            </div>

            <div class="footer__col">
                <div class="footer__list-title">ABOUT MASBIA</div>
                <ul class="footer__list">
                    <li>
                        <a href="#">What We Do</a>
                    </li>
                    <li>
                        <a href="#">History</a>
                    </li>
                    <li>
                        <a href="#">Kosher Certifying Agency</a>
                    </li>
                    <li>
                        <a href="#">Tzedakah</a>
                    </li>
                    <li>
                        <a href="#">Supporters And Benefactors</a>
                    </li>
                    <li>
                        <a href="#">Who We Are</a>
                    </li>
                    <li>
                        <a href="#">Board</a>
                    </li>
                </ul>
            </div>

            <div class="footer__col">
                <div class="footer__list-title">GET INVOLVED</div>
                <ul class="footer__list">
                    <li>
                        <a href="#">Donation Catalog</a>
                    </li>
                    <li>
                        <a href="#">Volunteer</a>
                    </li>
                    <li>
                        <a href="#">Volunteer FAQ</a>
                    </li>
                    <li>
                        <a href="#">Wishlist</a>
                    </li>
                </ul>
            </div>

            <div class="footer__col">
                <div class="footer__list-title">CONTACT US</div>
                <ul class="footer__list">
                    <li>
                        <a href="#">Masbia Of Flatbush</a>
                    </li>
                    <li>
                        <a href="#">Masbia Of Queens</a>
                    </li>
                    <li>
                        <a href="#">Masbia Boro Park</a>
                    </li>
                    <li>
                        <a href="#">Corporate Office</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container">
            <p>© <span id="year"></span> / Masbia. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/frontend/templates/masbia/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/templates/masbia/js/tabs.js') }}"></script>
<script src="{{ asset('assets/frontend/templates/masbia/js/js.js') }}"></script>
<script src="{{ asset('assets/frontend/templates/masbia/js/accordion.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.toast.js') }}"></script>
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>

@php
    $temp = [];
@endphp

@if ($errors->any())
    @php
        foreach ($errors->getMessages() as $k => $v) {
            $temp[$k] = implode('<br/>', $v);
        }
    @endphp
@endif

@foreach (['success', 'error', 'warning', 'info', 'status'] as $key)
    @if (Session::has($key))
        <script type="text/javascript">
            toastr_show("{{ Session::get($key) }}", '{{ $key }}');
        </script>
    @endif
@endforeach

<script type="text/javascript">
    $(document).ready(function() {
        var errors = $.parseJSON('{!! json_encode($temp) !!}');
        formValidation(errors);

        // is reuqired span add
        if ($('.is_required').length) {
            $.each($('.is_required'), function(index, el) {
                $(this).closest('div').find('label').first().after(
                    '<span class="m-form__help text-danger">*</span>')
            });
        }
    });
</script>
@yield('scripts')
</body>

</html>
