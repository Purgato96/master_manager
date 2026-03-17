import { createRouter, createWebHistory } from 'vue-router'
import Index from '@/viewes/Index.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Index',
      component: Index,
      meta: {
        title: 'Index',
      },
    },
  ],
})

export default router
