<template>
    <div id="chart">
        <apexchart type="donut" :options="chartOptions" :series="series"></apexchart>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                series: [40, 98, 29],
                chartOptions: {
                    pie: {
                        donut: {
                            id: 'dashCategoryChart',
                            width: '100%',
                            size: '100%',
                        }
                    },
                    colors: [
                        '#3699FF',
                        '#ffa800',
                        '#EBEDF3',
                    ],
                    legend: {
                        fontSize: '12px',
                        fontWeight: 600,
                        color: '#b5b5c3',
                        position: 'left',
                        offsetX: 0,
                        itemMargin: {
                            horizontal: 0,
                            vertical: 2,
                        }
                    },
                    labels: ['4A23443', '3A23443', '4A43338'],
                    dataLabels: {
                        enabled: false,
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '64%',
                                labels: {
                                    show: false,
                                    total: {
                                        label: '',
                                        showAlways: true,
                                        show: true,
                                    }
                                },
                            },
                        }
                    }
                },
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped>

</style>