document.addEventListener("DOMContentLoaded", function (event) {
  //Year
  const currentYear = new Date().getFullYear();
  document.getElementById("year").textContent = currentYear;

  //Mobile menu
  document
    .getElementById("hamburgerMenu")
    .addEventListener("click", function () {
      document.getElementById("sideMenu").style.left = "0";
    });

  document.getElementById("closeBtn").addEventListener("click", function () {
    document.getElementById("sideMenu").style.left = "-320px";
  });

  //Swiper brands
  if (document.querySelector(".swiper-brands")) {
    new Swiper(".swiper-brands", {
      loop: true,
      slidesPerView: "auto",
      freeMode: true,
      speed: 2000,
      loopAddBlankSlides: true,
      centeredSlides: true,
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
      },
    });
  }

  //Swiper campaigns
  var init = false;

  function swiperCampaigns() {
    if (
      window.innerWidth <= 991 &&
      document.querySelector(".swiper-campaigns")
    ) {
      if (!init) {
        init = true;
        swiper = new Swiper(".swiper-campaigns", {
          slidesPerView: 1,
          spaceBetween: 20,
          breakpoints: {
            600: {
              slidesPerView: 2,
              spaceBetween: 24,
            },
          },
        });
      }
    } else if (init) {
      swiper.destroy();
      init = false;
    }
  }
  swiperCampaigns();
  window.addEventListener("resize", swiperCampaigns);

  //Swiper media
  if (document.querySelector(".swiper-media")) {
    new Swiper(".swiper-media", {
      slidesPerView: "auto",
      spaceBetween: 20,
      navigation: {
        nextEl: ".media-button-next",
        prevEl: ".media-button-prev",
      },
      breakpoints: {
        768: {
          spaceBetween: 22,
        },
        992: {
          spaceBetween: 26,
        },
      },
    });
  }

  //Swiper sponsorship
  if (document.querySelector(".swiper-sponsorship")) {
    new Swiper(".swiper-sponsorship", {
      slidesPerView: "auto",
      spaceBetween: 23,
      navigation: {
        nextEl: ".sponsorship-button-next",
        prevEl: ".sponsorship-button-prev",
      },
      breakpoints: {
        768: {
          spaceBetween: 28,
        },
      },
    });
  }

  //Swiper blog
  if (document.querySelector(".swiper-blog")) {
    new Swiper(".swiper-blog", {
      slidesPerView: "auto",
      spaceBetween: 20,
      navigation: {
        nextEl: ".blog-button-next",
        prevEl: ".blog-button-prev",
      },
      breakpoints: {
        768: {
          spaceBetween: 24,
        },
        992: {
          spaceBetween: 31,
        },
      },
    });
  }
});


