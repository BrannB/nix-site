<template>

  <ul class='pagination'>
    <li v-if="currentPage !== 1" class='page-item'>
      <button class='page-link' @click="changePage(1)">
        <span aria-hidden='true'><<</span>
      </button>
    </li>
    <li v-for="page in 4" :key="page"
        class='page-item'
        @click="changePage(page)"
        :class="{active: currentPage === page}">
      <button class='btn btn-light page-link'>{{ page }}</button>
    </li>
    <li v-if="currentPage !== 4" class='page-item'>
      <button class='page-link' @click="changePage(4)">
        <span aria-hidden='true'>>></span>
      </button>
    </li>
  </ul>
</template>

<script>
  export default {
    name: "pagination",
    props: {
      total: {
        type: Number,
        require: true
      },
      itemsOnPage: {
        type: Number,
        require: true
      }
    },
    data() {
      return {
        currentPage: 1
      }
    },
    computed: {
      totalPages() {
        return Math.ceil(this.total / this.itemsOnPage)
      }
    },
    methods: {
      changePage(pageNumber) {
        this.currentPage = pageNumber
        this.$emit('pageChanged', pageNumber)
      }
    }
  }
</script>

<style scoped>
</style>