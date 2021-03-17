window.Vue = require('vue')

Vue.component('pagination', require('./components/pagination.vue').default)
Vue.component('product', require('./components/product.vue').default)
Vue.component('productsSearch', require('./components/productsSearch.vue').default)
Vue.component('products', require('./components/products.vue').default)
Vue.component('productsDesc', require('./components/productsDesc.vue').default)
Vue.component('productsAsc', require('./components/productsAsc.vue').default)
Vue.component('Sport', require('./components/Sport.vue').default)
Vue.component('rpg', require('./components/rpg.vue').default)
Vue.component('Action', require('./components/Action.vue').default)
Vue.component('Quest', require('./components/Quest.vue').default)

const app = new Vue({
  el: '#app',
})
