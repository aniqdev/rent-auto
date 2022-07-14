/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import PerfectScrollbar from 'perfect-scrollbar';
import VueApexCharts from 'vue-apexcharts';
import VCalendar from 'v-calendar';
import counterUp from 'counterup2';

window.Vue = require('vue').default;

console.log('Hi from admin js');

Vue.use(VueApexCharts);
Vue.use(VCalendar, {
    screens: {
        tablet: '576px',
        laptop: '1200px',
        desktop: '1380px',
    }
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('apexchart', VueApexCharts);
Vue.component('search-form', require('./components/SearchFormComponent.vue').default);
Vue.component('reservation-calendar', require('./components/ReservationCalendarComponent.vue').default);
Vue.component('category-chart', require('./components/DashCategoryChartComponent.vue').default);
Vue.component('caravan-chart', require('./components/DashCaravanChartComponent.vue').default);
Vue.component('reservation-chart', require('./components/DashReservationChartComponent.vue').default);
Vue.component('accessories-index', require('./components/AccessorySortComponent.vue').default);
Vue.component('categories-index', require('./components/CaravanCategorySortComponent.vue').default);
Vue.component('caravans-index', require('./components/CaravanSortComponent.vue').default);
Vue.component('tabs-index', require('./components/TabSortComponent.vue').default);
Vue.component('reservation-status-select', require('./components/ReservationStatusSelectComponent.vue').default);
Vue.component('photo-manager', require('./components/GalleryComponent.vue').default);
Vue.component('admin-reservation-calendar', require('./components/AdminCustomCalendar.vue').default);
Vue.component('caravan-earnings', require('./components/CaravanEarningsChart.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

const csrf_token = document.querySelector('meta[name="csrf-token"]').content;

//axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover({
        trigger: 'focus'
    });
});



/* const counter = document.querySelector('.counter');

counterUp(counter, {
    duration: 1000,
    delay: 16,
}); */

document.querySelectorAll('.ps').forEach((e) => {
    console.log(e);
    new PerfectScrollbar(e, {
        wheelPropagation: true,
    });
});

const searchContainer = new PerfectScrollbar('.ps', {
    wheelPropagation: true,
});

const ps = new PerfectScrollbar('#kt_aside_menu', {
    wheelPropagation: true,
});

window.addEventListener('load', function() {
    ps.update();
});

window.addEventListener('resize', function() {
    const aside_menu = document.getElementById('kt_aside_menu');
    const aside_menu_height = window.innerHeight - document.getElementById('kt_brand').offsetHeight - 10;

    aside_menu.style.height = aside_menu_height + 'px';

    ps.update();
});

var bodyElement = document.querySelector('body');
const aside_toggler = document.querySelector('#kt_aside_toggle');
const aside_mobile_toggler = document.querySelector('#kt_aside_mobile_toggle');
const aside = document.querySelector('#kt_aside');

aside_toggler.addEventListener('click', function() {
    if (bodyElement.classList.contains('aside-minimize')) {
        bodyElement.classList.remove('aside-minimize');
        localStorage.setItem('aside-state', 'normal');
    } else {
        bodyElement.classList.add('aside-minimize');
        localStorage.setItem('aside-state', 'minimize');
    }
});

aside_mobile_toggler.addEventListener('click', function() {
    if (bodyElement.classList.contains('aside-minimize')) {
        bodyElement.classList.remove('aside-minimize');
        aside.classList.remove('aside-on');
        localStorage.setItem('aside-state', 'normal');
    } else {
        bodyElement.classList.add('aside-minimize');
        aside.classList.add('aside-on');
        localStorage.setItem('aside-state', 'minimize');
    }
});

if (localStorage.getItem('aside-state') == 'minimize') {
    bodyElement.classList.add('aside-minimize');
}

document.querySelectorAll('.menu-toggle').forEach(item => {
    item.addEventListener('click', function(event) {
        var child = item.parentElement.querySelector('.menu-submenu');

        if(item.parentElement.classList.contains('menu-item-open')) {
            item.parentElement.classList.remove('menu-item-open');
            child.style.display = 'none';
        } else {
            item.parentElement.classList.add('menu-item-open');
            child.style.display = 'block';
        }
        //item.classList.add('menu-item-open');
        //event.target.classList.add('menu-item-open');
    });

    if(item.parentElement.classList.contains('menu-item-active')) {
        item.parentElement.classList.add('menu-item-open');
        var child = item.parentElement.querySelector('.menu-submenu');
        child.style.display = 'block';
    }
});

tinymce.init({
    selector: '.tinyeditor',
    deprecation_warnings: false,
    plugins: ['quickbars', 'textcolor', 'lists', 'table', 'link', 'image', 'autoresize', 'code'],
    menubar: false,
    toolbar: 'undo redo | code | link bullist image | table tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
    branding: false,
    contextmenu: 'link table',
    inline: true,
    quickbars_insert_toolbar: false,
    quickbars_selection_toolbar: 'bold italic underline | forecolor backcolor | fontsizeselect',
    min_height: 240,
    autoresize: true,
    skin: 'oxide-dark',
    file_picker_types: 'image media',
    file_picker_callback: function(cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        input.onchange = function () {
            var file = this.files[0];

            var reader = new FileReader();
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
        };

        input.click();
    },
    images_upload_handler: function(blobInfo, success, failure) {
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '/admin/uploadImg');
        xhr.onload = function() {
            var json;
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
            json = JSON.parse(xhr.responseText);

            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
            success(json.location);
        };
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    },
    automatic_uploads: true,
});



const action_buttons = document.querySelectorAll('.control-btn');

action_buttons.forEach((e) => {
    e.addEventListener('click', (element) => {
        let parent = document.querySelector('input[name="' + e.dataset.parent + '"]');
        parent.value = e.dataset.value;
    });
});

const active_checkboxes = document.querySelectorAll('input[data-select="true"]');
console.log(active_checkboxes);
active_checkboxes.forEach((e) => {
    e.addEventListener('click', (element) => {
        let child = document.querySelector(e.dataset.target);
        child.classList.toggle('show');
    });
});


var log = console.log;
window.change_publicity = function (button, event, gallery_id) {
    event.preventDefault()
    log(button.dataset)
    $.post('/admin/galleryUpdate',
        {
            _token: csrf_token,
            gallery_id: gallery_id,
            new_status: button.dataset.public ? 0 : 1,
        }
    ,function (data) {
        if(data.status && data.status === 'ok') {
            if (button.dataset.public) {
                $(button).removeClass('btn-warning').addClass('btn-primary').text('Publikovat')

            }else{
                $(button).removeClass('btn-primary').addClass('btn-warning').text('Odebrat')
            }
            button.dataset.public = button.dataset.public ? '' : 1
        }
    }, 'json')
}


