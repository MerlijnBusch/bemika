<template>
    <div>
        {{this.selectedMonthString}} {{this.selectedYear}}
        <button>previous month</button>
        <button @click="nextMonth">next month</button>
        <ul class="month-list">
            <li class="month-item-disabled" v-for="index in (firstWeekdayOfTheMonth + 5) % 7"
                :key="'previousMonth' + index">
                <div class="month-item-box">
                    <span class="month-item-number">
                        {{getDaysInMonthYear(selectedYear,(selectedMonth - 1)) -  (firstWeekdayOfTheMonth + 5) + index}}
                    </span>
                </div>
            </li>
            <li class="month-item" v-for="index in daysInSelectedMonthYear" :key="'currentMonth' + index">
                <div class="month-item-box">
                <span class="month-item-number">
                        {{index}}
                    </span>
                    <Tasks :tasks="data[index]"></Tasks>
                </div>
            </li>
            <li class="month-item-disabled" v-for="index in (firstWeekdayOfTheMonth + daysInSelectedMonthYear) % 7"
                :key="'followingMonth' + index">
                <div class="month-item-box">
                <span class="month-item-number">
                        {{index}}
                    </span>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import Tasks from './Tasks.vue'
    import MonthFilter from '../../../DashboardFilters/MonthFilter'

    export default {
        name: 'calendar',
        props: ['data'],
        data() {
            return {
                date: new Date(),
                arrays: {
                    months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    weekdays: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
                },
            }
        },
        components: {Tasks},
        computed: {
            selectedYear() {
                return this.date.getFullYear();
            },
            selectedMonth() {
                return this.date.getMonth();
            },
            selectedMonthString() {
                return this.arrays.months[this.selectedMonth + 11]
            },
            daysInSelectedMonthYear() {
                return this.getDaysInMonthYear(this.selectedYear, this.selectedMonth);
            },
            firstWeekdayOfTheMonth() {
                return new Date(this.selectedYear, this.selectedMonth, 1).getDay();
            }
        },
        methods: {
            getDaysInMonthYear(year, month) {
                return new Date(year, month, 0).getDate()
            },
            nextMonth() {
                this.data = MonthFilter.next();
                this.date = new Date(MonthFilter.date);
            }
        },
        mounted() {
            let arrayKeys = Object.keys(this.arrays);
            for (let i = 0; i < arrayKeys.length; i++) {
                let array = this.arrays[arrayKeys[i]];
                array.push(...array);
                this.arrays[arrayKeys[i]] = array;
            }
        }
    }
</script>