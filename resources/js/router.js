import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from './pages/Dashboard.vue';
import Products from './pages/Products.vue';
import Categories from './pages/Categories.vue';
import Orders from './pages/Orders.vue';

const routes = [
  { path: '/', name: 'dashboard', component: Dashboard },
  { path: '/products', name: 'products', component: Products },
  { path: '/categories', name: 'categories', component: Categories },
  { path: '/orders', name: 'orders', component: Orders },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
