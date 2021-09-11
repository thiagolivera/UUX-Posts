// Imports
import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const router = new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  scrollBehavior: (to, from, savedPosition) => {
    if (to.hash) return { selector: to.hash }
    if (savedPosition) return savedPosition

    return { x: 0, y: 0 }
  },
  routes: [
    {
      path: '/',
      component: () => import('@/layouts/home/Index.vue'),
      children: [
        {
          path: '',
          name: 'Home',
          component: () => import('@/views/home/Index.vue'),
        },
        {
          path: 'extrair-posts',
          name: 'Extrair posts',
          component: () => import('@/views/home/extrairPosts.vue'),
        },
        {
          path: 'funcionalidades',
          name: 'Funcionalidades',
          component: () => import('@/views/home/funcionalidades.vue'),
        },
        {
          path: 'about',
          name: 'Sobre o projeto',
          component: () => import('@/views/home/about.vue'),
        },
        {
          path: 'contact',
          name: 'Contato',
          component: () => import('@/views/home/contact.vue'),
        },
        {
          path: 'pro',
          name: 'Pro',
          component: () => import('@/views/pro/Index.vue'),
          meta: { src: require('@/assets/pro.jpg') },
        },
      ],
    },

  ],
})

export default router
