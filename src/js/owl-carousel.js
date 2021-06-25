require('owl.carousel');

document.addEventListener('DOMContentLoaded', function (){
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 15000,
        dots: false,
        nav: false,
    });
});