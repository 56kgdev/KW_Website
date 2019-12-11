import Vue from 'vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import VueHead from 'vue-head'
import VueCarousel from 'vue-carousel';
import 'swiper/dist/css/swiper.css'
import VueAwesomeSwiper from 'vue-awesome-swiper'
import VuePaginate from 'vue-paginate'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'

import App from './App.vue'

import routes from '@/routes'

Vue.use(Vuetify)
Vue.use(VuePaginate)
Vue.use(VueRouter)
Vue.use(VueHead)
Vue.use(VueCarousel)
Vue.use(VueAwesomeSwiper, /* { default global options } */)

const router = new VueRouter({
	routes,
	mode: 'history'
});

new Vue({
  el: '#app',
  render: h => h(App),
  router
}).$mount('#app');
