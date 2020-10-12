import {BASE_URL, LOGIN_URL, API_END_POINTS} from '../../constants';
//state
const state = {
  student: {
    name: '',
    email: ''
  }
};

//getters
const getters = {
  getStudent(state) {
      return state.student;
    },
};

//actions
const actions = {
  getStudentDetails({commit, dispatch}){
    axios.get(API_END_POINTS.MY_DETAILS)
         .then(response => {
           commit('setStudent', response.data.data);
         }).catch(error => {
           if(error.response){
              if(error.response.status == 401){
                ///window.location.replace(LOGIN_URL);
                dispatch('logoutStudent');
              }else{
                alert(error.response.data.message);
              }

           }else{
             console.log(error);
           }
         })
  },//getStudentDetails
  loginStudent( {commit}, student ){
    return axios
    .post(API_END_POINTS.LOGIN, {
      email: student.email,
      password: student.password
    })
    .then( response => {
      if(response.data.data.access_token){
        localStorage.setItem(
          "ecssr_token",
          response.data.data.access_token
        )
        window.location.replace(BASE_URL);
      }
    })
  },//loginStudent

  logoutStudent({commit}){
    localStorage.removeItem('ecssr_token');
    window.location.replace(LOGIN_URL);
  },//logoutStudent

};

//mutations
const mutations = {
  setStudent( state, data ){
    state.student = Object.assign({}, state.student, data);
  }
};


export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
