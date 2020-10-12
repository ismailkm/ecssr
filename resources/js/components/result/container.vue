<template>

  <v-layout column align-center>

    <v-card
        class="mx-auto my-12"
        max-width="374"
      >
      <v-progress-circular
        indeterminate
        color="primary"
        v-if="loading"
      ></v-progress-circular>

      <v-alert v-if="error" type="error">
        {{error}}
      </v-alert>

      <v-card-title v-if="testItems !== null && testItems.length == 0">
        You have't have taken any test yet.
        <v-card-actions>
          <v-btn
            depressed
            color="primary"
            @click="$router.push('exam')"
           >
            Start Your Test
          </v-btn>
         </v-card-actions>
      </v-card-title>
    </v-card>


    <v-expansion-panels>
      <v-expansion-panel
        v-for="item in testItems"
        :key="item.id"
      >
        <v-expansion-panel-header>
          Test @ {{moment(item.created_at).utc().format('DD-MM-YYYY hh:mm A')}} you scored <span class="font-weight-black ml-2">{{item.correct_results_count}}/{{item.results_count}}</span>
        </v-expansion-panel-header>
        <v-expansion-panel-content>
          <Answers :results="item.results"/>
        </v-expansion-panel-content>
      </v-expansion-panel>
    </v-expansion-panels>
  </v-layout>
</template>

<script>
  import { API_END_POINTS } from '../../constants';
  import Answers from './partial/Answers'
  var moment = require('moment');
  export default {
    data () {
      return {
        moment:moment,
        loading: true,
        testItems: null,
        error: null
      }
    },//data
    components: {
      Answers
    },//components
    created () {
    // fetch the data when the view is created and the data is
    // already being observed
    this.fetchMyResults()
    },//created
    methods:{
      fetchMyResults () {
        axios.get(API_END_POINTS.MY_RESULTS)
             .then(response => {
                this.testItems = response.data.data.tests;
                this.loading = false;
             }).catch(error => {
               this.error = error.message;
               this.loading = false;
             });
      }//fetchMyResults
    }//methods
  }
</script>
