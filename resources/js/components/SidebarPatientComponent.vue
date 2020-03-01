<template>
    <div>
        <table>
            <tbody>
            <tr v-for="patient in patients">
                <td>{{patient.name}}</td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        name: "Patients",
        mounted() {
            this.$store.dispatch('fetchPatients')
        },
        computed: {
            ...mapGetters([
                'patients'
            ])
        }
    }
</script>

<style scoped>

</style>
