import Vue from 'vue'
import VueRouter from 'vue-router'
import About from '../views/About.vue'
import Projects from '../views/Projects.vue'
import Contact from '../views/Contact.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'About',
    component: About
  },
  {
    path: '/projects',
    name: 'Projects',
    component: Projects
  },
  {
    path: '/contact',
    name: 'Contact',
    component: Contact
  },
  {
    path: '/projects/:filename',
    name: 'Project',
    component: () => import('../views/Project.vue'),
    props: true,
  }
]

const router = new VueRouter({
  routes
})

export default router
