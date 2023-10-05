<template>
  <div class="modal is-active">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <slot name="header"></slot>
            <slot></slot>
            <slot name="footer"></slot>
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close" @click="close"></button>
  </div>
</template>

<script setup>

const emit = defineEmits('close')

function close(){
    emit('close')
}

</script>


<style scoped>
@import "https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css";
</style>