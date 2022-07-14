<template>
    
    <div class="caravan-list" :class="{'top-caravan-list': view == 'topList'}">

        <div class="caravan-item card-4" v-for="(item, index) in 4" :key="index">

            <div class="caravan-item__img">

                <img src="/images/web/karavan-1.png" alt="karavan" />

            </div>

            <div class="caravan-item__content">

                <div class="caravan-item__num">

                    24

                </div>

                <div class="caravan-item__text">

                    Kompaktních<br> obytních vozů

                </div>

            </div>

            <div class="caravan-item__icons">

                <div class="caravan-item__icon">

                    <div class="caravan-item__icon-img">
                        <license-icon />
                    </div>

                    <div class="caravan-item__icon-text">
                        B
                    </div>

                </div>

                <div class="caravan-item__icon">

                    <div class="caravan-item__icon-img">
                        <person-icon />
                    </div>

                    <div class="caravan-item__icon-text">
                        2-4
                    </div>

                </div>

                <div class="caravan-item__icon">

                    <div class="caravan-item__icon-img">
                        <bicycle-icon />
                    </div>

                    <div class="caravan-item__icon-text">
                        4
                    </div>

                </div>

                <div class="caravan-item__icon">

                    <div class="caravan-item__icon-img">
                        <shower-icon />
                    </div>

                    <div class="caravan-item__icon-text">
                    </div>

                </div>

                <div class="caravan-item__icon">

                    <div class="caravan-item__icon-img">
                        <toilet-icon />
                    </div>

                    <div class="caravan-item__icon-text">
                    </div>

                </div>

            </div>

        </div>

    </div>

</template>

<script>

    export default {
     
        props: {

            view: {
                type: String,
                required: false,
                default: null
            }

        }

    }

</script>