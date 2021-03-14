<template>
  <div>
    <product v-for="(product, index) in data" :key="index"
      :image = "product.image" :name = "product.name" :description="product.description" :price="product.price" :status="product.status" :id="product.id"
    ></product>
  </div>
</template>

<script>
export default {
  name: "products",
  props: {
    data: {
      type: Array
    }
  },
  methods: {
    async getProducts() {
      let data = await fetch('http://192.168.10.10/catalog/api');
      this.data = await data.json()
    }
  },
  created() {
    this.getProducts()
  }
}
</script>

<style scoped>

</style>