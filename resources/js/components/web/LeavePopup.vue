<template>
    <div class="modal" tabindex="-1" role="dialog" id="leavePopup">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-wrapper">
                        <div class="modal-col modal-left">
                            <img src="/images/web/blog-bg.webp" alt="Váš názor" class="modal-thumb">
                        </div>
                        <div class="modal-col modal-right">
                            <h2>Na Vašem názoru nám záleží</h2>
                            <p>Vyberte jednu z možností důvodu vašeho odchodu:</p>
                            <form action="/rezervace/feedback" method="POST" ref="leaveForm" @submit="submit($event)">
                                <input type="hidden" name="_token" :value="csrf">
                                <input type="hidden" name="caravan" :value="caravan.id">
                                <input type="hidden" name="email" :value="email">
                                <input type="hidden" name="start_date" :value="start_date">
                                <input type="hidden" name="end_date" :value="end_date">
                                <input type="hidden" name="price" :value="price">
                                <input type="hidden" name="visited" :value="visited">
                                <div class="form-group">
                                    <div v-for="(reason, index) in reasons" :key="index" class="form-check radio">
                                        <label :for="'reason-' + index" class="form-check-label">
                                            <input type="radio" name="reason" :value="index" :id="'reason-' + index" class="form-check-input" v-model="selectedReason"> {{ reason }}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" v-show="selectedReason == 4">
                                    <textarea name="reason-other" class="form-control" placeholder="Popište prosím důvod ..." v-model="message"></textarea>
                                </div>
                                <div class="form-group actions mt-5">
                                    <button type="submit" class="secondary-btn">
                                        Zanechat názor
                                        <i class="icofont-thin-right"></i>
                                    </button>
                                    <a href="#" class="text-muted small" data-dismiss="modal">
                                        Zavřít
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>
</template>
<script>
    import ouibounce from 'ouibounce';

    export default {
        name: 'leave-popup',
        props: [
            'reasons',
            'caravan',
            'email',
            'start_date',
            'end_date',
            'price',
        ],
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                currentPage: null,
                selectedReason: null,
                message: null,
                visited: new Date().getTime(),
            }
        },
        mounted() {
            this.currentPage = document.querySelector('body');

            if(!this.currentPage.classList.contains('homepage') || !this.currentPage.classList.contains('confirmation')) {
                var _ouibounce = ouibounce(false, {
                    aggressive: true,
                    timer: 0,
                    callback: function() {
                        $('#leavePopup').modal('show');

                        // Store show popup to cookies, show only once
                    }
                });
            }
        },
        methods: {
            hidePopup() {
                this.state = false;
            },

            submit(e) {
                e.preventDefault();

                if(this.selectedReason) {
                    axios.post('/rezervace/feedback', {
                        csrf: this.csrf,
                        caravan: this.caravan.id,
                        email: this.email,
                        start_date: this.start_date,
                        end_date: this.end_date,
                        price: this.price,
                        reason: this.selectedReason,
                        message: this.message,
                        visited: this.visited
                    }).then((response) => {
                        if(response.data.message) {
                            $('#leavePopup').modal('hide');
                            //alert(response.data.message);
                        } else {
                            alert(response.data.error);
                        }
                    });

                    //this.$refs.leaveForm.submit();
                }
            }
        },
    }
</script>