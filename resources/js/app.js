/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Buefy from 'buefy'
import 'buefy/dist/buefy.css'
import 'boxicons'
import VueRouter from "vue-router";

Vue.use(VueRouter)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('projects', require('./components/Projects.vue').default);
Vue.component('project_single', require('./components/ProjectSingle.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/projects',
            name: 'projects',
            component: require('./components/Projects.vue').default
        },
        {
            path: '/projects/:token',
            name: 'project_single',
            component: require('./components/ProjectSingle.vue').default
        }
    ]
})


Vue.use(Buefy)
const app = new Vue({
    el: '#app',
    router
});
