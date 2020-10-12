<template>
  <v-app id="inspire">
    <NavBar />

    <v-main>
      <v-container>
        <v-layout row class="ma-4">
            <router-view class="fill-height" fluid/>
        </v-layout>

      </v-container>
    </v-main>
  </v-app>
</template>

<script>
  import {LOGIN_URL} from '../constants';
  import NavBar from './common/NavBar'
  export default {
    created(){
      if(localStorage.hasOwnProperty('ecssr_token'))
      {
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('ecssr_token');
        this.$store.dispatch('CurrentStudent/getStudentDetails');
      }else
      {
        window.location.replace(LOGIN_URL);
      }
    },
    computed:{
      currentStudent:{
        get(){
          return this.$store.getters['CurrentStudent/getStudent'];
        }
      }
    },//computed
    components:{
      NavBar
    }//components
  }
</script>
