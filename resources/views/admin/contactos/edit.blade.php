@extends('adminlte::page')

@section('title', 'Inyawa')

@section('content_header')
    <h1>Editar contacto</h1>
@stop

@section('content')
	@if (session('info'))
		<div class="alert alert-success">
			{{ session('info') }}
		</div>
	@endif
    <div class="card">
		<div class="card-body">
			{!! Form::model($role, ['route' => ['admin.contactos.update', $role], 'method' => 'put']) !!}
			
				@include('admin.contactos.partials.form')

				{!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary']) !!}
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