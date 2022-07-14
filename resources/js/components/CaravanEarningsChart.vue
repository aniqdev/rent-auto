<template>
    <div id="chart">
        <apexchart type="area" :options="chartOptions" :series="series"></apexchart>
    </div>
</template>

<script>
    export default {
        props: [
            'caravan'
        ],
        data: function() {
            return {
                period: 'month',
                series: [
                    {
                        name: 'Test',
                        data: [40, 98, 29]
                    },
                ],
                chartOptions: {
                    chart: {
                        id: 'caravanEarningsChart',
                        toolbar: {
                            show: false,
                        },
                        zoom: {
                            enabled: false,
                        }
                    },
                    colors: [
                        '#3699FF',
                        '#ffa800',
                        '#EBEDF3',
                    ],
                    stroke: {
                        curve: 'smooth',
                    },
                    fill: {
                        type: 'gradient',
                    },
                    //labels: [new Date('2021-06-10'), new Date('2021-06-11'), new Date('2021-06-12')],
                    /* xaxis: {
                        type: 'datetime'
                    } */
                },
            }
        },
        mounted() {
            console.log('Component mounted.');
        },

        methods: {
            getReservations() {
                axios.get('/admin/karavany/getEarningByCaravan', {
                    caravan: this.caravan,
                    period: this.period,
                }).then((response) => {
                    // Success alert
                });
            }
        },
    }
</script>
<style scoped>

</style>