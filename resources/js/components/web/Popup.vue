<template>
    <div class="popup-wrapper" @click="hidePopup" v-show="state">
        <div class="popup">
            <div class="popup-header text-center">
                <h1>Poslední volné letní termíny</h1>
            </div>
            <div class="popup-footer">
                <img src="images/bg-trees.svg">
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: [
            'active',
        ],
        data() {
            return {
                state: false,
            }
        },
        mounted() {
            //alert('Yep');
            /* const popup_wrapper = document.querySelector('.popup-wrapper');
            popup_wrapper.addEventListener('click', function(e) {

            }); */

            this.state = true;
        },
        methods: {
            hidePopup() {
                this.state = false;
            }
        },
    }
</script>