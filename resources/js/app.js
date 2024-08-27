import './bootstrap';

import {createApp} from "vue";
import App from './components/App.vue'
import router from './router/index.js'
import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/aura';

createApp(App)
    .use(router)
    .use(PrimeVue, {
        theme: {
            preset: Aura
        }
    })
    .mount("#app");
