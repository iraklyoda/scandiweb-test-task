<template>
  <button class="block rounded-md border border-black px-2 transition-all cursor-default"
  :class="{'bg-red-800 text-white -translate-y-2 -translate-x-2 cursor-pointer': button === 'MASS DELETE' && productsStore.selectedProducts.length > 0 }">
    {{ button }}
  </button>
</template>

<script setup>
import { useProductsStore } from "@/stores/products";

const productsStore = useProductsStore();

const props = defineProps({
  button: {
    type: String,
    required: true,
  },
});
</script>
