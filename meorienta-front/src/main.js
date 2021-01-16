import Vue from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import vuetify from "./plugins/vuetify";
import axios from 'axios'
import VueAxios from 'vue-axios'
import '@mdi/font/css/materialdesignicons.css'

Vue.config.productionTip = false;
Vue.use(VueAxios, axios)

const opts = {
  icons: {
      iconfont: 'mdi'
  }
}

new Vue({
  opts,
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount("#app");
