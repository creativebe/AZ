<template>
	<div style="width:20px">
		<button v-on:click="hapus(data.id)" class="btn btn-flat btn-danger">Delete</button>
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
							<h2 class="text-green">Delete Member</h2>
						</div>
						<div class="modal-body" style="margin-top: 0px;">
							<p>Are you sure want to delete this member?</p>
								<button class="btn btn-danger btn-flat pull-right" v-on:click="dialog=false">No</button>
							<form method="POST" @submit.prevent="onSubmit()">
								<button type="submit" class="btn btn-success btn-flat pull-right" style="margin-right: 10px;">Yes</button>
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
				dialog	: false,
				form : new Form({
					id : ''
				})
			}
		},
		props:['data'],
		methods:{
			hapus(id){
				var self = this;
	  			axios.get('/member/'+id).then(function(response){
	  				self.form.id = response.data.id;
	  			});
				this.dialog = true;
			},
			onSubmit(){
				this.form.delete('/member/'+this.form.id)
					.then(response=> {
						this.$root.$refs.tbl.refresh();
						this.dialog = false;
					});
			}
		}
	}
</script>