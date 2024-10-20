import { createRouter, createWebHistory } from 'vue-router';
import HomePage from './Pages/HomePage.vue'; // Impor halaman Home
import CounterPage from './Pages/CounterPage.vue'; // Impor halaman Counter (buat halaman ini jika belum ada)

const routes = [
  {
    path: '/home', // Rute untuk halaman utama
    name: 'Home',
    component: HomePage, // Komponen untuk halaman utama
  },
  {
    path: '/counter', // Rute untuk halaman counter
    name: 'Counter',
    component: CounterPage, // Komponen untuk halaman counter
  },
];

const router = createRouter({
  history: createWebHistory(), // Menggunakan history mode
  routes, // Daftar rute
});

export default router; // Ekspor router untuk digunakan di aplikasi
