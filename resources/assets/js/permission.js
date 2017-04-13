require('./bootstrap');

import axios from 'axios';
import Create from './components/Permission/Create.vue';
import Edit from './components/Permission/Edit.vue';
import Delete from './components/Permission/Delete.vue';
import {ServerTable, ClientTable, Event} from 'vue-tables-2';

Vue.component('Create', Create);
Vue.component('Edit',Edit);
Vue.component('Delete',Delete);
Vue.use(ServerTable, {}, false);

new Vue({
    el: '#permission',
    data: {
    	columns: ['name','display_name','description','edit','delete'],
    	options:{
    		templates:{
    			edit 	: 'Edit',
    			delete 	: 'Delete',
    		}
    	}
    }
});