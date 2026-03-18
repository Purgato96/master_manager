import { createRouter, createWebHistory } from 'vue-router'
import Index from '@/viewes/web/IndexPage.vue'
import Dashboard from '@/viewes/adm/DashboardView.vue'


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
