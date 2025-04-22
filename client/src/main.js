// import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from "axios";


const app = createApp(App)

app.use(router)

app.config.globalProperties.axios = axios
axios.defaults.baseURL = 'http://127.0.0.1:8000/api';


app.mount('#app')
