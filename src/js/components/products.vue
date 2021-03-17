<template xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
  <div>
    <product v-for="(product, index) in data" :key="index"
      :image = "product.image" :name = "product.name" :description="product.description" :price="product.price" :status="product.status" :id="product.id"
    ></product>
    <pagination @pageChanged="toChangePage" :total="length" :itemsOnPage="3"></pagination>
  </div>
</template>

<script>
export default {
  name: "products",
  data() {
    return {
      products: [],
      pageNumber: 1,
      length: 0
    }
  },
  props: {
    data: {
      type: Array
    }
  },
  methods: {
    async getProducts() {
      let data = await fetch(`http://192.168.10.10/catalog/api?page=${this.pageNumber}`,
    {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json'
        }
      });
      this.data = await data.json()
      this.products = data.products;
      this.length = data.length;
    },
    toChangePage(page) {
      this.pageNumber = page
    },
  },
  watch: {
    pageNumber() {
      this.getProducts()
    },
  },
  created() {
    this.getProducts()
  }
}
</script>

<style scoped>

</style>