<template>
  <v-app height="100px" id="inspire">
    <v-alert v-if="error" type="error">
      {{error}}
    </v-alert>

    <v-form
      ref="form"
      lazy-validation
    >
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

      <v-btn
        color="primary"
        class="mr-4"
        large
        @click="submitForm"
      >
        Log In
      </v-btn>

    </v-form>
  </v-app>
</template>


<script>
  export default {
    data: () => ({
      student: {
        email: "",
        password: ""
      },
      buttonTitle: "Submit",
      error: "",
      name: '',
      passwordRules: [
        v => !!v || 'Password is required',
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
    }),//data
    methods: {
      submitForm () {
        let valid = this.$refs.form.validate();
        if(valid){
          this.login();
        }
        return false;
      },
      login() {

        this.buttonTitle = "Please wait ...";
        this.$store.dispatch('CurrentStudent/loginStudent', this.student)
                    .then((res) => {
                      this.buttonTitle = "Submit";
                    }).catch((error) => {
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
