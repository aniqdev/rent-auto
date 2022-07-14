<template>
    <div>
        <VueSlickCarousel v-bind="settings">
            <div><h2>Test</h2></div>
            <div><h2>Tes3</h2></div>
            <div><h2>Tes45</h2></div>
            <div><h2>Tes55</h2></div>
        </VueSlickCarousel>
    </div>
</template>

<script>
    import VueSlickCarousel from 'vue-slick-carousel';
    import 'vue-slick-carousel/dist/vue-slick-carousel.css';
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css';

    export default {
        name: 'HomeSlider',
        components: { VueSlickCarousel },
        props: [

        ],
        data() {
            return {
                settings: {
                    autoplay: true,
                    speed: 2000,
                    autoplaySpeed: 2000,
                    arrows: true,
                    dots: true,
                    fade: true,
                    lazyLoad: 'ondemand',
                    draggable: true,
                    centerMode: true,
                },
            }
        },
        mounted() {
            
        },
        created() {

        },
        computed: {

        },
        methods: {
           
        }
    }
</script>
