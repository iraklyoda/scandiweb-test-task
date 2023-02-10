<template>
  <Form id="product_form" @submit="onSubmit">
    <header>
      <nav
        class="mx-12 mt-8 flex justify-between border-b-2 border-black pb-5 lg:mx-28"
      >
        <h1>Product Add</h1>
        <div class="mr-12 flex gap-4">
          <ButtonComponent button="Save" />
          <router-link :to="{ name: 'productList' }">Cancel</router-link>
        </div>
      </nav>
    </header>
    <main class="mx-12 mt-4 lg:mx-28">
      <BaseInput id="sku" name="SKU" label="SKU" rules="required|min:3" />
      <p v-if="productsStore.uniqueError" class="text-red-500">
        {{ productsStore.uniqueError }}
      </p>
      <BaseInput id="name" name="name" label="Name" rules="required" />
      <BaseInput
        type="number"
        id="price"
        name="price"
        label="Price ($)"
        rules="required"
      />
      <div class="my-4 flex justify-between lg:justify-start lg:gap-36">
        <label for="type">Type Switcher</label>
        <select
          name="type"
          id="productType"
          v-model="type"
          class="rounded-md px-2"
        >
          <option value="DVD" id="DVD">DVD</option>
          <option value="Book" id="Book">Book</option>
          <option value="Furniture" id="Furniture">Furniture</option>
        </select>
      </div>
      <div v-if="type === 'DVD'">
        <BaseInput
          type="number"
          id="size"
          name="attribute"
          label="Size (MB)"
          rules="required"
          v-model="value"
        />
        <span class="text-sm text-gray-600">Please provide size</span>
      </div>
      <div v-if="type === 'Book'">
        <BaseInput
          type="number"
          id="weight"
          name="attribute"
          label="Weight (KG)"
          rules="required|integer"
          v-model="value"
        />
        <span class="text-sm text-gray-600">Please provide weight</span>
      </div>
      <div v-if="type === 'Furniture'">
        <BaseInput
          type="number"
          id="height"
          name="height"
          label="Height (CM)"
          rules="required"
        />
        <BaseInput
          type="number"
          id="width"
          name="width"
          label="Width (CM)"
          rules="required"
        />
        <BaseInput
          type="number"
          id="length"
          name="length"
          label="Length (CM)"
          rules="required"
        />
        <span class="text-sm text-gray-600">Please provide dimensions</span>
      </div>
    </main>
  </Form>
</template>
<script setup>
import { ref, reactive } from "vue";
import { Form } from "vee-validate";
import { useProductsStore } from "@/stores/products";

import ButtonComponent from "@/components/ui/BaseButton.vue";
import BaseInput from "@/components/ui/BaseInput.vue";

const productsStore = useProductsStore();
const type = ref("DVD");

function onSubmit(values) {
  console.log(values);
  const data = reactive({
    SKU: values.SKU,
    name: values.name,
    price: values.price,
  });
  if (type.value === "Furniture") {
    data.value = values.height + "x" + values.width + "x" + values.length;
  } else {
    data.value = values.attribute;
  }
  productsStore.createProduct(data);
}
</script>
