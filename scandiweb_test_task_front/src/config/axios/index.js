import axios from "axios";

const axiosInstance = axios.create({
  baseURL: import.meta.env.VITE_APP_ROOT,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "X-Requested-With": "XMLHttpRequest",
  },
});
axiosInstance.defaults.withCredentials = true;
export default axiosInstance;
