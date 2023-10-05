<template>
    <div>
        Likes: {{ props.likes }}
        Comments: {{ props.comments }}
    </div>
</template>

<script setup>
    const props = defineProps({
        likes:Number|String,
        comments:Number|String
    })
</script>