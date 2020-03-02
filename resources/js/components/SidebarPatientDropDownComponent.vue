<template>
    <div class="dropdown">
        <div class="dropdown__header">
            <span>Header</span> text
            <i class="fa fa-angle-down" aria-hidden="true"></i>
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </div>

        <div class="dropdown__content">
            <ul>
                <li><a :href="`${url}/dashboard/patient/profile/${patient.id}`">User profile</a></li>
                <li><a :href="`${url}/dashboard/patient/tasks/${patient.id}`">Tasks</a></li>
                <li><a :href="`${url}/dashboard/patient/calender/${patient.id}`">Calendar</a></li>
                <li><a :href="`${url}/dashboard/patient/summary/${patient.id}`">Summary</a></li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['patient'],
        data(){
            return {
                url: window.location.origin
            }
        },
    }
</script>
