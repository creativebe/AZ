@extends('adminlte::page')

@section('title', 'Kasir')

@section('content_header')
    <h1>Kasir</h1>
@stop

@section('content')
	<div class="row" id="kasir">
		<div class="col-sm-4">
			<Customer></Customer>
		</div>
		<div class="col-sm-8">
			<Cart></Cart>
		</div>
		
	</div>
	
@stop