import MainLayout from 'layouts/MainLayout.vue'
import IndexPage from 'pages/IndexPage.vue'
import SalePage from 'pages/SalePage.vue'
import LoginPage from 'pages/LoginPage.vue'
import MenuPage from 'pages/MenuPage.vue'
import MenuLayout from 'layouts/MenuLayout.vue'

const routes = [
  {
    path: '/',
    component: MainLayout,
    children: [
      { path: '', component: IndexPage },
      { path: '/sale/:id', component: SalePage }
    ]
  },
  {
    path: '/login',
    component: LoginPage
  },
  {
    path: '/admin',
    component: MenuLayout,
    children: [
      { path: '', component: MenuPage, meta: { requiresAuth: true } }
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
