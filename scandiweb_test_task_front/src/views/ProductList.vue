<template>
  <header>
    <nav
      class="mx-12 mt-8 flex justify-between border-b-2 border-black pb-5 lg:mx-28"
    >
      <h1>Product List</h1>
      <div class="flex gap-4 lg:mr-12">
        <router-link :to="{ name: 'addProduct' }" id="ADD">ADD</router-link>
        <ButtonComponent button="MASS DELETE" id="delete-product-btn" @click="productsStore.deleteProducts()"/>
      </div>
    </nav>
    <main class="mx-12 mt-4 lg:mx-28">
      <div
        class="grid grid-cols-1 gap-y-4 md:grid-cols-3 lg:grid-cols-4 lg:gap-x-14"
      >
        <ProductItem
          v-for="product in productsStore.products"
          :key="product.SKU"
          :id="product.id"
          :sku="product.SKU"
          :name="product.name"
          :price="product.price"
          :attribute="product.attribute"
          :value="product.value"
          :unit="product.unit"
        />
      </div>
    </main>
  </header>
</template>
<script setup>
import { useProductsStore } from "@/stores/products";
import ButtonComponent from "@/components/ui/BaseButton.vue";
import ProductItem from "@/components/products/ProductItem.vue";

const productsStore = useProductsStore();
</script>
