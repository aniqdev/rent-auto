<template>

    <div>

        <input type="hidden" name="start_date" :value="range.start | formatScriptDate">
        <input type="hidden" name="end_date" :value="range.end | formatScriptDate">

        <div class="calendar__wrapper">

            <div class="date-picker-calendar text-center">

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
                    :attributes="attributes"
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

            </div>

        </div>

        <div class="container my-5 text-center">
            <div class="bg-white d-block">
                <span>termín:</span>
                <span class="text-primary">{{ range.start | formatShortDate }} - {{ range.end | formatDate }}</span>
            </div>
            <div class="bg-white d-block">
                <span>nájemné (bez příslušenství) vč. DPH:</span>
                <span class="text-primary">{{ price | formatPrice }} Kč</span>
            </div>
        </div>

    </div>

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

            startDate: {
                required: true
            },

            endDate: {
                required: true
            }
        },
        data() {
            return {
                range: {
                    start: new Date(this.startDate),
                    // start: new Date(this.startDate + ' 12:00:00'),
                    end: new Date(this.endDate),
                },
                dragValue: {
                    start: new Date(this.startDate),
                    end: new Date(this.endDate)
                },
                fromDate: this.fromDateCalc(),
                reservations: {},
                price: null,
                daysCount: 0,
                canNext: false,
                nextErrorMessage: null,
                attributes: [
                    {
                        highlight: {
                            start: { fillMode: 'outline', color: 'red' },
                            base: { fillMode: 'light', color: 'red' },
                            end: { fillMode: 'outline', color: 'red' }
                        },
                        dates: {
                            start: new Date(this.startDate),
                            end: new Date(this.endDate),
                        }
                    }
                ],
            };
        },

        mounted() {
            this.reservations = this.data;

            const currentHour = new Date().getHours();

            /* if(currentHour >= 16) {
                this.reservations.push({ start: new Date().setMonth(new Date().getMonth() - 1), end: new Date() });
            } else {
                this.reservations.push({ start: new Date().setMonth(new Date().getMonth() - 1), end: new Date().setDate(new Date().getDate() - 1) });
            } */
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
            nextMonth() {
                const calendar = this.$refs.calendar;
                calendar.move(1);
            },

            getPrice() {
                axios.post('/reservation/getPrice', {
                    caravan_id: this.caravan,
                    start_date: this.$options.filters.formatScriptDate(this.range.start),
                    end_date: this.$options.filters.formatScriptDate(this.range.end),
                }).then((response) => {
                    this.price = response.data;
                });
            },

            getDiffDates() {
                const start_date = moment(this.range.start);
                const end_date = moment(this.range.end);

                return moment.duration(end_date.diff(start_date)).asDays();
            },

            listenToEndDate() {
                const start_date = moment(this.range.start);
                const end_date = moment(this.range.end);

                if(moment.duration(end_date.diff(start_date)).asDays() < 3) {
                    console.log('End');
                }
            },

            fromDateCalc() {
                if(window.innerWidth > 994) {
                    return new Date(moment().subtract(1, 'months').endOf('month').format('YYYY-MM-DD'));
                } else {
                    new Date(moment().endOf('month').format('YYYY-MM-DD'))
                }
            },
        },

        watch: {
            'range.end': function(val) {
                if(this.getDiffDates() >= this.minDays) {
                    this.canNext = true;
                } else {
                    this.canNext = false;
                    this.nextErrorMessage = 'Minimální počet dnů pro rezervaci jsou 3 dny.';
                }

                this.getPrice();
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
            }
        }

    };

</script>
