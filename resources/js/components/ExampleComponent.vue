<script setup>
import { reactive, ref } from 'vue';

const counter = reactive({ count: 0 });
const message = ref('Hello World!');
const count = ref(0);

const text = ref('');

const titleClass = ref('title');

function increment() {
    count.value++;
}


function onInput(e) {
    text.value = e.target.value;
}

</script>



<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.

                        Tesing Count: {{ counter.count }}
                        <h1 :class="titleClass">{{ message }}</h1>
                        <button class="btn btn-primary" @click="increment">Count is: {{ count }}</button>

                        <input class="input" :value="text" @input="onInput" placeholder="Type here">
                        <p>{{ text }}</p>
                    </div>
                </div>
            </div>
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

<style>
.title {
    color: red;
}
</style>
