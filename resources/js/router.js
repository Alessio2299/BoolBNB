import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import About from './pages/About';
import SingleApartment from './pages/partials/SingleApartment.vue';
// import Contact from './pages/Contact';
// import Posts from './pages/Posts';
// import SinglePost from './pages/SinglePost';
// import PageError from './pages/PageError';

const router = new VueRouter({
  mode: 'history',
  routes:[
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
      path: '/apartment',
      name: 'apartment',
      component: SingleApartment
    },
    {
      path: '/apartments/:address',
      name: 'apartments',
      component: AdvancedSearch
    },
    // {
    //   path: '/contacts',
    //   name: 'contacts',
    //   component: Contact
    // },
    // {
    //   path: '/about',
    //   name: 'about',
    //   component: About
    // },
    // {
    //   path: '/post/:slug',
    //   name: 'singlePost',
    //   component: SinglePost
    // },
    // {
    //   path: '/:patchMatch(.*)*',
    //   name: 'page-error',
    //   component: PageError
    // }
  ]
});

export default router;