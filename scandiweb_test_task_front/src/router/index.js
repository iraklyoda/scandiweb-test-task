import { createRouter, createWebHistory } from "vue-router";
import ProductList from "@/views/ProductList.vue";
import ProductAdd from "@/views/ProductAdd.vue";
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "productList",
      component: ProductList,
    },
    {
      path: "/addproduct",
      name: "addProduct",
      component: ProductAdd,
    }
  ],
});

export default router;
