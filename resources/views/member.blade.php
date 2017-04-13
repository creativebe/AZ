@extends('adminlte::page')

@section('title', 'Member')

@section('content_header')
    <h1>Member</h1>
@stop

@section('content')
	<div class="box">
		<div class="box-body">
			<div id="member">
				<Create></Create>	
				<v-server-table ref="tbl" url="/members" :columns="columns" :options="options">
				</v-server-table>
			</div>
		</div>
	</div>
@stop