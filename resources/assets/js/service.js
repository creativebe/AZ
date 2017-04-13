require('./bootstrap');

import axios from 'axios';
import Create from './components/Service/Create.vue';
import Edit from './components/Service/Edit.vue';
import Delete from './components/Service/Delete.vue';
import {ServerTable, ClientTable, Event} from 'vue-tables-2';

Vue.component('Create', Create);
Vue.component('Edit',Edit);
Vue.component('Delete',Delete);
Vue.use(ServerTable, {}, false);

new Vue({
    el: '#service',
    data: {
    	columns: ['kode','name','harga', 'edit', 'delete'],
    	options:{
    		templates:{
    			edit 	: 'Edit',
    			delete 	: 'Delete',
    		}
    	}
    }
});