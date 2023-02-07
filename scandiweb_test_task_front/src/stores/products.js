import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";
import router from "@/router";

export const useProductsStore = defineStore("products", () => {
  const products = ref([]);
  const selectedProducts = ref([]);
  const uniqueError = ref("");
  const getProducts = async () => {
    const response = await axios.get(
      import.meta.env.VITE_APP_ROOT_API + "/product/read.php"
    );
    products.value = response.data.data;
    console.log(response.data);
  };

  const createProduct = async (data, type) => {
    try {
      const response = await axios.post(
        import.meta.env.VITE_APP_ROOT_API + "/product/create_" + type + ".php",
        data
      );
      getProducts();
      uniqueError.value = "";
      router.push({ name: "productList" });
    } catch (e) {
      if(e.response.status === 422) {
        uniqueError.value = "SKU value must be unique";
      }
      console.log(e);
    }
  };

  getProducts();
  return {
    products,
    selectedProducts,
    getProducts,
    createProduct,
    uniqueError,
  };
});
