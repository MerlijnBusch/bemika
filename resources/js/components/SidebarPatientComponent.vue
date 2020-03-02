<template>
    <div>
        <div v-for="(patient, index) in patients">
            <div @click="toggleDropdown(index)">{{patient.name}} {{toggleDropDownBooleans[index]}} </div>
            <sidebar-patient-drop-down-component v-if="toggleDropDownBooleans[index]"></sidebar-patient-drop-down-component>
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
                toggleDropDownBooleans: [null],
            }
        },
        mounted() {
            this.$store.dispatch('fetchPatients');
        },
        watch:{
            patients() {
                this.toggleDropDownBooleans = new Array(this.patients.length);
                for(let i = 0; i < this.toggleDropDownBooleans.length; i++){
                    this.toggleDropDownBooleans[i] = false;
                }
            }
        },
        computed: {
            ...mapGetters([
                'patients'
            ])
        },
        methods: {
            toggleDropdown (index) {
                this.toggleDropDownBooleans[index] = !this.toggleDropDownBooleans[index];
                this.$forceUpdate();
                // console.log(this.toggleDropDownBooleans[0])
            }
        }
    }
</script>

<style scoped>

</style>
