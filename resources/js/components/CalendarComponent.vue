<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component {{title}}</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data(){
            return {
                title: "Hello world!"
            }
        },
        mounted() {
            console.log(this.data);
            console.log('Component mounted.')
        }
    }
</script>
