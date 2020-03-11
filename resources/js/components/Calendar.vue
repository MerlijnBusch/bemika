<template>
    <div class="calender">

    </div>
</template>

<script>

    export default {
        name: 'calendar',
        props: ['data'],
        data(){
            return {
                date: new Date(),
            }
        },
        mounted() {

        }
    }
</script>
