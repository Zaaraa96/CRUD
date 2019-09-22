/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 import App from './App.vue';
 import ElementUI from 'element-ui';
 import 'element-ui/lib/theme-chalk/index.css';
 import VueResource from 'vue-resource';
 import Vuelidate from 'vuelidate';
 import VueRouter from 'vue-router';
 import { routes } from './routes';
 import VueLocalStorage from 'vue-localstorage';
 Vue.use(ElementUI);
 Vue.use(VueResource);
 Vue.use(Vuelidate);
 Vue.use(VueRouter);
 Vue.use(VueLocalStorage);
Vue.http.options.root= 'localhost:8000';
Vue.http.interceptors.push(function(request,next) {
    let url= request.url;
    url+= '?api_token=';
    let c=localStorage.getItem('api_token').toString();
    url+= c;
    request.url= url;
    next();
});

const router = new VueRouter({
                routes,
                mode: 'history'
              });

 const app = new Vue({
   el: '#app',
   router,
   render: h => h(App)
 });
