@extends('adminlte::page')

@section('title', 'Editar profesor')

@section('content_header')
    <h1>Editar profesor</h1>
@stop

@section('content')
    <div class="card">
    	<dic class="card-body">
    		{!! Form::model($profesore, ['route' => ['admin.profesores.update', $profesore], 'method' => 'put']) !!}
    			@include('admin.profesores.partials.form')
                {!! Form::submit('Guardar datos', ['class' => 'btn btn-primary']) !!}
    		{!! Form::close() !!}
    	</dic>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop