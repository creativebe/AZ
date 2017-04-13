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
						<h1>Create Member</h1>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" @submit.prevent="onSubmit()" @keydown="form.errors.clear($event.target.name)">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" v-model="form.name">
								<span class="help-block" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" v-model="form.alamat">
								<span class="help-block" v-if="form.errors.has('alamat')" v-text="form.errors.get('alamat')"/>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="No. Telp" v-model="form.no_tlp">
								<span class="help-block" v-if="form.errors.has('no_tlp')" v-text="form.errors.get('no_tlp')"/>
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
					alamat : '',
					no_tlp : '',
				})
			}
		},
		methods:{
			onSubmit(){
				this.form.post('/member')
					.then(response => {
						this.$root.$refs.tbl.refresh();
						this.sfCreate = false;
					});
			}
		}
	}
</script>