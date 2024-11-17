import formatDate from "./dateFormatter.js";
import { CountUp } from "./countUp.min.js";

$(document).ready(function () {
    // console.log("here");
    console.log('siteContent=',siteContent);

    // if(siteContent.template == 'general'){
    renderBlogs();
    // }else if(siteContent.template == 'raffle'){
    toggleMenu();
    populateLogo();
    renderCustomAmount();
    renderMenu(siteContent.mainMenu, ".main-menu");
    renderMenu(siteContent.secondaryMenu, ".secondary-menu");
    renderPromoContent();

    renderPrizes();
    // renderGifts();
    renderDonors();
    renderTeamMembers();
    renderTeamDonors();
    renderSponsorship();

    renderSplitPot(
        siteContent.splitPot,
        ".prize-split__options .prize-split__btns"
    );

    // handleRafflePosition();
    setTimeout(function () {
        handleRafflePosition();
    }, 300);
    renderGallerySlides();
    floatingBtnVisibility();
    //displayDonations();
    //displayMaxSelections();

    // }

    $("#checkoutSummaryBtnMobile").on("click", function () {
        $(".footer").hide();
    });
    $(".remove-cart-details-button").on("click", function () {
        $(".footer").show();
    });
    $("#currency-select")
        .focus(function () {
            $("#currency-select option").each(function () {
                $(this).html($(this).val());
            });
        })
        .on("change", function () {
            $("#currency-select option").each(function () {
                $(this).html($(this).data("display"));
            });
            $(this).blur();
        });

    function renderBlogs() {
        if (siteContent.blogsData.length == 0) {
            return;
        }
        let blogs = siteContent.blogsData;
        let targetClass = ".blog-sub-container .blog-cards-wrap";
        let enable_blogs = siteContent.campaignSettings.enable_blogs;

        if (enable_blogs == 1) {
            blogs.map(function (item) {
                var arrowIcon =
                    "../../assets/frontend/templates/general/Assets/Blog/blog-arrow-icon.svg";
                const date = new Date(item.date);
                // Format the date
                const options = {
                    year: "numeric",
                    month: "long",
                    day: "2-digit",
                };
                let formattedDate = date.toLocaleDateString("en-US", options);
                var $blog = `
                  <div class="blog-card card-one${item.id}">
                    <div class="card-img-wrap">
                        <img class="blog-card-img" src="${item.image}" alt="" />
                        <div class="blog-card-overlay-container">
                            <div class="arrow-wrap">
                                <img src="${arrowIcon}" alt="" />
                            </div>
                        </div>
                    </div>
                    <p class="blog-card-date">
                    ${formattedDate}
                    <!--OCTOBER 31, 2022-->
                    </p>
                    <p class="blog-card-text">
                       ${item.title}
                    </p>
                </div>
                `;

                $(targetClass).append($blog);
            });
        } else {
            $(".blog-container").addClass("d-done");
            $("#blog").hide();
        }
    }

    function getTicketData(ticketID) {
        const grandPrize = siteContent.tickets.grandPrize.packageIds.includes(
            ticketID
        )
            ? siteContent.tickets.grandPrize
            : null;

        const ticket = siteContent.tickets.packages.find(
            (p) => p.id === ticketID
        );

        // console.log('ticket=',ticket);
       const entryPluralized = (ticket && ticket.entry === 1) ? "entry" : "entries";


        return {
            grandPrize,
            ticket,
            entryPluralized,
        };
    }
    function renderSplitPot(stp, targetClass) {
        if (stp.length > 0) {
            stp.map(function (item) {
                var $STP = `<button type="button" data-price="${item.amount}" data-usd-price="${item.amount}" data-entries="${item.entries}" class="btn overlay prize-split__btn">
           <span class="prize-split__btn-price">
           $ ${item.amount}
           <span class="prize-split__btn-entries">
           for ${item.entries} entries
           </span></span></button>`;
                $(targetClass).append($STP);
            });
        } else {
            $(".ticket-container.prize-split-container").hide();
        }
    }
    function isVideoUrl(url) {
        var videoExtensions = ["mp4", "webm", "ogg"];
        // if(url.length > -0){
        let extension = url.split(".").pop().toLowerCase();
        return videoExtensions.includes(extension.trim());
        // }else{

        // }
    }

    function formatNumber(number) {
        if (number >= 1000) {
            return number / 1000 + "k";
        } else {
            return number.toString();
        }
    }

    function formatCurrency(
        amount,
        minimumFractionDigits,
        maximumFractionDigits,
        currency = "USD"
    ) {
        amount = parseFloat(amount);
        if (isNaN(amount)) {
            amount = 0;
        }
        return amount.toLocaleString("en-US", {
            style: "currency",
            currency: "USD",
            minimumFractionDigits: minimumFractionDigits,
            maximumFractionDigits: maximumFractionDigits,
        });
    }
    function mutiFormatCurrency(
        amount,
        currency,
        minimumFractionDigits,
        maximumFractionDigits
    ) {
        return Number(amount).toLocaleString("en", {
            style: "currency",
            currency: currency,
            minimumFractionDigits: minimumFractionDigits,
            maximumFractionDigits: maximumFractionDigits,
        });
    }

    function calculateProgress(amountRaised, goal) {
        if (!goal || goal <= 0) {
            return 0;
        }
        const progress = (amountRaised / goal) * 100;
        const roundedProgress = Math.round(progress);
        return roundedProgress;
    }

    var selected_cart_option = [];
    $(document).on('click', '.selector', function(event) {
        event.preventDefault();
    });

    function updateColumns(activePrizesLength) {
        let columns;
        console.log('activePrizesLength=',activePrizesLength);
        if (activePrizesLength > 7) {
            // columns = "3";
            columns = "2";
        } else if (activePrizesLength > 3) {
            columns = "2";
        } else {
            columns = "1";
        }

        $(".cart__summary-block").css("columns", columns);
    }

    // function renderMenu(menu, targetClass) {
    //   menu.forEach(function (item) {
    //     $(targetClass).append(
    //       $("<li>").append($("<a>", { href: item.link, text: item.text }))
    //     );
    //   });
    // }
    function renderMenu(menu, targetClass) {
        menu.forEach(function (item) {
            var $anchor = $("<a>").attr("href", item.link).text(item.text);
            if (item.attributes) {
                Object.keys(item.attributes).forEach(function (key) {
                    $anchor.attr(key, item.attributes[key]);
                });
            }
            $(targetClass).prepend(
                $("<li>").append($anchor)
                // $("<li>").append($("<a>", { href: item.link, text: item.text,  }))
            );
        });
        if (
            siteContent.campaignSettings.createTeams == 0 ||
            siteContent.campaignSettings.createTeams === null
        ) {
            $(".header__menu li:nth-last-child(2) a").attr(
                "style",
                function (i, style) {
                    return (
                        (style || "") +
                        "background-color: transparent !important;display:none;"
                    );
                }
            );
        }
    }

    function handleRafflePosition() {
        handleRafflePositionMobile();
        $(window).resize(handleRafflePositionMobile);
        handleRafflePositionHeight();
    }

    function handleRafflePositionMobile() {
        const windowWidth = $(window).width();
        const raffleOffer = $(".raffle-offer");
        const mobileContainer = $(".about__mobile-container");
        const promoContainer = $(".promo__content-wrapper");

        const isMobileContainer =
            mobileContainer.length &&
            raffleOffer.parent().hasClass("about__mobile-container");
        const isPromoContainer =
            promoContainer.length &&
            raffleOffer.parent().hasClass("promo__content-wrapper");

        if ($(".raffle-offer").hasClass("static")) {
            return;
        }

        if (windowWidth <= 991 && isMobileContainer) {
            return;
        } else if (windowWidth > 991 && isPromoContainer) {
            return;
        }
        if (siteContent.setting.templateType == "multi_location") {
        } else {
            if (windowWidth <= 991) {
                raffleOffer.prependTo(mobileContainer);
            } else {
                raffleOffer.appendTo(promoContainer);
            }
        }
    }

    function handleRafflePositionHeight() {
        let bannerHeight;
        let promoContentHeight;

        const resizeObserver = new ResizeObserver((entries) => {
            const isHeaderFixedHeight = $("body").hasClass("header-fixed")
                ? 150
                : 30;
            const raffleOffer = $(".raffle-offer");
            const aboutInfoWrapper = $(".about-info__wrapper");

            if ($(window).width() < 992) {
                aboutInfoWrapper.removeClass("flex");
                return;
            }

            for (const entry of entries) {
                if (entry.target.className === "promo__images") {
                    bannerHeight = entry.target.clientHeight;
                }
                if (entry.target.className === "raffle-offer") {
                    promoContentHeight = entry.target.clientHeight;
                }
            }

            if (bannerHeight === 0) return;
            if (bannerHeight <= promoContentHeight + isHeaderFixedHeight) {
                aboutInfoWrapper.addClass("flex");
                raffleOffer.appendTo(aboutInfoWrapper);
            } else {
                aboutInfoWrapper.removeClass("flex");
            }
        });

        $(".promo__images, .raffle-offer").each(function () {
            resizeObserver.observe(this);
        });
    }

    function populateLogo() {
        const logoExtension = siteContent.logo.img
            .split(".")
            .pop()
            .toLowerCase();

        if (siteContent.logo.text) {
            const logoTitle = siteContent.logo.text.split(" ");
            let remaingWords = logoTitle.slice(1);
            remaingWords = remaingWords.join(" ");

            const Logo = () => `
        <span class="overlay">
        </span>
        <span class="logo-content"><b>${logoTitle[0]}</b> ${remaingWords}</span>
      `;
            $(".logo").html(Logo);
        }

        if (logoExtension === "svg") {
            // Handle SVG
            $.get(
                siteContent.logo.img,
                function (data) {
                    var $svg = $(data).find("svg");

                    $svg.find("[fill]").attr("fill", "var(--accent-color)");

                    $(".logo span.overlay").append($svg);
                },
                "xml"
            );
        } else {
            const imageElement = new Image();
            imageElement.src = siteContent.logo.img;
            imageElement.height = 50;
            $(".logo").html(imageElement);
        }
    }

    function renderCustomAmount() {
        if (siteContent.campaignSettings.showCustomAmount == 0) {
            $("#customAmountCard").addClass("d-none");
            $("#options-grid__label").addClass("d-none");
        }
    }
    // Close menu
    function toggleMenu() {
        const links = $(".menu a");

        links.on("click", function () {
            $("#menu-toggle").prop("checked", false);
        });

        // Mobile menu toggle
        function toggleCheckbox(checkbox) {
            checkbox.prop("checked", !checkbox.prop("checked"));
        }

        const checkboxBtn = $("#menu-toggle");
        const labelBtn = $('label[for="menu-toggle"]');

        labelBtn.on("click", function (e) {
            e.preventDefault();
            toggleCheckbox(checkboxBtn);
            $(".menu").slideToggle();
        });
    }

    // Populate promo content

    function renderPromoContent() {
        $(".promo__title").html(
            `${siteContent.promo.title} <mark>${siteContent.promo.titleAmount}</mark>`
        );

        let promoUrl = siteContent.promo.imageURL;

        if (isVideoUrl(promoUrl)) {
            $(".promo__video video").attr("src", promoUrl);
            $(".promo__images img").hide();
            $(".promo__video").show();
        } else {
            if (siteContent.setting.templateType == "multi_location") {
                if (promoUrl) {
                    $(".promo__images img").attr("src", promoUrl);
                    $(".promo__images img").show();
                } else {
                    $(".promo__images img").hide();
                }
                $(".promo__video").hide();
                $(".promo__subtitle").text(siteContent.promo.subtitle);
                $(".home_btn").text(siteContent.promo.button[0].text);
                $(".home_btn").addClass(siteContent.promo.button[0].class);
                $(".promo__link span").addClass(
                    siteContent.promo.link[0].class
                );
                // $(".promo__link").addClass(siteContent.promo.link[0].class);
                $(".home_btn").attr("href", siteContent.promo.button[0].link);
                // alert(siteContent.promo.secondary_button_content)
                if (siteContent.promo.secondary_button_content) {
                    $(".promo__link span").text(
                        siteContent.promo.secondary_button_content
                    );
                    $(".promo__link").attr(
                        "href",
                        siteContent.promo.secondary_button_url
                    );
                } else {
                    $(".promo__link").hide();
                }
                return;
            }
            if (siteContent.promo.isImgBg) {
                // $(".promo").css("background-image", "url(" + promoUrl + ")");
                // $(".promo").css("border-radius", "0px 0px 50px 50px");
                // $(".promo").css("background-size", "cover");
                // $(".promo").css("background-position", "center");
                // $(".promo__content-wrapper").css("padding", "13px");
                // $(".promo__images").hide();
                // $(".promo__video").hide();
                $(".promo__images img").attr("src", promoUrl);
                $(".promo__images img").show();
                $(".promo__images").show();
                $(".promo__video").hide();
            } else {
                if (promoUrl) {
                    $(".promo__images img").attr("src", promoUrl);
                    $(".promo__images img").show();
                    $(".promo__images").show();
                    $(".promo__video").hide();
                } else {
                    $(".promo__images img").hide();
                }
                $(".promo__video").hide();
            }
        }
        $(".promo__subtitle").text(siteContent.promo.subtitle);
        $(".promo__content .btn").text(siteContent.promo.button[0].text);
        $(".promo__content .btn").addClass(siteContent.promo.button[0].class);
        $(".promo__content .promo__link span").addClass(
            siteContent.promo.link[0].class
        );
        $(".promo__link").addClass(siteContent.promo.link[0].class);
        $(".promo__content .btn").attr(
            "href",
            siteContent.promo.button[0].link
        );
        $(".promo__content .promo__link span").text(
            siteContent.promo.link[0].text
        );
        $(".promo__content .promo__link").attr(
            "href",
            siteContent.promo.link[0].link
        );
    }
    // Populate about section
    $(".about__info .section-title").text(siteContent.about.title);
    $(".about__info .text").html(siteContent.about.description);
    $(".about__info .btn").text(siteContent.about.button[0].text);
    $(".about__info .btn").addClass(siteContent.about.button[0].class);
    $(".about__info .btn").attr("href", siteContent.about.button[0].link);
    if (siteContent.earlyBird && siteContent.earlyBird.banner) {
        let newImage = $("<img>").attr("src", siteContent.earlyBird.banner);
        $(".about__banner  .container-lg").html(newImage);
        $("about__banner .container-lg").addClass("about__banner__img");
    }
    $(".additionalContent .text").html(siteContent.about.additionalContent);
    $(".team-overview-wrapper .text-link span").text(
        //siteContent.teamOverview.campaignLink[0].text
        "Visit Campaign Homepage"
    );

    if (
        siteContent.teamOverview &&
        siteContent.teamOverview.campaignLink[0].link
    ) {
        $(".team-overview-wrapper .text-link").attr(
            "href",
            siteContent.teamOverview.campaignLink[0].link
        );
    }
    // $(".team-overview-wrapper .text-link").attr(
    //     "href",
    //     siteContent.teamOverview.campaignLink[0].link
    // );
    if (siteContent.teamOverview && siteContent.teamOverview.teamOverview) {
        $(".team-overview .team-overview__owner").text(
            siteContent.teamOverview.teamOverview
        );
    }

    if (siteContent.teamOverview) {
        $("#team-overview-raised").text(
            mutiFormatCurrency(
                siteContent.teamOverview.raised,
                siteContent.teamOverview.currency
            )
        );
        $("#team-overview-goal").text(
            mutiFormatCurrency(
                siteContent.teamOverview.goal,
                siteContent.teamOverview.currency,
                0,
                0
            )
        );
        $("#team-overview-donors").text(siteContent.teamOverview.donors);
        $(".team-overview__progress .percentage").html(
            calculateProgress(
                siteContent.teamOverview.raised,
                siteContent.teamOverview.goal
            ) + "%"
        );
        $(".team-overview__progress .goal").html(
            `of ${formatCurrency(siteContent.teamOverview.goal)}`
        );
        $(".team-overview__progress-bar .progress-inner").css(
            "width",
            `${calculateProgress(
                siteContent.teamOverview.raised,
                siteContent.teamOverview.goal
            )}%`
        );
    }
    // Populate raffle offer content
    // const formattedDate = formatDate(siteContent.raffleOffer.drawingDate);

    const RaffleOffer = () => {
        const isRegularTemplate = $(".raffle-offer").hasClass("static");
        let raffleBonus = "d-none";
        let layoverOnPreviousAmount = "";
        let drawingDate = siteContent.raffleOffer.drawingDate;
        let targetAmount = siteContent.raffleOffer.targetAmount;
        let bonusAmount = siteContent.raffleOffer.bonusAmount;
        let copAmount = siteContent.raffleOffer.copAmount;
        let normalendDate = siteContent.raffleOffer.endDate;
        let coponEndDate = siteContent.raffleOffer.copEndDate;
        let is_extented = siteContent.raffleOffer.is_extented;
        let extend_date = siteContent.raffleOffer.extend_date;
        let extendHtml = "";
        let overLine = "";
        let dNone = "";
        let OrignalGoal = "Raised";
        const copEndDate = new Date(coponEndDate);
        const EndDate = new Date(normalendDate);
        const Extenddate = new Date(extend_date);

        const dateString = drawingDate;
        const dateObj = new Date(dateString);

        // Format the date
        const options = {
            year: "numeric",
            month: "long",
            day: "2-digit",
        };

        const formattedDate = dateObj.toLocaleDateString("en-US", options);
        let formattedEndDate = copEndDate.toLocaleDateString("en-US", options);
        let endDate = EndDate.toLocaleDateString("en-US", options);
        let extendDate = Extenddate.toLocaleDateString("en-US", options);
        if (siteContent.raffleOffer.showBonusAmount == 1) {
            if (parseFloat(siteContent.raffleOffer.progressPercentage) >= 100) {
                // alert("here");
                // layoverOnPreviousAmount = "layover-for-bonus-amount";
                OrignalGoal = "Original Goal";
                bonusAmount =
                    parseFloat(bonusAmount) + parseFloat(targetAmount);
                raffleBonus = "";
            }
        }

        if (is_extented == 1) {
            dNone = "d-none";
            extendHtml +=
                '<div class="raffle-entries_header deadline_extended_header b p-3">';
            extendHtml +=
                '  <div class="raffle_entries_head pb-0 text-center">';
            extendHtml += ' <div class="entries_heading d-flex">';
            extendHtml += " <p>Deadline</p>";
            extendHtml += '   <p class="main-color">Extended</p>  ';
            extendHtml += "  </div>";
            extendHtml += "  </div>";
            extendHtml += "  </div>";

            overLine += '  <div class="show_drawing_date">';
            overLine += "<p>Drawing On</p>";
            overLine +=
                '<p class="drawing_date_cut_line main-color">' +
                endDate +
                "</p>";
            overLine +=
                '<p class="drawing_date main-color">' + extendDate + "</p>";
            overLine += "</div>";
        } else {
            overLine += '  <div class=" raffle-offer-entries__date">';
            overLine += "  <p>Drawing on </p>";
            overLine += '  <p class="main-color">' + endDate + "</p>";
            overLine += "  </div>";
        }

        if (
            copAmount == 0 &&
            siteContent.setting.templateType != "multi_location"
        ) {
            return `${extendHtml} <div class="raffle-offer__timer overlay">
      <p class="raffle-offer__body-title ${dNone}">Drawing in:</p>
      <ul class="timer__items">
        <li class="timer__item timer__days">00</li>
        <li class="timer__item timer__hours">00</li>
        <li class="timer__item timer__minutes">00</li>
        <li class="timer__item timer__seconds">00</li>
      </ul>
    </div>
    <div class="raffle-offer__body">
      <div class="raffle-offer__progress ${dNone}">
        <div class="raffle-offer__progress-inner" style="width:${siteContent.raffleOffer.progressPercentage.toFixed(
                0
            )}%"></div>
      </div>
      <p class="raffle-offer__amount">${formatCurrency(
                siteContent.raffleOffer.amount,
                0,
                0
            )}</p>
      <span class="raffle-offer__subtitle">${siteContent.raffleOffer.progressPercentage.toFixed(
                0
            )}% of <span class=""> ${formatCurrency(
                targetAmount,
                0,
                0
            )} ${OrignalGoal} </span></span> <br>
                <span class="raffle-offer__subtitle bonus__amount ${raffleBonus} main-color"> Bonus Goal: ${formatCurrency(
                bonusAmount,
                0,
                0
            )}</span>
    </div>
        ${overLine}
    <div class="raffle-offer__btn">
      ${isRegularTemplate
                    ? `<button class="btn overlay" data-bs-toggle="collapse" data-bs-target="#collapseCart">Donate</button>`
                    : `<a href=${siteContent.raffleOffer.button[0].link} class="btn overlay">${siteContent.raffleOffer.button[0].text}</a>`
                }
    </div>`;
        } else {
            if (siteContent.setting.templateType == "multi_location") {
                return `
                    <div class="raffle_header">
                        <p class="drawing_txt"> Drawing On</p>
                        <h4 class="drawing_date" >${formattedDate} </h4>
                    </div>
                    <div class="raffle_body">

                        <div class="raffle_ticket" >
                            <div class="raffle_ticket-inner">
                                <div class="raffle_ticket-amount">${siteContent.raffleOffer.ticketsSold
                    }</div>
                                <div class="raffle_ticket-txt">TICKETS <br> SOLD</div>
                            </div>
                        </div>
                        <div class="raffle_raised_contain">
                            <div class="raised_amount">
                                <h4>${formatCurrency(
                        siteContent.raffleOffer.amount,
                        0,
                        0
                    )}</h4>
                            </div>
                            <div class="raised_txt">
                                Raised <br>
                                so far
                            </div>
                        </div>
                        <!-- <div class="raffle_action">
                            <button class="enroll_btn">Enroll Now</button>
                        </div> -->

                    </div>
                `;
            } else {
                return ` <div class="raffle-offer-entries">
                <div class="raffle-entries_header b p-3">
                    <div class="line-wrapper line-left">
                    <div class="char"></div>
                    <div class="line line-one"></div>
                    <div class="line line-two"></div>
                    <div class="line line-three"></div>
                </div>
                <div class="line-wrapper line-right">
                    <div class="char"></div>
                    <div class="line line-one"></div>
                    <div class="line line-two"></div>
                    <div class="line line-three"></div>
                </div>
                  <div class="raffle_entries_head text-center">
                    <div class="entries_heading d-flex">
                      <p>Get</p>
                      <p class="main-color">Double</p>
                      <p>Entries</p>
                    </div>
                    <div class="entries_heading_text d-flex flex-wrap">
                      <p>For any donation over </p>
                      <p class="main-color">$${copAmount}</p>
                      <p> through</p>
                      <p class="main-color">${formattedEndDate}   </p>
                    </div>
                  </div>
                </div>
                <div class="raffle-offer__timer raffle-offer-entries__timer pt-1">
                  <p class="raffle-offer__body-title raffle-offer-entries__body-title">Offer Expires in:</p>
                  <ul class="timer__items">
                  <li class="timer__item timer__days">00</li>
                  <li class="timer__item timer__hours">00</li>
                  <li class="timer__item timer__minutes">00</li>
                  <li class="timer__item timer__seconds">00</li>
                </ul>
                </div>
                <div class="raffle-offer__body raffle-offer-entries__body">
                  <p class="raffle-offer__amount raffle-offer-entries__amount">${formatCurrency(
                    siteContent.raffleOffer.amount,
                    0,
                    0
                )}</p>
                  <span class="raffle-offer__subtitle raffle-offer-entries__subtitle"> ${siteContent.raffleOffer.progressPercentage
                    }% of <span class=""> ${formatCurrency(
                        targetAmount,
                        0,
                        0
                    )} ${OrignalGoal}</span></span> <br>
                  <span class="raffle-offer__subtitle bonus__amount ${raffleBonus} main-color"> Bonus Goal: ${formatCurrency(
                        bonusAmount,
                        0,
                        0
                    )}</span>
                </div>
              ${overLine}
                <div class="raffle-offer__btn">
                ${isRegularTemplate
                        ? `<button class="btn overlay" data-bs-toggle="collapse" data-bs-target="#collapseCart">Donate</button>`
                        : `<a href=${siteContent.raffleOffer.button[0].link} class="btn overlay">${siteContent.raffleOffer.button[0].text}</a>`
                    }
              </div>
              </div>`;
            }
        }
    };

    $(".raffle-offer").html(RaffleOffer);

    let ticketAmount = null;

    $("#regularAmount").on("input", function () {
        let inputValue = $(this).val().replace(/\D/g, "");
        ticketAmount = inputValue;

        if (parseInt(inputValue) <= 0) {
            inputValue = "";
        }

        $(this).val(inputValue);
        $("#donate_amount").val(inputValue);
        $("#usd_amount").val(inputValue);
        $("#only_donation").val(inputValue);
        if ($(this).val()) {
            $(".checkout-btn__amount, .checkout-btn .divider").css(
                "display",
                "block"
            );
            $(".checkout-btn__amount").html(`${formatCurrency(inputValue)}`);
        } else {
            $(".checkout-btn__amount, .checkout-btn .divider").css(
                "display",
                "none"
            );
        }
    });

    //Raffle Timer
    function raffleTimer() {
        // const deadline = siteContent.raffleOffer.drawingDate;
        let timerId = null;

        function pluralize(num, words) {
            return num === 1 ? words[0] : words[1];
        }

        function countdownTimer() {
            const deadline = new Date(siteContent.raffleOffer.drawingDate);
            const diff = deadline - new Date();
            if (diff <= 0) {
                $("#LiveDrawingLinkYouTube").attr(
                    "src",
                    "https://www.youtube.com/embed/aXZta-YGx4E"
                );
                // $("#dealine_modal").modal("show");
                clearInterval(timerId);
            }
            const days = diff > 0 ? Math.floor(diff / 1000 / 60 / 60 / 24) : 0;
            const hours = diff > 0 ? Math.floor(diff / 1000 / 60 / 60) % 24 : 0;
            const minutes = diff > 0 ? Math.floor(diff / 1000 / 60) % 60 : 0;
            const seconds = diff > 0 ? Math.floor(diff / 1000) % 60 : 0;
            const $days = document.querySelector(".timer__days");
            const $hours = document.querySelector(".timer__hours");
            const $minutes = document.querySelector(".timer__minutes");
            const $seconds = document.querySelector(".timer__seconds");
            if (days && $hours && $minutes && $seconds) {
                $days.textContent = days < 10 ? "0" + days : days;
                $hours.textContent = hours < 10 ? "0" + hours : hours;
                $minutes.textContent = minutes < 10 ? "0" + minutes : minutes;
                $seconds.textContent = seconds < 10 ? "0" + seconds : seconds;
                $days.dataset.title = pluralize(days, ["Day", "Days"]);
                $hours.dataset.title = pluralize(hours, ["Hour", "Hours"]);
                $minutes.dataset.title = pluralize(minutes, ["Min", "Mins"]);
                $seconds.dataset.title = pluralize(seconds, ["Sec", "Secs"]);
            }
        }

        countdownTimer();

        timerId = setInterval(countdownTimer, 1000);
    }

    raffleTimer();

    //Number Counter
    function startCounters() {
        const Item = ({ id, text }) => `
      <dl>
        <dd id=${id}>0</dd>
        <dt>${text.replace(/\n/g, "<br>")}</dt>
        </dl>
      <span class="divider"></span>
    `;

        const filteredArr = siteContent.countersStatistic.filter(
            (obj) => obj.hidden !== "1"
        );

        if (filteredArr.length !== 0) {
            $(".about__statistics-list").html(filteredArr.map(Item).join(""));

            $(".about__statistics-list span:last-child").remove();

            filteredArr.forEach((config) => {
                const counter = new CountUp(config.id, config.value);
                counter.start();
            });
        } else {
            $(".about__statistics").remove();
        }
    }

    startCounters();

    // Populate footer address
    let phoneTrimmed = "";
    if (siteContent.footer.phone) {
        phoneTrimmed = siteContent.footer.phone.replace(/\s/g, "");
    }
    const Address = () => `
    <h2>${siteContent.footer.footerTitle || ""}</h2>
    <address>
      <p>${siteContent.footer.addressLine1 || ""}<br>
      ${siteContent.footer.addressLine2 || ""}<br>
      ${siteContent.footer.country || ""}
      </p><br>
      <a class="footer__email" href="mailto:${siteContent.footer.email || ""
        }">${siteContent.footer.email || ""}</a>
      <a href="tel:${phoneTrimmed}">${siteContent.footer.phone || ""}</a>
    </address>
    <br>
    <h2>Tax ID : ${siteContent.footer.tax_id || ""}</h2>
  `;

    $(".footer__address").html(Address);

    // siteContent.footer.terms.forEach(function (item) {
    $(".footer__terms").append(
        "<p id='text'>" + siteContent.footer.terms + "</p>"
    );
    // });

    $(".tickets .section-title").text(siteContent.tickets.title);

    function renderTicketPages() {
        const highestGrandPrize = siteContent.tickets.packages.reduce(
            (max, current) =>
                current.grandPrize > max ? current.grandPrize : max,
            0
        );

        const isTwoColumns = $(window).width() > 991 || $(window).width() < 768;
        const packagesLength = siteContent.tickets.packages.length;

        if ( (!isTwoColumns && packagesLength % 3 !== 0) || (isTwoColumns && packagesLength % 2 !== 0) ) {
            $("#options-grid__label").addClass("hide");
        }   
            
        console.log('siteContent.setting.templateType=',siteContent.setting.templateType);
        if (siteContent.setting.templateType == "masbia") {
            const TicketPackage = ({
                id,
                amount,
                entry,
                previousEntries,
                grandPrize,
                prizesAmount,
                prizes,
                couponApplied,
            }) => {
                const prizeDescription =
                    prizes === prizesAmount
                        ? `All ${prizesAmount} Prizes`
                        : `${prizes}<span>/${prizesAmount}</span> Prizes`;

                const colorClass = grandPrize > 0 ? "blue" : "";
                const topPrize =
                    grandPrize > 0 ? grandPrize : highestGrandPrize;
                let discounted = couponApplied ? "discounted" : "";
                let discountColorClass = discounted ? "discount-color" : "";
                let discountedVoucherWidth = discounted
                    ? "discountedVoucherWidth"
                    : "";

                var option = (id == '99') ? `<button class="donation-amount other option-card ticket_item" data-price="${amount}" data-id="${id}">Other<br>Amount</button>` : `<button class="donation-amount option-card ticket_item" data-price="${amount}" data-id="${id}">${formatCurrency(amount, 0, 0)}</button>`;
                return option;
            };

            console.log('siteContent.tickets.packages=',siteContent.tickets.packages);
            var masbia_option = siteContent.tickets.packages.map(TicketPackage).join("");
            $(".options-grid").prepend(masbia_option);
            let $donationButton = $('.sponsor__donation-btns').find('.donation-amount').first();
            if ($donationButton.length > 0) {
                $donationButton.click();
            } 
            // renderTicketPages();
        } else {
            const TicketPackage = ({
                id,
                amount,
                entry,
                previousEntries,
                grandPrize,
                prizesAmount,
                prizes,
                couponApplied,
            }) => {
                const prizeDescription =
                    prizes === prizesAmount
                        ? `All ${prizesAmount} Prizes`
                        : `${prizes}<span>/${prizesAmount}</span> Prizes`;
                const colorClass = grandPrize > 0 ? "blue" : "";
                const topPrize =
                    grandPrize > 0 ? grandPrize : highestGrandPrize;
                let discounted = couponApplied ? "discounted" : "";
                let discountColorClass = discounted ? "discount-color" : "";
                let discountedVoucherWidth = discounted
                    ? "discountedVoucherWidth"
                    : "";

                return `<label class="option-card ticket_item " data-id="${id}">
                  <input class="card-input" type="radio" name="option-card" />
                  <div class="card-body">
          <span class="option-card__checkbox overlay">
            <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
              <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5"
                  transform="translate(438.979 1654) rotate(45)" fill="#fff" />
                <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5"
                  transform="translate(442 1660.95) rotate(-45)" fill="#fff" />
              </g>
            </svg>
          </span>
          <div class="option-card__header d-flex align-items-center justify-content-between">
            <span class="option-card__amount">${formatCurrency(
                    amount,
                    0,
                    0
                )}</span>
            <span class="currency__amount__mobile d-none"></span>
            <input type="hidden" class="ticket_amount_usd" value="${amount}">
            <div class="voucher ${discounted} ${discountedVoucherWidth}" data-PreviousEntries="${previousEntries}">
            ${discounted
                        ? `<div class="voucher-amount voucher-amount--discounted">
                    <span class="discounted-entry-number">${previousEntries}</span>
                    <span class="entry-label">${previousEntries === 1 ? `Entry` : `Entries`
                        }</span>  </div>`
                        : ""
                    }
              <div class="voucher-amount voucher-amount--regular">
                <span class="entry-number ${discountColorClass}">${entry}</span>
                <span class="entry-label">${entry === 1 ? `Entry` : `Entries`
                    }</span>
              </div>
            </div>
            </div>
            <span class="currency__amount py-1"></span>
          <span class="divider"></span>
          <div class="d-flex align-items-center justify-content-between">
            <div class="option-card__grand-prize ${colorClass} "> ${grandPrize === 0
                        ? `<svg xmlns="http://www.w3.org/2000/svg" width="37.074" height="29.372" viewBox="0 0 37.074 29.372">
                    <path id="Path_20" data-name="Path 20" d="M13.959,13.892a10.2,10.2,0,0,0,9.249,0c2.552-1.478,2.53-3.878-.03-5.356a10.2,10.2,0,0,0-9.249,0C11.384,10.014,11.4,12.407,13.959,13.892Zm1.173-2.56c.2-.061.389-.13.579-.19a.4.4,0,0,1,.29-.023.259.259,0,0,1,.091.107,2.049,2.049,0,0,0,.61.655.97.97,0,0,0,.145.1,1.774,1.774,0,0,0,.5.19c.5.107.937-.084.884-.389a.7.7,0,0,0-.137-.3,5.506,5.506,0,0,1-.5-.747c-.183-.427-.1-.808.488-1.112a3.024,3.024,0,0,1,2.2-.152c.32.091.32.091.571-.053.084-.046.168-.1.251-.145a.356.356,0,0,1,.45,0c.061.03.114.069.175.1.4.229.4.229.008.465-.282.16-.282.16-.046.35a2.062,2.062,0,0,1,.434.465c.061.091.023.16-.122.206-.221.069-.442.145-.663.213a.407.407,0,0,1-.282.015.39.39,0,0,1-.091-.1,1.848,1.848,0,0,0-.663-.61c-.038-.023-.084-.046-.13-.069a1.668,1.668,0,0,0-.312-.122c-.427-.1-.8.061-.747.328a.9.9,0,0,0,.19.381,5.574,5.574,0,0,1,.427.648c.358.716-.419,1.417-1.661,1.486a3.439,3.439,0,0,1-1.265-.16.481.481,0,0,0-.434.038c-.13.084-.274.16-.4.236a.365.365,0,0,1-.373.008c-.091-.046-.175-.1-.267-.145-.061-.038-.122-.069-.183-.107-.13-.076-.114-.152.008-.229.1-.061.2-.114.29-.175.221-.13.221-.137.038-.282a2.4,2.4,0,0,1-.564-.587C14.843,11.462,14.866,11.424,15.133,11.332Zm8.907,3.032a2.809,2.809,0,0,1,2.56,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0A.785.785,0,0,1,24.039,14.365Zm-13.5-7.794a2.825,2.825,0,0,1,2.568,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0C9.838,7.645,9.83,6.982,10.538,6.571ZM.946,9.748,21.159,21.412a4.633,4.633,0,0,0,4.221,0l10.827-6.293a1.294,1.294,0,0,0-.008-2.446L15.986,1a4.673,4.673,0,0,0-4.229,0L.931,7.3A1.294,1.294,0,0,0,.946,9.748ZM5.335,7.271a3.42,3.42,0,0,0-.411-.2l6.469-3.756a2.453,2.453,0,0,0,.343.236,4.721,4.721,0,0,0,4.274,0,1.8,1.8,0,0,0,.35-.251L32.1,12.391a3.437,3.437,0,0,0-.587.267,1.307,1.307,0,0,0,.015,2.476,3.518,3.518,0,0,0,.594.267l-6.529,3.794a2.535,2.535,0,0,0-.465-.343,4.7,4.7,0,0,0-4.274,0,1.958,1.958,0,0,0-.244.168L4.916,9.953a3.165,3.165,0,0,0,.427-.206A1.308,1.308,0,0,0,5.335,7.271ZM.42,12.079a2.06,2.06,0,0,1,1.806.061l21.12,12.19,11.421-6.636a1.97,1.97,0,0,1,1.8,0,.551.551,0,0,1,.008,1.044L24.435,25.793a2.389,2.389,0,0,1-2.156,0l-.427-.244-.3-.175L.375,13.153C-.136,12.848-.128,12.361.42,12.079ZM36.6,22.555,24.458,29.61a2.389,2.389,0,0,1-2.156,0l-.427-.244-.3-.175L.4,16.963c-.518-.3-.5-.785.046-1.074a2.06,2.06,0,0,1,1.806.061l21.12,12.19,11.413-6.628a1.986,1.986,0,0,1,1.806,0A.552.552,0,0,1,36.6,22.555Z" transform="translate(0 -0.495)" fill="currentColor"/>
                  </svg>`
                        : grandPrize < highestGrandPrize
                            ? `<svg xmlns="http://www.w3.org/2000/svg" width="37.074" height="25.555"
                      viewBox="0 0 37.074 25.555">
                      <path id="Path_20" data-name="Path 20"
                        d="M13.959,13.892a10.2,10.2,0,0,0,9.249,0c2.552-1.478,2.53-3.878-.03-5.356a10.2,10.2,0,0,0-9.249,0C11.384,10.014,11.4,12.407,13.959,13.892Zm1.173-2.56c.2-.061.389-.13.579-.19a.4.4,0,0,1,.29-.023.259.259,0,0,1,.091.107,2.049,2.049,0,0,0,.61.655.97.97,0,0,0,.145.1,1.774,1.774,0,0,0,.5.19c.5.107.937-.084.884-.389a.7.7,0,0,0-.137-.3,5.506,5.506,0,0,1-.5-.747c-.183-.427-.1-.808.488-1.112a3.024,3.024,0,0,1,2.2-.152c.32.091.32.091.571-.053.084-.046.168-.1.251-.145a.356.356,0,0,1,.45,0c.061.03.114.069.175.1.4.229.4.229.008.465-.282.16-.282.16-.046.35a2.062,2.062,0,0,1,.434.465c.061.091.023.16-.122.206-.221.069-.442.145-.663.213a.407.407,0,0,1-.282.015.39.39,0,0,1-.091-.1,1.848,1.848,0,0,0-.663-.61c-.038-.023-.084-.046-.13-.069a1.668,1.668,0,0,0-.312-.122c-.427-.1-.8.061-.747.328a.9.9,0,0,0,.19.381,5.574,5.574,0,0,1,.427.648c.358.716-.419,1.417-1.661,1.486a3.439,3.439,0,0,1-1.265-.16.481.481,0,0,0-.434.038c-.13.084-.274.16-.4.236a.365.365,0,0,1-.373.008c-.091-.046-.175-.1-.267-.145-.061-.038-.122-.069-.183-.107-.13-.076-.114-.152.008-.229.1-.061.2-.114.29-.175.221-.13.221-.137.038-.282a2.4,2.4,0,0,1-.564-.587C14.843,11.462,14.866,11.424,15.133,11.332Zm8.907,3.032a2.809,2.809,0,0,1,2.56,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0A.785.785,0,0,1,24.039,14.365Zm-13.5-7.794a2.825,2.825,0,0,1,2.568,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0C9.838,7.645,9.83,6.982,10.538,6.571ZM.946,9.748,21.159,21.412a4.633,4.633,0,0,0,4.221,0l10.827-6.293a1.294,1.294,0,0,0-.008-2.446L15.986,1a4.673,4.673,0,0,0-4.229,0L.931,7.3A1.294,1.294,0,0,0,.946,9.748ZM5.335,7.271a3.42,3.42,0,0,0-.411-.2l6.469-3.756a2.453,2.453,0,0,0,.343.236,4.721,4.721,0,0,0,4.274,0,1.8,1.8,0,0,0,.35-.251L32.1,12.391a3.437,3.437,0,0,0-.587.267,1.307,1.307,0,0,0,.015,2.476,3.518,3.518,0,0,0,.594.267l-6.529,3.794a2.535,2.535,0,0,0-.465-.343,4.7,4.7,0,0,0-4.274,0,1.958,1.958,0,0,0-.244.168L4.916,9.953a3.165,3.165,0,0,0,.427-.206A1.308,1.308,0,0,0,5.335,7.271ZM.42,12.079a2.06,2.06,0,0,1,1.806.061l21.12,12.19,11.421-6.636a1.97,1.97,0,0,1,1.8,0,.551.551,0,0,1,.008,1.044L24.435,25.793a2.389,2.389,0,0,1-2.156,0l-.427-.244-.3-.175L.375,13.153C-.136,12.848-.128,12.361.42,12.079Z"
                        transform="translate(0 -0.495)" fill="currentColor" />
                      </svg>`
                            : `<svg xmlns="http://www.w3.org/2000/svg" width="37.074" height="29.372" viewBox="0 0 37.074 29.372">
                        <path id="Path_20" data-name="Path 20" d="M13.959,13.892a10.2,10.2,0,0,0,9.249,0c2.552-1.478,2.53-3.878-.03-5.356a10.2,10.2,0,0,0-9.249,0C11.384,10.014,11.4,12.407,13.959,13.892Zm1.173-2.56c.2-.061.389-.13.579-.19a.4.4,0,0,1,.29-.023.259.259,0,0,1,.091.107,2.049,2.049,0,0,0,.61.655.97.97,0,0,0,.145.1,1.774,1.774,0,0,0,.5.19c.5.107.937-.084.884-.389a.7.7,0,0,0-.137-.3,5.506,5.506,0,0,1-.5-.747c-.183-.427-.1-.808.488-1.112a3.024,3.024,0,0,1,2.2-.152c.32.091.32.091.571-.053.084-.046.168-.1.251-.145a.356.356,0,0,1,.45,0c.061.03.114.069.175.1.4.229.4.229.008.465-.282.16-.282.16-.046.35a2.062,2.062,0,0,1,.434.465c.061.091.023.16-.122.206-.221.069-.442.145-.663.213a.407.407,0,0,1-.282.015.39.39,0,0,1-.091-.1,1.848,1.848,0,0,0-.663-.61c-.038-.023-.084-.046-.13-.069a1.668,1.668,0,0,0-.312-.122c-.427-.1-.8.061-.747.328a.9.9,0,0,0,.19.381,5.574,5.574,0,0,1,.427.648c.358.716-.419,1.417-1.661,1.486a3.439,3.439,0,0,1-1.265-.16.481.481,0,0,0-.434.038c-.13.084-.274.16-.4.236a.365.365,0,0,1-.373.008c-.091-.046-.175-.1-.267-.145-.061-.038-.122-.069-.183-.107-.13-.076-.114-.152.008-.229.1-.061.2-.114.29-.175.221-.13.221-.137.038-.282a2.4,2.4,0,0,1-.564-.587C14.843,11.462,14.866,11.424,15.133,11.332Zm8.907,3.032a2.809,2.809,0,0,1,2.56,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0A.785.785,0,0,1,24.039,14.365Zm-13.5-7.794a2.825,2.825,0,0,1,2.568,0,.785.785,0,0,1,.008,1.486,2.809,2.809,0,0,1-2.56,0C9.838,7.645,9.83,6.982,10.538,6.571ZM.946,9.748,21.159,21.412a4.633,4.633,0,0,0,4.221,0l10.827-6.293a1.294,1.294,0,0,0-.008-2.446L15.986,1a4.673,4.673,0,0,0-4.229,0L.931,7.3A1.294,1.294,0,0,0,.946,9.748ZM5.335,7.271a3.42,3.42,0,0,0-.411-.2l6.469-3.756a2.453,2.453,0,0,0,.343.236,4.721,4.721,0,0,0,4.274,0,1.8,1.8,0,0,0,.35-.251L32.1,12.391a3.437,3.437,0,0,0-.587.267,1.307,1.307,0,0,0,.015,2.476,3.518,3.518,0,0,0,.594.267l-6.529,3.794a2.535,2.535,0,0,0-.465-.343,4.7,4.7,0,0,0-4.274,0,1.958,1.958,0,0,0-.244.168L4.916,9.953a3.165,3.165,0,0,0,.427-.206A1.308,1.308,0,0,0,5.335,7.271ZM.42,12.079a2.06,2.06,0,0,1,1.806.061l21.12,12.19,11.421-6.636a1.97,1.97,0,0,1,1.8,0,.551.551,0,0,1,.008,1.044L24.435,25.793a2.389,2.389,0,0,1-2.156,0l-.427-.244-.3-.175L.375,13.153C-.136,12.848-.128,12.361.42,12.079ZM36.6,22.555,24.458,29.61a2.389,2.389,0,0,1-2.156,0l-.427-.244-.3-.175L.4,16.963c-.518-.3-.5-.785.046-1.074a2.06,2.06,0,0,1,1.806.061l21.12,12.19,11.413-6.628a1.986,1.986,0,0,1,1.806,0A.552.552,0,0,1,36.6,22.555Z" transform="translate(0 -0.495)" fill="currentColor"/>
                      </svg>`
                    }
              <span class="option-card__grand-prize-amount">$${formatNumber(
                        topPrize
                    )} Cash</span>
            </div>
            <span class="option-card__plus">+</span>
            <div class="option-card__prizes">
              <svg xmlns="http://www.w3.org/2000/svg" width="19.813" height="20" viewBox="0 0 19.813 20">
                <g id="Group_28" data-name="Group 28" transform="translate(-3.112 -3)">
                  <path id="Path_18" data-name="Path 18"
                    d="M21.456,6.861h-2.15A2.708,2.708,0,0,0,19.269,4.5a2.741,2.741,0,0,0-4.649-.38l-1.6,2.178-1.6-2.176a2.741,2.741,0,0,0-4.648.375,2.711,2.711,0,0,0-.038,2.369H4.574A1.466,1.466,0,0,0,3.112,8.33v1.56a1.459,1.459,0,0,0,1.461,1.461H21.456a1.466,1.466,0,0,0,1.469-1.461V8.33A1.473,1.473,0,0,0,21.456,6.861Zm-5.5-1.768a1.089,1.089,0,0,1,1.846.151,1.094,1.094,0,0,1-.959,1.591l-2.18.015ZM8.239,5.24a1.088,1.088,0,0,1,1.845-.146L11.377,6.85,9.2,6.835A1.093,1.093,0,0,1,8.239,5.24Z"
                    fill="var(--accent-color)" />
                  <path id="Path_19" data-name="Path 19"
                    d="M4.787,22.582A2.424,2.424,0,0,0,7.214,25H19.382a2.424,2.424,0,0,0,2.427-2.419V15H4.787Z"
                    transform="translate(-0.279 -2.001)" fill="var(--accent-color)" />
                </g>
              </svg>
              <p class="option-card__prizes-desc desktop">${prizeDescription}</p>
              <p class="option-card__prizes-desc mobile">${prizes}/<span>${prizesAmount}</span> Prizes</p>
            </div>
          </div>
        </div>
      </label>
    `;
            };
            $(".options-grid").prepend(
                siteContent.tickets.packages.map(TicketPackage).join("")
            );
        }
    }
    renderTicketPages();

    $("#customAmount, #regularAmount").on("blur", function () {
        let inputVal = $(this).val().trim();
        inputVal = inputVal.replace(/[^0-9.]/g, "");

        if (!isNaN(inputVal) && inputVal !== "") {
            let formattedValue = new Intl.NumberFormat("en-US", {
                style: "currency",
                currency: "USD",
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            }).format(parseFloat(inputVal));

            $(this).val(formattedValue);
            sessionStorage.setItem("usd_amount_Session", formattedValue);
        } else {
            $(this).val("");
            sessionStorage.removeItem("usd_amount_Session");
        }
    });

    $("#customAmount, #regularAmount").on("focus", function () {
        let formattedValue = $(this).val().replace(/,/g, "");
        // alert(formattedValue);

        if (formattedValue.includes(".00")) {
            formattedValue = formattedValue.replace(".00", "");
        }
        // alert( $(this).val());
        $(this).val(formattedValue);
    });

    $("#customAmount").on("input", function () {
        var timeout;
        clearTimeout(timeout);

        // var inputValue = $(this).val().replace(/\D/g, "");

        let inputValue = $(this).val().trim();
        inputValue = inputValue.replace(/[^0-9.]/g, "");
        console.log('inputValue=',inputValue);
        // var inputValue = $(this)
        //     .val()
        //     .replace(/[^0-9.]/g, "")
        //     .replace(/(\..*?)\..*/g, "$1");

        ticketAmount = inputValue;

        if (parseInt(inputValue) <= 0) {
            inputValue = "";
        }

        $("#usd_amount").val(inputValue);
        $("#donate_amount").val(inputValue);
        $("#only_donation").val(inputValue);

        $("#amount").val(inputValue);
        $(".checkout-btn__amount").html(`${formatCurrency(inputValue, 0, 0)}`);
        $(".js-cart-summary-amount").html(
            `${siteContent.cart.ticketsTitle} <span>${formatCurrency(
                inputValue
            )}</span>`
        );

        $(this).val(inputValue);
        // $(this).val(9999);
        // $(this).val(formatCurrency(inputValue));
        $("#pricing_options").val("");
        var proFeeAmt = $("#fee_percentage").val();
        var processFee = (inputValue * proFeeAmt) / 100;
        var currency = "$";
        $("#process_fee").html(
            "Add " +
            currency +
            processFee.toFixed(2) +
            " to your payment to cover the " +
            proFeeAmt +
            "% credit card processing fee"
        );
        $("#don_process_fee").val(processFee.toFixed(2));
        $("#rec_amount_full").html(currency + inputValue);

        setTimeout(function () {
            // showPaymentSection();
            $(".cart").show();
        }, 300);

        var cards = $(".options-grid .option-card");
        var selectedCard = null;
        var closestDifference = Infinity;

        cards.find("input[name='option-card']").prop("checked", false);
        $(".prizes-grid .prize").removeClass("selected");
        $(".cart").slideUp("fast");

        timeout = setTimeout(function () {
            cards.each(function () {
                var card = $(this);
                var cardNumberValue = card.find(".option-card__amount").text();
                var cardNumber = parseInt(
                    cardNumberValue
                        .replace(/[\$,]/g, "")
                        .replace(/[\CA,]/g, "")
                        .replace(/[\£,]/g, "")
                        .replace(/[\€,]/g, "")
                        .replace(/[\₪,]/g, "")
                        .replace(/[\PKR,]/g, "")
                );
                var difference = inputValue - cardNumber;

                if (difference >= 0 && difference < closestDifference) {
                    closestDifference = difference;
                    selectedCard = card;
                }
            });

            $("#customAmountCard").addClass("selected");
            sessionStorage.setItem("custom_amount", inputValue);
            var CurrencySymbol =
                $("#multi_currency").val() == "1"
                    ? $("#currency-select option:selected").text().trim()
                    : "$";
            if (selectedCard) {
                const ticketId = selectedCard.data("id");

                const { grandPrize, ticket, entryPluralized } = getTicketData(ticketId);

                const titleString = grandPrize
                    ? `<mark>${CurrencySymbol}${inputValue}</mark> for ${ticket.entry
                    } ${entryPluralized} to win ${formatNumber(
                        ticket.grandPrize
                    )} and ${ticket.prizes} selected prizes`
                    : `<mark>${CurrencySymbol}${inputValue}</mark> for ${ticket.entry} ${entryPluralized} to win the ${ticket.prizes} prizes.`;

                $(".card-input", selectedCard).prop("checked", true);

                handleFloatingBtnPosition(selectedCard);
                handleEvent(selectedCard, "click", true);

                $(".ticket-options__control-title").html(titleString);

                $(".cart").slideDown();
            } else if (closestDifference && inputValue) {
                // const lowestTicketAmount = Math.min.apply(
                //   null,
                //   siteContent.tickets.packages.map(function (p) {
                //     return p.amount;
                //   })
                // );

                var cardNumbers = $(
                    ".options-grid .option-card .option-card__amount"
                )
                    .map(function () {
                        var cardNumberValue = $(this).text();
                        var cardNumber = parseInt(
                            cardNumberValue.replace(/[\$,CA£€₪PKR]/g, "")
                        );
                        return isNaN(cardNumber) ? Infinity : cardNumber;
                    })
                    .get();

                const lowestTicketAmount = Math.min.apply(null, cardNumbers);

                const addValue = lowestTicketAmount - inputValue;

                $(".prizes__subtitle").html(
                    "Select a ticket<br> to see the included prizes"
                );

                $(".ticket-options__control-title").html(
                    `Add <mark>${CurrencySymbol}${addValue}</mark> to your donation to be entered to win a prize`
                );

                $(".selected-tickets .cart__summary-list").empty();
                $(".cart__subtitle, .entry-quantity, .cart__subtitle--discounted").empty();
                $(".items-quantity").css("display", "none");
                cards.find("input[name='option-card']").prop("checked", false);

                $("#viewPrizes").removeClass("visible");
                $("#viewTicketOptions").addClass("animate");
                sessionStorage.setItem("custom_amount", inputValue);
                sessionStorage.removeItem("ticket_id");
                $(".cart").slideDown();
                // let d = formatCurrency(inputValue, 2, 2);
                // $("#customAmount").val(d);
                // alert(d);
            } else {
                $(".ticket-options__control-title").html(
                    `Enter custom amount to see entry details`
                );
                // alert('deselected');

                $(".card-input").prop("checked", false);
                $("#customAmount").val("");
                $("#customAmountCard").removeClass("selected");
                $(".prizes__subtitle").html(
                    "Select a ticket<br> to see the included prizes"
                );
                $(".selected-tickets .cart__summary-list").empty();
                $(".cart__subtitle, .entry-quantity, .cart__subtitle--discounted").empty();
                $(".items-quantity").css("display", "none");
                sessionStorage.removeItem("ticket_id");
                sessionStorage.removeItem("custom_amount");
                $(".cart").slideUp();
            }
            // const addValue = lowestTicketAmount - inputValue;
        }, 160);

        if (inputValue == 0) {
            displayGiftsForDonation(inputValue);
        }

        // localStorage.removeItem("giftSelections");
        // updateGiftsCart();
        displayGiftsForDonation(inputValue);
        handleTips();
        calculateTotalTipsAmount();
        // handleSTPSession();
    });

    // Populate prizes
    function renderPrizes() {
        const highestTicketGrandPrize = Math.max.apply(
            null,
            siteContent.tickets.packages.map(function (p) {
                return p.grandPrize;
            })
        );

        const Prize = ({ number, imageURL, title }) => `
    <div class="prize" data-number="${number}">
      <div class="prize__body">
        <span class="option-card__checkbox overlay">
          <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
            <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
              <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5"
                transform="translate(438.979 1654) rotate(45)" fill="#fff" />
              <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5"
                transform="translate(442 1660.95) rotate(-45)" fill="#fff" />
            </g>
          </svg>
        </span>
        <div class="prize__image">
          <img src="${imageURL}" alt="">
        </div>
        <div class="prize__desc">
          <div class="d-flex align-items-start">
            <span class="prize__number overlay">${number}</span>
            <p class="prize__name">${title}</p>
          </div>
          <div class="prize__btns">
            <button class="btn">Details</button>
            <button class="btn overlay">Upgrade</button>
          </div>
        </div>
      </div>
    </div>
  `;

        const GrandPrize = () => `
    <div class="prize grand-prize">
      <div class="prize__body">
        <span class="option-card__checkbox overlay">
          <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
            <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
              <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5"
                transform="translate(438.979 1654) rotate(45)" fill="#fff" />
              <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5"
                transform="translate(442 1660.95) rotate(-45)" fill="#fff" />
            </g>
          </svg>
        </span>
        <div class="grand-prize__img">
          <img src="${siteContent.tickets.grandPrize.imageURL}" alt="">
          <div class="position-relative z-1">
            <p class="grand-prize__amount">${formatCurrency(
            highestTicketGrandPrize,
            0,
            0
        )}</p>
            <span class="grand-prize__subtitle">Grand Prize</span>
            <!-- <p class="grand-prize__desc">${siteContent.tickets.grandPrize.description
            }</p> -->
            <button class="btn">Details</button>
          </div>
        </div>
      </div>
    </div>
  `;

        $(".prizes-grid").html(
            `${GrandPrize()} ${siteContent.tickets.prizes.map(Prize).join("")}`
        );
    }

    $("#detailsSummaryBtnMobile, #checkoutSummaryBtnMobile").on(
        "click",
        function () {
            $(".cart-mobile__summary").css("display", "none");
            $(".cart__summary").css("display", "flex");
            $(".remove-cart-details").show();
            if (this.id === "detailsSummaryBtnMobile") {
                $(".summaryCheckoutBtn").removeClass("button-opencart2");
                $(".summaryCheckoutBtn").addClass("button-opencart");
            } else {
                $(".summaryCheckoutBtn").removeClass("button-opencart");
                $(".summaryCheckoutBtn").addClass("button-opencart2");
            }
        }
    );

    $("#summaryCheckoutBtn").on("click", function () {
        const isExpanded = $(this).attr("aria-expanded");
        if ($(window).width() < 768 && isExpanded === "false") {
            $(".cart-mobile__summary").css("display", "block");
            $(".cart__summary").css("display", "none");
            $(".remove-cart-details").hide();
        }
    });

    $(".summaryCheckoutBtn").on("click", function () {
        $(".cart-mobile__summary").css("display", "block");
        $(".cart__summary").css("display", "none");
        $(".remove-cart-details").hide();
        $("#collapseCart").removeClass("show");
        $("#collapseCart").addClass("hide");
    });

    $("#collapseCart").on("show.bs.collapse hide.bs.collapse", function (e) {
        const isRegularTemplate = $(".cart").hasClass("cart--regular");
        var CurrencyLetters =
            $("#currency-select option:selected").val() || "USD";
        var CurrencySymbol =
            $("#currency-select option:selected").text() || "$";

        let amountValue = $("#donate_amount").val();
        let amount;
        // if (CurrencyLetters != "USD") {
        //   if (CurrencyLetters == "CAD") {
        //     amount = mutiFormatCurrency(amountValue, CurrencyLetters);
        //   } else {
        //     amount = mutiFormatCurrency(amountValue, CurrencyLetters);
        //   }
        // } else {
        //   amount = mutiFormatCurrency(amountValue, CurrencyLetters);
        // }
        amount = mutiFormatCurrency(amountValue, CurrencyLetters);

        if (e.type === "show") {
            if ($(window).width() > 767) {
                $(".cart__summary .checkout-btn").text("Back");
            } else {
                $(".cart__summary .checkout-btn").hide();
            }
            $(".remove-cart-details").show();
            $("#gift-btn").removeClass("btn--gray");
        } else {
            $("#gift-btn").addClass("btn--gray");
            $(".remove-cart-details").hide();
            $(".cart__summary .checkout-btn").show();
            $(".cart__summary .checkout-btn").html(`<span>${isRegularTemplate ? "Donate" : "Checkout"
                }</span>
      <span class="divider"></span>
      <span class="checkout-btn__amount">${amount}</span>`);

            if (isRegularTemplate && ticketAmount > 0) {
                $(
                    ".cart--regular .checkout-btn__amount, .cart--regular .checkout-btn .divider"
                ).css("display", "block");
            }
        }
    });

    $(".options-grid").on("click", ".option-card", function (e) {
        var _this = $(this);
        if ($(e.target).is("input")) {
            return;
        }

        if (e.type === "click") {
            $(_this).closest('.sponsor__donation-btns').find('.selected').removeClass('selected');
            $(_this).addClass('selected');

            $("#customAmount").val("");
            $("#only_donation").val("");
            if ($("#pricing_options").val() == $(this).data("id")) {
                e.preventDefault();
                console.log(_this.attr('data-price'));
                $('#only_donation').val(_this.attr('data-price'));
                $("#customAmount").trigger("input");
                return;
            }
            // alert('here');
            // handleSponserShips();

            // handleFloatingBtnPosition(this);
        }

        // handleEvent(this, e.type);
        caculate_final_donate_amount();
    });

    // $(".options-grid .option-card").on("mouseleave", function () {
    //     // $(".prizes-grid .prize").removeClass("highlighted");
    //     if (!$(".grand-prize").hasClass("selected")) {
    //         $(".grand-prize .grand-prize__amount").html(
    //             `${formatCurrency(
    //                 siteContent.tickets.grandPrize.defaultAmount,
    //                 0,
    //                 0
    //             )}`
    //         );
    //     }
    // });

    function handleFloatingBtnPosition(el) {
        const btnHalfHeight = $("#viewPrizes").height() / 2;
        const elHalfHeight = $(el).height() / 2;
        const elOffset = $(el).offset();
        const parentOffset = $(el).parent().offset();
        const topPosition =
            elOffset.top - parentOffset.top + elHalfHeight - btnHalfHeight;
        $("#viewPrizes")
            .css("margin-top", topPosition + "px")
            .addClass("visible");
        $("#viewTicketOptions").removeClass("animate").hide();
    }

    function floatingBtnVisibility() {
        $(document).on("scroll", function () {
            const scrollAmt = $(window).scrollTop();
            if ($("#prizesSection").length > 0) {
                const elementTop = $("#prizesSection").offset().top;
                if (scrollAmt + $(window).height() * 0.65 >= elementTop) {
                    $("#viewPrizes").hide();
                    $("#viewTicketOptions").css("display", "flex");
                } else {
                    $("#viewPrizes").css("display", "flex");
                    if ($("#viewPrizes").width() !== 0) {
                        $("#viewTicketOptions").hide();
                    }
                }
            }
        });
    }


    //  Sustainer Options

    var masbia_filter_list = [];

    setTimeout(function () {
        $('.sponsor__options-tabs .tab-link').first().click();

        for (let i = 0; i < localStorage.length; i++) {
            let key = localStorage.key(i);
            let value = localStorage.getItem(key);
            console.log(`<p>Key: ${key}, Value: ${value}</p>`);

            if(key == 'donation_location_id') {
                $('.donation_location[data-name="donation_location_id"][data-id="'+value+'"]').trigger('click');
            }

            if(key == 'allocate_donation') {
                $('#allocate_donation').val(value).trigger('change');
            }

            if(key == 'dedication_comments') {
                $('#dedication_comments').val(value).trigger('blur');
            }

            if(key == 'dedication_comments') {
                $('#dedication_comments').val(value).trigger('blur');
            }

            if(key == 'letter') {
                $('#letter').prop('checked', value).trigger('change');
            }

            if(key == 'recognition') {
                $('#recognition').prop('checked', value).trigger('change');
            }
        }
     }, 500);

    $(document).on('click', '.btn-filter', function(event) {
        var _this = $(this);
        add_filter_value(_this.attr('data-name'), _this.attr('data-id'));
    });

    $(document).on('click', '.donation_location', function(event) {
        var _this = $(this);
        _this.closest('.location-wrapper').find('button').removeClass('selected');
        _this.addClass('selected');
        add_filter_value(_this.attr('data-name'), _this.attr('data-id'));
    });

    $(document).on('keyup blur', '#dedication_comments', function(event) {
        var _this = $(this);
        add_filter_value(_this.attr('name'), _this.val());
    });

    function add_filter_value(_key, _value) {
        var newEntry = {
            name: _key,
            value: _value
        };

        // Check if there's already an entry with the same name
        var existingEntry = masbia_filter_list.find(entry => entry.name === newEntry.name);

        if (existingEntry) {
            // If found, update the id
            existingEntry.value = newEntry.value;
        } else {
            // Otherwise, add as a new entry
            masbia_filter_list.push(newEntry);
        }

        masbia_filter_list.forEach(function(item) {
            localStorage.setItem(item.name, item.value);
        });
        console.log('masbia_filter_list=',masbia_filter_list);
    }

    $(document).on('click', '.sponsor__options-tabs .tab-link', function(event) {
        $(".cart__subtitle, .entry-quantity").text($(this).text());
        $(".cart").slideDown();
        setTimeout(function () {
            // showPaymentSection();
            $(".cart").show();
        }, 300);
    });

    $(document).on('change', '#allocate_donation', function(event) {
        var _this = $(this);
        $(".selected-tickets .cart__summary-list").find('.allocate_donation_option').remove();
        if(_this.val() != '') {
            $(".selected-tickets .cart__summary-list").append('<li class="allocate_donation_option"><span>Allocate Donation : </span>'+_this.find("option:selected").attr("data-name")+'</li>');
        }
        add_filter_value(_this.attr('name'), _this.val());

        $(".cart").slideDown();
        setTimeout(function () {
            // showPaymentSection();
            $(".cart").show();
        }, 300);
    });

    $(document).on('change', '#letter', function(event) {
        var _this = $(this);
        var price = _this.closest('.donation__dedication').find('span').attr('data-price');
        $(".selected-tickets .cart__summary-list").find('.letter-option').remove();
        $('#letter_amount').val(price);
        if(_this.is(':checked')) {
            $(".selected-tickets .cart__summary-list").append('<li class="letter-option"><span>Letter request : </span>$'+price+'</li>');
        } else {
            $('#letter_amount').val('');
        }
        add_filter_value(_this.attr('name'), +_this.is(':checked'));
        caculate_final_donate_amount();
    });

    $(document).on('change', '#recognition', function(event) {
        var _this = $(this);
        var price = _this.closest('.donation__dedication').find('span').attr('data-price');
        $(".selected-tickets .cart__summary-list").find('.recognition-option').remove();
        $('#recognition_amount').val(price);
        if(_this.is(':checked')) {
            $(".selected-tickets .cart__summary-list").append('<li class="recognition-option"><span>Recognition Request : </span>$'+price+'</li>');
        } else {
            $('#recognition_amount').val('');
        }
        add_filter_value(_this.attr('name'), +_this.is(':checked'));
        caculate_final_donate_amount();
    });

    function caculate_final_donate_amount() {
        var CurrencyLetters = $("#currency-select option:selected").val() || "USD";
        var CurrencySymbol = $("#currency-select option:selected").text() || "$";

        if($("#only_donation").val() == '') {
            console.log('Please enter Donation amount');
            return;
        }

        var final_donate_amount = parseFloat($("#only_donation").val());
        if($("#letter_amount").val() != '' && $("#letter_amount").val() > 0) {
            final_donate_amount += parseFloat($("#letter_amount").val())
        }

         if($("#recognition_amount").val() != '' && $("#recognition_amount").val() > 0) {
            final_donate_amount += parseFloat($("#recognition_amount").val())
        }

        console.log('final_donate_amount=',final_donate_amount);
        var formattedAmount = mutiFormatCurrency(
            final_donate_amount,
            CurrencyLetters
        );

        $('#donate_amount').val(final_donate_amount);
        $('#usd_amount').val(final_donate_amount);
        $(".js-cart-summary-amount").html(
            `${siteContent.cart.ticketsTitle} <span>${formattedAmount}</span>`
        );
        $(".checkout-btn__amount").text(formattedAmount);
        $(".cart").slideDown();
        setTimeout(function () {
            // showPaymentSection();
            $(".cart").show();
        }, 300);
    }


    function handleEvent(el, type, suppressCustomAmountUnselect) {
        const ticketId = parseInt($(el).data("id"));
        // alert('here');
        const className = type === "click" ? "selected" : "highlighted";

        const { grandPrize, ticket, entryPluralized } = getTicketData(ticketId);

        const activePrizes = siteContent.tickets.prizes.filter((prize) =>
            prize.packageIds.includes(ticketId)
        );

        ticketAmount =
            $("#customAmount").val() === ""
                ? ticket.amount
                : $("#customAmount").val();

        $(".prizes-grid .prize").removeClass(className);
        if (grandPrize) {
            $(".prizes-grid .grand-prize").addClass(className);
        } else {
            $(".prizes-grid .grand-prize").removeClass(className);
        }

        activePrizes.forEach((p) => {
            $(`.prizes-grid .prize[data-number='${p.number}']`).addClass(
                className
            );
        });

        if (!$(".grand-prize").hasClass("selected")) {
            $(".grand-prize .grand-prize__amount").html(
                `${formatCurrency(
                    grandPrize
                        ? ticket.grandPrize
                        : siteContent.tickets.grandPrize.defaultAmount,
                    0,
                    0
                )}`
            );
        }

        if (type === "click") {
            if (!suppressCustomAmountUnselect) {
                $("#customAmountCard").removeClass("selected");
                sessionStorage.removeItem("custom_amount");
            }

            $(".ticket-options__control-title").html(
                `Enter <mark>custom amount</mark> to see entry details`
            );

            // $(".cart__subtitle, .entry-quantity").text($(el).text());

            if (ticket.couponApplied) {
                $(".cart__subtitle-wrapper").addClass("discounted");

                $(".cart__subtitle--discounted").text(
                    `${ticket.previousEntries} ${entryPluralized}`
                );
            } else {
                $(".cart__subtitle-wrapper").removeClass("discounted");
            }

            $(".items-quantity").css("display", "flex");
            if (getSelectedTeam() != undefined || getSelectedTeam() != null) {
                $(".cart__team").text(`Team: ${getSelectedTeam()}`);
            }
            $(".prizes-quantity").text(`${ticket.prizes} Prizes`);

            // $(".selected-tickets .cart__summary-list").empty();

            activePrizes.forEach((p) => {
                // $(".selected-tickets .cart__summary-list").append(
                //    // $("<li>").text(p.title)
                // );
            });

            $(".grand-prize .grand-prize__amount").html(
                `${formatCurrency(
                    grandPrize
                        ? ticket.grandPrize
                        : siteContent.tickets.grandPrize.defaultAmount,
                    0,
                    0
                )}`
            );

            updateColumns(activePrizes.length);

            if (grandPrize) {
                // $(".selected-tickets .cart__summary-list").prepend(
                //     $("<li>").text(`$${formatNumber(ticket.grandPrize)} Grand Prize1`)
                // );
            }

            var CurrencyLetters =
                $("#currency-select option:selected").val() || "USD";
            var CurrencySymbol =
                $("#currency-select option:selected").text() || "$";
            var baseURL = $("#baseURL").val();

            if (!CurrencyLetters) {
                CurrencyLetters = "USD";
                CurrencySymbol = "$";
            }
            // Function to update the UI
            function updateUI(convertedAmount, usdAmount) {
                var formattedAmount = mutiFormatCurrency(
                    convertedAmount,
                    CurrencyLetters
                );

                let potAmount = $("#prize_split_amount").val();

                if (potAmount !== "" && !isNaN(potAmount)) {
                    potAmount = parseInt(potAmount, 10);
                } else {
                    potAmount = 0;
                }

                let potUSDAmount = $("#prize_split_usd_amount").val();

                if (potUSDAmount !== "" && !isNaN(potUSDAmount)) {
                    potUSDAmount = parseInt(potUSDAmount, 10);
                } else {
                    potUSDAmount = 0;
                }

                $("#donate_amount").val(
                    parseFloat(convertedAmount) + potAmount
                );
                $("#usd_amount").val(parseFloat(usdAmount) + potUSDAmount);
                $("#only_donation").val(usdAmount);
                // if (CurrencyLetters == "CAD") {
                //   $(".js-cart-summary-amount").html(
                //     `${siteContent.cart.ticketsTitle} <span>${
                //       "CAD $" + convertedAmount
                //     }</span>`prizes-quantity
                //   );

                //   $(".checkout-btn__amount").text(
                //     "CAD $" + parseFloat(convertedAmount).toFixed(2)
                //   );
                // } else {
                $(".js-cart-summary-amount").html(
                    `${siteContent.cart.ticketsTitle} <span>${formattedAmount}</span>`
                );
                $(".checkout-btn__amount").text(formattedAmount);
                // }

                $("#rec_amount_full").html(formattedAmount);

                $("#customAmount").val(formatCurrency(convertedAmount));
                // $("#customAmount").val(numberWithCommas(convertedAmount));

                displayGiftsForDonation(parseFloat(convertedAmount));
                sessionStorage.setItem("usd_amount_Session", convertedAmount);
                handleSTPSession();
                handleTips();
                calculateTotalTipsAmount();
            }

            // Function to handle currency conversion
            let causeId = $("#causeID").val();
           
            // Check for multi_currency setting
            if ($("#multi_currency").val() == "1") {
                if (CurrencyLetters === "EUR") {
                    $(".option-card__amount").each(function () {
                        var text = $(this).text().replace("$", "€");
                        $(this).text(text);
                    });
                }
                // handleCurrencyConversion();
                sessionStorage.setItem("pageReloaded", true);
            } else {
                updateUI(ticketAmount, ticketAmount);
            }

            // updateUI(ticketAmount, ticketAmount);
            $("#pricing_options").val(ticketId);
            var proFeeAmt = $("#fee_percentage").val();
            var processFee = (`${ticketAmount}` * proFeeAmt) / 100;
            var currency = CurrencySymbol;
            $("#process_fee").html(
                "Add " +
                currency +
                processFee.toFixed(2) +
                " to your payment to cover the " +
                proFeeAmt +
                "% credit card processing fee"
            );
            $("#don_process_fee").val(processFee.toFixed(2));
            sessionStorage.setItem("ticket_id", ticket.id);
            $(".cart").slideDown();
            setTimeout(function () {
                // showPaymentSection();
                $(".cart").show();
            }, 300);
        }
    }
    $(document).ready(function () {
        $(".cart").hide();
    });
    function handleSTPSession() {
        if (sessionStorage.getItem("stp_prize")) {
            setTimeout(function () {
                const stp_prize = sessionStorage.getItem("stp_prize");
                if (
                    !$(
                        `.prize-split__btn[data-usd-price='${stp_prize}']`
                    ).hasClass("active")
                ) {
                    $(
                        `.prize-split__btn[data-usd-price='${stp_prize}']`
                    ).click();
                }
            }, 500);
        }
    }
    let tipsArray = [];

    // $(".tip_item").on("click", function () {
    //     const tip_item_checkbox = $(this).find(".tip_item_checkbox");
    //     const checkbox = $(this).find("input[type=checkbox]");
    //     let tipID = $(this).data("id");
    //     let heading = $(this).find(".tip_item-title").text();

    //     $(".tip_popup_header h2").text(heading);
    //     $("#tipDataID").val(tipID);
    //     const isChecked = !checkbox.prop("checked");
    //     checkbox.prop("checked", isChecked);

    //     const icon = $(this).find(".tip_icon");

    //     if (isChecked) {
    //         $("#tipModal").show();
    //         // tip_item_checkbox.css("display", "block");
    //         icon.hide();
    //         $('.tip_item[data-id="' + tipID + '"]').each(function () {
    //             $(this).addClass("filled");
    //             $(this).find("input[type=checkbox]").prop("checked", true);
    //         });
    //         // $(this).find(".tip_amount").css("display", "block");
    //         // $(this).css("background", "var(--accent-color");
    //         // $(this).css("color", "#fff");
    //     } else {
    //         $('.tip_item[data-id="' + tipID + '"]').each(function () {
    //             // $(this).toggleClass('active');
    //             $(this).removeClass("filled");
    //             $(this).find(".tip_amount").text("$0");
    //             $(this).find("input[type=checkbox]").prop("checked", false);
    //         });
    //         const existingTipIndex = tipsArray.findIndex(
    //             (tip) => tip.recipient_id == tipID
    //         );
    //         if (existingTipIndex !== -1) {
    //             tipsArray.splice(existingTipIndex, 1);

    //             $(".selected-tips .cart__summary-list")
    //                 .find(`li:contains('${heading}')`)
    //                 .remove();

    //             handleTips();
    //         }

    //         $(this).find(".tip_amount").css("display", "none");
    //         $(this).css("background", "var(--light-gray");
    //         tip_item_checkbox.css("display", "none");
    //         $(this).css("color", "#000");
    //         icon.show();
    //         $(this).find(".tip_amount").css("display", "none");
    //         $(this).css("background", "var(--light-gray");
    //         tip_item_checkbox.css("display", "none");
    //         $(this).css("color", "#000");
    //         icon.show();
    //     }
    // });

    $(".tip_item_checkbox").on("click", function (e) {
        e.stopPropagation();
        const tipItem = $(this).closest(".tip_item");
        const checkbox = $(this).find("input[type=checkbox]");
        let tipID = tipItem.data("id");
        let heading = tipItem.find(".tip_item-title").text();
        let tipAmount = tipItem.find(".tip_amount").text();
        $(".tip_popup_header h2").text(heading);
        $("#tipDataID").val(tipID);
        const isChecked = !checkbox.prop("checked");
        checkbox.prop("checked", isChecked);
        const icon = tipItem.find(".tip_icon");

        if (isChecked) {
            $("#tipModal").show();
            icon.hide();
            $('.tip_item[data-id="' + tipID + '"]').each(function () {
                $(this).addClass("filled");
                $(this).find("input[type=checkbox]").prop("checked", true);
            });
        } else {
            $('.tip_item[data-id="' + tipID + '"]').each(function () {
                $(this).removeClass("filled");
                $(this).find(".tip_amount").text("$0");
                $(this).find("input[type=checkbox]").prop("checked", false);
            });
            const existingTipIndex = tipsArray.findIndex(
                (tip) => tip.recipient_id == tipID
            );
            if (existingTipIndex !== -1) {
                tipsArray.splice(existingTipIndex, 1);
                $(".selected-tips .cart__summary-list")
                    .find(`li:contains('${heading}')`)
                    .remove();
                calculateTotalTipsAmount();
                handleTips();
            }
            tipItem.find(".tip_amount").css("display", "none");
            tipItem.find(".tip_item_checkbox").css("display", "none");
            tipItem.css("color", "#000");
            icon.show();
        }
        // $(".tip_amount").removeClass("clicked");
        // tipItem.find(".tip_amount").addClass("clicked");
        $(".tip_item_checkbox input").removeClass("checked");
        checkbox.addClass("checked");
    });

    $(".tip_item").on("click", function () {
        const tipItem = $(this);
        const checkbox = tipItem.find("input[type=checkbox]");
        const tipID = tipItem.data("id");
        const heading = tipItem.find(".tip_item-title").text();
        const tipAmount = tipItem.find(".tip_amount").text();
        const icon = tipItem.find(".tip_icon");
        const isChecked = checkbox.prop("checked");
        if (!isChecked) {
            $(".tip_popup_header h2").text(heading);
            $("#tipDataID").val(tipID);
            $("#tipModal").show();
            checkbox.prop("checked", true);
            icon.hide();
            tipItem.addClass("filled");
            tipItem.find(".tip_amount").text(tipAmount);

            tipsArray.push({ recipient_id: tipID, amount: tipAmount });
        } else {
            $(".tip_popup_header h2").text(heading);
            $("#tipDataID").val(tipID);
            // $("#tipModal").show();
        }
    });

    $("#tipSearch").on("input", function () {
        const searchValue = $(this).val().toLowerCase();
        $(".tip_item").each(function () {
            const title = $(this).find(".tip_item-title").text().toLowerCase();
            if (title.includes(searchValue)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
    $(".popup_close").on("click", function () {
        let tipAmount = $(".tip_amount.clicked").text();
        let checkbox = $(".tip_item_checkbox input");
        let tipId = $("#tipDataID").val();
        $.each($(".tip_item"), function () {
            let tipItemId = $(this).attr("data-id");
            if (tipId == tipItemId) {
                $(this).removeClass("filled");
                $(this).find(".tip_amount").text("$0");
                $(this).find("input[type=checkbox]").prop("checked", false);
                $(this).closest(".tip_item").find(".tip_icon").show();
            }
        });
        // if (checkbox.is(":checked") && tipAmount == "$0") {
        //     checkbox.prop("checked", false);
        //     checkbox.closest(".tip_item").removeClass("filled");
        //      checkbox.closest(".tip_item").find(".tip_icon").show();
        //     $("#tipModal").hide();
        // }
        $("#tipModal").hide();
        $("#tipCustomAmount").val("");
    });

    $(".add_tip_btn").on("click", function () {
        let dataID = $("#tipDataID").val();
        let tipCustomAmount = $("#tipCustomAmount").val();
        let heading = $(".tip_popup_header h2").text();

        if (tipCustomAmount && !isNaN(tipCustomAmount) && tipCustomAmount > 0) {
            let target = $(`.tip_item[data-id="${dataID}"]`).find(
                ".tip_amount"
            );
            target.html("$" + tipCustomAmount);
            let existingTipIndex = tipsArray.findIndex(
                (tip) => tip.recipient_id == dataID
            );
            if (existingTipIndex !== -1) {
                tipsArray[existingTipIndex].amount = tipCustomAmount;
            } else {
                tipsArray.push({
                    recipient_id: dataID,
                    amount: tipCustomAmount,
                });
            }
            $(".selected-tips .cart__summary-list").prepend(
                $("<li>").text(
                    `${formatCurrency(tipCustomAmount)} for ${heading}`
                )
            );
            handleTips();
            calculateTotalTipsAmount();
            $("#tipCustomAmount").val("");
            $("#tipDataID").val(0);
            $("#tipModal").hide();
        } else {
            alert("Please enter a valid amount.");
        }
    });

    function handleTips() {
        console.log(tipsArray);
        let total = tipsArray.reduce(
            (sum, tip) => sum + parseFloat(tip.amount),
            0
        );
        $("#tipsAmount").val(total);

        let donate_amount = $("#only_donation").val() || 0;

        let total_with_tips = parseFloat(donate_amount) + total;

        $(".checkout-btn__amount").html(`${formatCurrency(total_with_tips)}`);

        $(".js-cart-summary-amount").html(
            `Your Donation: <span>${formatCurrency(total_with_tips)}</span>`
        );
        if (total > 0) {
            $(".selected-tips .cart__title").html("Yangerleit Support:");
        }
        $("#usd_amount").val(total_with_tips);
        const tipsJSON = JSON.stringify(tipsArray);
        $("#tipsInput").val(tipsJSON);
        $("#donate_amount").val(total_with_tips);
        if (total_with_tips > 0) {
            setTimeout(function () {
                $(".cart").show();
            }, 300);
            $(".cart").slideUp("fast");
        }
    }

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    function getSelectedTeam() {
        let selectedTeam = $(".active-team-member").data("name");
        return selectedTeam;
    }
    // Populate cart
    $(".cart .cart__heading").text(siteContent.cart.heading);
    $(".cart .selected-gifts .cart__title").text(siteContent.cart.giftsTitle);
    // Populate donors and Teams
    $(".team h2.section-title").text(siteContent.partners.heading);
    if (siteContent.teamTitle.slug) {
        $("#donors-btn").text(
            `All Donors (${siteContent.teamTitle.donationsCount})`
        );
    } else {
        $("#donors-btn").text(
            `Donors (${siteContent.teamTitle.donationsCount})`
        );
    }
    $("#team-donors-btn").text(
        `Team ${siteContent.teamTitle.title}` +
        (siteContent.partners.teamDoners.length === 1
            ? "'s Donor"
            : "'s Donors") +
        ` (${siteContent.teamTitle.teamsDonationCount})`
    );
    if (siteContent.teamTitle.slug) {
        $("#members-btn").text(
            `All Teams (${siteContent.teamTitle.teamsCount})`
        );
    } else {
        $("#members-btn").text(`Teams (${siteContent.teamTitle.teamsCount})`);
    }
    // getCurrencySymbol(currency) +
    // Populate donors
    function renderDonors() {
        const DonorCard = ({
            id,
            name,
            amount,
            currency = "USD",
            comment,
            time,
            teamName,
        }) =>
            `
      <div class="donor-card" data-donationId="${id}">
        <div class="team-card__header">
          <span class="title">${name}</span>
          <span class="amount">${mutiFormatCurrency(amount, currency)} </span>
        </div>
        <div class="donor-card__body">
        ${teamName
                ? `<p class="donor-card__info">
          <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_341_5)">
          <path d="M11.1238 9.28305C10.753 8.91202 10.3199 8.6092 9.84408 8.38845C10.515 7.84488 10.9431 7.01545 10.9431 6.08531C10.9431 4.44423 9.57452 3.09789 7.93344 3.12307C6.31753 3.14825 5.01563 4.46496 5.01563 6.08531C5.01563 7.01545 5.44515 7.84488 6.11462 8.38845C5.63875 8.60903 5.20554 8.91188 4.83493 9.28305C4.02624 10.0932 3.56709 11.1626 3.53747 12.303C3.53708 12.3189 3.53985 12.3346 3.54563 12.3493C3.5514 12.364 3.56007 12.3774 3.57111 12.3888C3.58215 12.4001 3.59535 12.4091 3.60992 12.4152C3.6245 12.4213 3.64015 12.4245 3.65596 12.4245H4.48539C4.54908 12.4245 4.6024 12.3741 4.60388 12.3105C4.63202 11.4514 4.98008 10.6472 5.59179 10.0369C5.9048 9.72225 6.27713 9.47278 6.68721 9.30295C7.09729 9.13312 7.53698 9.04631 7.98083 9.04755C8.88283 9.04755 9.73151 9.39857 10.3699 10.0369C10.9801 10.6472 11.3282 11.4514 11.3578 12.3105C11.3593 12.3741 11.4126 12.4245 11.4763 12.4245H12.3057C12.3215 12.4245 12.3372 12.4213 12.3517 12.4152C12.3663 12.4091 12.3795 12.4001 12.3906 12.3888C12.4016 12.3774 12.4103 12.364 12.416 12.3493C12.4218 12.3346 12.4246 12.3189 12.4242 12.303C12.3946 11.1626 11.9354 10.0932 11.1238 9.28305ZM7.98083 7.98114C7.47429 7.98114 6.99737 7.78415 6.64042 7.42572C6.46128 7.248 6.31978 7.03601 6.22435 6.80241C6.12893 6.5688 6.08153 6.31837 6.085 6.06605C6.08944 5.58025 6.28347 5.11073 6.62264 4.76267C6.97811 4.39831 7.45355 4.1954 7.96158 4.18948C8.46368 4.18503 8.95097 4.38054 9.3094 4.73156C9.67671 5.09148 9.87815 5.57284 9.87815 6.08531C9.87815 6.59185 9.68116 7.06729 9.32273 7.42572C9.14688 7.60241 8.93773 7.74248 8.7074 7.83782C8.47707 7.93315 8.23011 7.98187 7.98083 7.98114ZM4.27063 6.47632C4.2573 6.34747 4.24989 6.21713 4.24989 6.08531C4.24989 5.84981 4.27211 5.62024 4.31358 5.39659C4.32395 5.34327 4.29581 5.28847 4.24693 5.26625C4.0455 5.1759 3.86036 5.05149 3.7004 4.89449C3.51191 4.71173 3.36359 4.49169 3.26489 4.2484C3.1662 4.00511 3.11931 3.74392 3.1272 3.4815C3.14053 3.00606 3.3316 2.55432 3.66485 2.21366C4.03069 1.83894 4.52242 1.63454 5.04525 1.64047C5.51773 1.64491 5.97391 1.82709 6.31901 2.14997C6.43602 2.25958 6.53674 2.38103 6.62116 2.51137C6.65079 2.55728 6.70855 2.57654 6.75891 2.55876C7.01958 2.46841 7.29507 2.40473 7.57797 2.3751C7.66091 2.36622 7.70831 2.27735 7.67128 2.20329C7.18991 1.25093 6.20645 0.593316 5.06895 0.575543C3.42639 0.550364 2.05783 1.8967 2.05783 3.5363C2.05783 4.46644 2.48588 5.29587 3.15682 5.83944C2.68583 6.05717 2.25186 6.35783 1.87566 6.73404C1.064 7.54421 0.604855 8.61358 0.575232 9.75552C0.574837 9.77133 0.57761 9.78706 0.583387 9.80178C0.589165 9.8165 0.59783 9.82991 0.608872 9.84123C0.619915 9.85255 0.633111 9.86154 0.647683 9.86768C0.662256 9.87382 0.677909 9.87698 0.693722 9.87697H1.52463C1.58832 9.87697 1.64164 9.82662 1.64312 9.76293C1.67126 8.90388 2.01932 8.09963 2.63103 7.48941C3.06648 7.05396 3.59968 6.75181 4.18176 6.60518C4.23952 6.59037 4.27803 6.53557 4.27063 6.47632Z" fill="#999999"/>
          </g>
          <defs>
          <clipPath id="clip0_341_5">
          <rect width="13" height="13" fill="white"/>
          </clipPath>
          </defs>
          </svg>
          <span class="description">${teamName}</span>
        </p>`
                : ""
            }
        ${comment
                ? `<p class="donor-card__info commentHide">
          <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_341_2)">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.463867 8.5002C0.463867 4.0651 4.01694 0.469727 8.39987 0.469727C12.7828 0.469727 16.3359 4.0651 16.3359 8.5002V14.7173C16.3359 14.9359 16.245 15.1443 16.0854 15.2915C15.9259 15.4388 15.7124 15.5113 15.4974 15.4912L12.7263 15.2328C10.3363 16.8059 7.28608 16.9639 4.74262 15.6274L5.09655 14.9377L4.74261 15.6274C2.11356 14.246 0.463731 11.4979 0.463867 8.5002ZM1.23187 8.5002H0.463867H1.23187ZM8.39987 2.02401C4.86525 2.02401 1.99987 4.92351 1.99987 8.5002V8.50024C1.99976 10.9177 3.33026 13.134 5.45048 14.248C7.5707 15.3621 10.1276 15.1885 12.0817 13.7978C12.2308 13.6916 12.4124 13.6426 12.594 13.6596L14.7999 13.8653V8.5002C14.7999 4.9235 11.9345 2.02401 8.39987 2.02401Z" fill="#999999"/>
            <path d="M5.32757 9.79509C4.90342 9.79509 4.55957 10.143 4.55957 10.5722C4.55957 11.0014 4.90342 11.3494 5.32757 11.3494V9.79509ZM9.42357 11.3494C9.84771 11.3494 10.1916 11.0014 10.1916 10.5722C10.1916 10.143 9.84771 9.79509 9.42357 9.79509V11.3494ZM5.32757 6.68652C4.90342 6.68652 4.55957 7.03448 4.55957 7.46367C4.55957 7.89286 4.90342 8.24081 5.32757 8.24081V6.68652ZM11.4716 8.24081C11.8957 8.24081 12.2396 7.89286 12.2396 7.46367C12.2396 7.03448 11.8957 6.68652 11.4716 6.68652V8.24081ZM5.32757 11.3494H9.42357V9.79509H5.32757V11.3494ZM5.32757 8.24081H11.4716V6.68652H5.32757V8.24081Z" fill="#999999"/>
            </g>
          <defs>
            <clipPath id="clip0_341_2">
            <rect width="17" height="17" fill="white"/>
            </clipPath>
            </defs>
          </svg>
          <span class="description" data-hint="${comment}">${comment}</span>
        </p>`
                : ""
            }
        <p class="donor-card__info">
          <svg xmlns="http://www.w3.org/2000/svg" width="14.346" height="12.552" viewBox="0 0 14.346 12.552">
            <g id="history" transform="translate(0 -32.222)">
              <path id="Path_44" data-name="Path 44" d="M8.069,32.222a6.281,6.281,0,0,0-6.2,5.38H0l2.69,2.69L5.38,37.6h-1.7a4.482,4.482,0,1,1,.752,3.514L2.974,42.163a6.276,6.276,0,1,0,5.1-9.941Z" fill="#999"/>
              <path id="Path_45" data-name="Path 45" d="M257.778,161.111v3.646l2.677,1.606.923-1.538-1.806-1.084v-2.63Z" transform="translate(-250.605 -125.303)" fill="#999"/>
            </g>
          </svg>
          <time>${formatedDate(time)}</time>
        </p>
      </div>
    </div>`;
        if (siteContent.campaignSettings.showDoners == 1) {
            if (!siteContent.partners.donors?.length) {
                $("#donors-btn").parent().addClass("d-none");
            }

            if (siteContent.teamTitle.donationsCount < 12) {
                $(".load-more-donors").addClass("d-none");
            }

            $(".donors-grid").html(
                siteContent.partners.donors.map(DonorCard).join("")
            );
        } else {
            $(".donors-grid").hide();
            $("#donors-btn").parent().hide("");
            $(".load-more-donors").hide("");
        }
    }
    // Populate teamDonors
    function renderTeamDonors() {
        const TeamDonorCard = ({
            name,
            amount,
            currency,
            comment,
            time,
            teamName,
        }) => `
        <div class="donor-card team-card-donor">
          <div class="team-card__header">
            <span class="title">${name}</span>
            <span class="amount">${getCurrencySymbol(currency) + amount}</span>
          </div>
          <div class="donor-card__body">

          ${teamName
                ? `<p class="donor-card__info">
            <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_341_5)">
            <path d="M11.1238 9.28305C10.753 8.91202 10.3199 8.6092 9.84408 8.38845C10.515 7.84488 10.9431 7.01545 10.9431 6.08531C10.9431 4.44423 9.57452 3.09789 7.93344 3.12307C6.31753 3.14825 5.01563 4.46496 5.01563 6.08531C5.01563 7.01545 5.44515 7.84488 6.11462 8.38845C5.63875 8.60903 5.20554 8.91188 4.83493 9.28305C4.02624 10.0932 3.56709 11.1626 3.53747 12.303C3.53708 12.3189 3.53985 12.3346 3.54563 12.3493C3.5514 12.364 3.56007 12.3774 3.57111 12.3888C3.58215 12.4001 3.59535 12.4091 3.60992 12.4152C3.6245 12.4213 3.64015 12.4245 3.65596 12.4245H4.48539C4.54908 12.4245 4.6024 12.3741 4.60388 12.3105C4.63202 11.4514 4.98008 10.6472 5.59179 10.0369C5.9048 9.72225 6.27713 9.47278 6.68721 9.30295C7.09729 9.13312 7.53698 9.04631 7.98083 9.04755C8.88283 9.04755 9.73151 9.39857 10.3699 10.0369C10.9801 10.6472 11.3282 11.4514 11.3578 12.3105C11.3593 12.3741 11.4126 12.4245 11.4763 12.4245H12.3057C12.3215 12.4245 12.3372 12.4213 12.3517 12.4152C12.3663 12.4091 12.3795 12.4001 12.3906 12.3888C12.4016 12.3774 12.4103 12.364 12.416 12.3493C12.4218 12.3346 12.4246 12.3189 12.4242 12.303C12.3946 11.1626 11.9354 10.0932 11.1238 9.28305ZM7.98083 7.98114C7.47429 7.98114 6.99737 7.78415 6.64042 7.42572C6.46128 7.248 6.31978 7.03601 6.22435 6.80241C6.12893 6.5688 6.08153 6.31837 6.085 6.06605C6.08944 5.58025 6.28347 5.11073 6.62264 4.76267C6.97811 4.39831 7.45355 4.1954 7.96158 4.18948C8.46368 4.18503 8.95097 4.38054 9.3094 4.73156C9.67671 5.09148 9.87815 5.57284 9.87815 6.08531C9.87815 6.59185 9.68116 7.06729 9.32273 7.42572C9.14688 7.60241 8.93773 7.74248 8.7074 7.83782C8.47707 7.93315 8.23011 7.98187 7.98083 7.98114ZM4.27063 6.47632C4.2573 6.34747 4.24989 6.21713 4.24989 6.08531C4.24989 5.84981 4.27211 5.62024 4.31358 5.39659C4.32395 5.34327 4.29581 5.28847 4.24693 5.26625C4.0455 5.1759 3.86036 5.05149 3.7004 4.89449C3.51191 4.71173 3.36359 4.49169 3.26489 4.2484C3.1662 4.00511 3.11931 3.74392 3.1272 3.4815C3.14053 3.00606 3.3316 2.55432 3.66485 2.21366C4.03069 1.83894 4.52242 1.63454 5.04525 1.64047C5.51773 1.64491 5.97391 1.82709 6.31901 2.14997C6.43602 2.25958 6.53674 2.38103 6.62116 2.51137C6.65079 2.55728 6.70855 2.57654 6.75891 2.55876C7.01958 2.46841 7.29507 2.40473 7.57797 2.3751C7.66091 2.36622 7.70831 2.27735 7.67128 2.20329C7.18991 1.25093 6.20645 0.593316 5.06895 0.575543C3.42639 0.550364 2.05783 1.8967 2.05783 3.5363C2.05783 4.46644 2.48588 5.29587 3.15682 5.83944C2.68583 6.05717 2.25186 6.35783 1.87566 6.73404C1.064 7.54421 0.604855 8.61358 0.575232 9.75552C0.574837 9.77133 0.57761 9.78706 0.583387 9.80178C0.589165 9.8165 0.59783 9.82991 0.608872 9.84123C0.619915 9.85255 0.633111 9.86154 0.647683 9.86768C0.662256 9.87382 0.677909 9.87698 0.693722 9.87697H1.52463C1.58832 9.87697 1.64164 9.82662 1.64312 9.76293C1.67126 8.90388 2.01932 8.09963 2.63103 7.48941C3.06648 7.05396 3.59968 6.75181 4.18176 6.60518C4.23952 6.59037 4.27803 6.53557 4.27063 6.47632Z" fill="#999999"/>
            </g>
            <defs>
            <clipPath id="clip0_341_5">
            <rect width="13" height="13" fill="white"/>
            </clipPath>
            </defs>
            </svg>
            <span class="description">${teamName}</span>
          </p>`
                : ""
            }

          ${comment
                ? `<p class="donor-card__info commentHide">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_341_2)">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0.463867 8.5002C0.463867 4.0651 4.01694 0.469727 8.39987 0.469727C12.7828 0.469727 16.3359 4.0651 16.3359 8.5002V14.7173C16.3359 14.9359 16.245 15.1443 16.0854 15.2915C15.9259 15.4388 15.7124 15.5113 15.4974 15.4912L12.7263 15.2328C10.3363 16.8059 7.28608 16.9639 4.74262 15.6274L5.09655 14.9377L4.74261 15.6274C2.11356 14.246 0.463731 11.4979 0.463867 8.5002ZM1.23187 8.5002H0.463867H1.23187ZM8.39987 2.02401C4.86525 2.02401 1.99987 4.92351 1.99987 8.5002V8.50024C1.99976 10.9177 3.33026 13.134 5.45048 14.248C7.5707 15.3621 10.1276 15.1885 12.0817 13.7978C12.2308 13.6916 12.4124 13.6426 12.594 13.6596L14.7999 13.8653V8.5002C14.7999 4.9235 11.9345 2.02401 8.39987 2.02401Z" fill="#999999"/>
              <path d="M5.32757 9.79509C4.90342 9.79509 4.55957 10.143 4.55957 10.5722C4.55957 11.0014 4.90342 11.3494 5.32757 11.3494V9.79509ZM9.42357 11.3494C9.84771 11.3494 10.1916 11.0014 10.1916 10.5722C10.1916 10.143 9.84771 9.79509 9.42357 9.79509V11.3494ZM5.32757 6.68652C4.90342 6.68652 4.55957 7.03448 4.55957 7.46367C4.55957 7.89286 4.90342 8.24081 5.32757 8.24081V6.68652ZM11.4716 8.24081C11.8957 8.24081 12.2396 7.89286 12.2396 7.46367C12.2396 7.03448 11.8957 6.68652 11.4716 6.68652V8.24081ZM5.32757 11.3494H9.42357V9.79509H5.32757V11.3494ZM5.32757 8.24081H11.4716V6.68652H5.32757V8.24081Z" fill="#999999"/>
              </g>
            <defs>
              <clipPath id="clip0_341_2">
              <rect width="17" height="17" fill="white"/>
              </clipPath>
              </defs>
            </svg>
            <span class="description" data-hint="${comment}">${comment}</span>
          </p>`
                : ""
            }

          <p class="donor-card__info">
            <svg xmlns="http://www.w3.org/2000/svg" width="14.346" height="12.552" viewBox="0 0 14.346 12.552">
              <g id="history" transform="translate(0 -32.222)">
                <path id="Path_44" data-name="Path 44" d="M8.069,32.222a6.281,6.281,0,0,0-6.2,5.38H0l2.69,2.69L5.38,37.6h-1.7a4.482,4.482,0,1,1,.752,3.514L2.974,42.163a6.276,6.276,0,1,0,5.1-9.941Z" fill="#999"/>
                <path id="Path_45" data-name="Path 45" d="M257.778,161.111v3.646l2.677,1.606.923-1.538-1.806-1.084v-2.63Z" transform="translate(-250.605 -125.303)" fill="#999"/>
              </g>
            </svg>
            <time>${formatedDate(time)}</time>
          </p>
        </div>
      </div>`;
        if (siteContent.campaignSettings.showDoners == 1) {
            if (!siteContent.partners.teamDoners?.length) {
                $("#team-donors-btn").addClass("d-none");
            }

            if (siteContent.teamTitle.teamsDonationCount < 12) {
                $(".load-more-team-donors").addClass("d-none");
            }
            $(".team-donors").html(
                siteContent.partners.teamDoners.map(TeamDonorCard).join("")
            );
        } else {
            $(".team-donors").hide();
            $("#team-donors-btn").hide();
            $(".load-more-team-donors").hide();
        }
    }
    // Populate Teams
    function renderTeamMembers() {
        const TeamMemberCard = ({
            id,
            name,
            teamSlug,
            amountRaised,
            currency,
            teamGoal,
            totalDonations,
            linkUrl,
        }) => {
            return `<div class="team-member-card" data-id="${id}" data-name="${name}" data-slug="${teamSlug}">
      <span class="option-card-teams overlay">
      <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
        <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
          <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5"
            transform="translate(438.979 1654) rotate(45)" fill="#fff" />
          <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5"
            transform="translate(442 1660.95) rotate(-45)" fill="#fff" />
        </g>
      </svg>
    </span>
        <div class="team-member__wrapper">
          <div class="team-card__header">

            <div class="left">
              <span class="title">${name}</span>
              <span class="donors"> ${totalDonations} ${totalDonations <= 1 ? "donor" : "donors"
                }</span>
            </div>
            <div class="right">
              <span class="amount"> ${mutiFormatCurrency(
                    amountRaised,
                    currency,
                    0,
                    0
                )}</span>
              <span class="raised">of    ${mutiFormatCurrency(
                    teamGoal,
                    currency,
                    0,
                    0
                )} raised</span>
            </div>
          </div>
          <div class="progress" role="progressbar">
            <div class="progress-bar" style="width: ${calculateProgress(
                    amountRaised,
                    teamGoal
                )}%"></div>
          </div>
          <div class="team-card__btns">
          ${siteContent.teamTitle && siteContent.teamTitle.title
                    ? ""
                    : '<button type="button" class="btn overlay select-team">Select Team</button>'
                }
            <a href="${linkUrl}">
              <button type="button" class="btn overlay donate-btn">Visit Team</button>
            </a>
          </div>
        </div>
      </div>`;
        };
        if (siteContent.campaignSettings.showDoners == 0) {
            $("#members-btn").addClass("active");
            $("#members").addClass("active show");
            $(".search-text").attr("data-id", "team");
            $(".team__select ").val("alphabatics");
        }
        if (!siteContent.teamTitle.teamsCount) {
            $("#members-btn").parent().addClass("d-none");
        }

        if (siteContent.teamTitle.teamsCount < 6) {
            $(".load-more-teams").addClass("d-none");
        }
        $(".team-members-grid").html(
            siteContent.partners.teamMembers.map(TeamMemberCard).join("")
        );
    }
    //Render gifts
    function renderGifts() {
        const Gift = ({ id, imageURL, title, amount }) => `
      <div class="swiper-slide giftsSlide" data-id="${id}">
        <label class="gift">
          <input class="card-input" type="checkbox" name="gift-card" />
          <div class="prize__body gift_card_body">
          <div class="overlay_section">
                 <div class="button_group">
                    <button class="detail_btn">Details</button>
                     <button class="select_btn" id="selectButton">Select</button>
                <div id="show_select_gift">
                  <div class="d-flex">
                  <button id="minusButton" class="btn">-</button>
                  <input type="text" disabled id="numberInput" value="0">
                  <button id="plusButton" class="btn">+</button>
                  </div>
                </div>

             </div>
             </div>
            <span class="option-card__checkbox overlay">
              <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                  <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5"
                    transform="translate(438.979 1654) rotate(45)" fill="#fff" />
                  <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5"
                    transform="translate(442 1660.95) rotate(-45)" fill="#fff" />
                </g>
              </svg>
            </span>
            <div class="prize__image">
            <img src="${imageURL}" alt="">
            </div>
            <div class="prize__desc">
              <div class="d-flex align-items-start">
                <p class="prize__name">${title}</p>
              </div>
            </div>
          </div>
        </label>
      </div>`;
        $(".swiper-gift .swiper-wrapper").html(
            siteContent.tickets.gifts.map(Gift).join("")
        );
    }

    //Gifts slider
    // new Swiper(".swiper-gift", {
    //   slidesPerView: "auto",
    //   spaceBetween: 10,
    //   navigation: {
    //     nextEl: ".swiper-gift-button-next",
    //     prevEl: ".swiper-gift-button-prev",
    //   },
    //   observer: true,
    //   observeParents: true,
    // });

    function renderAllGifts() {
        $(".swiper-gift .swiper-wrapper").html(
            siteContent.tickets.gifts.map(Gift).join("")
        );
    }
    // Call this function when initializing your page
    if (siteContent.campaignSettings.showGifts == 1) {
        renderAllGifts();
    } else {
        $(".gift-container").remove();
        $("#gift-btn").css("display", "none");
        localStorage.removeItem("giftSelections");
    }
    function renderGiftsByAmount(amount) {
        $(".giftsSlide").hide();
        $(`.swiper-slide[data-amount="${amount}"]`).show();
    }
    const giftsByAmount = siteContent.tickets.gifts.reduce((acc, gift) => {
        if (!acc[gift.amount]) {
            acc[gift.amount] = [];
        }
        acc[gift.amount].push(gift);
        return acc;
    }, {});
    function createAmountButtons() {
        const amounts = Object.keys(giftsByAmount);

        amounts.forEach((amount) => {
            $(".tab_row").append(`
        <div class="col-md-4 col-6 amountTabsButtons col-lg-2" data-amountTab="${amount}">
          <div class="gift_tab" data-amount="${amount}">$${amount}+<span class="notify_amount">0</span></div>
        </div>
      `);
        });
    }
    createAmountButtons();
    $(".gift_tab").on("click", function () {
        const amount = $(this).data("amount");
        renderGiftsByAmount(amount);
        $(".gift-info").text("");
    });
    //Render gifts
    function Gift({ id, imageURL, title, amount, details }) {
        return `
          <div class="swiper-slide giftsSlide" data-id="${id}" data-amount="${amount}">
            <label class="gift">
              <input class="card-input" type="checkbox" name="gift-card" />
              <div class="prize__body gift_card_body">
              <div class="overlay_section">
              <div class="button_group">
              <button class="detail_btn" type="button" data-details="${details}" data-giftimg="${imageURL}">Details</button>
                <button class="select_btn selectButton">Select</button>
            <div class="show_select_gift">
              <div class="d-flex justify-content-between">
              <button  class="btn minusButton">-</button>
              <input type="text" disabled  class="numberInput" data-giftId="${id}" data-giftTitle="${title}"  value="0">
              <button  class="btn plusButton">+</button>
              </div>
            </div>
          </div>
          </div>
            <span class="option-card__checkbox overlay">
              <svg xmlns="http://www.w3.org/2000/svg" width="17.87" height="12.849" viewBox="0 0 17.87 12.849">
                <g id="Group_2" data-name="Group 2" transform="translate(-436.858 -1650.344)">
                  <rect id="Rectangle_31" data-name="Rectangle 31" width="10" height="3" rx="1.5"
                    transform="translate(438.979 1654) rotate(45)" fill="#fff" />
                  <rect id="Rectangle_32" data-name="Rectangle 32" width="15" height="3" rx="1.5"
                    transform="translate(442 1660.95) rotate(-45)" fill="#fff" />
                </g>
              </svg>
            </span>
            <div class="prize__image">
              <img src="${imageURL}" alt="">
            </div>
            <div class="prize__desc">
              <div class="d-flex align-items-start">
                <p class="prize__name">${title}</p>
              </div>
            </div>
          </div>
        </label>
      </div>`;
    }
    function renderGift(gifts) {
        $(".swiper-gift .swiper-wrapper").html(gifts.map(Gift).join(""));
    }
    //// gifts options logic
    let currentGiftOptions = {};
    function getGiftOptions(donation) {
        const rules = {
            100: { 100: 1 },
            180: { 180: 1, 100: 2 },
            250: { 250: 1, 180: 2, 100: 2 },
            375: { 375: 1, 250: 2, 180: 2, 100: 2 },
            500: { 500: 1, 375: 2, 250: 2, 180: 2, 100: 2 },
            1000: { 500: 2, 375: 2, 250: 2, 180: 2, 100: 2 },
            1800: { 500: 2, 375: 4, 250: 4, 180: 4, 100: 4 },
        };
        return rules[donation] || {};
    }
    function displayGiftsForDonation(donationAmount) {
        if (siteContent.campaignSettings.showGifts == 0) {
            return;
        }
        currentGiftOptions = getGiftOptions(donationAmount);
        let giftOptions = getGiftOptions(donationAmount);

        let firstVisibleTabButton = null;

        $(".amountTabsButtons").each(function () {
            let tabAmount = parseInt($(this).attr("data-amounttab"));
            if (tabAmount <= donationAmount) {
                $(this).show();
                if (!firstVisibleTabButton) {
                    firstVisibleTabButton = $(this);
                }
            }
        });

        // Automatically click the first visible tab button
        if (firstVisibleTabButton) {
            firstVisibleTabButton.find(".gift_tab").click();
        }

        const amountTabs = document.querySelectorAll(".gift_tab");
        let selectedTab = null;

        amountTabs.forEach((tab) => {
            const tabAmount = parseInt(tab.dataset.amount);
            if (donationAmount >= tabAmount) {
                selectedTab = tab;
            }
            tab.classList.remove("active");
        });

        if (selectedTab) {
            selectedTab.classList.add("active");
            selectedTab.click();
        }

        showChooseInfo(donationAmount);

        // localStorage.removeItem("giftSelections");
        if (localStorage.getItem("isReloading")) {
            localStorage.removeItem("isReloading");
            localStorage.removeItem("giftSelections");
            updateGiftsCart();
        } else {
            localStorage.removeItem("giftSelections");
            updateGiftsCart();
        }
        $(".swiper-container").find(".card-input").prop("checked", false);
        $(".swiper-container").find(".numberInput").val("0");
        $(".swiper-container").find(".show_select_gift").hide();
        $(".swiper-container").find(".selectButton").show();
        $(".notify_amount").css("display", "none");
        $(".gift-info").text("");
        $(".selected-gifts").css("display", "none");
        $("#gift-btn").css("display", "none");
        $(".floating-btn__wrapper").css("display", "none");
        if (donationAmount >= "100") {
            $("#gift-btn").css("display", "block");
            $(".floating-btn__wrapper").css("display", "block");
        }
    }

    $(document).on("click", ".selectButton", function () {
        let slide = $(this).closest(".swiper-slide");
        let currentCount = parseInt(slide.find(".numberInput").val());
        let amount = parseInt($("#usd_amount").val());
        amount = categorizeDonation(amount);

        let inputField = slide.find(".numberInput");

        let giftId = inputField.data("giftid");
        let giftTitle = inputField.data("gifttitle");
        let selectedCategory = $(this)
            .closest(".swiper-slide")
            .data("amount")
            .toString();
        $(".gift-info").text("");
        if (!amount) {
            // alert("Please select a ticket or input an amount.");
            //$(".gift-info").text("Please select a ticket option or input an amount.");
            displayPotSectionAlerts(
                "Please select a ticket option or input an amount."
            );
            return;
        }

        let giftOptions = getGiftOptions(amount);
        let maxAllowed = giftOptions[selectedCategory];

        let totalCountInCategory = 0;
        $(`.swiper-slide[data-amount="${selectedCategory}"] .numberInput`).each(
            function () {
                totalCountInCategory += parseInt($(this).val()) || 0;
            }
        );
        $(".gift-info").text("");
        if (totalCountInCategory >= maxAllowed) {
            displayMaxSelections();
            $(this).prop("disabled", true); // Disable the select button
            return;
        } else {
            let updateGifts = updateLocalStorage(
                selectedCategory,
                giftId,
                giftTitle,
                currentCount + 1
            );
            if (updateGifts) {
                slide.find(".numberInput").val(currentCount + 1);
                slide.find(".minusButton").prop("disabled", false);
                slide.find(".card-input").prop("checked", true);
                $(this).hide();
                $(this).siblings(".show_select_gift").show();
            }
        }
    });

    $(document).on("click", ".plusButton", function () {
        let slide = $(this).closest(".swiper-slide");

        let inputField = $(this).siblings(".numberInput");
        let currentCount = parseInt(slide.find(".numberInput").val());
        let totalCountInCategory = 0;
        let giftId = inputField.data("giftid");
        let giftTitle = inputField.data("gifttitle");

        let selectedCategory = slide.data("amount").toString();
        let amount = parseInt($("#usd_amount").val());
        amount = categorizeDonation(amount);
        let giftOptions = getGiftOptions(amount);
        let maxAllowed = giftOptions[selectedCategory];
        // Calculate total selected gifts in the same category
        $(`.swiper-slide[data-amount="${selectedCategory}"]`)
            .find(".numberInput")
            .each(function () {
                totalCountInCategory += parseInt($(this).val());
            });
        $(".gift-info").text("");
        if (totalCountInCategory >= maxAllowed) {
            // Disable all plus buttons in this category
            $(`.swiper-slide[data-amount="${selectedCategory}"]`)
                .find(".plusButton")
                .attr("disabled", true);
            // alert("Maximum selections reached for this category.");
            // $(".gift-info").text("Maximum selections reached for this category.");
            displayMaxSelections();

            return;
        } else if (currentCount < maxAllowed) {
            let updateGifts = updateLocalStorage(
                selectedCategory,
                giftId,
                giftTitle,
                currentCount + 1
            );

            if (updateGifts) {
                slide.find(".numberInput").val(currentCount + 1);
                slide.find(".minusButton").attr("disabled", false);
                slide.find(".card-input").prop("checked", true);
            }
        } else {
        }
    });
    // Handle decrementing gift selections
    $(document).on("click", ".minusButton", function () {
        let slide = $(this).closest(".swiper-slide");
        let selectedCategory = slide.data("amount").toString();
        let inputField = $(this).siblings(".numberInput");
        let currentCount = parseInt(inputField.val());

        let giftId = inputField.data("giftid");
        let giftTitle = inputField.data("gifttitle");
        updateLocalStorageMinus(
            selectedCategory,
            giftId,
            giftTitle,
            currentCount - 1
        );

        $(".swiper-gift .swiper-wrapper")
            .find(".plusButton")
            .attr("disabled", false);
        $(".swiper-gift .swiper-wrapper")
            .find(".selectButton")
            .attr("disabled", false);
        // Decrement the count if it's greater than 0
        if (currentCount > 0) {
            inputField.val(currentCount - 1); // Decrease the count
            // Re-enable the plus button
            // slide.find(".selectButton").prop("disabled", false);
            if (currentCount - 1 === 0) {
                slide.find(".show_select_gift").hide();
                $(this).attr("disabled", true);
                slide.find(".selectButton").show();
                slide.find(".card-input").prop("checked", false);
            }
        }
    });

    function updateLocalStorage(amount, giftId, giftTitle, count) {
        let currentDonationAmount = parseInt(
            sessionStorage.getItem("usd_amount_Session")
        );
        $(".gift-info").text("");
        if (amount > currentDonationAmount) {
            /*$(".gift-info").html(
        "You are not eligible for this gift category. Please choose another ticket option <br><a id='gift-btn' href='#ticketOptionsSection' class='btn ' style='font-size: 14px;padding: 8px 17px;margin-top: 11px'>  Click to choose a different package</a>"
      );*/
            displayPotSectionAlerts(
                "You are not eligible for this gift category. Please choose another ticket option."
            );
            return;
        }

        let storedData = JSON.parse(localStorage.getItem("giftSelections")) || {
            donationAmount: currentDonationAmount,
            gifts: {},
            giftsdata: {},
        };
        if (count > 0) {
            storedData.giftsdata[giftId] = {
                giftId: giftId,
                Giftamount: amount,
                title: giftTitle,
                count: count,
                donationAmount: currentDonationAmount,
            };
        }

        if (currentDonationAmount !== (storedData.donationAmount || null)) {
            storedData = {
                donationAmount: currentDonationAmount,
                gifts: {},
                giftsdata: {},
            };
        }
        if (count == 0) {
            delete storedData.gifts[giftId];
            delete storedData.giftsdata[giftId];
        }
        if (
            isValidSelection(
                currentDonationAmount,
                amount,
                storedData.giftsdata
            )
        ) {
            if (count > 0) {
                storedData.gifts[giftId] = {
                    giftId: giftId,
                    Giftamount: amount,
                    title: giftTitle,
                    count: count,
                    donationAmount: currentDonationAmount,
                };
            }
            localStorage.setItem("giftSelections", JSON.stringify(storedData));
            updateGiftsCart();
            return true;
        } else {
            // alert("Your selection does not match the donation rules.");
            displayMaxSelections();
            updateGiftsCart();
            return false;
        }
    }

    function updateLocalStorageMinus(amount, giftId, giftTitle, count) {
        let currentDonationAmount = parseInt(
            sessionStorage.getItem("usd_amount_Session")
        );

        let storedData = JSON.parse(localStorage.getItem("giftSelections")) || {
            donationAmount: currentDonationAmount,
            gifts: {},
            giftsdata: {},
        };

        if (currentDonationAmount !== (storedData.donationAmount || null)) {
            storedData = {
                donationAmount: currentDonationAmount,
                gifts: {},
                giftsdata: {},
            };
        }
        if (count == 0) {
            delete storedData.gifts[giftId];
            delete storedData.giftsdata[giftId];
        }

        if (count > 0) {
            storedData.gifts[giftId] = {
                giftId: giftId,
                Giftamount: amount,
                title: giftTitle,
                count: count,
                donationAmount: currentDonationAmount,
            };
        }
        if (count > 0) {
            storedData.giftsdata[giftId] = {
                giftId: giftId,
                Giftamount: amount,
                title: giftTitle,
                count: count,
                donationAmount: currentDonationAmount,
            };
        }
        localStorage.setItem("giftSelections", JSON.stringify(storedData));
        updateGiftsCart();
        return true;
    }

    function isValidSelection(donationAmount, giftAmount, currentSelections) {
        const counts = {};
        Object.values(currentSelections).forEach((selection) => {
            const amount = selection.Giftamount;
            const amountCount = selection.count;
            counts[amount] = (counts[amount] || 0) + amountCount;
        });

        let amount = categorizeDonation(donationAmount);

        switch (amount) {
            case 1800:
                return (
                    (counts["500"] || 0) +
                    (counts["375"] || 0) +
                    (counts["250"] || 0) +
                    (counts["180"] || 0) +
                    (counts["100"] || 0) <=
                    4
                );

            case 1000:
                return (
                    (counts["500"] || 0) <= 2 &&
                    (counts["375"] || 0) +
                    (counts["250"] || 0) +
                    (counts["180"] || 0) +
                    (counts["100"] || 0) +
                    (counts["500"] || 0) <=
                    3
                );
            case 500:
                return (
                    ((counts["500"] || 0) === 1 &&
                        (counts["375"] || 0) === 0 &&
                        (counts["180"] || 0) === 0 &&
                        (counts["250"] || 0) === 0 &&
                        (counts["100"] || 0) === 0) ||
                    ((counts["500"] || 0) === 0 &&
                        (counts["375"] || 0) +
                        (counts["250"] || 0) +
                        (counts["180"] || 0) +
                        (counts["100"] || 0) <=
                        2)
                );
            case 375:
                return (
                    ((counts["375"] || 0) === 1 &&
                        (counts["250"] || 0) === 0 &&
                        (counts["180"] || 0) === 0 &&
                        (counts["100"] || 0) === 0) ||
                    ((counts["375"] || 0) === 0 &&
                        (counts["250"] || 0) +
                        (counts["180"] || 0) +
                        (counts["100"] || 0) <=
                        2)
                );
            case 250:
                return (
                    ((counts["250"] || 0) === 1 &&
                        (counts["100"] || 0) === 0 &&
                        (counts["180"] || 0) === 0) ||
                    ((counts["250"] || 0) === 0 &&
                        (counts["100"] || 0) + (counts["180"] || 0) <= 2)
                );

            case 180:
                return (
                    ((counts["180"] || 0) === 1 &&
                        (counts["100"] || 0) === 0) ||
                    ((counts["180"] || 0) === 0 && (counts["100"] || 0) <= 2)
                );
            case 100:
                return counts["100"] <= 1;
            default:
                return false;
        }
    }
    function categorizeDonation(donationAmount) {
        if (donationAmount >= 100 && donationAmount < 180) return 100;
        else if (donationAmount >= 180 && donationAmount < 250) return 180;
        else if (donationAmount >= 250 && donationAmount < 375) return 250;
        else if (donationAmount >= 375 && donationAmount < 500) return 375;
        else if (donationAmount >= 500 && donationAmount < 1000) return 500;
        else if (donationAmount >= 1000 && donationAmount < 1800) return 1000;
        else if (donationAmount >= 1800) return 1800;
        else return donationAmount;
    }
    //// gifts options logic end

    //Populate about campaign
    $(".about-campaign .section-title").text(siteContent.aboutCampaign.heading);
    // $(".about-campaign__info p").text(siteContent.aboutCampaign.text);
    $(".about-campaign .btn").attr(
        "href",
        siteContent.aboutCampaign.button[0].link
    );
    $(".about-campaign .btn").text(siteContent.aboutCampaign.button[0].text);
    //Render gallery slides
    function renderGallerySlides() {
        const isMediaVideo = (url) => {
            const videoExtensions = ["mp4", "webm", "ogg"];
            const extension = url.split(".").pop().toLowerCase();
            return videoExtensions.includes(extension);
        };

        const GalleryItem = ({ id, imageURL, linkUrl, title, embedUrl }) => {
            let media = embedUrl;
            if (embedUrl == null) {
                const mediaElement = isMediaVideo(imageURL)
                    ? `<video controls style="max-width: 100%;height: 100%;" preload="none"><source src="${imageURL}" type="video/${imageURL
                        .split(".")
                        .pop()
                        .toLowerCase()}">Your browser does not support the video tag.</video>`
                    : `<img src="${imageURL}" alt=""   height: auto;">`;
                media = mediaElement;
            }

            return `
        <div class="swiper-slide" data-id="${id}">
          <a href="${linkUrl}" class="swiper-slide gallery-item no-pointer" onclick="event.preventDefault();">
            <span class="gallery-item__media">
              ${media}
            </span>
            <span class="gallery-item__description">
              <p>${title}</p>
            </span>
          </a>
        </div>`;
        };
        if (siteContent.gallery.length < 1) {
            $(".gallery").hide();
        }
        $(".gallery-grid").html(siteContent.gallery.map(GalleryItem).join(""));
    }

    //Swiper-gallery
    let swiperGalleryInit = false;
    let swiperGallery;

    function gallerySwiper() {
        if ($(window).width() <= 767 && $(".swiper-gallery").length) {
            if (!swiperGalleryInit) {
                swiperGalleryInit = true;
                swiperGallery = new Swiper(".swiper-gallery", {
                    slidesPerView: 1,
                    spaceBetween: 40,
                    grid: {
                        rows: 1,
                    },
                    navigation: {
                        nextEl: ".swiper-gallery-button-next",
                        prevEl: ".swiper-gallery-button-prev",
                    },
                });
            }
        } else if (swiperGalleryInit) {
            swiperGallery.destroy();
            swiperGalleryInit = false;
        }
    }
    gallerySwiper();
    $(window).on("resize", gallerySwiper);

    function displayDonations(donations) {
        var index = 0;

        toastr.options = {
            positionClass: "toast-top-right",
            preventDuplicates: true,
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            timeOut: 5000,
        };

        // setInterval(function () {
        var recentDonations = [];
        var currentTime = new Date(
            new Date().toLocaleString("en-US", { timeZone: "America/New_York" })
        ).getTime();
        donations.forEach(function (donation) {
            var donationDate = new Date(donation.date_added).getTime();

            if (currentTime - donationDate <= 25000) {
                let donorName = donation.fname;
                if (donation.is_anonymous == 1) {
                    donorName = "Anonymous";
                }
                let teamInfo = "";
                if (donation.team_id > 0) {
                    teamInfo = "with " + donation.display_name;
                }
                recentDonations.push(
                    `<div><b>${donorName}</b> just donated <b>${formatCurrency(
                        donation.amount
                    )} ${teamInfo} </b></div>`
                );
            }
        });

        recentDonations.forEach(function (donationText, donationIndex) {
            toastr.info(donationText, "", { iconClass: "toast-info-noicon" });
        });

        index = 0;
        // }, 15000);
    }

    function setDonorsHeight() {
        function getEl() {
            const windowWidth = $(window).width();
            let index = 2;

            if (windowWidth > 1203) {
                index = 8;
            } else if (windowWidth < 1204 && windowWidth > 767) {
                index = 6;
            }
            return $(`.donors-grid .donor-card:eq(${index})`);
        }

        const container = $(".donors-grid");
        const el = getEl();

        if (el.length === 0) return;

        const elHeight = el.outerHeight();
        const distanceToContainerTop = el.offset().top - container.offset().top;
        const containerHeight = Math.ceil(elHeight + distanceToContainerTop);
        container.css("max-height", containerHeight);
    }

    setDonorsHeight();

    const ticketId = sessionStorage.getItem("ticket_id");
    let customAmount = null;

    if (sessionStorage.getItem("custom_amount")) {
        customAmount = sessionStorage.getItem("custom_amount");
    }

    $(`.option-card[data-id='${ticketId}'] input[name='option-card']`).prop(
        "checked",
        true
    );
    $(`.option-card[data-id='${ticketId}']`).click();

    if (customAmount) {
        sessionStorage.setItem("custom_amount", customAmount);
        $("#customAmountCard").addClass("selected").val(customAmount);
        $("#customAmount").val(customAmount);
        $("#customAmount").trigger("input");
    }

    function getCurrencySymbol(currencyCode) {
        const currencySymbols = {
            USD: "$",
            CAD: "C$",
            EUR: "€",
            ILS: "₪",
            GBP: "£",
        };

        return currencySymbols[currencyCode] || currencyCode;
    }

    // function fetchAndDisplayDonations() {
    //     let baseURL = $("#baseURL").val();
    //     let causeId = $("#causeID").val();

    //     $.ajax({
    //         url:
    //             baseURL +
    //             "/actions/donation-actions.php?userAction=getLatestDonations&causeID=" +
    //             causeId,
    //         method: "GET",
    //         dataType: "json",
    //         success: function (response) {
    //             if (response) {
    //                 displayDonations(response);
    //             }
    //         },
    //         error: function (error) {
    //             console.error("Error fetching donations:", error);
    //         },
    //     });
    // }

    // if (!isThankYouPage()) {
    //     setInterval(fetchAndDisplayDonations, 15000);
    // }

    function isThankYouPage() {
        return window.location.href.includes("thank-you");
    }

    function updateGiftsCart() {
        let storedData = JSON.parse(localStorage.getItem("giftSelections"));

        $(".selected-gifts .cart__summary-list").text("");
        let baseURL = $("#baseURL").val();
        $(".notify_amount").css("display", "none");
        $(".gifts-quantity").parent().addClass("hidden");
        if (storedData && storedData.gifts !== undefined) {
            const giftsData = storedData.gifts;
            $(".selected-gifts").css("display", "block");
            $("#gift-btn").css("display", "none");

            let aggregatedCounts = {};
            let totalGifts = 0;
            for (const itemId in giftsData) {
                if (giftsData.hasOwnProperty(itemId)) {
                    const gift = giftsData[itemId];
                    let giftCounts;
                    const { giftId, Giftamount, count, title } =
                        giftsData[itemId];
                    $(".selected-gifts .cart__summary-list").prepend(
                        $("<li>").text(`${count} ${title} `)
                    );
                    if (!aggregatedCounts[Giftamount]) {
                        aggregatedCounts[Giftamount] = count;
                    } else {
                        aggregatedCounts[Giftamount] += count;
                    }
                    $(".swiper-slide").each(function () {
                        const slideGiftId = $(this).data("id");
                        if (slideGiftId === giftId) {
                            $(this).find(".numberInput").val(count);
                            $(this).find(".card-input").prop("checked", true); // Optional: Check the checkbox if needed
                            $(this).find(".selectButton").hide();
                            $(this).find(".show_select_gift").show();
                        }
                    });

                    totalGifts += count;
                }
            }

            for (const Giftamount in aggregatedCounts) {
                const totalcount = aggregatedCounts[Giftamount];
                let $existingElement = $(
                    `.amountTabsButtons[data-amounttab='${Giftamount}'] .notify_amount`
                );

                if ($existingElement.length) {
                    $existingElement.html(totalcount);
                    $existingElement.css("display", "block");
                } else {
                    $existingElement.css("display", "none");
                }
            }
            $(".gifts-quantity").text(`${totalGifts} Gifts`);
            $(".gifts-quantity").parent().removeClass("hidden");

            // $.post(
            //     baseURL + "/actions/donation-actions.php",
            //     {
            //         userAction: "giftsCart",
            //         giftsData: JSON.stringify(giftsData),
            //     },
            //     function (data) {}
            // );
            if (Object.keys(storedData.gifts).length === 0) {
                $(".selected-gifts").css("display", "none");
                $("#gift-btn").css("display", "block");
                return;
            }
        } else {
            // $.post(
            //     baseURL + "/actions/donation-actions.php",
            //     {
            //         userAction: "giftsCart",
            //         giftsData: {},
            //     },
            //     function (data) {}
            // );
        }
    }

    updateGiftsCart();

    function displayMaxSelections() {
        const message = "Maximum selections reached for this category.";

        toastr.options = {
            positionClass: "toast-bottom-center toast-black",
            preventDuplicates: true,
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            timeOut: 5000,
        };

        toastr.info(message, "", { iconClass: "toast-info-noicon" });
    }

    function displayPotSectionAlerts(alertMessage) {
        const message = alertMessage;
        toastr.options = {
            positionClass: "toast-bottom-center toast-black",
            preventDuplicates: true,
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            timeOut: 5000,
        };
        toastr.info(message, "", { iconClass: "toast-info-noicon" });
    }

    function showChooseInfo(amount) {
        return;
        const amountToInfo = [
            { limit: 100, message: "Select 1 gift from the $100 category" },
            {
                limit: 180,
                message:
                    "Select <mark>1 gift</mark> from the <mark>$180 category</mark>, or <mark>2 gifts</mark> from the $100 category</mark>",
            },
            {
                limit: 250,
                message:
                    "Select 1 gift from the $250 category, or 1 each from the $100 and $180 categories",
            },
            {
                limit: 375,
                message:
                    "Select 1 gift from the $375 category, or 2 from the $100-$250 categories",
            },
            {
                limit: 500,
                message:
                    "Select 1 gift from the $500 category, or mix and match 2 gifts from the $100-$375 categories",
            },
            {
                limit: 1000,
                message:
                    "Choose 3 gifts: Up to 2 can be from the $500 category, the rest from any combination of the $100-$375 categories.",
            },
            {
                limit: 1800,
                message:
                    "Choose 4 gifts: Up to 2 can be from the $500 category, the rest from any combination of the $100-$375 categories.",
            },
        ];

        if (typeof amount !== "number") {
            console.log("Invalid amount: Amount must be a number.");
            return;
        }

        let info = "Please select a valid gift category amount.";
        for (let i = 0; i < amountToInfo.length; i++) {
            if (
                amount >= amountToInfo[i].limit &&
                (i === amountToInfo.length - 1 ||
                    amount < amountToInfo[i + 1].limit)
            ) {
                info = amountToInfo[i].message;
                break;
            }
        }

        $(".gift-info-choose").html(info);
    }

    $(document).on("click", ".prize-split__btn", function () {
        $(".selected-pot-prizes").css("display", "none");

        let orignalAmount = parseInt(
            sessionStorage.getItem("usd_amount_Session")
        );

        if (isNaN(orignalAmount)) {
            orignalAmount = 0;
        }
        if ($("#usd_amount").val() == "") {
            $("#donate_amount").val("0");
            $("#usd_amount").val("0");
        }
        let usdamount = parseInt($("#usd_amount").val());
        var CurrencySymbol =
            $("#multi_currency").val() == "1"
                ? $("#currency-select option:selected").text().trim()
                : "$";

        let PotPackagePrice = parseInt($(this).data("price"));
        let PotPackageUSDPrice = parseInt($(this).data("usd-price"));
        let PotPackageEntries = $(this).data("entries").toString();

        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(".cart__summary-btn").removeClass("stp");
            if (orignalAmount < 1) {
                $("#customAmount").val(0).trigger("input");
            }

            $("#donate_amount").val(orignalAmount);
            $("#usd_amount").val(orignalAmount);
            $("#only_donation").val(orignalAmount);
            sessionStorage.removeItem("stp_prize");
            $("#prize_split_amount").val("");
            $("#prize_split_usd_amount").val("");
            $("#prize_split_entries").val("");
            $(".pot-section-title").html("Choose a Pot to Split");
            $(".pot-entries-count").html("");
            $(".cart__summary-list.pot-prizes-count").html("");
            $(".selected-pot-prizes").css("display", "none");
            $(".pot-quantity").parent().addClass("hidden");
        } else {
            if (orignalAmount < 1) {
                $(".js-cart-summary-amount").html(
                    `${siteContent.cart.ticketsTitle} <span>${formatCurrency(
                        PotPackagePrice
                    )}</span>`
                );
            }
            $(".prize-split__btn").removeClass("active");
            $(this).addClass("active");
            $(".cart__summary-btn").addClass("stp");
            $("#prize_split_amount").val(PotPackagePrice);
            $("#prize_split_usd_amount").val(PotPackageUSDPrice);
            $("#prize_split_entries").val(PotPackageEntries);
            let cartEntries = PotPackageEntries > 1 ? "entries" : "entry";
            $(".pot-section-title").html("Split the Pot");
            $(".pot-entries-count").html(PotPackageEntries + " " + cartEntries);
            $(".cart__summary-list.pot-prizes-count").html(
                "<li>" +
                CurrencySymbol +
                PotPackagePrice +
                " for " +
                PotPackageEntries +
                " " +
                cartEntries +
                "</li>"
            );
            // $(".selected-pot-prizes").css("display", "block");
            $(".selected-pot-prizes").css("display", "block");
            $(".pot-quantity").parent().removeClass("hidden");
            $(".pot-quantity").html(PotPackageEntries + " " + cartEntries);
            $("#donate_amount").val(orignalAmount + PotPackagePrice);
            $("#usd_amount").val(orignalAmount + PotPackagePrice);
            $("#only_donation").val(orignalAmount);
            sessionStorage.setItem("stp_prize", PotPackageUSDPrice);
        }
        setTimeout(function () {
            // showPaymentSection();
            $(".cart").show();
        }, 300);
    });

    //Render Sponsorship opportunities
    function renderSponsorship() {
        const Sponsorship = ({ id, imageURL, title, amount }) => `
      <div class="swiper-slide" data-id="${id}">
        <div class="sponsorship-card">
          <div class="sponsorship-img">
            <img class="sponsorship-img--background" src=${imageURL} alt="">
            <img class="sponsorship-img--main" src=${imageURL} alt="">
          </div>
          <div class="sponsorship-title">
            <p>${title}</p>
          </div>
          <button  data-amount=${amount} class="btn overlay sponsorship-btn">${formatCurrency(
            amount,
            0,
            0
        )}</button>
        </div>
      </div>`;
        if (siteContent.sponsorship.length > 0) {
            $(".swiper-sponsorship .swiper-wrapper").html(
                siteContent.sponsorship.map(Sponsorship).join("")
            );
        } else {
            $(".sponsorship").hide();
        }
    }

    function handleSponserShips() {
        $(".swiper-sponsorship .swiper-slide.selected").removeClass("selected");
        $("#sponsor_oppertunity").val("");
        $(".selected-sponsorship-opportunities").css("display", "none");
    }
    $(".swiper-sponsorship .swiper-wrapper").on(
        "click",
        ".sponsorship-btn",
        function () {
            const parentSlide = $(this).closest(".swiper-slide");
            const isSelected = parentSlide.hasClass("selected");

            $(".swiper-slide").removeClass("selected");

            if (!isSelected) {
                parentSlide.addClass("selected");
            }
            let sponserAmount = $(this).data("amount");
            let title = $(this)
                .closest(".sponsorship-card")
                .find(".sponsorship-title p")
                .html();
            if (!isSelected) {
                $("#customAmount").val(sponserAmount);
                $("#sponsor_oppertunity").val(title);
                $("#customAmount").trigger("input");
                $(".selected-sponsorship-opportunities").css(
                    "display",
                    "block"
                );
                $(".sop-section-title").html("Sponsorship");
                $(".sop-selected-title").html(title);
                $(".cart__summary-list.sop-selected-amount").html(
                    "<li>$" + sponserAmount + "</li>"
                );
            } else {
                handleSponserShips();
                $("#customAmount").val(0);
                $("#customAmount").trigger("input");
                sessionStorage.removeItem("usd_amount_Session");
            }
        }
    );
    function formatedDate(dateString) {
        const date = new Date(dateString);
        const now = new Date();

        const diffInMs = now - date;
        const diffInSeconds = Math.floor(diffInMs / 1000);
        const diffInMinutes = Math.floor(diffInSeconds / 60);
        const diffInHours = Math.floor(diffInMinutes / 60);
        const diffInDays = Math.floor(diffInHours / 24);

        if (diffInSeconds < 60) {
            return `${diffInSeconds}s ago`;
        } else if (diffInMinutes < 60) {
            return `${diffInMinutes}m ago`;
        } else if (diffInHours < 24) {
            return `${diffInHours}h ago`;
        } else if (diffInDays < 7) {
            return `${diffInDays} day${diffInDays > 1 ? "s" : ""} ago`;
        } else if (date.getFullYear() === now.getFullYear()) {
            return `${date.toLocaleString("en-US", {
                month: "short",
            })} ${date.getDate()}`;
        } else {
            return `${date.toLocaleString("en-US", {
                month: "short",
            })} ${date.getDate()} '${date.getFullYear() % 100}`;
        }
    }

    // new Swiper(".swiper-sponsorship", {
    //     slidesPerView: 1,
    //     spaceBetween: 20,
    //     navigation: {
    //         nextEl: ".swiper-sponsorship-button-next",
    //         prevEl: ".swiper-sponsorship-button-prev",
    //     },
    //     breakpoints: {
    //         575: {
    //             slidesPerView: 2,
    //         },
    //         992: {
    //             slidesPerView: 3,
    //         },
    //     },
    // });

    $("#tipCustomAmount").on("blur", function () {
        this.value = this.value.replace(/^0+(?!\.)/, "");
        const validNumber = /^[0-9]*\.?[0-9]{0,2}$/;
        if (!validNumber.test(this.value)) {
            this.value = this.value.slice(0, -1);
        }

        if (parseFloat(this.value) < 1 && !this.value.startsWith("0.")) {
            this.value = "";
        }

        if (this.value !== "") {
            this.value = parseFloat(this.value).toFixed(2);
        }
    });

    function calculateTotalTipsAmount() {
        let total = 0;
        $(".selected-tips .cart__summary-list li").each(function () {
            const text = $(this).text();
            const amount = parseFloat(
                text.split("for")[0].replace(/[^0-9.-]+/g, "")
            );
            if (!isNaN(amount)) {
                total += amount;
            }
        });
        if (total > 0) {
            $("#total-tips-amount").text(formatCurrency(total));
            $("#donateNow").hide();
        } else {
            $("#total-tips-amount").text("");
            $("#donateNow").show();
        }
    }
});
