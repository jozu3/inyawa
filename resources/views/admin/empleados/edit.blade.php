@extends('adminlte::page')

@section('title', 'Inyawa')

@section('content_header')
    <h1>Editar empleado</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
    	<dic class="card-body">
    		{!! Form::model($empleado, ['route' => ['admin.empleados.update', $empleado], 'method' => 'put']) !!}

    			@include('admin.empleados.partials.form')
                
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
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