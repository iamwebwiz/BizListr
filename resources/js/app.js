require('./bootstrap')

window.Vue = require('vue')

Vue.config.productionTip = false

Vue.component('Listings', require('./components/Listings.vue').default)

const app = new Vue({
    el: '#app',
})
