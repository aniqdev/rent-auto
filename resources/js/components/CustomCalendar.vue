<template>

    <form action="/rezervace" method="GET">

        <input type="hidden" name="caravan" :value="caravan">
        <input type="hidden" name="start_date" :value="range.start | formatScriptDate">
        <input type="hidden" name="end_date" :value="range.end | formatScriptDate">

        <div class="calendar__wrapper">

            <div class="date-picker-calendar">

                <v-date-picker class="h-full reservation-calendar"
                    is-range
                    ref="calendar"
                    v-model="range"
                    locale="cs"
                    :columns="$screens({ lg: 3, md: 1, sm: 1 }, 1)"
                    :step="1"
                    :min-date="new Date().setMonth(new Date().getMonth() - 1)"
                    :max-date="new Date(new Date().getFullYear() + 1, 11, 31)"
                    :from-date="fromDate"
                    :first-day-of-week="2"
                    :masks="{ title: 'MMMM YYYY', weekdays: 'WW' }"
                    :select-attribute="selectDragAttribute"
                    :drag-attribute="selectDragAttribute"
                    :attributes="dynamicAttributes"
                    :disabled-dates="disabledDates"
                    nav-visibility="hidden"
                    @drag="dragValue = $event"
                    @dayfocusout="listenToEndDate"
                >

                    <template v-slot:day-popover="{ format }">
                        <div>
                            {{ format(dragValue ? dragValue.start : range.start, 'MMM D') }}
                            -
                            {{ format(dragValue ? dragValue.end : range.end, 'MMM D') }}
                        </div>
                    </template>

                </v-date-picker>

                <!-- <div class="alert alert-danger" v-show="!canNext && range.end != null">
                    {{ nextErrorMessage }}
                </div> -->

            </div>

            <!-- <div role="button" class="" @click="nextMonth()"><i class="icofont-rounded-right"></i></div> -->

        </div>

        <div class="container mb-5">
            <div class="price-component d-flex justify-content-center">
                <div class="bg-white d-flex justify-content-between align-items-center">
                    <span class="label">termín:</span>
                    <span class="value">{{ range.start | formatShortDate }} - {{ range.end | formatDate }}</span>
                </div>
                <div class="bg-white">
                    <div class="d-block">
                        <span class="label">celkové nájemné vč. DPH:</span>
                        <span class="value">{{ price | formatPrice }} Kč</span>
                    </div>
                    <!-- <div class="error-message" v-show="discount && range.end != null">
                        Sleva 10%
                    </div>
                    <div class="d-block" v-if="slae10">
                        <span class="label">celkové nájemné vč. DPH:</span>
                        <span class="value">{{ sale10 | formatPrice }} Kč</span>
                    </div> -->
                </div>
                    <!-- <div class="d-block" v-show="discount && range.end != null">
                        <span class="label">celkové nájemné vč. DPH:</span>
                        <span class="value">{{ 10 }} %</span>
                    </div> -->

                <!-- <div class="bg-white d-flex justify-content-between align-items-center">
                    <span class="label">celkové nájemné vč. DPH:</span>
                    <span class="value">{{ price | formatPrice }} Kč</span>
                </div> -->
                <div class="btn-wrapper">
                    <div class="error-message" v-show="!canNext && range.end != null">
                        {{ nextErrorMessage }}
                    </div>
                    <button type="submit" class="primary-btn" :disabled="(range.start == null && range.end == null) || !canNext">Pronajmout <i class="icofont-thin-right"></i></button>
                </div>
            </div>

            <transition name="fade">
                <div v-if="priceList" class="pricelist-component d-flex justify-content-center">
                    <div v-for="(list, index) in priceList" :key="index" class="bg-white d-flex flex-column justify-content-between align-items-center" data-toggle="tooltip" data-html="true" :title="list | formatTooltip">
                        <span class="label">
                            {{ list.name }}
                        </span>
                        <span class="value" title="list.season">{{ list.price }} Kč</span>
                    </div>

                    <div v-if="surchargeList" class="pricelist-plus d-flex justify-content-center align-items-center">
                        +
                    </div>

                    <div v-if="surchargeList" v-for="(service, index) in surchargeList" :key="index" class="bg-primary d-flex flex-column justify-content-between align-items-center" data-toggle="tooltip" data-html="true" :title="service.content">
                        <span class="label">{{ service.name }}</span>
                        <span class="value">{{ service.price }} Kč</span>
                    </div>
                </div>
            </transition>
        </div>

        <div class="container">
            <div class="row justify-content-center explanations">
                <!-- <div class="explanation" data-toggle="tooltip" title="Rezervováno, může být ještě uvolněno">
                    <div class="square waiting"></div>
                    <div class="label">Rezervovaný</div>
                </div> -->
                <div class="explanation" data-toggle="tooltip" title="Obsazeno, není možno zarezervovat">
                    <div class="square reserved"></div>
                    <div class="label">Obsazený</div>
                </div>
                <div class="explanation" data-toggle="tooltip" title="Volné termíny">
                    <div class="square free"></div>
                    <div class="label">Volný</div>
                </div>
                <div class="explanation" data-toggle="tooltip" title="Zvýhodněné termíny">
                    <div class="square sale"></div>
                    <div class="label">Zvýhodněné</div>
                </div>
                <!-- <div class="explanation" data-toggle="tooltip" title="Zvýhodněné termíny" v-if="lastminutes.length > 0">
                    <div class="square discounted"></div>
                    <div class="label">Zvýhodněné</div>
                </div> -->
                <div class="explanation" data-toggle="tooltip" title="Váš vybraný termín">
                    <div class="square selected"></div>
                    <div class="label">Vaše rezervace</div>
                </div>
            </div>
        </div>

    </form>

</template>

<script>
    import moment from 'moment';

    export default {
        props: {
            data: {
                type: Array,
                required: true
            },

            caravan: {
                type: Number,
                required: true
            },

            minDays: {
                type: Number,
                required: true
            },

            sales: {
                type: Array,
                requried: true
            }

            // lastminutes: {
            //     type: Array,
            //     required: false
            // },

            // last: {
            //     type: Array,
            //     required: false
            // }
        },
        data() {
            return {
                range: {
                    start: null,
                    end: null,
                },
                dragValue: null,
                fromDate: this.fromDateCalc(),
                reservations: {},
                price: null,
                sale5: null,
                sale10: null,
                priceList: null,
                surchargeList: null,
                daysCount: 0,
                canNext: false,
                discount: false,
                nextErrorMessage: null,
                attributes: this.getGreenAttributes(),
                        // highlight: {
                        //     start: {fillMode: 'green'},
                        //     base: {fillMode: 'outline'},
                        //     end: {fillMode: 'green'},
                        // },
                        // bar: true,
                        // content: 'red',
                        // dates: this.getGreenDatesFrom(),
                        // dates: {
                        //     start: this.getGreenDatesFrom(),
                        //     end: this.getGreenDatesTo(),
                        // }
                        // highlight: {
                        //     color: 'green',
                        //     fillMode: 'outline',
                        // },

                        // range: {
                        //     start: new Date('2022, 07, 30'),
                        //     end: new Date('2022, 08, 2'),
                        // }

                        // range: {
                        //     start: new Date(this.getGreenDatesFrom()),
                        //     end: new Date(this.getGreenDatesTo()),
                        // }

                    // {
                    //     highlight: 'green',
                    //     bar: true,
                    //     // content: 'green',
                    //     dates: this.getGreenDatesTo(),

                    // },

            };
        },



        mounted() {
            this.reservations = this.data;

            const currentHour = new Date().getHours();

            if(currentHour >= 16) {
                this.reservations.push({ start: new Date().setMonth(new Date().getMonth() - 1), end: new Date() });
            } else {
                this.reservations.push({ start: new Date().setMonth(new Date().getMonth() - 1), end: new Date().setDate(new Date().getDate() - 1) });
            }
        },

        computed: {
            selectDragAttribute() {
                return {
                    popover: {
                        visibility: 'hidden',
                        isInteractive: false,
                    }
                }
            },

            disabledDates() {
                return this.reservations;
            },

            dynamicAttributes() {
                return this.attributes;
            },
        },

        methods: {

            getGreenAttributes(){
                return this.sales.map(sale => {
                    return {
                        highlight: {
                            color: 'green',
                            fillMode: 'light',
                        },
                        dates: {
                            start: new Date(sale.avaliable_from),
                            end: new Date(sale.avaliable_to),
                        },
                    }
                })
            },

            nextMonth() {
                const calendar = this.$refs.calendar;
                calendar.move(1);
            },

            // getSale5() {
            //     axios.post('/reservation/getSale5', {
            //         caravan_id: this.caravan,
            //         start_date: this.$options.filters.formatScriptDate(this.range.start),
            //         end_date: this.$options.filters.formatScriptDate(this.range.end),
            //     }).then((response) => {
            //         this.sale5 = response.data;
            //     });
            // },

            // getSale10() {
            //     axios.post('/reservation/getSale10', {
            //         caravan_id: this.caravan,
            //         start_date: this.$options.filters.formatScriptDate(this.range.start),
            //         end_date: this.$options.filters.formatScriptDate(this.range.end),
            //     }).then((response) => {
            //         this.sale10 = response.data;
            //     });
            // },


            getPrice() {
                axios.post('/reservation/getPrice', {
                    caravan_id: this.caravan,
                    start_date: this.$options.filters.formatScriptDate(this.range.start),
                    end_date: this.$options.filters.formatScriptDate(this.range.end),
                }).then((response) => {
                    this.price = response.data;
                });
            },

            getDetailedPrice() {
                axios.post('/reservation/getDetailedPrice', {
                    caravan_id: this.caravan,
                    start_date: this.$options.filters.formatScriptDate(this.range.start),
                    end_date: this.$options.filters.formatScriptDate(this.range.end),
                }).then((response) => {
                    this.priceList = response.data.days;
                    this.surchargeList = response.data.surcharge;
                });
            },


            // getSales() {
            //     axios.post('/controller/getSales', {
            //         caravan_id: this.caravan,
            //         start_date: this.$options.filters.formatScriptDate(this.range.start),
            //         end_date: this.$options.filters.formatScriptDate(this.range.end),
            //     }).then((response) => {
            //         this.priceList = response.data.days;
            //         this.surchargeList = response.data.surcharge;
            //     });
            // },

            getDiffDates() {
                const start_date = moment(this.range.start);
                const end_date = moment(this.range.end);

                return moment.duration(end_date.diff(start_date)).asDays();
            },

            listenToEndDate() {
                const start_date = moment(this.range.start);
                const end_date = moment(this.range.end);

                if(moment.duration(end_date.diff(start_date)).asDays() < 3) {
                    //console.log('End');
                }
            },

            fromDateCalc() {
                if(window.innerWidth > 994) {
                    return new Date(moment().subtract(1, 'months').endOf('month').format('YYYY-MM-DD'));
                } else {
                    new Date(moment().endOf('month').format('YYYY-MM-DD'))
                }
            },

            getMinDays(range) {
                var dateObj = range.start
                var month = dateObj.getUTCMonth() + 1; //months from 1-12
                var day = dateObj.getUTCDate();
                var year = dateObj.getUTCFullYear();
                var dateStringStart = year + '-' + (month<10?'0':'') + month + '-' + (day<10?'0':'') + day
                var dateObj = range.end
                var month = dateObj.getUTCMonth() + 1; //months from 1-12
                var day = dateObj.getUTCDate();
                var year = dateObj.getUTCFullYear();
                var dateStringEnd = year + '-' + (month<10?'0':'') + month + '-' + (day<10?'0':'') + day
                var match = false
                for (var i = 0; i < this.sales.length; i++) {
                    this.sales[i];
                    if ( this.sales[i].avaliable_from === dateStringStart &&
                    this.sales[i].avaliable_to === dateStringEnd) {
                        match = true
                        break
                    }
                }
                if (match) {
                    var min_days = 1
                }else{
                    var min_days = this.minDays
                }
                return min_days
            },
        },

        watch: {
            'range.end': function(val) {
                var min_days = this.getMinDays(this.range)
                if(this.getDiffDates() >= min_days) {
                    this.canNext = true;
                    // this.discount = true;
                } else {
                    // this.discount = false;
                    this.canNext = false;
                    this.nextErrorMessage = 'Minimální počet dnů pro rezervaci je: ' + this.minDays;
                }

                // if (min_days = sales) {
                //     this.discount = true;
                // }else {
                //     this.discount = false;
                // }
                // this.getSale5();
                // this.getSale10();
                this.getPrice();
                this.getDetailedPrice();
            }
        },

        filters: {
            formatDate(value) {
                return (moment(value).isValid()) ? moment(value).format('DD.MM.YYYY') : '';
            },

            formatShortDate(value) {
                return (moment(value).isValid()) ? moment(value).format('DD.MM.') : '';
            },

            formatScriptDate(value) {
                return (moment(value).isValid()) ? moment(value).format('YYYY-MM-DD') : '';
            },

            formatPrice(value) {
                return new Intl.NumberFormat('cs', { style: 'decimal', useGrouping: true, grouping: '.' }).format(value);
            },

            formatTooltip(list) {
                var tooltip = list.season;

                if(typeof list.content !== 'undefined') {
                    tooltip += '<br>';
                    tooltip += list.content;
                }

                return tooltip;
            }
        }

    };

</script>
<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
</style>
