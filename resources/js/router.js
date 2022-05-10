import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
// import Contact from './pages/Contact';
// import About from './pages/About';
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
    // {
    //   path: '/posts',
    //   name: 'posts',
    //   component: Posts
    // },
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