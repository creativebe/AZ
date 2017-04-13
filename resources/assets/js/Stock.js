require('./bootstrap');

import axios from 'axios';
import Create from './components/Stock/Create.vue';
import Edit from './components/Stock/Edit.vue';
import Delete from './components/Stock/Delete.vue';
import {ServerTable, ClientTable, Event} from 'vue-tables-2';

Vue.component('Create', Create);
Vue.component('Edit',Edit);
Vue.component('Delete',Delete);
Vue.use(ServerTable, {}, false);

new Vue({
    el: '#stock',
    data: {
    	columns: ['kode','name','jumlah','satuan','harga_beli', 'harga_jual', 'edit', 'delete'],
    	options:{
    		templates:{
    			edit 	: 'Edit',
    			delete 	: 'Delete',
    		}
    	}
    }
});