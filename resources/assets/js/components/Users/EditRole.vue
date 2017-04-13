<template>
	<div style="width:20px">
		<button v-on:click="editRole(data.id)" class="btn btn-flat btn-warning">Edit Role</button>
		<transition name="modal" v-if="dialog">
			<div class="modal-mask">
				<div class="modal-wrapper">
					<div class="modal-container">
						<div class="modal-header">
							<div class="row">
								<div class="col-sm-12">
									<a href="#">
										<i class="fa fa-times pull-right" v-on:click="dialog=false"></i>
									</a>
								</div>
							</div>
							<h2 class="text-green">Edit Role User</h2>
						</div>
						<div class="modal-body" style="margin-top: 0px;">
							<form method="POST" @submit.prevent="onSubmit()">
								<div class="form-group" v-for="role in roles.data">
									<div>
										<input type="checkbox" 
											name="role.id" 
											:value="role.id"
											v-model="form.roles"
											>
											<label :for="role.id">{{ role.name }} </label>
									</div>
								</div>
								<!-- <span class="help-block" v-text="form.errors.get('name')"></span> -->
								<button type="submit" class="btn btn-success btn-flat pull-right" style="margin-right: 10px;">Save</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</transition>
	</div>
</template>

<script>

	import axios from 'axios';
	import Form from '../../core/Form';

	export default {
		data(){
			return {
				dialog	: false,
				form : new Form({
					roles : []
				}),
				roles : {},
				roleuser_name : [],
				checked : false,
			}
		},
		props:['data'],
		methods:{
			editRole(id){
				var self = this;
	  			axios.get('/roles').then(function(response){
	  				self.roles = response.data;
	  			});
	  			axios.get('/users/'+id+'/editRole').then(function(response){
	  				self.form.roles = response.data;
	  			});
	  			this.dialog = true;
			},
			onSubmit(){
				this.form.post('/users/'+this.data.id+'/userRoleUpdate')
					.then(response=> {
						this.$root.$refs.tbl.refresh();
						this.dialog = false;
					});
			}
		}
	}
</script>