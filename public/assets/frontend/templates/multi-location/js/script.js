$(document).ready(function () {
    // campaign tabs

    $(function () {
        $(".tab-content_cmampaign:not(:first)").hide();
        $("#tabs-nav .tab-nav-link")
            .bind("click", function (e) {
                $this = $(this);
                $target = $($this.data("target"));
                $("#tabs-nav .tab-nav-link.current").removeClass("current");
                $(".tab-content_cmampaign:visible").fadeOut(
                    "fast",
                    function () {
                        $this.addClass("current");
                        $target.fadeIn("fast");
                    }
                );
            })
            .filter(":first")
            .click();
    });

    // menu
    $(".header_humberger span").on("click", function () {
        $(".header_nav").toggleClass("show");
    });

    if ($(".swiper-sponsorship")) {
        new Swiper(".swiper-sponsorship", {
            slidesPerView: "auto",
            spaceBetween: 15,
            breakpoints: {
                768: {
                    slidesPerView: 5,
                    spaceBetween: 15,
                },
                600: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
                500: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                400: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                300: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
            },
        });
    }

    if ($(".swiper-campaign")) {
        new Swiper(".swiper-campaign", {
            // slidesPerView: "auto",
            spaceBetween: 15,
            // navigation: {
            //     nextEl: ".media-button-next",
            //     prevEl: ".media-button-prev",
            // },
            breakpoints: {
                768: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
                600: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                500: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                400: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                300: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
            },
        });
    }

    if ($(".swiper-Sponsors ")) {
        new Swiper(".swiper-Sponsors ", {
            // slidesPerView: "auto",
            spaceBetween: 15,
            breakpoints: {
                768: {
                    slidesPerView: 5,
                    spaceBetween: 15,
                },
                600: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                500: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                400: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                300: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
            },
        });
    }
});
