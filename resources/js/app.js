require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.jQuery = jQuery

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

window.vm = new Vue({
    el: '#app',
    data: {

    },
    methods: {

    }
})
