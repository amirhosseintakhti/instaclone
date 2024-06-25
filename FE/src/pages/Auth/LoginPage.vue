<template>
  <q-page padding>
<div class="row">
  <div class="col-12">
    <q-input v-model="email" type="email"></q-input>
  </div>
  <div class="col-12">
    <q-input v-model="password" type="password"></q-input>
  </div>
  <div class="col-12">
    <q-btn @click="login" label="login"></q-btn>
  </div>
</div>
  </q-page>
</template>
<script>

import { reactive, toRefs } from 'vue';
import { api } from 'src/boot/axios';
export default {
  // name: 'PageName',
  setup(){
    const props = reactive({
      email:null,
      password:null
    })
    function login(){
      api.post('api/login',{
        email:props.email,
        password:props.password,
      })
      .then(r => {
        console.log(r.data);
      })
      .catch(e =>{

      } )
    }
    return {
      ...toRefs(props),
      login
    }
  }
}
</script>
