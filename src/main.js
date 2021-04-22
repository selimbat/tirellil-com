import Vue from 'vue'
import App from './App.vue'
import router from './router'
import { initFontAwesome } from './fontawesome'

initFontAwesome(Vue);

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
