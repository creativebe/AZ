@extends('adminlte::page')

@section('title', 'Stock')

@section('content_header')
    <h1>Stock</h1>
@stop

@section('content')
	<div class="box">
		<div class="box-body">
			<div id="stock">
				<Create></Create>
				<v-server-table ref="tbl" url="/stocks" :columns="columns" :options="options">
				</v-server-table>
			</div>
		</div>
	</div>
	
@stop