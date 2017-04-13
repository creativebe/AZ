@extends('adminlte::page')

@section('title', 'Service')

@section('content_header')
    <h1>Service</h1>
@stop

@section('content')
	<div class="box">
		<div class="box-body">
			<div id="service">
				<Create></Create>
				<v-server-table ref="tbl" url="/services" :columns="columns" :options="options">
				</v-server-table>
			</div>
		</div>
	</div>
	
@stop