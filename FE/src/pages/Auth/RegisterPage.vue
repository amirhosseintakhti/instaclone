<template>
  <q-page padding>
    <div class="row">
      <div class="col-12">
        <q-input label="name" type="text" v-model="name"/>
      </div><div class="col-12">
        <q-input label="email" type="email" v-model="email"/>
      </div>
      <div class="col-12">
        <q-input label="password" type="password" v-model="password" />
      </div>
      <div class="col-12">
        <q-btn label="register" class="full-width" color="light-green-7" @click="register" />
      </div>

    </div>
  </q-page>
</template>

<script>
import { api } from 'src/boot/axios';
import { toRefs,reactive } from 'vue';
import { useQuasar } from 'quasar'
import { useRouter } from 'vue-router';

// import { routerKey } from 'vue-router';
export default {
setup(){
  const $q = useQuasar()
  const router = useRouter()
 const props = reactive({
  name:null,
  email:null,
  password:null
 })
 function register() {
  api.post('api/register' ,{
    name:props.name,
    email:props.email,
    password:props.password,
  })
  .then((r) =>{
    if(r.data.status){
      $q.notify({
          message: 'successfully Registered!',
          color: 'positive',
        });
        router.push('login')
    }else{
      $q.notify({
          message: 'try again',
          color: 'negative',
        });
    }
  })
  .catch((e)=>{
    console.log(e);
    $q.notify({
          message: 'try again',
          color: 'negative',
        });
  });
 }
 return{
  ...toRefs(props),
  register
 }
}
}
</script>
