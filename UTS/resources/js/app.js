import "../css/app.css";
import "./bootstrap";

import { createInertiaApp } from "@inertiajs/vue3"; // Ganti dari "@inertiajs/react" ke "@inertiajs/vue3"
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { createApp, h } from "vue";
import app from './Pages/App.vue';
import router from './router.js';
const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createApp(app).use(router).mount('#app');

// createInertiaApp({
//   title: (title) => `${title} - ${appName}`,
//   resolve: (name) =>
//     resolvePageComponent(
//       `./Pages/${name}.vue`, 
//       import.meta.glob("./Pages/**/*.vue") 
//     ),
//   setup({ el, App, props, plugin }) {
//     createApp({ 
//       render: () => h(App, props), 
//     })
//       .use(plugin) 
//       .mount(el); 
//   },
//   progress: {
//     color: "#4B5563",
//   },
// });
