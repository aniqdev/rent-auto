<template>

    <header class="header">

        <div class="logo__wrapper">

            <a href="#0" class="logo__link" title="www.topobytnevozy.cz">

                <logo-bright />

            </a>

        </div>

        <div class="nav__wrapper">

            <div class="top-nav" :class="{active: topNavActive}">

                <top-menu />

            </div>

            <div class="bottom-nav">

                <the-menu

                    :menuItems="[

                        { name: 'Domů', link: '/', active: true },
                        { name: 'Půjčovna Praha', link: '/pujcovna-praha', active: false },
                        { name: 'Půjčovna Tenerife', link: '/pujcovna-tenerife', active: false },
                        { name: 'Nájemné', link: '/najemne', active: false },
                        { name: 'Cestovní informace', link: '/cestovni-informace', active: false },
                        { name: 'Aktuality', link: '/aktuality', active: false },
                        { name: 'Kontakt', link: '/kontakt', active: false }

                    ]"

                />

            </div>

        </div>

    </header>

</template>

<script>

    export default {

        data(){

            return {

                // hide or show top nav bar
                topNavActive: true

            }

        },

        methods: {

            handleScroll(){

                if ( window.pageYOffset > 0 ){

                    this.topNavActive = false;

                }else{

                    this.topNavActive = true;

                }

            }

        },

        created(){

            window.addEventListener('scroll', this.handleScroll);

        },

        destroyed(){

            window.removeEventListener('scroll', this.handleScroll);

        }

    }

</script>
