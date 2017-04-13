<template>
	<div class="col-sm-2" style="padding-right: 0px !important">
		<button class="btn btn-flat" @click="show = true">List Barang</button>
		<transition name="modal" v-if="show">
			<div class="modal-mask">
				<div class="modal-wrapper">
					<div class="modal-container">
						<div class="modal-header pull-right" style="border: none !important">
							<a href="#">
								<i class="fa fa-times pull-right" v-on:click="show=false"></i>
							</a>
						</div>
						<div class="modal-body">
							<table class="table table-fixed">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Harga</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="stock in stocks" @click="add(stock.id)">
										<td>{{ stock.name }}</td>
										<td>{{ stock.harga_jual }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</transition>
	</div>
</template>

<script>
	import axios from 'axios';
	import {ServerTable, ClientTable, Event} from 'vue-tables-2';
	// import test from './components/Kasir/test.vue';
	// import Form from '../../core/Form';
	
	Vue.use(ClientTable, {}, false);

	export default{
		data(){
			return {
				show : false,
				stocks : {}
			}
		},
		props: ['item'],
		mounted(){
			var self = this;
			axios.get('/stocks').then(function(response){
				self.stocks = response.data.data;
			})
		},
		methods: {
			add(id){
				var item = this.getId(id, this.stocks);
				// console.log(item);
				// console.log(this.stocks[0].id);
				this.$emit('add', item);
			},
			getId(id, myArray) {
				for (var i=0; i < myArray.length; i++)
				{
					if(myArray[i].id === id)
					{
						return myArray[i];
					}
				}
			}
		}
	}
</script>