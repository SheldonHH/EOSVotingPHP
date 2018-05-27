
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('vuetify/dist/vuetify.min.css')
window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
import vuetify from 'vuetify'
Vue.use(VueRouter)
Vue.use(vuetify)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

let Myheader = require('./components/Myheader.vue')
let Myfooter = require('./components/pp.vue')
let Maipn = require('./components/Main.vue')
let Home = require('./components/Home.vue')
let About = require('./components/About.vue')
// let Add = require('./components/Add.vue') // 放入app.js

const routes = [
    {path: '/home', component: Home},
    {path: '/about', component: About}
]

const router = new VueRouter({
    // mode: 'history',
    routes
})


const app = new Vue({
    el: '#app',
    router,
    components: {Myheader, Myfooter, Maipn},
    create(){
        console.log('Hello World')
    }
});
