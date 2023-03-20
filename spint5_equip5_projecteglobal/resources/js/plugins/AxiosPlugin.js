import axios from 'axios';

const axiosInstance = axios.create({
  baseURL: 'http://localhost/api'
});

export default {
  install(app) {
    app.config.globalProperties.$axios = axiosInstance;
  }
};
