<template>

    <form action="/pujcovna-obytnych-vozu-praha" method="GET">

        <div class="date-picker__wrapper">

            <div class="date-picker">

                <v-date-picker
                    class="inline-block h-full"
                    v-model="dateFrom"
                    :attributes="attributes"
                    :min-date="new Date()">

                    <template v-slot="{ inputValue, togglePopover }">

                        <input
                            class="date-picker__input"
                            :value="inputValue || 'termín od'"
                            readonly
                            @click="togglePopover()"
                            type="text"
                            name="dateFrom"
                        />

                    </template>

                </v-date-picker>

            </div>

            <div class="date-picker">

                <v-date-picker
                    class="inline-block h-full"
                    v-model="dateTo"
                    :attributes="attributes"
                    :min-date="dateFrom">

                    <template v-slot="{ inputValue, togglePopover }">

                        <input
                            class="date-picker__input"
                            :value="inputValue || 'termín do'"
                            readonly
                            @click="togglePopover()"
                            type="text"
                            name="dateTo"
                        />

                    </template>

                </v-date-picker>

            </div>

            <button type="submit" class="primary-btn">Najít volné vozy <i class="icofont-search-1"></i></button>

        </div>

    </form>

</template>

<script>
    import moment from 'moment';

    export default {
        props: {
            lastminutes: {
                required: false,
            },
        },
        data() {
            return {
                dateFrom: 'termín od',
                dateTo: 'termín do',
                dateToFrom: new Date(),
                modelConfig: {
                    type: 'string',
                    mask: 'YYYY-MM-DD'
                },
                attributes: [
                    {
                        bar: 'green',
                        dates: this.lastminutes
                    }
                ],
            };
        },

        watch: {
            dateFrom: function(val) {
                this.dateToFrom = moment(val);
            }
        },

        mounted() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);

            this.dateFrom = moment(urlParams.get('dateFrom'), 'D.M.YYYY').format('YYYY-MM-DD');
            this.dateTo = moment(urlParams.get('dateTo'), 'D.M.YYYY').format('YYYY-MM-DD');
        }

    };

</script>
