window.Vue = require('vue')

Vue.component('pagination', require('./components/pagination.vue').default)
Vue.component('product', require('./components/product.vue').default)
Vue.component('productsSearch', require('./components/productsSearch.vue').default)
Vue.component('products', require('./components/products.vue').default)
Vue.component('productsDesc', require('./components/productsDesc.vue').default)
Vue.component('productsAsc', require('./components/productsAsc.vue').default)

const app = new Vue({
  el: '#app',
})
