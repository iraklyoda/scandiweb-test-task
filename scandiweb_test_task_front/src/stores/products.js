import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";

export const useProductsStore = defineStore("products", () => {
  const products = ref([]);
  const getProducts = async () => {
    const response = await axios.get(
      import.meta.env.VITE_APP_ROOT_API + "/product/read.php"
    );
    products.value = products.value.concat(response.data.data);
  };
  return {
    products,
    getProducts,
  };
});
