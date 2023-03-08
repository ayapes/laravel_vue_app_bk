import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import VueStarRating from 'vue-star-rating'



import { createApp } from "vue";
import { router } from './router';
import App from "./App.vue";

const app = createApp(App);
app.component('star-rating', VueStarRating) ;
app.use(router).mount("#app");