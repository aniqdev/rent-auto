<template>
    
    <div class="top-menu">

        <ul class="top-menu__primary">

            <li 
                class="top-menu__item"
                v-for="(menuItem, index) in topMenuItems" 
                :key="index"
            >

                <a 
                    class="top-menu__link"
                    :class="{active: menuItem.active}" 
                    :href="menuItem.link"
                >
                
                    {{ menuItem.name }}
                
                </a>

            </li>

        </ul>

        <ul class="top-menu__secondary">

            <li class="top-menu__item">

                <a href="#0"  class="icon-btn">
                    <i class="icofont-envelope"></i>
                </a>

            </li>

            <li class="top-menu__item">

                <a href="#0"  class="icon-btn">
                    <i class="icofont-phone"></i>
                </a>

            </li>

            <li class="top-menu__item top-menu__dropdown">

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span v-for="(item, index) in langMenuItems" :key="index" v-show="item.active">{{ item.name }}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" v-for="(item, index) in langMenuItems" :key="index" v-show="!item.active">{{ item.name }}</a>
                    </div>
                </div>

            </li>

        </ul>

    </div>

</template>

<script>

    export default {
     
        data(){

            return {

                topMenuItems: [
                    
                    { name: 'O půjčovně', link: '/o-pujcovne', active: true },
                    { name: 'Dárkové poukazy', link: '/darkove-poukazy', active: false },
                    { name: 'Ochrana osobních údajů', link: '/ochrana-osobnich-udaju', active: false }

                ],

                // active item is in selection button
                langMenuItems: [
                    
                    { name: 'Česky', link: '#0', active: true },
                    { name: 'English', link: '#0', active: false },
                    { name: 'Deutsche', link: '#0', active: false }

                ]

            }

        }

    }

</script>