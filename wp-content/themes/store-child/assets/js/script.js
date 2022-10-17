let hamMenu = document.querySelector('.navbar-toggler');

hamMenu.addEventListener('click', () => {
    hamMenu.classList.toggle('navbar_toggler');
    document.querySelector('nav').classList.toggle('header-bg');
});