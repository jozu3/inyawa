@extends('adminlte::page')

@section('title', 'Crear empleado')

@section('content_header')
    <h1>Crear empleado</h1>
@stop

@section('content')
    <div class="card">
    	<dic class="card-body">
    		{!! Form::open(['route' => 'admin.empleados.store']) !!}
    			@include('admin.empleados.partials.form')
                {!! Form::submit('Crear empleado', ['class' => 'btn btn-primary']) !!}
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