<template>
    <div>
        <div class="row mb-4">
            <div class="col-md-12 text-right">
                <div class="btn-group" role="group" aria-label="Zvolte měsíc">
                    <button type="button" class="btn btn-primary" @click="prevMonth">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-primary" disabled>{{ formatDate(currentDate) }}</button>
                    <button type="button" class="btn btn-primary" @click="nextMonth">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <table class="table table-borderless reservation-table">
            <thead>
                <th></th>
                <th v-for="(column, index) in columns" :key="index" :data-column="column.key" class="gantt-col text-nowrap">{{ column.value }}</th>
            </thead>
            <tbody>
                <tr v-for="(result, index) in data" :key="index">
                    <td nowrap>
                        <img :src="'/storage/' + result.thumbnail" :alt="result.name" width="40">
                        {{ result.name }}
                    </td>
                    <td v-for="(column, index) in columns" :key="index" class="gantt-td" v-html="addFirstGanttBar(index, result)"></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        props: [
            'caravans',
        ],
        data() {
            return {
                reload: true,
                currentDate: moment(),
                columns: [],
                data: this.caravans,
                source: null,
            }
        },
        mounted() {
            var bodyElement = document.querySelector('body');
            bodyElement.classList.add('aside-minimize');

            //this.data = this.caravans;
            this.getGanttColumns();

            setTimeout(function() {
                this.createGantt();
            }.bind(this), 550);

            window.addEventListener("resize", this.createGantt);

            /* var table = document.querySelector('.table-responsive');
            table.addEventListener("scroll", function() {
                console.log('scrolled');
            }); */
        },

        created() {
        },

        computed: {

        },

        watch: {
            //
        },
        
        methods: {
            getGanttColumns() {
                var pstartDate = this.currentDate.format('YYYY-MM-01');
                var pendDate = this.currentDate.format('YYYY-MM-') + moment(this.currentDate).daysInMonth();
                var startDate = moment(pstartDate, 'YYYY-MM-DD');
                var endDate = moment(pendDate, 'YYYY-MM-DD');

                /* var startDate = moment(this.dataset.start_date, 'YYYY-MM-dd');
                var endDate = moment(this.dataset.end_date, 'YYYY-MM-dd'); */

                // Reset columns
                this.columns = [];

                //while(startDate.format('D') <= endDate.format('D')) {
                while(startDate.isSameOrBefore(endDate, 'day')) {
                    this.columns.push({ key: startDate.format('YYYY-MM-DD'), value: startDate.format('DD.') });
                    startDate.add(1, 'day');
                }
            },

            createGantt() {
                const columns = document.querySelectorAll('.gantt-col');
                const bars = document.querySelectorAll('.gantt-bar');
                const columnsArray = [...columns];

                bars.forEach(bar => {
                    const startDate = moment(bar.dataset.start, 'YYYY-MM-DD').format('YYYY-MM-DD');
                    const endDate = moment(bar.dataset.end, 'YYYY-MM-DD').format('YYYY-MM-DD');
                    let left = 0,
                        width = 0,
                        height = 0;

                    // START DATE
                    var filteredArray = columnsArray.filter(column => column.dataset.column == startDate);

                    if(typeof filteredArray[0] == 'undefined') {
                        var filteredArray = columnsArray.filter(column => column.dataset.column == columnsArray[0].dataset.column);
                    }

                    const day = Math.floor(filteredArray[0].offsetWidth);
                    left = (filteredArray[0].offsetLeft + 14);

                    // Bar height
                    const parentElement = bar.parentNode.offsetHeight;
                    const halfHeight = Math.floor(parentElement / 3);
                    height = parentElement - halfHeight;

                    // END DATE
                    var filteredArray = columnsArray.filter(column => column.dataset.column == endDate);

                    if(typeof filteredArray[0] == 'undefined') {
                        var filteredArray = columnsArray.filter(column => column.dataset.column == columnsArray.slice(-1).pop().dataset.column);
                    }

                    const end = Math.floor(filteredArray[0].offsetWidth);
                    width = filteredArray[0].offsetLeft + filteredArray[0].offsetWidth - left + 14;
                    width = Math.floor(width);

                    const bgColor = bar.style.backgroundColor;
                    const convertedHex = bgColor.substring(4, bgColor.length-1).replace(/ /g, '').split(',');
                    const contrast = Math.round(((parseInt(convertedHex[0]) * 299) + (parseInt(convertedHex[1]) * 587) + (parseInt(convertedHex[2]) * 114)) / 1000);

                    if(contrast > 125) {
                        bar.style.color = '#000000';
                    } else {
                        bar.style.color = '#ffffff';
                    }

                    bar.style.left = `${left}px`;
                    bar.style.width = `${width}px`;
                    bar.style.height = `${height}px`;
                    bar.style.lineHeight = `${height}px`;
                    bar.style.marginTop = `${Math.floor(halfHeight/2)}px`;
                    bar.style.opacity = 1;
                });

                $('[data-toggle="popover"]').popover('update');
            },

            addFirstGanttBar(index, data) {
                if(index == 0) {
                    var html = '';

                    data.reservations.forEach(reservation => {
                        const start_date = moment(reservation.start_date).format('YYYY-MM-DD');
                        const end_date = moment(reservation.end_date).format('YYYY-MM-DD');
                        const label = 'Č.: ' + reservation.id;
                        var accessories_string = '';

                        reservation.accessories.forEach(accessory => {
                            accessories_string += accessory.pivot.count + 'x ' + accessory.name + '<br>';
                        });

                        if(this.columns.find((element, index) => element.key == start_date) || this.columns.find((element, index) => element.key == end_date)) {
                            html += `<div data-start="${start_date}" data-end="${end_date}" style="background: ${reservation.status.color}; z-index: 10;" class="gantt-bar"><a data-toggle="popover" title="Rezervace č. ${reservation.id}" data-content="Datum: <strong>${moment(reservation.start_date).format('DD.MM')} - ${moment(reservation.end_date).format('DD.MM.YYYY')}</strong><br>Zákazník: <strong>${reservation.name} ${reservation.last_name}</strong><br>Příslušenství:<br><strong>${accessories_string}</strong><br><a href='/admin/rezervace/${reservation.id}/create' class='btn btn-link-primary font-weight-bold mt-2'>Zobrazit</a>" data-html="true" tabindex="0" data-placement="top">${label}</a></div>`; 
                            //html += `<div data-start="${start_date}" data-end="${end_date}" style="background: ${reservation.status.color}; z-index: 10;" class="gantt-bar"><a href="/admin/rezervace/${reservation.id}/create" data-toggle="tooltip" data-placement="top" data-original-title='${reservation.name}'>${label}</a></div>`; 
                        }
                    });

                    return html;
                } else {
                    return;
                }
            },

            formatDate(date) {
                return date.format('MM.YYYY');
            },

            nextMonth() {
                this.currentDate.add(1, 'month');
                this.getGanttColumns();
                setTimeout(function() {
                    this.createGantt();
                }.bind(this), 550);
            },

            prevMonth() {
                this.currentDate.subtract(1, 'month');
                this.getGanttColumns();
                setTimeout(function() {
                    this.createGantt();
                }.bind(this), 550);
            }
        }
    }
</script>
<style>
    table.reservation-table {
        /* table-layout: fixed; */
        font-size: .8rem;
    }

    table.reservation-table th,
    table.reservation-table td {
        width: 40px;
    }

    table.reservation-table thead th {
        vertical-align: middle;
        /* border-left: 1px dashed #cecece;
        border-right: 1px dashed #cecece; */
    }

    table.reservation-table thead th:nth-child(2n + 1) {
        background: #f3f6f9;
    }

    table.reservation-table tr {
        border: 1px solid #e8e8e8;
    }

    table.reservation-table td {
        /* border-left: 1px dashed #cecece;
        border-right: 1px dashed #cecece; */
        height: 38px;
    }

    table.reservation-table td:first-child {
        overflow: hidden;
        width: auto;
        max-width: 240px;
    }

    table.reservation-table td:nth-child(2n + 1) {
        background: rgba(243, 243, 243, .8);
    }

    .gantt-col {
        text-align: center;
    }

    .gantt-td {
        padding: 0 !important;
    }

    .gantt-bar {
        overflow: hidden;
        white-space: nowrap;
        background: red;
        border-radius: 4px;
        width: 0;
        padding-left: 10px;
        position: absolute;
        opacity: 0;
        transition: all .5s ease-in-out;
    }

    /* .gantt-bar:hover {
        filter: brightness(68%);
    } */

    .gantt-bar a {
        text-decoration: none;
        color: inherit;
        cursor: pointer;
    }
</style>