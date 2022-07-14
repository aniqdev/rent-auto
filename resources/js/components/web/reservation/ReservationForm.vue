<template>
    <form action="/objednat/store" method="POST" ref="reservationForm" @submit="submit($event)">
        <section id="accessories" class="mb-5" v-if="caravan.accessories">
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6" v-for="accessory in accessories" :key="accessory.id" v-if="accessory.max_count > 0">
                            <div class="megacheckbox d-flex">
                                <!-- <input class="checkbox" :id="'accessory-' + accessory.id" :name="'accessory'[ + accessory.id  + ]['active']" type="checkbox" /> -->
                                <input class="checkbox" :id="'accessory-' + accessory.id" :name="'accessories[' + accessory .id+ '][id]'" type="checkbox" :value="accessory.id" :data-price="accessory.price_per_day" :data-charge="accessory.access_charge" @change="setAttribute" :ref="'accessory-' + accessory.id" />
                                <div class="label" data-toggle="tooltip" data-html="true" :title="accessory.description">
                                    <div class="name">
                                        <label :for="'accessory-' + accessory.id">{{ accessory.name }}</label>
                                    </div>
                                    <div class="price">
                                        {{ accessory.price_per_day }} Kč za den

                                        <template v-if="accessory.access_charge">
                                            + {{ accessory.access_charge }} Kč jednorázový poplatek
                                        </template>
                                    </div>
                                </div>
                                <div class="count-selector">
                                    <select :name="'accessories[' + accessory.id + '][count]'" :data-attribute="accessory.id" @change="updateCount">
                                        <!-- <option :value="index" v-for="(max_count, index) in accessory.max_count_array" :key="index">{{ max_count }}</option> -->
                                        <option :value="index" v-for="index in accessory.max_count" :key="index">{{ index }} ks</option>
                                    </select>
                                </div>
                                <div class="total_price">
                                    <span :id="'accessoryPrice-' + accessory.id">{{ (accessory.price_per_day * daysCount) + accessory.access_charge }}</span> Kč
                                </div>
                                <div class="thumbnail">
                                    <a data-fslightbox="accessories" :href="'storage/' + accessory.thumbnail">
                                        <img :src="'storage/' + accessory.thumbnail" :alt="accessory.name">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="reservation-form">

            <div class="container">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-description">
                            <h3 class="mb-3">Objednatel</h3>
                            <div class="description mb-4">
                                Prosíme vyplňte své pravdivé osobní údaje pro vyhotovení závazné rezervace vozu <strong>{{ caravan.name }}</strong>.
                                <br/><br/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group material-control">
                                    <label for="name" class="col-sm-8">
                                        <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Jméno</span>
                                    </label>
                                    <input type="text" name="name" value="" autocomplete="fname" class="form-control mt-n3" :class="{ 'is-invalid': errors.name }" v-model="form.name">
                                    <div class="invalid-feedback">{{ errors.name }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group material-control">
                                    <label for="last_name" class="col-sm-8">
                                        <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Příjmení</span>
                                    </label>
                                    <input type="text" name="last_name" value="" autocomplete="lname" class="form-control mt-n3" :class="{ 'is-invalid': errors.last_name }" v-model="form.last_name">
                                    <div class="invalid-feedback">{{ errors.last_name }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group material-control">
                                    <label for="date" class="col-sm-8">
                                        <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Datum narození</span>
                                    </label>
                                    <input type="date" name="birthdate" value="" class="form-control mt-n3" :class="{ 'is-invalid': errors.birthdate }"  v-model="form.birthdate">
                                    <div class="invalid-feedback">{{ errors.birthdate }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group material-control">
                                    <label for="phone" class="col-sm-8">
                                        <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Telefon</span>
                                    </label>
                                    <input type="text" name="phone" value="" autocomplete="tel" class="form-control mt-n3" :class="{ 'is-invalid': errors.phone }" v-model="form.phone">
                                    <div class="invalid-feedback">{{ errors.phone }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group material-control">
                                    <label for="email" class="col-sm-8">
                                        <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">E-mail</span>
                                    </label>
                                    <input type="text" name="email" value="" autocomplete="email" class="form-control mt-n3" :class="{ 'is-invalid': errors.email }" v-model="form.email">
                                    <div class="invalid-feedback">{{ errors.email }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-description">
                            <h3 class="mb-3">Fakturační údaje</h3>
                            <div class="description mb-4">
                                Prosíme vyplňte trvalé bydliště nebo sídlo firmy, a to i tehdy, když na této adrese nebydlíte nebo nesídlíte. V takovém případě uveďte také doručovací adresu, na kterou vám zašleme smluvní dokumentaci.
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group material-control">
                                    <label for="address" class="col-sm-8">
                                        <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Ulice, číslo</span>
                                    </label>
                                    <input type="text" name="address" value="" autocomplete="shipping street-address" class="form-control mt-n3" :class="{ 'is-invalid': errors.address }" v-model="form.address">
                                    <div class="invalid-feedback">{{ errors.address }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group material-control">
                                    <label for="city" class="col-sm-8">
                                        <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Město</span>
                                    </label>
                                    <input type="text" name="city" value="" autocomplete="shipping locality" class="form-control mt-n3" :class="{ 'is-invalid': errors.city }" v-model="form.city">
                                    <div class="invalid-feedback">{{ errors.city }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group material-control">
                                    <label for="zip" class="col-sm-8">
                                        <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">PSČ</span>
                                    </label>
                                    <input type="text" name="zip" value="" autocomplete="shipping postal-code" class="form-control mt-n3" :class="{ 'is-invalid': errors.zip }" v-model="form.zip">
                                    <div class="invalid-feedback">{{ errors.zip }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group material-control">
                                    <label for="company" class="col-sm-8">
                                        <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Firma</span>
                                    </label>
                                    <input type="text" name="company" value="" class="form-control mt-n3" v-model="form.company">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group material-control">
                                    <label for="ico" class="col-sm-8">
                                        <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">IČO</span>
                                    </label>
                                    <input type="text" name="ico" value="" class="form-control mt-n3" v-model="form.ico">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group material-control">
                                    <label for="dic" class="col-sm-8">
                                        <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">DIČ</span>
                                    </label>
                                    <input type="text" name="dic" value="" class="form-control mt-n3" v-model="form.dic">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row mb-5">

                    <div class="col-md-6">
                        <div class="form-description">
                            <h3>Způsob platby</h3>
                            <div class="description mb-4">
                                Vyberte prosím způsob platby zálohy a pronájmu.
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="form-check radio">
                                    <label for="bankwire" class="form-check-label">
                                        <input type="radio" name="payment_method" value="bankwire" class="form-check-input" id="bankwire" v-model="form.payment_method"> Bankovním převodem
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="form-check radio">
                                    <label for="cash" class="form-check-label">
                                        <input type="radio" name="payment_method" value="cash" class="form-check-input" id="cash" v-model="form.payment_method"> Hotově / kartou na provozovně
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="invalid-feedback d-block" v-show="errors.payment_method">{{ errors.payment_method }}</div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-description">
                            <h3>Ostatní</h3>
                            <div class="description mb-4">
                                Pokud máte nějaké speciální požadavky, napište nám je prosím do vzkazu k objednávce.
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" name="coupon" value="" class="form-control-solid" placeholder="Sem zadejte kód" v-model="form.coupon" @change="getPrice">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="text" value="" class="form-control-solid" placeholder="Váš vzkaz / poznámka" v-model="form.text">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row" v-if="!logged">

                    <div class="col-md-12 text-center">
                        <div class="form-check checkbox">
                            <label for="register" class="form-check-label">
                                <input type="checkbox" name="register" value="true" class="form-check-input" id="register" v-model="register"> Chci se zaregistrovat
                            </label>
                        </div>
                        <div class="col-md-4 offset-md-4 text-center">
                            <div class="form-group" v-if="register">
                                <input type="password" name="password" value="" class="form-control-solid" placeholder="Vaše heslo" v-model="form.password">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row mb-4">

                    <div class="col-md-12 text-center">
                        <div class="form-check checkbox">
                            <label for="terms" class="form-check-label">
                                <input type="checkbox" name="terms" value="true" class="form-check-input" :class="{ 'is-invalid': errors.terms }" id="terms" v-model="form.terms"> Souhlasím s <a href="/docs/VOP_16.pdf" target="__blank" title="Obchodní podmínky">obchodními podmínkami</a>
                                <div class="invalid-feedback d-block" v-show="errors.terms">{{ errors.terms }}</div>
                            </label>
                        </div>
                    </div>

                </div>

                <input type="hidden" name="_token" :value="csrf">
                <input type="hidden" name="caravan_id" :value="caravan.id">
                <input type="hidden" name="start_date" :value="start_date">
                <input type="hidden" name="end_date" :value="end_date">

                <div class="row justify-content-center mb-5">

                    <div class="price-component d-flex justify-content-center">
                        <div class="bg-white d-flex justify-content-between align-items-center">
                            <span class="label">termín:</span>
                            <span class="value">{{ start_date | formatShortDate }} - {{ end_date | formatDate }}</span>
                        </div>
                        <div class="bg-white d-flex justify-content-between align-items-center">
                            <span class="label">celkové nájemné vč. DPH:</span>
                            <span class="value" :data-value="price">{{ price | formatPrice }} Kč</span>
                        </div>
                        <div class="btn-wrapper">
                            <button type="submit" name="submitBtn" class="primary-btn">
                                Pronajmout <i class="icofont-thin-right"></i>
                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </section>
        <!-- <leave-popup
            :reasons="reasons"
            :caravan="caravan"
            :email="form.email"
            :start_date="start_date"
            :end_date="end_date"
            :price="price"/> -->
    </form>

</template>

<script>


    import moment from 'moment';
    import LeavePopup from '../LeavePopup.vue';

    export default {
        components: {
            LeavePopup
        },
        props: {
            start_date: {
                required: true,
            },

            end_date: {
                required: true,
            },

            result_array: {
                type: Array,
                required: true,
            },

            days_count: {
                type: Number,
                required: true,
            },

            accessories: {
                type: Array,
                required: true,
            },

            caravan: {
                type: Object,
                required: true,
            },

            loggeduser: {
                type: String,
            },

            reasons: {
                type: Object,
                required: false,
            }
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                errors: {},
                daysCount: this.days_count,
                price: 0,
                // sale: this.getResultAttribute(),
                logged: this.loggeduser,
                register: false,
                form: {
                    name: null,
                    last_name: null,
                    birthdate: null,
                    phone: null,
                    email: null,
                    address: null,
                    city: null,
                    zip: null,
                    company: null,
                    ico: null,
                    dic: null,
                    payment_method: null,
                    coupon: null,
                    text: null,
                    terms: null,
                    password: null,
                },
                selectedAccessories: [],
            }


        },
        mounted() {
            this.getPrice();
        },
        created() {

        },
        computed: {
            //
        },

        watch: {
            selectedAccessories: function(val) {
                //
            },
        },

        methods: {

            getResultAttribute() {
                return this.result_array.map(result_arr => {
                        console.log(result_arr)
                        if (result_arr.day_diff == 3) {
                            day_diff3
                        }else{
                            day_diff4
                        }




                })

            },


            setAttribute(e) {
                const countSelector = document.querySelector('select[name="accessories[' + e.target.value + '][count]"]');

                if(e.target.checked) {
                    this.selectedAccessories.push({
                        id: e.target.value,
                        count: countSelector.value,
                        price_per_day: e.target.dataset.price,
                        access_charge: e.target.dataset.charge,
                    });
                } else {
                    const removed = this.selectedAccessories.filter(element => element.id != e.target.value);
                    this.selectedAccessories = removed;
                }

                this.getPrice();
            },

            updateCount(e) {
                const daysCount = this.daysCount;
                const checkbox = document.querySelector('#accessory-' + e.target.dataset.attribute);

                if(!checkbox.checked) {
                    const reference = 'accessory-' + e.target.dataset.attribute;
                    console.log(this.$refs[reference][0].click());
                }

                this.selectedAccessories.filter(function(element) {
                    if(element.id === e.target.dataset.attribute) {
                        element.count = e.target.value;

                        const accessoryPrice = document.querySelector('#accessoryPrice-' + element.id);
                        accessoryPrice.innerHTML = (element.price_per_day * daysCount) * element.count + (element.count * element.access_charge);
                    }
                });

                this.getPrice();
            },

            getPrice() {
                /* this.accessories.map((accessory, index) => {
                    accessory.sort = index + 1;
                }); */

                axios.post('reservation/getPrice', {
                    csrf: this.csrf,
                    caravan_id: this.caravan.id,
                    start_date: this.start_date,
                    end_date: this.end_date,
                    coupon: this.form.coupon,
                    accessories: this.selectedAccessories
                }).then((response) => {
                    this.price = response.data;
                });
            },

            checkForm() {
                this.errors = {};

                if(!this.form.name) {
                    this.errors['name'] = 'Vyplňte prosím Vaše jméno.';
                }

                if(!this.form.last_name) {
                    this.errors['last_name'] = 'Vyplňte prosím Vaše příjmení.';
                }

                if(!this.form.birthdate) {
                    this.errors['birthdate'] = 'Vyplňte prosím Vaše datum narození.';
                }

                if(!this.form.phone) {
                    this.errors['phone'] = 'Vyplňte prosím Váš telefón.';
                }

                if(!this.form.email) {
                    this.errors['email'] = 'Vyplňte prosím Váš e-mail.';
                }

                if(!this.form.address) {
                    this.errors['address'] = 'Vyplňte prosím Vaší adresu.';
                }

                if(!this.form.city) {
                    this.errors['city'] = 'Vyplňte prosím město.';
                }

                if(!this.form.zip) {
                    this.errors['zip'] = 'Vyplňte prosím PSČ.';
                }

                if(!this.form.payment_method) {
                    this.errors['payment_method'] = 'Zvolte prosím způsob platby.';
                }

                if(this.register && !this.form.password) {
                    this.errors['password'] = 'Zadejte prosím heslo.';
                }

                if(!this.form.terms) {
                    this.errors['terms'] = 'Pro dokončení rezervace je nutné souhlasit s obchoními podmínkami.';
                }

                if(!this.errors.length) {
                    return true;
                }
            },

            submit(e) {
                this.checkForm();
                e.preventDefault();

                if(!Object.keys(this.errors).length) {
                    const submitBtn = document.querySelector('[name="submitBtn"]');
                    submitBtn.classList.add('spinner');
                    this.$refs.reservationForm.submit();
                }
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
    }
</script>

<style>
    @keyframes animation-spinner {
        to {
            transform:rotate(360deg);
        }
    }

    [name="submitBtn"].spinner i {
        opacity: 0;
    }

    [name="submitBtn"].spinner::before {
        content: "";
        border: 2px solid #fff;
        border-right: 2px solid transparent;
        border-radius: 50%;
        width: 1.5rem;
        height: 1.5rem;
        margin-top: -.75rem;
        position: absolute;
        top: 50%;
        left: auto;
        right: 1.1rem;
        animation-duration: 0.5s;
        animation-timing-function: linear;
        animation-delay: 0s;
        animation-iteration-count: infinite;
        animation-direction: normal;
        animation-fill-mode: none;
        animation-play-state: running;
        animation-name: animation-spinner;
        animation: animation-spinner .5s linear infinite;
        pointer-events: none;
    }
</style>
