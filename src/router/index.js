import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    meta: { verticalScroll: false },
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    meta: { verticalScroll: false },
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import('../views/About.vue')
  },
  {
    path: '/projects',
    name: 'Projects',
    meta: { verticalScroll: true },
    component: () => import('../views/Projects.vue')
  },
  {
    path: '/contact',
    name: 'Contact',
    meta: { verticalScroll: false },
    component: () => import('../views/Contact.vue')
  },
  {
    path: '/projects/:filename',
    name: 'Project',
    meta: { verticalScroll: true },
    component: () => import('../views/Project.vue'),
    props: true,
  }
]

const router = new VueRouter({
  routes
})

export default router
