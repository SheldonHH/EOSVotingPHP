
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('vuetify/dist/vuetify.min.css')
window.Vue = require('vue');

import Vue from 'vue'
import store from './store'
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
let Myfooter = require('./components/Myfooter.vue')
let Maipn = require('./components/Main.vue')
let Home = require('./components/Home.vue')
let About = require('./components/About.vue')

let Stakes = require('./components/Stakes.vue')
let Account = require('./components/Account.vue')
let CreateAccount = require('./components/CreateAccount.vue')
let Join = require('./components/Join.vue')
let Vote = require('./components/Vote.vue')
let Settings = require('./components/Settings.vue')
// let Add = require('./components/Add.vue') // 放入app.js

const routes = [
    {path: '/home', component: Home},
    {path: '/about', component: About},
    {path: '/account', component: Account},
    {path: '/stakes', component: Stakes},
    {path: '/createaccount', component: CreateAccount},
    {path: '/settings', component: Settings},
    {path: '/join', component: Join},
    {path: '/vote', component: Vote}
]

const router = new VueRouter({
    // mode: 'history',
    routes
})


const app = new Vue({
    el: '#app',
    router,  store,
    components: {Myheader, Myfooter, Maipn, Stakes},
    create(){
        console.log('Hello World')
    }
});
