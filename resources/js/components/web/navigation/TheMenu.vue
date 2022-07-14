<template>

    <ul class="menu">

        <li 
            class="menu-item"
            v-for="(menuItem, index) in menuItems" 
            :key="index"
        >

            <a 
                class="menu-link"
                :class="{active: menuItem.active}" 
                :href="menuItem.link" 
                :title="menuItem.name"
            >
            
                {{ menuItem.name }}
            
            </a>

        </li>

    </ul>

</template>

<script>

    export default {

        props: {

            menuItems: {
                type: Array,
                required: true
            }

        }

    }

</script>