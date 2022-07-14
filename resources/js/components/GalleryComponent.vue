<template>
    <draggable v-model="photos" ghost-class="ghost" @start="drag=true" @end="drag=false" @change="update">
        <transition-group type="transition" :name="!drag ? 'flip-list' : null">
            <div class="symbol symbol-120 mr-3 galleryPhoto" v-for="photo in photos" :key="photo.id">
                <img :src="'/storage/' + photo.photography" alt="photo.id">
                <i class="symbol-badge bg-danger removePhoto" @click="removePhoto(photo.id)"></i>
            </div>
        </transition-group>
    </draggable>
</template>

<script>
    export default {
        props: [
            'data',
            'model',
        ],
        data() {
            return {
                reload: true,
                photos: null,
            }
        },
        mounted() {
            this.photos = this.data;
        },
        
        methods: {
            update() {
                this.photos.map((photo, index) => {
                    photo.pivot.sort = index + 1;
                });

                axios.put('/admin/karavany/update/sortPhoto', {
                    photos: this.photos
                }).then((response) => {
                    // Success alert
                });
            },

            removePhoto(id) {
                axios.put('/admin/karavany/destroy/photo', {
                    photo: id,
                    caravan: this.model,
                }).then((response) => {
                    this.photos.splice(this.photos.indexOf(id), 1);
                });
            }
        }
    }
</script>
<style scoped>
    .galleryPhoto {
        cursor: pointer;
    }

    .removePhoto {
        cursor: pointer;
    }
</style>