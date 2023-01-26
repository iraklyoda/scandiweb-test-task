<template>
  <button>{{button}}</button>
</template>

<script setup>
const props = defineProps({
  button: {
    type: String,
    required: true
  }
});
</script>