@extends('adminlte::page')

@section('title', 'Crear curso')

@section('content_header')
    <h1>Crear nuevo curso</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			{!! Form::open(['route' => 'admin.cursos.store']) !!}
				
				@include('admin.cursos.partials.form')
				
				<br>
				<div class="form-group">
					
				{!! Form::submit('Crear curso', ['class' => 'btn btn-primary']) !!}
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