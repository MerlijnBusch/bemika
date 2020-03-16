<template>
    <div class="calender">
        <button @click="selected = 'Month'">Month</button>
        <button @click="selected = 'Week'">Week</button>
        <button @click="selected = 'Day'">Day</button>
        <month-calendar v-if="selected === 'Month'" :data="data"></month-calendar>
    </div>
</template>

<script>

    import monthCalendar from './Calendar/Month/Main'

    export default {
        name: 'calendarHolder',
        props: ['data'],
        data() {
            return {
                selected: 'Month', //Month, Week or Day
            }
        },
        components: {monthCalendar},
    }
</script>