// header slider navbar functionality start
function displayMenu() {
  document.querySelector(".offcanvas-menu").classList.remove("hidden");
}

function hideMenu() {
  document.querySelector(".offcanvas-menu").classList.add("hidden");
}
// header slider navbar functionality end

// featured slider functionality start
// let slider = document.getElementById("slider");
// let images = slider.getElementsByTagName("img");
// let imageWidth = images[0].width;
// let currentIndex = 0;

// function scrollSlider() {
//   currentIndex++;
//   if (currentIndex >= images.length) {
//     currentIndex = 5;
//     slider.scrollLeft = imageWidth * 5;
//   } else {
//     slider.scrollLeft += imageWidth;
//   }
// }

// setInterval(scrollSlider, 1000);
//featured slider functionality end

// media cards scroll functionality start
const mediaAllCardsContainer = document.getElementById(
  "mediaAllCardsContainer"
);
const leftArrow = document.querySelector(".left-arrow");
const rightArrow = document.querySelector(".right-arrow");
const cardWidth = document.querySelector(".media-card").offsetWidth;

rightArrow.addEventListener("click", () => {
  mediaAllCardsContainer.scrollBy({
    left: cardWidth,
    behavior: "smooth",
  });
});

leftArrow.addEventListener("click", () => {
  mediaAllCardsContainer.scrollBy({
    left: -cardWidth,
    behavior: "smooth",
  });
});

mediaAllCardsContainer.addEventListener("scroll", function () {
  if (mediaAllCardsContainer.scrollLeft === 0) {
    leftArrow.style.backgroundColor = "transparent";
    leftArrow.style.border = "1px solid black";
    leftArrow.style.color = "black";
  } else {
    leftArrow.style.backgroundColor = "#1d6e65";
    leftArrow.style.border = "none";
    leftArrow.style.color = "white";
  }
  if (
    mediaAllCardsContainer.scrollLeft + mediaAllCardsContainer.offsetWidth >=
    mediaAllCardsContainer.scrollWidth
  ) {
    rightArrow.style.backgroundColor = "transparent";
    rightArrow.style.border = "1px solid black";
    rightArrow.style.color = "black";
  } else {
    rightArrow.style.backgroundColor = "#1d6e65";
    rightArrow.style.border = "none";
    rightArrow.style.color = "white";
  }
});
// media cards scroll functionality end

// blog card scroll functionality start
const blogCardContainer = document.querySelector(".blog-cards-wrap");
const blogLeftArrow = document.querySelector(".blog-left-arrow");
const blogRightArrow = document.querySelector(".blog-right-arrow");
const blogCard = document.querySelector(".blog-card").offsetWidth;

blogRightArrow.addEventListener("click", () => {
  blogCardContainer.scrollBy({
    left: blogCard,
    behavior: "smooth",
  });
});

blogLeftArrow.addEventListener("click", () => {
  blogCardContainer.scrollBy({
    left: -blogCard,
    behavior: "smooth",
  });
});
// blog card scroll functionality end

$(document).ready(function(){
  $('.customer-logos').slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 1500,
      arrows: false,
      dots: false,
      pauseOnHover: false,
      responsive: [{
          breakpoint: 768,
          settings: {
              slidesToShow: 4
          }
      }, {
          breakpoint: 520,
          settings: {
              slidesToShow: 3
          }
      }]
  });
});
