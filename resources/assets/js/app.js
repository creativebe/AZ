
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// import Customer from './components/Customer.vue';
// import Cart from './components/Cart.vue';
// import {ServerTable, ClientTable, Event} from 'vue-tables-2';
require('./bootstrap');
// import Users from './components/Users.vue';

// import UserTable from './components/UserTable.vue';
import axios from 'axios';
import {ServerTable, ClientTable, Event} from 'vue-tables-2';

// Vue.component('Users', Users);
// Vue.component('usertable', UserTable);


// Vue.component('customer',Customer);
// Vue.component('cart',Cart);

new Vue({
    el: '#app'
    
});

