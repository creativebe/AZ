<template>
	<div style="width:20px;">
	<button v-on:click="edit(data.id)" class="btn btn-flat btn-primary">Edit</button>
	<transition name="modal" v-if="sE">
		<div class="modal-mask">
			<div class="modal-wrapper">
				<div class="modal-container besar">
					<div class="modal-header">
						<div class="row">
							<div class="col-sm-12">
								<a href="#">
									<i class="fa fa-times pull-right" v-on:click="sE=false"></i>
								</a>
							</div>
						</div>
						<h1>Edit Service</h1>
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
					display_name : '',
					description : '',
					harga : '',
				})
			}
		},
		props:['data'],
		methods:{
			edit(id){
				var self = this;
	  			axios.get('/service/'+id).then(function(response){
	  				self.form.id = response.data.id;
	  				self.form.name = response.data.name;
	  				self.form.display_name = response.data.display_name;
	  				self.form.description = response.data.description;
	  				self.form.harga = response.data.harga;
	  			});
				this.sE = true;
			},
			onSubmit(){
				this.form.patch('/service/'+this.form.id)
					.then(response=> {
						this.$root.$refs.tbl.refresh();
						this.sE = false;
					});
			}
		}
	}
</script>