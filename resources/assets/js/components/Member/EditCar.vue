<template>
	<div style="width:20px;">
	<button v-on:click="editCar(data.id)" class="btn btn-flat btn-warning">Edit Car</button>
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
						<h1>Edit Car</h1>
					</div>
					<div class="modal-body">
						<form class="form-horizontal">
							<div class="form-group">
								<select class="form-control" v-on:change="getCar()" v-model="select">
									<option value="0" selected="true"> Select car</option>
									<option v-for="s in selected" v-bind:value="s.id">{{ s.no_plat }}</option>
								</select>		
							</div>
						</form>
						<form v-if="showform" class="form-horizontal" @submit.prevent="onSubmit()" @keydown="form.errors.clear($event.target.name)">
							<div class="form-group">
								<input type="text" class="form-control" id="no_plat" name="no_plat" placeholder="No. plat" v-model="form.no_plat">
								<span class="help-block" v-if="form.errors.has('no_plat')" v-text="form.errors.get('no_plat')"/>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="merk" name="merk" placeholder="Merk" v-model="form.merk">
								<span class="help-block" v-if="form.errors.has('merk')" v-text="form.errors.get('merk')"/>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="type" name="type" placeholder="Type" v-model="form.type">
								<span class="help-block" v-if="form.errors.has('type')" v-text="form.errors.get('type')"/>
							</div>
							<div class="form-group">
								<input type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun pembuatan" v-model="form.tahun">
								<span class="help-block" v-if="form.errors.has('tahun')" v-text="form.errors.get('tahun')"/>
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
					cust_id : '',
					id : '',
					no_plat : '',
					merk : '',
					type : '',
					tahun : ''
				}),
				selected : {},
				select : '',
				showform : false
			}
		},
		props:['data'],
		methods:{
			editCar(id){
	  			var self = this;
	  			axios.get('/car/'+id).then(function(response){
	  				self.selected = response.data;
	  			});
				this.sE = true;
			},
			getCar(){
				var self = this;
				this.showform = false;
	  			axios.get('/car/edit/'+this.select).then(function(response){
	  				self.form.id = response.data.id;
	  				self.form.no_plat = response.data.no_plat;
	  				self.form.merk = response.data.Merk;
	  				self.form.type = response.data.Type;
	  				self.form.tahun = response.data.Tahun;
	  			});
	  			this.showform = true;
				this.sE = true;
			},
			onSubmit(){
				this.form.patch('/car/'+this.form.id)
					.then(response => {
						this.$root.$refs.tbl.refresh();
						this.sE = false;
					});
			}
		}
	}
</script>