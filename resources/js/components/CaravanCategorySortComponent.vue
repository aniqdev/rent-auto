<template>
    <draggable v-model="categories" handle=".sort-handler" ghost-class="ghost" @start="drag=true" @end="drag=false" @change="update">
        <transition-group type="transition" :name="!drag ? 'flip-list' : null">
            <div class="card card-custom gutter-b" v-for="category in categories" :key="category.id">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0 mr-7">
                            <div class="symbol symbol-50 symbol-lg-120 symbol-circle">
                                <img :alt="category.name" :src="'../storage/' + category.thumbnail">
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                <div class="mr-3">
                                    <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                        {{ category.name }}
                                    </a>
                                    <div class="d-flex flex-wrap my-2">
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M3.52270623,14.028695 C2.82576459,13.3275941 2.82576459,12.19529 3.52270623,11.4941891 L11.6127629,3.54050571 C11.9489429,3.20999263 12.401513,3.0247814 12.8729533,3.0247814 L19.3274172,3.0247814 C20.3201611,3.0247814 21.124939,3.82955935 21.124939,4.82230326 L21.124939,11.2583059 C21.124939,11.7406659 20.9310733,12.2027862 20.5869271,12.5407722 L12.5103155,20.4728108 C12.1731575,20.8103442 11.7156477,21 11.2385688,21 C10.7614899,21 10.3039801,20.8103442 9.9668221,20.4728108 L3.52270623,14.028695 Z M16.9307214,9.01652093 C17.9234653,9.01652093 18.7282432,8.21174298 18.7282432,7.21899907 C18.7282432,6.22625516 17.9234653,5.42147721 16.9307214,5.42147721 C15.9379775,5.42147721 15.1331995,6.22625516 15.1331995,7.21899907 C15.1331995,8.21174298 15.9379775,9.01652093 16.9307214,9.01652093 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                </g>
                                            </svg>
                                        </span>{{ category.slug }}</a>
                                    </div>
                                </div>
                                <div class="my-lg-0 my-1">
                                    <a :href="'karavany-kategorie/' + category.id + '/edit'" class="btn btn-sm btn-light-primary font-weight-bolder mr-2">Upravit</a>
                                    <form :action="'karavany-kategorie/' + category.id + '/'" method="POST" style="display: inline;">
                                        <input type="hidden" name="_token" :value="csrf">
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submit" class="btn btn-sm btn-danger font-weight-bolder" onclick="return confirm('Vážně si přejete odstranit tuto kategorií?')">Smazat</button>
                                    </form>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap justify-content-between">
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5" v-html="category.short_description"></div>
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-solid my-7"></div>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4 sort-handler">
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M10.4289322,12.3786797 L5.30761184,7.25735931 C4.91708755,6.86683502 4.91708755,6.23367004 5.30761184,5.84314575 C5.69813614,5.45262146 6.33130112,5.45262146 6.72182541,5.84314575 L11.8431458,10.9644661 L18.0355339,4.77207794 C18.4260582,4.38155365 19.0592232,4.38155365 19.4497475,4.77207794 C19.8402718,5.16260223 19.8402718,5.79576721 19.4497475,6.1862915 L13.2573593,12.3786797 L19.4497475,18.5710678 C19.8402718,18.9615921 19.8402718,19.5947571 19.4497475,19.9852814 C19.0592232,20.3758057 18.4260582,20.3758057 18.0355339,19.9852814 L11.8431458,13.7928932 L6.72182541,18.9142136 C6.33130112,19.3047379 5.69813614,19.3047379 5.30761184,18.9142136 C4.91708755,18.5236893 4.91708755,17.8905243 5.30761184,17.5 L10.4289322,12.3786797 Z" fill="#000000" opacity="0.3" transform="translate(12.378680, 12.378680) rotate(-315.000000) translate(-12.378680, -12.378680) "/>
                                            <path d="M3.51471863,12 L5.63603897,14.1213203 C6.02656326,14.6736051 6.02656326,15.1450096 5.63603897,15.5355339 C5.24551468,15.9260582 4.77411016,15.9260582 4.22182541,15.5355339 L0.686291501,12 L4.22182541,8.46446609 C4.69322993,7.99306157 5.16463445,7.99306157 5.63603897,8.46446609 C6.10744349,8.93587061 6.10744349,9.40727514 5.63603897,9.87867966 L3.51471863,12 Z M12,20.4852814 L14.1213203,18.363961 C14.6736051,17.9734367 15.1450096,17.9734367 15.5355339,18.363961 C15.9260582,18.7544853 15.9260582,19.2258898 15.5355339,19.7781746 L12,23.3137085 L8.46446609,19.7781746 C7.99306157,19.3067701 7.99306157,18.8353656 8.46446609,18.363961 C8.93587061,17.8925565 9.40727514,17.8925565 9.87867966,18.363961 L12,20.4852814 Z M20.4852814,12 L18.363961,9.87867966 C17.9734367,9.32639491 17.9734367,8.85499039 18.363961,8.46446609 C18.7544853,8.0739418 19.2258898,8.0739418 19.7781746,8.46446609 L23.3137085,12 L19.7781746,15.5355339 C19.3067701,16.0069384 18.8353656,16.0069384 18.363961,15.5355339 C17.8925565,15.0641294 17.8925565,14.5927249 18.363961,14.1213203 L20.4852814,12 Z M12,3.51471863 L9.87867966,5.63603897 C9.32639491,6.02656326 8.85499039,6.02656326 8.46446609,5.63603897 C8.0739418,5.24551468 8.0739418,4.77411016 8.46446609,4.22182541 L12,0.686291501 L15.5355339,4.22182541 C16.0069384,4.69322993 16.0069384,5.16463445 15.5355339,5.63603897 C15.0641294,6.10744349 14.5927249,6.10744349 14.1213203,5.63603897 L12,3.51471863 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Pozice</span>
                                <span class="font-weight-bolder font-size-h5">{{ category.sort }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M12,19 C15.8659932,19 19,15.8659932 19,12 C19,8.13400675 15.8659932,5 12,5 C8.13400675,5 5,8.13400675 5,12 C5,15.8659932 8.13400675,19 12,19 Z M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M12,9.66666667 C11.3333333,8.64514991 11,7.88126102 11,7.375 C11,6.61560847 11.4477153,6 12,6 C12.5522847,6 13,6.61560847 13,7.375 C13,7.88126102 12.6666667,8.64514991 12,9.66666667 Z M12,14 C12.6666667,15.0215168 13,15.7854056 13,16.2916667 C13,17.0510582 12.5522847,17.6666667 12,17.6666667 C11.4477153,17.6666667 11,17.0510582 11,16.2916667 C11,15.7854056 11.3333333,15.0215168 12,14 Z M14.3333333,12 C15.3548501,11.3333333 16.118739,11 16.625,11 C17.3843915,11 18,11.4477153 18,12 C18,12.5522847 17.3843915,13 16.625,13 C16.118739,13 15.3548501,12.6666667 14.3333333,12 Z M10,12 C8.97848324,12.6666667 8.21459435,13 7.70833333,13 C6.9489418,13 6.33333333,12.5522847 6.33333333,12 C6.33333333,11.4477153 6.9489418,11 7.70833333,11 C8.21459435,11 8.97848324,11.3333333 10,12 Z M13.6499158,10.3500842 C13.9008327,9.15635823 14.2052815,8.38050496 14.5632621,8.02252436 C15.100233,7.48555345 15.8521164,7.36683502 16.2426407,7.75735931 C16.633165,8.1478836 16.5144465,8.89976702 15.9774756,9.43673792 C15.619495,9.79471852 14.8436418,10.0991673 13.6499158,10.3500842 Z M10.5857864,13.4142136 C10.3348695,14.6079395 10.0304208,15.3837928 9.67244018,15.7417734 C9.13546928,16.2787443 8.38358587,16.3974627 7.99306157,16.0069384 C7.60253728,15.6164141 7.72125572,14.8645307 8.25822662,14.3275598 C8.61620722,13.9695792 9.39206049,13.6651305 10.5857864,13.4142136 Z M13.6499158,13.6499158 C14.8436418,13.9008327 15.619495,14.2052815 15.9774756,14.5632621 C16.5144465,15.100233 16.633165,15.8521164 16.2426407,16.2426407 C15.8521164,16.633165 15.100233,16.5144465 14.5632621,15.9774756 C14.2052815,15.619495 13.9008327,14.8436418 13.6499158,13.6499158 Z M10.5857864,10.5857864 C9.39206049,10.3348695 8.61620722,10.0304208 8.25822662,9.67244018 C7.72125572,9.13546928 7.60253728,8.38358587 7.99306157,7.99306157 C8.38358587,7.60253728 9.13546928,7.72125572 9.67244018,8.25822662 C10.0304208,8.61620722 10.3348695,9.39206049 10.5857864,10.5857864 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Karavanů</span>
                                <span class="font-weight-bolder font-size-h5">{{ category.caravans.length }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"></rect>
                                            <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"></rect>
                                            <path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000"></path>
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Výdělek</span>
                                <span class="font-weight-bolder font-size-h5">
                                    {{ category.earnings }}<span class="text-dark-50 font-weight-bold">Kč</span>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"></rect>
                                            <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"></rect>
                                            <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"></path>
                                            <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"></rect>
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Zapůjčeno</span>
                                <span class="font-weight-bolder font-size-h5">
                                    0<span class="text-dark-50 font-weight-bold">x</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition-group>
    </draggable>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        props: [
            'data',
        ],
        components: {
            draggable,
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                categories: this.data,
                drag: false,
            }
        },
        mounted() {
            console.log('Mounted');
        },
        created() {

        },
        computed: {
            dragOptions() {
                return {
                    animation: 200,
                    group: "description",
                    disabled: false,
                    ghostClass: "ghost"
                };
            }
        },
        methods: {
            update() {
                this.categories.map((category, index) => {
                    category.sort = index + 1;
                });

                axios.put('/admin/karavany-kategorie/update/sort', {
                    categories: this.categories
                }).then((response) => {
                    // Success alert
                });
            },
        }
    }
</script>
<style scoped>
    .sort-handler {
        cursor: pointer;
    }

    .flip-list-move {
        transition: transform 0.5s;
    }

    .ghost {
        opacity: 0.5;
        background: #c8ebfb;
    }
</style>