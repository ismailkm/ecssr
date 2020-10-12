<template>
  <v-card
    class="pa-2"
    outlined
    tile
  >
    <v-card-title>
      <v-icon
        large
        left
      >
        mdi-school
      </v-icon>
      <span class="title font-weight-light">Top 10</span>
    </v-card-title>

    <v-alert v-if="error" type="error">
      {{error}}
    </v-alert>

    <v-layout column align-center v-if="loading">
      <v-progress-circular
        indeterminate
        color="primary"
      ></v-progress-circular>
    </v-layout>

    <v-list v-if="scorers">
        <v-list-item
            v-for="scorer in scorers"
            :key="scorer.id">
          <v-list-item-content>
            <v-list-item-title class="mb-1">
              {{ scorer['student']['name'] }} scored: {{ scorer['correct_results_count'] }}/{{ scorer['results_count'] }}
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
  </v-card>
</template>
<script>
  import { API_END_POINTS } from '../../../constants';
  export default {
    data () {
      return {
        loading: true,
        scorers: null,
        error: null
      }
    },//data
    created () {
    // fetch the data when the view is created and the data is
    // already being observed
    this.fetchTopScorers()
    },//created
    methods:{
      fetchTopScorers () {
        axios.get(API_END_POINTS.TOP_SCORERS)
             .then(response => {
                this.scorers = response.data.data.tests;
                this.loading = false;
             }).catch(error => {
               this.error = error.message;
               this.loading = false;
             });
      }//fetchTopScorers
    }//methods
  }
</script>
