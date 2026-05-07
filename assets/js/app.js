import Vue from 'vue';
import VueRouter from 'vue-router'
import axios from 'axios';
import AppGreet from './components/AppGreet.vue';
import Userprograms from './components/Userprograms.vue'
import { routes } from './routes';
import Vuelidate from 'vuelidate'
import VModal from 'vue-js-modal'
import {default as Vuedals, Component as Vuedal, Bus as VuedalsBus} from 'vuedals';
import '@pencilpix/vue2-clock-picker/dist/vue2-clock-picker.min.css';
const VueClockPickerPlugin = require('@pencilpix/vue2-clock-picker/dist/vue2-clock-picker.plugin.js')



window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = Vue;

Vue.component('app-greet', AppGreet);
Vue.component('userprograms', Userprograms);
Vue.use(VueRouter)
Vue.use(Vuelidate)
Vue.use(VModal)
Vue.use(Vuedals);
Vue.use(VueClockPickerPlugin)

const app = new Vue({
  el: '#app',
    router: routes
});
