<template>

  <div>
   <!-- <img :src="imageSrc" alt="" class="my-default-class" :class="{'my-class':is_admin, 'my-other-class':!is_admin}"> -->
   
   <Nav />

  <router-view></router-view>
    
  <!-- <input type="text" placeholder="Search" @:keyup="search"> -->

  </div>
</template>

<script setup>

import Nav from '@/components/Nav.vue'
import CountChild from '@/components/CountChild.vue'

import _ from 'lodash'

import {ref, onMounted, reactive} from 'vue'

const count = ref(0)

const img = ref(null)
const product = ref([])

const search = _.debounce(() => {
  console.log('search')
}, 1000)

/* function search(){
  console.log('search')
} */

const products = reactive([
  {
    id:1,
    name: 'Imac'
  },
  {
    id:2,
    name: 'Teclado'
  }
])

onMounted(() => {
  // console.log(document.querySelector('#img')['src'])
  // console.log(document.querySelectorAll('#product'))
  // console.log(img.value['src'])
  console.log(product.value)
}),

function add(value){
  count.value += value
}

</script>

<style scoped>
.my-class{
  border: 4px solid red;  
}

.my-other-class{
  border: 4px solid blue;
}
</style>
