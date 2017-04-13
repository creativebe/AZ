require('./bootstrap');

import axios from 'axios';
import Create from './components/Member/Create.vue';
import Edit from './components/Member/Edit.vue';
import Delete from './components/Member/Delete.vue';
import AddCar from './components/Member/AddCar.vue';
import EditCar from './components/Member/EditCar.vue';
import {ServerTable, ClientTable, Event} from 'vue-tables-2';

Vue.component('Create', Create);
Vue.component('Edit',Edit);
Vue.component('Delete',Delete);
Vue.component('AddCar',AddCar);
Vue.component('EditCar',EditCar);
Vue.use(ServerTable, {}, false);

new Vue({
    el: '#member',
    data: {
    	columns: ['name','alamat','no_tlp', 'edit', 'delete', 'add_car', 'edit_car'],
    	options:{
    		templates:{
    			edit 	: 'Edit',
    			delete 	: 'Delete',
                add_car  : 'AddCar',
                edit_car : 'EditCar'
    		}
    	}
    }
});