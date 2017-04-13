<template>
	<div style="width:20px;">
	<button v-on:click="addCar(data.id)" class="btn btn-flat btn-info">Add Car</button>
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
						<h1>Add Car</h1>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" @submit.prevent="onSubmit()" @keydown="form.errors.clear($event.target.name)">
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
					no_plat : '',
					merk : '',
					type : '',
					tahun : ''
				})
			}
		},
		props:['data'],
		methods:{
			addCar(id){
	  			this.form.cust_id = id;
				this.sE = true;
			},
			onSubmit(){
				this.form.post('/car')
					.then(response => {
						this.$root.$refs.tbl.refresh();
						this.sE = false;
					});
			}
		}
	}
</script>