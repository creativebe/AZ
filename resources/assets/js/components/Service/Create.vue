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
				<div class="modal-container besar">
					<div class="modal-header" style="padding:0px;">
						<div class="row">
							<div class="col-sm-12">
								<a href="#">
									<i class="fa fa-times pull-right" v-on:click="sfCreate=false"></i>
								</a>
							</div>
						</div>
						<h1>Create Service</h1>
					</div>
					<div class="modal-body">
						<form @submit.prevent="onSubmit()" @keydown="form.errors.clear($event.target.name)">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" v-model="form.name">
								<span class="help-block" v-text="form.errors.get('name')"></span>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="display_name" name="display_name" placeholder="Display Name" v-model="form.display_name">
								<span class="help-block" v-if="form.errors.has('display_name')" v-text="form.errors.get('display_name')"></span>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="description" name="description" placeholder="Description" v-model="form.description">
								<span class="help-block" v-if="form.errors.has('description')" v-text="form.errors.get('description')"/>
							</div>
							<div class="form-group">
								<input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" v-model="form.harga">
								<span class="help-block" v-if="form.errors.has('harga')" v-text="form.errors.get('harga')"/>
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
					display_name : '',
					description : '',
					harga : '',
				})
			}
		},
		methods:{
			onSubmit(){
				this.form.post('/service')
					.then(response => {
						this.$root.$refs.tbl.refresh();
						this.sfCreate = false;
					});
			}
		}
	}
</script>