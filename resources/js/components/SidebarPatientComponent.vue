<template>
    <div>
        <div v-for="patient in patients">
            <div @click="toggleDropdown($event)">{{patient.name}}</div>
            <sidebar-patient-drop-down-component v-if="toggleDropDownBoolean"></sidebar-patient-drop-down-component>
        </div>
    </div>

</template>

<script>
    import {mapGetters} from 'vuex'
    import SidebarPatientDropDownComponent from './SidebarPatientDropDownComponent.vue'

    export default {
        name: "Patients",
        components: {
            SidebarPatientDropDownComponent
        },
        data(){
            return{
                toggleDropDownBoolean: false,
            }
        },
        mounted() {
            this.$store.dispatch('fetchPatients');
            this.toggleDropDownBoolean = false;
        },
        computed: {
            ...mapGetters([
                'patients'
            ])
        },
        methods: {
            toggleDropdown (event) {
                this.toggleDropDownBoolean = !this.toggleDropDownBoolean;
                console.log(this.toggleDropDownBoolean);
            }
        }
    }
</script>

<style scoped>

</style>
