<template>
  <div>
    <div class="my-2 flex">
      <label :for="name" class="w-24">{{ label }}</label>
      <Field
        @input="$emit('update:modelValue', $event.target.value)"
        :type="type"
        :name="name"
        :rules="rules"
        :id="id"
        class="w-full rounded-md border-2 border-black pl-2 lg:w-auto"
      />
    </div>
    <ErrorMessage :name="name" class="text-red-500" />
  </div>
</template>

<script setup>
import { ErrorMessage, Field } from "vee-validate";

defineProps({
  type: {
    type: String,
    default: "text",
  },
  label: {
    type: String,
  },
  id: {
    type: String,
    required: true,
  },
  name: {
    type: String,
    required: true,
  },
  rules: {
    type: String,
  },
});
</script>
