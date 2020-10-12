<template>
  <nav>

    <v-navigation-drawer
      class="blue accent-2"
      dark=""
      v-model="drawer"
      app
    >
      <v-layout column align-center>
          <v-flex class="mt-10 mb-8">
            <v-icon large>mdi-polymer</v-icon>
          </v-flex>
      </v-layout>
      <v-list>
          <v-list-item to="/home" link>
            <v-list-item-icon>
                <v-icon>mdi-home</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>Home</v-list-item-title>
              </v-list-item-content>
          </v-list-item>
          <v-list-item to="/exam" link>
            <v-list-item-icon>
                <v-icon>mdi-android</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>Start Test</v-list-item-title>
              </v-list-item-content>
          </v-list-item>
          <v-list-item to="/result" link>
            <v-list-item-icon>
                <v-icon>mdi-school</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>My Results</v-list-item-title>
              </v-list-item-content>
          </v-list-item>
          <v-list-item link @click="logout">
            <v-list-item-icon>
                <v-icon>mdi-power</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>Logout</v-list-item-title>
              </v-list-item-content>
          </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </nav>
</template>
<script>
  export default {
    data(){
      return {
        drawer: true,
      }
    },
    methods:{
      logout(){
        this.$store.dispatch('CurrentStudent/logoutStudent');
      }
    },
  }
</script>
