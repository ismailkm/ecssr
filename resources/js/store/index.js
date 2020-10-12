import Vue from 'vue';
import Vuex from 'vuex';

import CurrentStudent from './modules/CurrentStudent';
Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    CurrentStudent
  }
});
