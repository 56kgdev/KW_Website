import Vue from 'vue'
import App from './App.vue'
import routes from '@/routes'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import VueHead from 'vue-head'
import VueCarousel from 'vue-carousel';
import 'swiper/dist/css/swiper.css'
import VueAwesomeSwiper from 'vue-awesome-swiper'//TO DO: AGREGAR AL READ ME
// require styles
import 'swiper/dist/css/swiper.css'//TO DO: AGREGAR AL READ ME
import VuePaginate from 'vue-paginate'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'



Vue.use(Vuetify)
Vue.use(VuePaginate)
Vue.use(VueRouter)
Vue.use(VueHead)
Vue.use(VueCarousel)
Vue.use(VueAwesomeSwiper)//TO DO: AGREGAR AL READ ME
Vue.use(VueMaterial)

const router = new VueRouter({
	routes,
	mode: 'history'
});

new Vue({
  el: '#app',
  render: h => h(App),
  router
}).$mount('#app');
