import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/customers',
      name: 'CustomerIndex',
      component: () => import('../views/customers/CustomerIndex.vue')
    },
    {
      path: '/customers/create',
      name: 'CustomerCreate',
      component: () => import('../views/customers/CustomerCreate.vue')
    },
    {
      path: '/customers/:id/edit',
      name: 'CustomerEdit',
      component: () => import('../views/customers/CustomerEdit.vue'),
      props: true
    },

  ]
})

export default router
