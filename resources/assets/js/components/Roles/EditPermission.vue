<template>
	<div style="width:20px">
		<button v-on:click="edit(data.id)" class="btn btn-flat btn-warning">Edit Permission</button>
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
							<h2 class="text-green">Edit Permission</h2>
						</div>
						<div class="modal-body" style="margin-top: 0px;">
							<form method="POST" @submit.prevent="onSubmit()">
								<div class="form-group" v-for="p in permission.data">
									<div>
										<input type="checkbox" 
											name="p.id" 
											:value="p.id"
											v-model="form.permission"
											>
											<label :for="p.id">{{ p.display_name }} </label>
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
					permission : []
				}),
				permission : {},
				checked : false,
			}
		},
		props:['data'],
		methods:{
			edit(id){
				var self = this;
	  			axios.get('/permissions').then(function(response){
	  				self.permission = response.data;
	  			});
	  			axios.get('/role/'+id+'/editPermission').then(function(response){
	  				self.form.permission = response.data;
	  			});
	  			this.dialog = true;
			},
			onSubmit(){
				this.form.post('/role/'+this.data.id+'/rolepermissionUpdate')
					.then(response=> {
						this.$root.$refs.tbl.refresh();
						this.dialog = false;
					});
			}
		}
	}
</script>