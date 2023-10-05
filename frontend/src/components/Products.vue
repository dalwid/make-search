<template>
    <div>
        <ul>
            <slot v-for="(product, index) in products" :key="index" v-bind:product="product"></slot>
        </ul>
    </div>
</template>

<script setup>
defineProps(['products'])
</script>