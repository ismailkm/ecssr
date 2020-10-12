<template>
  <v-list >
     <v-list-item
      v-for="question in questions"
     :key="question.id">
        <v-list-item-content>

          <v-list-item-title class="mb-1">
            Question: {{question.title }}
          </v-list-item-title>
          <v-list-item-subtitle class="text--primary">
            Your Answer: <span class="font-weight-bold">{{studentAnswer(question.id)}}</span>
          </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
  </v-list>
</template>
<script>
  export default {
    props: ['questions', 'answers'],
    methods: {
      studentAnswer(question_id){
          const index = this.answers.findIndex((e) => e.question_id === question_id);
          return this.answers[index]['answer'];
      }
    }
  }
</script>
