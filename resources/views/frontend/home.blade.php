<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- HTML Meta Tags -->
    <meta name="description"
        content="In this collaborative sweepstakes venture hosted by Chofetz Chaim Heritage Foundation, multiple organizations unite to generate crucial funds for their distinct causes. Through the strategic combination of prizes and resources, each organization can present an enticing $100,000 grand prize and an additional 10 prizes that surpass what they could individually offer. This not only provides participants with the opportunity to win exceptional prizes but also enables them to contribute to the shared objectives of our diverse organizations, fostering a sense of community and mutual support.">


    <link rel="icon" href="https://100kgoral.org/favicon.ico" />

    <title>100k Goral</title>
    <style>
        :root {
            --accent-color: #0089ff;
            --secondary-color: #333;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #0089ff;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/hint-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">

    <script src="{{ asset('assets/frontend/js/jquery-3.5.0.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body class="">
    <!-- add class "header-fixed" for floating header or remove for static header -->
    <div class="overlay-loader" id="overlayloader" style="display: none;"></div>
    <div class="overlay-class"></div>
    <header class="header">
        <a href="#" class="logo"></a>
        <input id="menu-toggle" type="checkbox" class="hidden">
        <label class="menu-button-container overlay" for="menu-toggle">
            <div class="menu-button"></div>
        </label>

        <nav class="menu">
            <ul class="header__menu main-menu"></ul>
        </nav>
    </header>


    <script>
        setTimeout(() => {
            $(".overlay-class").addClass("d-none");
        }, 1000);
    </script>
    <style>
        .promo__images img {
            display: none !important;
        }

        header,
        footer {
            display: none !important;
        }

        .thankyou_title {
            font-size: 70px;
            font-weight: 900;
            letter-spacing: -0.44px;
            color: #fff;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .thankyou_box {
            color: #333333;
            line-height: 27px;
            font-size: 17px;
        }

        h3 {
            font-weight: bolder;
            padding: 51px 0px 47px;
            max-width: 700px;
            margin: auto;
        }

        a {
            color: var(--bs-link-color);
        }

        .ticket-detail h3 {
            padding: 0;
            font-weight: 800;
        }

        .ticket-detail .data-table {
            padding: 20px 0px 10px;
        }

        .data-table-row {
            display: flex;
            padding: 4px 0px;
        }

        p {
            color: #333333;
            line-height: 27px;
            font-size: 17px;
        }

        .data-table {
            padding: 20px 0px 50px;
        }

        .col-one {
            min-width: 100px;
        }

        .col-one b,
        .col-one-in b,
        .col-two {
            font-weight: 600;
        }

        .col-one-in {
            font-weight: 700;
            min-width: 200px;
        }

        .col-two {
            color: var(--accent-color);
        }

        .ticket-detail {
            margin-bottom: 50px;
        }

        .doner-info {
            font-weight: 800;
        }

        .promo__images,
        .promo,
        .promo__images img {
            min-height: 371px !important;
            height: 367px;
            background-image: url({{ asset('assets/frontend/images/banner.png') }});
            border-radius: 0 0 60px 60px;
            background-size: cover;
            background-position: center;
        }

        .responsive-iframe {
            position: relative;
            overflow: hidden;
            padding-top: 75%;
            height: 0;
        }

        .responsive-iframe iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .prize-description {
            font-weight: bold;
            color: blue;
        }

        .winner-name {
            font-style: italic;
        }

        .seller-info {
            text-decoration: underline;
        }

        div#winners-announcement {
            text-align: center;
        }

        div#winners-announcement p {
            max-width: 800px;
            margin: 25px auto 0 auto;
            display: block;
            padding: 0 0 24px 0;
            font-weight: 500;
            font-size: 20px;
        }

        .prize-list ul {
            margin: 5px;
            background: #e9e9e9;
            padding: 20px;
            border-radius: 20px;
            width: 350px;
            display: inline-block;
        }

        .prize-list ul li {
            text-align: center;
        }

        li.prize {
            color: var(--accent-color);
        }

        .sold-by,
        .winner,
        .prize {
            font-weight: 700;
            line-height: 1.8;
        }

        @media only screen and (max-width: 768px) {
            .ticket-container {
                padding: 50px 20px 40px;
            }

            .ticket-detail h3 {
                font-size: 20px;
            }

            p {
                font-size: 16px;
            }

            .thankyou_box {
                padding: 17px 0px;
            }

            .col-one-in {
                min-width: 160px;
            }

            body.header-fixed .promo__content {
                padding-top: 0px;
            }

            .promo__images,
            .promo,
            .promo__images img {
                min-height: 300px !important;
                height: 300px;
            }
            ul li{
                list-style: none !important;
            }

            .thankyou_title {
                font-size: 34px;
                line-height: 38px;
            }

            .d-flex {
                flex-direction: column;
            }

            .raffle_img {}
        }
        .raffle_img{
            margin-top: 20px !important;
        }
    </style>

    <main>
        <div class="promo">
            <div class="promo__content">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center gap-5">
                        <div>
                            <h1 class="thankyou_title"> 100KGORAL.ORG SWEEPSTAKES<br>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="promo__images">
                <img alt="">
            </div>
        </div>

        <div class="raffle__screens " style="margin-top:1.5rem;">
            <img class="raffle_img" style=" width: 100% !important;"
                src="{{ asset('assets/frontend/images/img1.png') }}" alt="">
            <img style=" width: 100% !important;" class="raffle_img"
                src="{{ asset('assets/frontend/images/img2.png') }}" alt="">

        </div>

        <div class="thankyou_box">
            <div class="container">
                <div class="thankyou_text">
                    <div id="winners-announcement">
                        <h3>We are excited to present the winners of the 100K Sweepstakes. Congratulations to all on
                            your fabulous prizes!</h3>
                        <div class="prize-list">
                            <ul>
                                <li class="prize"> $100,000 CASH</li>
                                <li><span class="winner">Winner:</span> Gail Grunfeld</li>
                                <li><span class="sold-by">Sold By:</span> TAG of Rockland</li>
                            </ul>
                            <ul>
                                <li class="prize"> 4 Tickets to Eretz Yisroel</li>
                                <li><span class="winner">Winner:</span> Anonymous</li>
                                <li><span class="sold-by">Sold By:</span> Hit Dan Olgen</li>
                            </ul>
                            <ul>
                                <li class="prize"> $2,000 Visa Gift Card</li>
                                <li><span class="winner">Winner:</span> Daniel & Bracha Khodadian</li>
                                <li><span class="sold-by">Sold By:</span> CCHF</li>
                            </ul>
                            <ul>
                                <li class="prize"> Gevril Diamond Watch</li>
                                <li><span class="winner">Winner:</span> Motel & Chavy Perlman</li>
                                <li><span class="sold-by">Sold By:</span> CCHF</li>
                            </ul>
                            <ul>
                                <li class="prize"> Elegant Linen Set</li>
                                <li><span class="winner">Winner:</span> Shaindy Brander</li>
                                <li><span class="sold-by">Sold By:</span> TAG of Rockland</li>
                            </ul>
                            <ul>
                                <li class="prize"> $2,000 at Feldman's Jewelery</li>
                                <li><span class="winner">Winner:</span> Yosef Brecher</li>
                                <li><span class="sold-by">Sold By:</span> Keren Zichron Tzipora</li>
                            </ul>
                            <ul>
                                <li class="prize"> $2,500 at Luxury Kosher Villas</li>
                                <li><span class="winner">Winner:</span> Menashe & Mimi Oratz</li>
                                <li><span class="sold-by">Sold By:</span> Gesher</li>
                            </ul>
                            <ul>
                                <li class="prize"> $1,000 at Z. Berman Books</li>
                                <li><span class="winner">Winner:</span> Meir Kohn</li>
                                <li><span class="sold-by">Sold By:</span> Zeh L'Zeh</li>
                            </ul>
                            <ul>
                                <li class="prize"> $2,000 Shaitel at Jewel Wigs</li>
                                <li><span class="winner">Winner:</span> Chaim Goldman</li>
                                <li><span class="sold-by">Sold By:</span> Chicago Center</li>
                            </ul>
                            <ul>
                                <li class="prize"> $1,000 at Focus Camera</li>
                                <li><span class="winner">Winner:</span> Wayne Garber</li>
                                <li><span class="sold-by">Sold By:</span> It's Good to Know</li>
                            </ul>
                            <ul>
                                <li class="prize"> $1,000 at Double Play Toys</li>
                                <li><span class="winner">Winner:</span> Daniel Trenk</li>
                                <li><span class="sold-by">Sold By:</span> Guard Your Eyes</li>
                            </ul>
                            <ul>
                                <li class="prize"> Split the Pot</li>
                                <li><span class="winner">Winner:</span> Mr. & Mrs. Perl</li>
                                <li><span class="sold-by">Sold By:</span> CCHF</li>
                            </ul>
                        </div>
                        <p>To view the recorded drawing event, check out the video below</p>
                        <!-- Embed YouTube link -->
                        <div class="video-embed">
                            <iframe width="766" height="500" src="https://www.youtube.com/embed/aXZta-YGx4E"
                                title="SWEEPSTAKES 100K LIVE" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                        <p>We congratulate all our winners and thank everyone who participated. We look forward to
                            seeing you at our next sweepstakes event!</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/hint-css.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.3"></script>


</body>



</html>
