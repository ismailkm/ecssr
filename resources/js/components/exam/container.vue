<template>
  <v-container class="grey lighten-5">
    <v-row>
      <v-col
        cols="12"

      >
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

      <v-stepper v-model="e1">
          <v-stepper-header>
            <template v-for="n in steps">
              <v-stepper-step alt-labels
                :key="`${n}-step`"
                :complete="e1 > n"
                :step="n"
                editable
              >
              </v-stepper-step>

              <v-divider
                v-if="n !== steps"
                :key="n"
              ></v-divider>
            </template>
            <template>
              <v-stepper-step
                step="13"
                editable
              >
              Summary
              </v-stepper-step>

            </template>
          </v-stepper-header>

          <v-stepper-items fluid>
            <v-stepper-content
              v-for="n in steps"
              :key="`${n}-content`"
              :step="n"
            >
              <v-card
                class="mb-12 pl-2"
                color="grey lighten-2"
                height="250px"
                v-if="examQuestions!==null"
              >
                <v-card-title>
                 {{examQuestions[n-1].category.name}}
                </v-card-title>
                <v-card-text class="text--primary">
                  <p >{{examQuestions[n-1].title}}</p>

                   <v-radio-group
                      column
                    >
                      <v-radio
                        v-for="answer in examQuestions[n-1].answers"
                        :key="`${answer.id}-answer`"
                        :label="`${answer.description}`"
                        :value="`${answer.description}`"
                        :name="`question-${n}`"
                        @click="answerSelected(answer.description, examQuestions[n-1].id, examQuestions[n-1].category.id)"
                      ></v-radio>
                    </v-radio-group>
                </v-card-text>

              </v-card>

              <v-btn
                color="primary"
                @click="nextStep(n)"
              >
                NEXT
              </v-btn>
              <v-btn
                color="warning"
                @click="summaryStep()"
              >
                SUMMARY
              </v-btn>

            </v-stepper-content>

            <v-stepper-content
              step="13"
            >
              <v-card
                class="mb-12 pl-2"
                color="teal lighten-5"
                height="1000px"
              >
                <v-card-title>
                 Full Summary
                </v-card-title>
                <v-layout column>
                  <Summary :questions="examQuestions" :answers="studentAnswer" />
                </v-layout>
                <v-card-text>
                  <p>Note*: Click on the icon top to go to the question. </p>
                </v-card-text>
              </v-card>
              <v-btn
                  color="primary"
                  @click="submitStudentTest"
                >
                SUBMIT
              </v-btn>
            </v-stepper-content>
          </v-stepper-items>
        </v-stepper>

      </v-col>
    </v-row>
  </v-container>

</template>

<script>
  import { API_END_POINTS } from '../../constants';
  import Summary from './partial/Summary'
  export default {
    data () {
      return {
        e1: 1,
        steps: 12,
        loading: true,
        examQuestions: null,
        error: null,
        studentAnswer: []
      }
    },
    components: {
      Summary
    },//components
    watch: {
      steps (val) {
        if (this.e1 > val) {
          this.e1 = val
        }
      },
    },
    created () {
      this.studentAnswer = [];
      this.fetchQuestions();
      //this.generateAnswersSheet();
    },//created
    methods: {
      summaryStep () {
        this.e1 = 13
      },//nextStep
      nextStep (n) {
        if (n === this.steps) {
          this.e1 = 1
        } else {
          this.e1 = n + 1
        }
      },//nextStep
      answerSelected(answer, question_id, category_id) {
          const index = this.studentAnswer.findIndex((e) => e.question_id === question_id);
          if (index === -1) {
              this.studentAnswer.push({answer, question_id, category_id});
          } else {
              this.studentAnswer[index]['answer'] = answer;
          }
      },//answerSelected
      fetchQuestions () {
        axios.get(API_END_POINTS.EXAM_QUESTIONS)
             .then(response => {
                this.examQuestions = response.data.data;
                this.loading = false;
                this.generateAnswersSheet();
             }).catch(error => {
               this.error = error.message;
               this.loading = false;
               studentAnswer= [];
             });
      },//fetchQuestions
      generateAnswersSheet () {
        //generate initial answer sheet, with answer = 0, for all question.
        this.studentAnswer = this.examQuestions.map(question => {
          return {answer: 0, question_id: question.id, category_id: question.category.id}
        });
      },//generateAnswersSheet
      submitStudentTest(){
        this.$router.push({ name: 'exam-result', params: {answerSheet: this.studentAnswer }});
      }
    },
  }
</script>
