@extends('adminlte::page')

@section('title', 'Permission')

@section('content_header')
    <h1>Permission</h1>
@stop

@section('content')
	<div class="box">
		<div class="box-body">
			<div id="permission">
				<Create></Create>	
				<v-server-table ref="tbl" url="/permissions" :columns="columns" :options="options">
				</v-server-table>
			</div>
		</div>
	</div>
@stop