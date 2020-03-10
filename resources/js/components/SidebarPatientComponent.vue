<template>
    <div class="sidebar">
        <a class="sidebar-add-person" :href="`${'/patient/create'}`">
            <i class="material-icons sidebar-add-person-icon">person_add</i>
            <span class="sidebar-add-person-text">Add Patient</span>
        </a>
        <div class="sidebar-person" :class="{dropDownOpen: toggleDropDownBooleans[index]}" v-for="(patient, index) in patients">
            <button class="sidebar-person-button" @click="toggleDropdown(index)" >
                <div class="sidebar-person-color" :style="{backgroundColor: patient.color_code}" :class="{'sidebar-person-open': toggleDropDownBooleans[index]}"></div>
                <div class="sidebar-person-text">{{patient.name}}</div>
            </button>
            <sidebar-patient-drop-down-component :active="toggleDropDownBooleans[index]" :patient="patient"></sidebar-patient-drop-down-component>
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
