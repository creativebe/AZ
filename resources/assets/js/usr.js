require('./bootstrap');

// import UserTable from './components/UserTable.vue';
import axios from 'axios';
import userRole from './components/Users/userRole.vue';
import useredit from './components/Users/Edit.vue';
import userdelete from './components/Users/Delete.vue';
import userEditRole from './components/Users/EditRole.vue';
import {ServerTable, ClientTable, Event} from 'vue-tables-2';
import Users from './components/Users/Create.vue';

Vue.component('Users', Users);
Vue.component('userRole',userRole);
Vue.component('useredit',useredit);
Vue.component('userdelete',userdelete);
Vue.component('editRole',userEditRole);
// Vue.component('vue-toast',VueToast);
Vue.use(ServerTable, {}, false);
// Vue.use(VueNotifications, options);

new Vue({
    el: '#usr',
    // props:['data'],
    data: {
    	columns: ['name','username','email','role','edit','delete', 'edit_Role'],
    	options:{
    		templates:{
    			edit 	: 'useredit',
    			delete 	: 'userdelete',
                edit_Role : 'editRole',
                role : 'userRole'
    		}
    		
    	},
    },
    methods: {
    	edit(id){
    		console.log(id)
    	}
    }
    
});