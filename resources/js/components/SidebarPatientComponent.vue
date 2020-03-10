<template>
    <div>
        <div class="layouts-sidebar-add-person">
            <i class="material-icons layouts-sidebar-add-person-icon">person_add</i>
            <a class="layouts-sidebar-add-person-url" :href="`${'/patient/create'}`">Add Patient</a>
        </div>
        <div v-for="(patient, index) in patients">
            <div @click="toggleDropdown(index)" :class="{dropDownOpen: toggleDropDownBooleans[index]}">{{patient.name}}</div>
            <sidebar-patient-drop-down-component v-if="toggleDropDownBooleans[index]" :patient="patient"></sidebar-patient-drop-down-component>
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
                data(){
                    return {
                        url: window.location.origin
                    }
                },
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
            }
        }
    }
</script>
