<template>
  <header>
    <nav class="flex justify-between mx-28 mt-8 border-b-2 border-black pb-5">
      <h1>Add Product</h1>
      <div class="flex gap-4 mr-12">
        <ButtonComponent button="Save" />
        <router-link :to="{ name: 'productList' }">Cancel</router-link>
      </div>
    </nav>
  </header>
  <main class="mx-28 mt-4">
    <form id="product_form">

    </form>
  </main>
</template>
<script setup>
import ButtonComponent from "@/components/ui/BaseButton.vue";
import ProductItem from "@/components/products/ProductItem.vue";
</script>
