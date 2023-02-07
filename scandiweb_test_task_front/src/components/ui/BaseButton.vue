<template>
  <button class="block rounded-md border border-black px-1 px-2">
    {{ button }}
  </button>
</template>

<script setup>
const props = defineProps({
  button: {
    type: String,
    required: true,
  },
});
</script>
