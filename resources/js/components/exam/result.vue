<template>
  <v-container class="grey lighten-5">
    <v-row>
      <v-col
        cols="12"
        md="8"
      >
        <v-card
          class="pa-2"
          outlined
          tile
        >
        <v-card-title>
            Your Result
        </v-card-title>

        <v-card-text>
          <p class="font-weight-medium">
          Thank you for taking the time to complete our Test.
          </p>
        </v-card-text>

        <v-layout column align-center>
          <v-progress-circular
            indeterminate
            color="primary"
            v-if="loading"
          ></v-progress-circular>
          <v-alert v-if="error" type="error">
            {{error}}
          </v-alert>
        </v-layout>

        <v-layout column v-if="loading == false && error === null && result">
            <v-card-title column>
                You Scored <span class="ml-2 font-weight-bold"> {{result.correct_results_count}}/{{result.results_count}} </span>
            </v-card-title>
            <Answers v-if="result" :results="result.results"/>
        </v-layout>


        <v-card-actions>
          <v-btn
            depressed
            color="primary"
            @click="$router.push('exam')"
           >
            Start Another Test
          </v-btn>
         </v-card-actions>

        </v-card>
      </v-col>
    </v-row>
  </v-container>

</template>

<script>
  import { API_END_POINTS } from '../../constants';
  import Answers from './partial/Answers'
  export default{
    data () {
      return {
        loading: false,
        error: null,
        result: null,
      }
    },//data
    components: {
      Answers
    },//components
    created() {
      if(this.$route.params.answerSheet){
        this.submitStudentTest();
      }else{
        this.$router.push('/');
      }
    },//created
    methods:{
      submitStudentTest () {
        let requestData = {results: this.$route.params.answerSheet};
        axios
        .post(API_END_POINTS.SUBMIT_TEST, requestData)
        .then( response => {
          this.result = response.data.data;
          console.log(this.result);
          this.loading = false;
        }).catch(error => {
          if(error.response){
            this.error = error.response.data.message;
          }else{
            this.error = error.message;
          }
          this.loading = false;
        })
      }//submitStudentTest
    }//methods
  }
</script>
