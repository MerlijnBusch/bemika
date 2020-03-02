<template>
    <div class="dropdown">
        <div class="dropdown__header">
            <span>Header</span> text
            <i class="fa fa-angle-down" aria-hidden="true"></i>
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </div>

        <div class="dropdown__content">
            <ul>
                <li>Lorem ipsum</li>
                <li>Lorem ipsum dolor sit</li>
                <li>Lorem ipsum dolor</li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
