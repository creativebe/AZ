<template>
	<div>
	<div class="form-group pull-right">
		<button class="btn btn-success flat" style="display: inline" v-on:click="sfCreate=true">
			Create
		</button>
	</div>

	<!-- Form Create -->
	<transition name="modal" v-if="sfCreate">
		<div class="modal-mask">
			<div class="modal-wrapper">
				<div class="modal-container">
					<div class="modal-header">
						<div class="row">
							<div class="col-sm-12">
								<a href="#">
									<i class="fa fa-times pull-right" v-on:click="sfCreate=false"></i>
								</a>
							</div>
						</div>
						<h1>Create User</h1>
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
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" v-model="form.password">
								<span class="help-block" v-if="form.errors.has('password')" v-text="form.errors.get('password')"/>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" v-model="form.password_confirmation">
								<span class="help-block" v-if="form.errors.has('password_confirmation')" v-text="form.errors.get('password_confirmation')"/>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-flat" :disabled="form.errors.any()">Create</button>
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
	import VueNotifications from 'vue-notifications';
	

	export default{
		data(){
			return{
				sfCreate : false,
				form : new Form({
					name : '',
					username : '',
					email : '',
					password : '',
					password_confirmation : '',
				})
			}
		},
		mounted() {
			// miniToastr.init();
		},
		methods:{
			onSubmit(){
				this.form.post('/users')
					.then(response => {
						// miniToastr.success('User created', 'Success');
						this.$root.$refs.tbl.refresh();
						this.sfCreate = false;
					});
			}
		}
	}
</script>