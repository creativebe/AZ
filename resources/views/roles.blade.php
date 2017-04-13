@extends('adminlte::page')

@section('title', 'Role')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
	<div class="box">
		<div class="box-body">
			<div id="roles">
				<Create></Create>	
				<v-server-table ref="tbl" url="/roles" :columns="columns" :options="options">
				</v-server-table>
			</div>
		</div>
	</div>
@stop