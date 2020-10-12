<template>
  <v-app height="100px" id="inspire">
    <v-alert v-if="error" type="error">
      {{error}}
    </v-alert>
    <v-alert v-if="success" type="success">
      {{success}}
    </v-alert>

    <v-form
      ref="form"
      lazy-validation
    >
      <v-text-field
        v-model="student.name"
        :rules="nameRules"
        label="Name"
        required
      ></v-text-field>

      <v-text-field
        v-model="student.email"
        :rules="emailRules"
        label="Email Address"
        required
      ></v-text-field>

      <v-text-field
        v-model="student.password"
        :rules="passwordRules"
        type='password'
        label="Password"
        required
      ></v-text-field>

      <v-text-field
        v-model="student.password_confirmation"
        :rules="[passwordConfirmationRule, cPasswordRules.required]"
        type='password'
        label="Confirm Password"
        required
      ></v-text-field>

      <v-btn
        color="primary"
        class="mr-4"
        large
        @click="submitForm"
      >
        Sing Up
      </v-btn>

    </v-form>
  </v-app>
</template>


<script>
  import { API_END_POINTS } from '../constants';
  export default {
    data: () => ({
      student: {
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
      },
      cPasswordRules: {
        required: v => !!v || 'Confirm password is required',
      },
      buttonTitle: "Submit",
      error: "",
      success: "",
      nameRules: [
        v => !!v || 'Name is required',
      ],
      passwordRules: [
        v => !!v || 'Password is required',
      ],
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
    }),//data
    methods: {
      passwordConfirmationRule() {
        return (this.student.password === this.student.password_confirmation) || 'Password must match'
      },
      submitForm () {
        let valid = this.$refs.form.validate();
        if(valid){
          this.registerStudent();
        }
        return false;
      },
      registerStudent() {

        this.buttonTitle = "Please wait ...";
        axios
        .post(API_END_POINTS.REGISTER_STUDENT, this.student)
        .then((response) => {
          this.buttonTitle = "Submit";
          this.success = response.data.message;
          this.$refs.form.resetValidation();
          this.$refs.form.reset()
        })
        .catch((error) => {
            if(error.response){
              this.error = error.response.data.message;
            }else{
              this.error = error.message;
            }
            this.buttonTitle = "Submit";
          });
      }//login
    }//methods

  }
</script>
