<template>
    <div class="tasks">
        <div v-for="dot in dots" :key="dot.patient.id" :style="{backgroundColor : dot.patient.color_code}">
            {{dot.activities.length}}
        </div>
    </div>
</template>

<script>
    export default {
        props: ['tasks'],
        data() {
            return {
                dots: [],
            }
        },
        mounted() {
            for (let i = 0; i < this.tasks.length; i++) {
                // console.log(this.dots.findIndex(d => d.patient === this.tasks[i].patient));
                if (this.dots.findIndex(d => d.patient.id === this.tasks[i].patient.id) === -1) {
                    this.dots.push(
                        {patient: this.tasks[i].patient,
                            activities: [this.tasks[i].activity],
                        });
                } else {
                    this.dots[this.dots.findIndex(d => d.patient.id === this.tasks[i].patient.id)].activities.push(this.tasks[i].activity);
                }
            }
        }
    }
</script>