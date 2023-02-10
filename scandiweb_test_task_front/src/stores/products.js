import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";
import axiosInstance from "@/config/axios/index.js";
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

  const createProduct = async (data) => {
    try {
      const response = await axios.post(
        import.meta.env.VITE_APP_ROOT_API + "/product/create_product.php",
        data
      );
      getProducts();
      uniqueError.value = "";
      router.push({ name: "productList" });
    } catch (e) {
      if (e.response.status === 422) {
        uniqueError.value = "SKU value must be unique";
      }
      console.log(e);
    }
  };

  const deleteProducts = async () => {
    if (selectedProducts.value) {
      try {
        const response = await axios.post(
          import.meta.env.VITE_APP_ROOT_API + "/product/delete.php",
          { id: selectedProducts.value }
        );
        selectedProducts.value = [];
        getProducts();
      } catch (e) {
        console.log(e);
      }
    }
  };

  getProducts();
  return {
    products,
    selectedProducts,
    getProducts,
    createProduct,
    deleteProducts,
    uniqueError,
  };
});
