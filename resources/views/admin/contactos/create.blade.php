@extends('adminlte::page')

@section('title', 'Crear contacto')

@section('content_header')
    <h1>Crear nuevo contacto</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			{!! Form::open(['route' => 'admin.contactos.store']) !!}
				
				@include('admin.contactos.partials.form')
				
				<br>
				<div class="form-group">
					
				{!! Form::submit('Crear contacto y agregar comentario', ['class' => 'btn btn-primary']) !!}
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