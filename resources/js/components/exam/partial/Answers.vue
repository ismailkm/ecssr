<template>
  <v-list >
     <v-list-item
      v-for="result in results"
     :key="result.id">
        <v-list-item-content>

          <v-list-item-title class="mb-1">
            Question: {{result.question.title }}
          </v-list-item-title>
          <v-list-item-subtitle class="text--primary">
            Your Answer: {{result.answer}}
            <span v-if="result.is_correct" class='green--text'>Correct</span>
            <span v-else class='red--text'>Incorrect</span>
          </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
  </v-list>
</template>
<script>
  export default {
    props: ['results'],
  }
</script>
