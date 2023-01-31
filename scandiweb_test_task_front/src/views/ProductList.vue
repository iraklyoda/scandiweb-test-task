<template>
  <header>
    <nav class="mx-28 mt-8 flex justify-between border-b-2 border-black pb-5">
      <h1>Product List</h1>
      <div class="mr-12 flex gap-4">
        <router-link :to="{ name: 'addProduct' }">Add</router-link>
        <ButtonComponent button="MASS DELETE" id="delete-product-btn" />
      </div>
    </nav>
    <main class="mx-28 mt-4">
      <div class="grid grid-cols-3 gap-y-4 lg:grid-cols-4 lg:gap-x-14">
        <ProductItem
          v-for="product in productsStore.products"
          :key="product.SKU"
          :sku = product.SKU
        />
      </div>
    </main>
  </header>
</template>
<script setup>
import { onMounted } from "vue";
import { useProductsStore } from "@/stores/products";
import ButtonComponent from "@/components/ui/BaseButton.vue";
import ProductItem from "@/components/products/ProductItem.vue";

const productsStore = useProductsStore();

onMounted(async () => {
  await productsStore.getProducts();
  console.log(productsStore.products);
});
</script>
