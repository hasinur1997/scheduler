/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.bus = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('create-ability', require('./components/Abilities/Create.vue').default);
// Vue.component('ability-list', require('./components/Abilities/List.vue').default);
// Vue.component('create-role', require('./components/Roles/Create.vue').default);
// Vue.component('role-list', require('./components/Roles/List.vue').default);

Vue.component('tasks', require('./components/tasks/Task.vue').default);
Vue.component('subtasks', require('./components/Tasks/SubTask.vue').default);
Vue.component('users', require('./components/Users/Users.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

