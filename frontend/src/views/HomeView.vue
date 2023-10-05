<template>
  <div>
    
    <input type="text" placeholder="Search" v-model="userSearch" @keyup="search" class="input">

    <ul>
      <li v-for="(user, index) in users['users']">{{ user.firstName }} {{user.lastName}}</li>
    </ul>

    <div v-html="userNotFound"></div>

  </div>
</template>

<script setup>

import http from '@/services/http'
import _ from 'lodash'

import { onMounted, ref, reactive, computed } from 'vue';

const users = reactive({users:[]})
const userSearch = ref()
const loading =  ref(true)

const userNotFound = computed(() => {
  return (!loading.value && users['users'].length <= 0) ? '<span id="notFound">Nenhum user encontrado</span>' : ''
})

onMounted(async () => {
  try {
    const {data} = await http.get('api/users')
    users['users'] = data
    loading.value = false
  } catch (error) {
    console.log(error.response.data)
  }
})

const search = _.debounce(async () => {

  try {
    const {data} = await http.get('api/users/search',{
      params:{
        user:userSearch.value
      }
    })

    users['users'] = data
    console.log(data)
  } catch (error) {
    console.log(error.response.data)
  }

}, 1000)


</script>

<style>
#notFound{
  color: #000;
  background-color: #d3d3d3;
  display: block;
  top: 100px;
  padding: 20px;
  border-radius: 2%;
  padding-left: 60px;
  padding-right: 60px;  
  margin-left: 15px;
  margin-right: 275px;
  
}

.input{
  text-align: start;
  font-family: sans-serif;
  font-size: 14px;
  font-weight: 100;
  

  box-sizing: border-box;
  height: 45px;
  padding: 10px;
  margin-top: 10px;
  margin-left: 15px;
  padding-right: 134px;
}
</style>