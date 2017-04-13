<template>
	<div>
		<div class="box box-primary">
			<div class="box-body box-profile" style="min-height: 200px;">
				<div class="row">
					<ListBarang @add="add"></ListBarang>		
					<ListJasa></ListJasa>
				</div>
				<table class="table table-fixed" style="width: 100%" >
					<thead>
						<tr>
							<th style="width: 50%">Item</th>
							<th style="width: 15%">Harga</th>
							<th style="width: 8%">Qty</th>
							<th style="width: 17%">Sub Total</th>
							<th style="text-align: center; font-size:20px; width:5%">
								<span class="fa fa-trash"></span>
							</th>
							<th style="width:5%"></th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="i in items">
							<td>{{ i.name }}</td>
							<td>{{ i.harga_jual }}</td>
							<td>{{ i.jumlah }}</td>
							<td>test</td>
							<td>test</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="box-footer">
				<button class="btn btn-flat">Open Cart</button>
				<button class="btn btn-flat">Save Cart</button>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';
	import {ServerTable, ClientTable, Event} from 'vue-tables-2';
	// import test from './components/Kasir/test.vue';
	// import Form from '../../core/Form';
	
	export default{
		data() {
			return{
				item : {},
				items : []
			}
		},
		methods: {
			add(value){
				this.item = value;
				this.items.push(this.item);
			}
		}
	}
</script>