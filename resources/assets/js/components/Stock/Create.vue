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
						<h1>Create Stock</h1>
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
								<input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" v-model="form.jumlah">
								<span class="help-block" v-if="form.errors.has('jumlah')" v-text="form.errors.get('jumlah')"/>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" v-model="form.satuan">
								<span class="help-block" v-if="form.errors.has('satuan')" v-text="form.errors.get('satuan')"/>
							</div>
							<div class="form-group">
								<input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Harga beli" v-model="form.harga_beli">
								<span class="help-block" v-if="form.errors.has('harga_beli')" v-text="form.errors.get('harga_beli')"/>
							</div>
							<div class="form-group">
								<input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga jual" v-model="form.harga_jual">
								<span class="help-block" v-if="form.errors.has('harga_jual')" v-text="form.errors.get('harga_jual')"/>
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
					jumlah : '',
					satuan : '',
					harga_beli : '',
					harga_jual : '',
				})
			}
		},
		methods:{
			onSubmit(){
				this.form.post('/stock')
					.then(response => {
						this.$root.$refs.tbl.refresh();
						this.sfCreate = false;
					});
			}
		}
	}
</script>