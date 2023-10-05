<template>
    <button @click="add">Add from child components</button>
</template>

<script setup>

const emit = defineEmits(['addCount'])

function add(){
    emit('addCount', 10)
}

</script>