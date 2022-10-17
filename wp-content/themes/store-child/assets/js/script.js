let hamMenu = document.querySelector('.navbar-toggler');

hamMenu.addEventListener('click', () => {
    hamMenu.classList.toggle('navbar_toggler');
    document.querySelector('nav').classList.toggle('header-bg');
});



const swiper = new Swiper('.mySwiper', {
    slidesPerView: 1,
    spaceBetween: 10,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    // Responsive breakpoints
    breakpoints: {
        // when window width is >= 480px
        576: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        // when window width is >= 640px
        768: {
            slidesPerView: 3,
            spaceBetween: 30
        },
        992:{
            slidesPerView: 4,
            spaceBetween: 40
        }
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    }
})


