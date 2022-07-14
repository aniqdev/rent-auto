/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import VCalendar from 'v-calendar';
import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';
import Vue from 'vue';
import * as Compare from './components/compare';

require('./bootstrap');
require('fslightbox');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.use(VCalendar, {
    screens: {
        tablet: '576px',
        laptop: '1200px',
        desktop: '1380px',
    }
});

Vue.component('separator-bg', require('./components/web/design/SeparatorBg.vue').default);
Vue.component('separator-bg-light', require('./components/web/design/SeparatorBgLight.vue').default);
Vue.component('trees-bg', require('./components/web/design/TreesBg.vue').default);

Vue.component('bicycle-icon', require('./components/web/design/icons/BicycleIcon.vue').default);
Vue.component('license-icon', require('./components/web/design/icons/LicenseIcon.vue').default);
Vue.component('person-icon', require('./components/web/design/icons/PersonIcon.vue').default);
Vue.component('shower-icon', require('./components/web/design/icons/ShowerIcon.vue').default);
Vue.component('toilet-icon', require('./components/web/design/icons/ToiletIcon.vue').default);

// Vue.component('date-picker', require('./components/web/reservation/DatePicker.vue').default);
Vue.component('date-picker-tenerife', require('./components/web/reservation/DatePickerTenerife.vue').default);
Vue.component('date-picker-praha', require('./components/web/reservation/DatePickerPraha.vue').default);

Vue.component('custom-calendar', require('./components/CustomCalendar.vue').default);
Vue.component('reservation-form', require('./components/web/reservation/ReservationForm.vue').default);
Vue.component('reservation-form-last', require('./components/web/reservation/ReservationFormLast.vue').default);

Vue.component('the-map', require('./components/web/partials/TheMap.vue').default);
/* Vue.component('welcome-popup', require('./components/web/Popup.vue').default); */
/* Vue.component('leave-popup', require('./components/web/LeavePopup.vue').default); */


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
});

$(function () {
    $(document).tooltip({
        selector: '[data-toggle="tooltip"]'
    });
});


var hash = location.hash.replace(/^#/, '');
if(hash) {
    $('.nav.nav-hover a[href="#' + hash + '"]').tab('show');
}

$('.nav.nav-hover a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
});

const swiper = new Swiper('.swiper-container', {
    direction: 'horizontal',
    loop: true,
    centeredSlides: true,
    effect: 'slide',
    coverflowEffect: {
        rotate: 90,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 2,
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 0,
        },
    }
});

const compare = new Swiper('.lineup-compare__data', {
    direction: 'horizontal',
    loop: false,
    slideClass: 'vehicle-item',
    slidesPerView: 2,
    spaceBetween: 20,
    //centeredSlides: true,
    effect: 'slide',

    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
        1296: {
            slidesPerView: 4,
        },
    }
});

const body = document.body;
const triggerMenu = document.querySelector(".header");
const nav = document.querySelector(".header");
const menu = document.querySelector(".header");
const scrollUp = "scroll-up";
const scrollDown = "scroll-down";
let lastScroll = 0;

window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;
    const limitScroll = 448;
    if(currentScroll <= 0) {
        body.classList.remove(scrollUp);
        return;
    }

    if(currentScroll > lastScroll && currentScroll > limitScroll && !body.classList.contains(scrollDown)) {
        body.classList.remove(scrollUp);
        body.classList.add(scrollDown);
    } else if(currentScroll < lastScroll && body.classList.contains(scrollDown)) {
        body.classList.remove(scrollDown);
        body.classList.add(scrollUp);
    }
    lastScroll = currentScroll;
});

const scrollToLinks = document.querySelectorAll('.scroll-to');

scrollToLinks.forEach((link, index) => {
    link.addEventListener('click', scrollToLink);
});

function scrollToLink(e) {
    e.preventDefault();

    const href = this.getAttribute('href');
    const offset = (this.getAttribute('data-offset')) ? this.getAttribute('data-offset') : 0;
    const offsetTop = document.querySelector(href).offsetTop;

    scroll({
        top: offsetTop - offset,
        behavior: 'smooth'
    });
}

const scrollToTop = document.querySelector('#scrollToTop');

if(typeof scrollToTop !== 'undefined' && scrollToTop !== null) {
    scrollToTop.addEventListener('click', function(e) {
        e.preventDefault();

        scroll({
            top: 0,
            behavior: 'smooth'
        });
    });
}


window.addEventListener('load', function() {
    refreshFsLightbox();
});

const megacheckboxs = document.querySelectorAll('.megacheckbox input[type="checkbox"]');

megacheckboxs.forEach(function(megacheckbox) {
    megacheckbox.addEventListener('change', setCheckboxActiveClass);
});

function setCheckboxActiveClass() {
    const parent = this.closest('.megacheckbox');

    if(this.checked) {
        parent.classList.add('active');
    } else {
        parent.classList.remove('active');
    }
}

Compare.autoResize();
