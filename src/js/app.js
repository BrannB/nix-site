window.Vue = require('vue')

Vue.component('products', require('./components/products.vue').default)
Vue.component('product', require('./components/product.vue').default)

const app = new Vue({
  el: '#app',
})
