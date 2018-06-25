import Vue from 'vue'
import Router from 'vue-router'
import Home from './components/Home.vue'
import About from './components/About.vue'
import Dash from './components/dashboard.vue'
import UserDash from './components/users-dashboard.vue'
import deny from './components/denie.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  hashbang: false,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/about',
      name: 'about',
      component: About
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: Dash
    },
    {
      path: '/user-dashboard',
      name: 'user-dashboard',
      component: UserDash
    },
    {
      path: '/deny',
      name: 'deny',
      component: deny
    }
  ]
})
