<template>
	<div>
		<span v-for="role in roles" style="padding-right: 2px;">
			<small class="label bg-green" >{{ role.name}}</small>	
		</span>
	</div>
</template>

<script>

	import axios from 'axios';

	export default{
		data(){
			return{
				roles : {},
			}
		},
		props:['data'],
		mounted() {
  			this.getRoles(this.data.id);
		},
		methods : {
			getRoles(id) {
				var self = this;
				axios.get('/roles/'+id+'/roleUser').then(function(response){
	  				self.roles = response.data;
	  				// return response.data.name;
	  			});			
			}
		}
	}
</script>