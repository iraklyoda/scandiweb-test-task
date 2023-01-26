<template>
  <header>
    <nav class="flex justify-between mx-28 mt-8 border-b-2 border-black pb-5">
      <h1>Product List</h1>
      <div class="flex gap-4 mr-12">
        <router-link :to="{ name: 'addProduct' }">Add</router-link>
        <ButtonComponent button="MASS DELETE" id="delete-product-btn" />
      </div>
    </nav>
    <main class="mx-28 mt-4">
      <div class="grid lg:grid-cols-4 grid-cols-3 gap-y-4 lg:gap-x-14">
        <ProductItem />
        <ProductItem />
        <ProductItem />
        <ProductItem />
      </div>
    </main>
  </header>
</template>
<script setup>
import ButtonComponent from "@/components/ui/BaseButton.vue";
import ProductItem from "@/components/products/ProductItem.vue";
</script>
