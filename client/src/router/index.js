import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'index',
      component: () => import('../views/Index.vue'),
    },
    {
      path: '/products',
      name: 'products',
      component: () => import('../views/products/Index.vue'),
    },
  ],
})

export default router
