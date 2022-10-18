
window.onscroll = function () {
    myFunction()
};

function myFunction() {
    if (document.documentElement.scrollTop > 150) {
        document.querySelector("nav").classList.add("nav-bg");
    }else{
        document.querySelector("nav").classList.remove("nav-bg");
    }
}

let hamMenu = document.querySelector('.navbar-toggler');

hamMenu.addEventListener('click', () => {
    hamMenu.classList.toggle('navbar_toggler');
    document.querySelector('nav').classList.toggle('header-bg');
});