require('./bootstrap');

import axios from 'axios';
import Customer from './components/Kasir/Customer.vue';
import Cart from './components/Kasir/Cart.vue';
// import Delete from './components/Permission/Delete.vue';
// import {ServerTable, ClientTable, Event} from 'vue-tables-2';

Vue.component('ListBarang',require('./components/Kasir/ListBarang.vue'));
Vue.component('ListJasa',require('./components/Kasir/ListJasa.vue'));
Vue.component('Customer', Customer);
Vue.component('Cart',Cart);
// Vue.component('Delete',Delete);

new Vue({
    el: '#kasir',
    data: {
    	
    }
});