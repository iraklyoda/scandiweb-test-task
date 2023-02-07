<template>
  <div
    class="mx-auto h-48 w-full border-2 md:h-48 md:w-44 lg:mx-0 lg:h-64 lg:w-auto"
    :class="{ 'border-blue-400': selected, 'border-black': !selected }"
  >
    <input
      type="checkbox"
      id="delete-checkbox"
      class="delete-checkbox ml-4 mt-4"
      v-model="selected"
      @change="selectProduct(id)"
    />
    <section class="text-center text-lg lg:mt-4 lg:text-2xl">
      <p>{{ sku }}</p>
      <p>{{ name }}</p>
      <p>{{ price }} $</p>
      <p>{{ attribute }}: {{ value + unit }}</p>
    </section>
  </div>
</template>

<script setup>
import { useProductsStore } from "@/stores/products";
import { ref, onMounted } from "vue";
const productsStore = useProductsStore();
const selected = ref(false);
const props = defineProps(["id", "sku", "name", "price", "attribute", "value", "unit"]);

function selectProduct(id) {
  if (!productsStore.selectedProducts.includes(id)) {
    productsStore.selectedProducts.push(id);
    selected.value = true;
  } else {
    const index = ref(productsStore.selectedProducts.indexOf(id));
    productsStore.selectedProducts.splice(index.value, 1);
    selected.value = false;
  }
}

onMounted(() => {
  if (productsStore.selectedProducts.includes(props.id)) {
    selected.value = true;
  } else {
    selected.value = false;
  }
})

</script>
