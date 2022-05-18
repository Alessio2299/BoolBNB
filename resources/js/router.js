import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import About from './pages/About';
// import AboutSecond from './pages/AboutSecond';
import AdvancedSearch from './pages/AdvancedSearch.vue';
import SingleApartment from './pages/SingleApartment.vue';
import PageNotFound from './pages/PageNotFound.vue';

// import Contact from './pages/Contact';
// import Posts from './pages/Posts';

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
    // {
    //   path: '/about',
    //   name: 'about',
    //   component: AboutSecond
    // },
    {
      path: '/apartments/search/:address',
      name: 'advancedSearch',
      component: AdvancedSearch
    },
    {
      path: '/apartments/single-apartment/:slug',
      name: 'single-apartment',
      component: SingleApartment
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
    {
      path: '/:patchMatch(.*)*',
      name: 'page-not-found',
      component: PageNotFound
    }
  ]
});

export default router;