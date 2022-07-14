<template>
    <div class="form-group">
        <div class="alert alert-danger" v-if="error">
            Nepodařilo se aktualizovat status.
        </div>
        <label>Status</label>
        <select class="form-control form-control-solid" v-model="selectedStatus" @change="update()">
            <option v-for="status in statuses" :key="status.id" :value="status.id" >{{ status.name }}</option>
        </select>
    </div>
</template>

<script>
    export default {
        props: [
            'reservation',
            'statuses',
            'selected',
        ],
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                selectedStatus: this.selected,
                error: false,
            }
        },
        mounted() {
            //
        },
        created() {

        },
        computed: {
            //
        },
        methods: {
            update() {
                axios.put('/admin/rezervace/update/status', {
                    reservation: this.reservation,
                    status_id: this.selectedStatus,
                }).then((response) => {
                    location.reload();
                    this.error = false;
                }).catch((error) => {
                    this.error = true;
                });
            },
        }
    }
</script>
