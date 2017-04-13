<template>
	<div style="width:20px;">
	<button v-on:click="edit(data.id)" class="btn btn-flat btn-primary">Edit</button>
	<transition name="modal" v-if="sE">
		<div class="modal-mask">
			<div class="modal-wrapper">
				<div class="modal-container">
					<div class="modal-header">
						<div class="row">
							<div class="col-sm-12">
								<a href="#">
									<i class="fa fa-times pull-right" v-on:click="sE=false"></i>
								</a>
							</div>
						</div>
						<h1>Edit User</h1>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" @submit.prevent="onSubmit()" @keydown="form.errors.clear($event.target.name)">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" v-model="form.name">
								<span class="help-block" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Username" v-model="form.username">
								<span class="help-block" v-if="form.errors.has('username')" v-text="form.errors.get('username')"/>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" v-model="form.email">
								<span class="help-block" v-if="form.errors.has('email')" v-text="form.errors.get('email')"/>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-flat" :disabled="form.errors.any()">Save</button>
							</div>
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

	export default{
		data(){
			return{
				sE : false,
				form : new Form({
					id : '',
					name : '',
					username : '',
					email : '',
				})
			}
		},
		props:['data'],
		methods:{
			edit(id){
				var self = this;
	  			axios.get('/users/'+id).then(function(response){
	  				self.form.id = response.data.id;
	  				self.form.name = response.data.name;
	  				self.form.username = response.data.username;
	  				self.form.email = response.data.email;
	  			});
				this.sE = true;
			},
			onSubmit(){
				this.form.patch('/users/'+this.form.id)
					.then(response=> {
						// location.reload();
						this.$root.$refs.tbl.refresh();
						this.sE = false;
					});
			}
		}
	}
</script>