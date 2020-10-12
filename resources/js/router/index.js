import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from '../components/home/container';
import ResultPage from '../components/result/container';
import ExamPage from '../components/exam/container';
import ExamResultPage from '../components/exam/result';

const routes = [
  {
      path: '/',
      redirect: '/home'
  },
  {
    component: HomePage,
    name: "home",
    path: "/home"
  },
  {
    component: ResultPage,
    name: "result",
    path: "/result"
  },
  {
    component: ExamPage,
    name: "exam",
    path: "/exam"
  },
  {
    component: ExamResultPage,
    name: "exam-result",
    path: "/exam-result",
    props: { default: true }
  }
];

export default new VueRouter({
  routes
})
