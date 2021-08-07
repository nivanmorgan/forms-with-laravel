require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.jQuery = jQuery

Vue.component('forms',  () => import('./components/form'));
Vue.component('thank-you',  () => import('./components/thank-you'));

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

const vm = new Vue({
    el: '#app'
})
