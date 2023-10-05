<template>
    
    <form action="" @submit.prevent="create">
        <input type="text" placeholder="First Name" v-model="user.firstName">
        <span v-if="errorsForm['errors'].firstName" class="error">{{ errorsForm['errors'].firstName[0] }}</span>

        <input type="text" placeholder="Last Name" v-model="user.lastName">
        <span v-if="errorsForm['errors'].lastName" class="error">{{ errorsForm['errors'].lastName[0] }}</span>

        <input type="text" placeholder="E-mail" v-model="user.email">
        <span v-if="errorsForm['errors'].email" class="error">{{ errorsForm['errors'].email[0] }}</span>

        <input type="text" placeholder="Password" v-model="user.password">
        <span v-if="errorsForm['errors'].password" class="error">{{ errorsForm['errors'].password[0] }}</span>

        <button type="submit">Create</button>
    </form>
</template>

<script setup>

import http from '@/services/http.js'
import { reactive } from 'vue';

const user = reactive({})
const errorsForm = reactive({errors:{}})

async function create(){
    try {
        const {data} = await http.post('api/user', user)
        console.log(data)
    } catch (errors) {
        if(errors.response?.data){
            errorsForm['errors'] = errors.response.data['errors']
        }
        console.log(errors.response.data)
    }
}

</script>

<style scoped>
.error{
    color:red;
}
</style>