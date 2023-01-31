<template>
  <div
    class="h-24 w-32 border-2 border-black md:h-36 md:w-44 lg:h-64 lg:w-auto"
  >
    <input type="checkbox" class="delete-checkbox ml-4 mt-4" />
    <h2>{{ sku }}</h2>
  </div>
</template>

<script setup>
const props = defineProps(["sku"]);
</script>
