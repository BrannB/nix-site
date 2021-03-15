<template>
  <div class="container mt-4">
  <div class="card bg-dark" style="border-color: snow;">
    <img :src="image" alt="..." style="width: 1048px">
    <div class="card-body">
      <h2 class="card-title text-center" style="color: snow; background-color: #0c5460">
        {{name}}
      </h2>
      <h4><p class="card-text text-center">{{description}}</p></h4>
      <div v-if="status == 1" class="text-center" style="color: darkorange;">
        Есть в наличии
      </div>
      <div v-else class="text-center" style="color: red">
        Нет в наличии
      </div>
      <h3><p class="card-text text-center"></p></h3>
      <div class="text text-right">
      <form action="catalog/addProduct" method="post" style="width: 100%">
        <div v-if="status == 1">
          <br>
          <button class="btn btn-lg btn-outline-info" name="addToBucketBtn" :value="id">В корзину</button>
        </div>
        <div v-else>
          <button disabled class="btn btn-lg btn-outline-danger" name="addToBucketBtn" :value="id">В корзину</button>
        </div>
      </form>
        <h3><b>${{price}}</b></h3>
      </div>
    </div>
  </div>
  </div>

</template>

<script>
export default {
  name: "product",
  props: {
    id: {
      type: Number,
      required: true
    },
    image: {
      type: String,
      required: true
    },
    name: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    },
    price: {
      type: Number,
      required: true
    },
    status: {
      type: Number,
      required: true
    }

  }
}
</script>

<style scoped>

</style>