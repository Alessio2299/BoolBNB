window.Vue = require('vue');
window.axios = require('axios');

// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';



import Vue from 'vue';
import App from './views/App';
import router from './router';

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core';

/* import specific icons */
import { faBed } from '@fortawesome/free-solid-svg-icons';
import { faToilet } from '@fortawesome/free-solid-svg-icons';
import { faWifi } from '@fortawesome/free-solid-svg-icons';
import { faSquareParking } from '@fortawesome/free-solid-svg-icons';
import { faPeopleRoof } from '@fortawesome/free-solid-svg-icons';
import { faBellConcierge } from '@fortawesome/free-solid-svg-icons';
import { faHotTubPerson } from '@fortawesome/free-solid-svg-icons';
import { faWater } from '@fortawesome/free-solid-svg-icons';

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

/* add icons to the library */
library.add(faBed);
library.add(faToilet);
library.add(faWifi);
library.add(faSquareParking);
library.add(faPeopleRoof);
library.add(faBellConcierge);
library.add(faHotTubPerson);
library.add(faWater);

/* add font awesome icon component */
Vue.component('font-awesome-icon', FontAwesomeIcon);

const app = new Vue({

    el: '#root',
    render: h => h(App),
    router
});