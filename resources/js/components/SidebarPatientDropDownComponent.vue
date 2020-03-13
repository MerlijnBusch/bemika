<template>
        <div class="person-list" :class="{'person-hidden-list' : !active}">
            <li>ICON <a :href="`${url}/dashboard/patient/profile/${patient.id}`">User profile</a></li>
            <li>ICON <a :href="`${url}/dashboard/patient/tasks1/${patient.id}`">Tasks</a></li>
            <li>ICON <a :href="`${url}/dashboard/patient/calender/${patient.id}`">Calendar</a></li>
            <li>ICON <a :href="`${url}/dashboard/patient/summary/${patient.id}`">Summary</a></li>
        </div>
</template>
<script>
    export default {
        props: ['patient','active'],
        data(){
            return {
                url: window.location.origin
            }
        },
    }
</script>
