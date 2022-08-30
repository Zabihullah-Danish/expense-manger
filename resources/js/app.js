import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import { createApp } from 'vue';
//the root component
import App from './App.vue';
import Test from './test.vue';
// import router from './router';


const app =  createApp(App)
// app.use(router)
app.mount('#app');

const test = createApp(Test);
// test.use(router);
test.mount('#test');