<template>
	<div>
		<div class="box box-primary">
			<div class="box-body box-profile" style="min-height: 200px;">
				<h3 class="profile-username text-center" style="padding-top: 50px;" v-if="no_plat == ''">
					Please add or search customer first
				</h3>
				<h3 class="profile-username text-center" style="padding-top: 50px;">{{no_plat}}</h3>
				<p class="text-muted text-center">{{merk}} {{type}}</p>
			</div>
			<div class="box-footer">
				<button class="btn btn-flat btn-primary" @click="customerForm=true">Search</button>
				<button class="btn btn-flat btn-info" @click="addForm=true">Add</button>
			</div>
		</div>
		<transition name="modal" v-if="customerForm">
			<div class="modal-mask">
				<div class="modal-wrapper">
					<div class="modal-container">
						<div class="modal-header">
							<a href="#" @click="customerForm=false">
								<i class="fa fa-times pull-right"></i>
							</a>
							<h1>Search Customer</h1>
						</div>
						<div class="modal-body">
							<!-- <form class="form-horizontal"> -->
								<div class="form-group">
									<input type="text" class="form-control" id="no_plat" name="no_plat" placeholder="No. Plat" v-model="input_plat" @keyup.enter="search()">
									<!-- <span class="help-block" v-if="form.errors.has('no_plat')" v-text="form.errors.get('no_plat')"/> -->
								</div>
							<!-- </form> -->
						</div>
					</div>
				</div>
			</div>
		</transition>
		<transition name="modal" v-if="addForm">
			<div class="modal-mask">
				<div class="modal-wrapper">
					<div class="modal-container">
						<div class="modal-header">
							<a href="#" @click="addForm=false">
								<i class="fa fa-times pull-right"></i>
							</a>
							<h1>Add Customer</h1>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="form-group">
									<input type="text" class="form-control" id="no_plat" name="no_plat" placeholder="No. Plat" v-model="no_plat">
									<!-- <span class="help-block" v-if="form.errors.has('no_plat')" v-text="form.errors.get('no_plat')"/> -->
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="merk" name="merk" placeholder="Merk" v-model="merk">
									<!-- <span class="help-block" v-if="form.errors.has('merk')" v-text="form.errors.get('merk')"/> -->
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="type" name="type" placeholder="Type" v-model="type">
									<!-- <span class="help-block" v-if="form.errors.has('type')" v-text="form.errors.get('type')"/> -->
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
			return {
				no_plat : '',
				type : '-',
				merk : '-',
				customerForm : false,
				addForm : false,
				input_plat : ''
			}
		},
		methods : {
			search(){
				var self = this;
	  			axios.get('/car/'+this.input_plat).then(function(response){
	  				self.no_plat = response.data.no_plat;
	  				self.type = response.data.Type;
	  				self.merk = response.data.Merk;
	  			});
	  			this.customerForm = false;
			}
		}
	}
</script>