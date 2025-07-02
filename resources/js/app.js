import './bootstrap';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';

Swiper.use([Navigation, Pagination, Autoplay]);

document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.noticias-swiper', {
        slidesPerView: 3, // Mostrar 3 slides por vista en desktop
        spaceBetween: 24,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.noticias-swiper .swiper-button-next',
            prevEl: '.noticias-swiper .swiper-button-prev',
        },
        pagination: {
            el: '.noticias-swiper .swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: { slidesPerView: 1 },
            640: { slidesPerView: 1 },
            1024: { slidesPerView: 2 },
            1280: { slidesPerView: 3 }
        }
    });

    new Swiper('.documentos-swiper', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.documentos-swiper .swiper-button-next',
            prevEl: '.documentos-swiper .swiper-button-prev',
        },
        pagination: {
            el: '.documentos-swiper .swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            640: { slidesPerView: 1 },
            1024: { slidesPerView: 2 },
            1280: { slidesPerView: 3 }
        }
    });
});
