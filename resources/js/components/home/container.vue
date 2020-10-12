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
            Welcome
        </v-card-title>

        <v-card-text>
          <p class="font-weight-medium">This is ECSSR online testing platform.</p>
          <p class="font-weight-medium">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque imperdiet fringilla tristique. In hac habitasse platea dictumst. Vivamus in tempus ex, sit amet ullamcorper felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean in turpis aliquet, feugiat neque ac, dictum libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi nulla elit, egestas non suscipit ut, interdum a nibh. Mauris eget dapibus lacus, non volutpat dolor. Donec ut erat sed ante mollis mattis eu eget libero.
          </p>
        </v-card-text>

        <v-card-actions>
          <v-btn
            depressed
            color="primary"
            @click="$router.push('exam')"
           >
            Start Your Test
          </v-btn>
         </v-card-actions>

        </v-card>
      </v-col>
      <v-col cols="6" md="4">
        <TopScorer />
      </v-col>
    </v-row>
  </v-container>

</template>

<script>
  import TopScorer from './partial/TopScorer'
  export default{
    components:{
      TopScorer
    }//components
  }
</script>
