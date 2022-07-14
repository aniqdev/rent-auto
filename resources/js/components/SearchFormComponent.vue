<template>
    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
        <div class="quick-search quick-search-dropdown" :class="[(results !== null && results.length > 0) ? 'quick-search-has-result' : '']" id="kt_quick_search_dropdown">
            <form method="get" class="quick-search-form">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="svg-icon svg-icon-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                            </span>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Vyhledat ..." @keydown="search" v-model="string">
                    <div class="input-group-append">
                        <span class="input-group-text" @click="resetSearch()">
                            <!-- <i class="quick-search-close ki ki-close icon-sm text-muted"></i> -->
                            <i class="fas fa-times quick-search-close text-muted"></i>
                        </span>
                    </div>
                </div>
            </form>
            <div class="quick-search-wrapper scroll ps" data-scroll="true" data-height="325" data-mobile-height="200" style="height: 325px; overflow: hidden;" v-show="results">
                <div class="quick-search-result">
                    <div class="text-muted d-none">
                        Nebyly nalezeny zádné výsledky.
                    </div>
                    <template v-if="reservationsCollection !== null && reservationsCollection.length > 0">
                        <div class="font-size-sm text-primary font-weight-bolder text-uppercase mb-2">
                            Rezervace
                        </div>
                        <div class="mb-10" v-if="reservationsCollection !== null">
                            <div class="d-flex align-items-center flex-grow-1 mb-2" v-for="(reservation, index) in reservationsCollection" :key="index">
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a :href="'/admin/rezervace/' + reservation.id + '/create'" class="font-weight-bold text-dark text-hover-primary">
                                        {{ reservation.id }}
                                    </a>
                                    <span class="font-size-sm font-weight-bold text-muted">
                                        {{ reservation.name || '' }} {{ reservation.last_name || '' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </template>

                    <template v-if="caravansCollection && caravansCollection.length > 0">
                        <div class="font-size-sm text-primary font-weight-bolder text-uppercase mb-2" v-if="caravansCollection">
                            Karavany
                        </div>
                        <div class="mb-10" v-if="caravansCollection">
                            <div class="d-flex align-items-center flex-grow-1 mb-2" v-for="(caravan, index) in caravansCollection" :key="index">
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a :href="'/karavany/' + caravan.id + '/show'" class="font-weight-bold text-dark text-hover-primary">
                                        {{ caravan.name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                minCharacters: 3,
                string: '',
                results: null,
            }
        },
        mounted() {
            //
        },
        created() {

        },
        computed: {
            reservationsCollection() {
                var reservations = null;

                if(this.results !== null && this.results.length > 0) {
                    reservations = this.results.filter(function(item) {
                        return item.type.match('reservation');
                    });
                }

                return reservations;
            },

            caravansCollection() {
                var caravans = null;

                if(this.results !== null && this.results.length > 0) {
                    caravans = this.results.filter(function(item) {
                        return item.type.match('caravan');
                    });
                }

                return caravans;
            }
        },
        methods: {
            search() {
                const removeValue = document.querySelector('.quick-search-close');

                if(this.string.length >= this.minCharacters) {
                    var spinnerClasses = ['spinner', 'spinner-sm', 'spinner-primary'];
                    removeValue.style.display = 'flex';
                    removeValue.classList.add(...spinnerClasses);

                    axios.post('/admin/vyhledavani', {
                        text: this.string,
                    }).then((response) => {
                        this.results = response.data;
                        removeValue.classList.remove(...spinnerClasses);
                    }).catch((error) => {
                        this.results = null;
                        removeValue.classList.remove(...spinnerClasses);
                    });
                } else {
                    removeValue.style.display = 'none';
                    this.results = null;
                }
            },

            resetSearch() {
                this.string = null;
                this.results = null;
            }
        }
    }
</script>
<style scoped>

</style>