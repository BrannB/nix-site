<template>
  <div>
    <product v-for="(productDesc, id) in data" :key="id"
             :image = "productDesc.image"
             :name = "productDesc.name"
             :description="productDesc.description"
             :price="productDesc.price"
             :status="productDesc.status"
             :id="productDesc.id"
    ></product>
  </div>
</template>

<script>
export default {
  name: "Action",
  props: {
    data: {
      type: Array
    }
  },
  methods: {
    async getDescProducts() {
      let data = await fetch('http://192.168.10.10/catalog/actionApi');
      this.data = await data.json()
    }
  },
  created() {
    this.getDescProducts()
  }
}
</script>

<style scoped>

</style>