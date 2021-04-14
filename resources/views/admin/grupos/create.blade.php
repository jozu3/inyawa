@extends('adminlte::page')

@section('title', 'Crear grupo')

@section('content_header')
    <h1>Crear nuevo grupo</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			{!! Form::open(['route' => 'admin.grupos.store']) !!}
				
				@include('admin.grupos.partials.form')
				
				<br>
				<div class="form-group">
					
				{!! Form::submit('Crear grupo', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop