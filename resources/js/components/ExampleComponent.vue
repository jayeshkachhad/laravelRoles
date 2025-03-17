<script setup>

import { ref } from 'vue';

const name = ref("ExampleComponent");

const print = (a) => {
    return "value = " + a;
}


</script>

<template>
    <div>
        <h1>Welcome to Laravel 12 with Vue 3</h1>
        <h2>Welcome Mr. {{ name }}</h2>
        <h2>Welcome {{ print(65) }}</h2>
    </div>
</template>
