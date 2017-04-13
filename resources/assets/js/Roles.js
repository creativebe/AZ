require('./bootstrap');

import axios from 'axios';
import Edit from './components/Roles/Edit.vue';
import Delete from './components/Roles/Delete.vue';
import EditPermission from './components/Roles/EditPermission.vue';
import {ServerTable, ClientTable, Event} from 'vue-tables-2';
import Create from './components/Roles/Create.vue';

Vue.component('Create', Create);
Vue.component('Edit',Edit);
Vue.component('Delete',Delete);
Vue.component('EditPermission',EditPermission);
Vue.use(ServerTable, {}, false);

new Vue({
    el: '#roles',
    data: {
    	columns: ['name','display_name','description','edit','delete','edit_permission'],
    	options:{
    		templates:{
    			edit 	: 'Edit',
    			delete 	: 'Delete',
                edit_permission : 'EditPermission',
    		}
    	}
    }
});