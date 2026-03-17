import { createRouter, createWebHistory } from 'vue-router'
import Index from '@/viewes/web/Index.vue'
import Dashboard from '@/viewes/adm/Dashboard.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Index',
      component: Index,
    },
    {
      path: '/dashboard',
      name: 'Dashboard',
      component: Dashboard,
    },
  ],
})

export default router
