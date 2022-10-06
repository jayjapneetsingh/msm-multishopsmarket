// This is a slider JS

// This is a hero slider 
var swiper = new Swiper(".hero-slider", {
  loop:true,
  autoplay: {
    delay: 3000,
  },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });


// this is a card slider in a body

  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop:true,
  autoplay: {
    delay: 3000,
  },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    }
  });
