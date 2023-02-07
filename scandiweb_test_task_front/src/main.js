import { createApp } from "vue";
import { createPinia } from "pinia";
import App from "./App.vue";
import router from "./router";

import "./assets/main.css";
import "@/config/vee-validate/rules.js";
import "@/config/vee-validate/messages.js";

import ButtonComponent from "@/components/ui/BaseButton.vue";

const app = createApp(App);

app.use(createPinia());
app.use(router);
app.component("ButtonComponent", ButtonComponent);

app.mount("#app");
