
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// require( 'datatables.net-bs4' )();
// require( 'datatables.net-responsive-bs4' )();
// require( 'datatables.net-scroller-bs4' )();

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

let lozad = require('lozad');

const observer = lozad(); // lazy loads elements with default selector as '.lozad'
observer.observe();
