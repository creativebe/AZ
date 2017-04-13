@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
	<div class="box">
		<div class="box-body">
			<div id="usr">
				<Users></Users>
				<v-server-table ref="tbl" url="/users/get" :columns="columns" :options="options">
				</v-server-table>
			</div>
		</div>
	</div>
	
@stop