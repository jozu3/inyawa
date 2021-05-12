@extends('adminlte::page')

@section('title', 'Editar grupo')

@section('content_header')
    <h1>Editar grupo</h1>
@stop

@section('content')
	@if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
	<div class="card">
		<div class="card-body">
			{!! Form::model($grupo, ['route' => ['admin.grupos.update', $grupo], 'method' => 'put']) !!}
				
				@include('admin.grupos.partials.form')
				
				<br>
				<div class="form-group">
					
				{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			Unidades
			{{-- {!! Form::open(['route' => 'admin.clases.store']) !!}
			{!! Form::hidden('grupo_id', $grupo->id) !!}
			{!! Form::submit('Crear clases', ['class' =>'btn btn-primary float-right']) !!}
			{!! Form::close() !!}  --}}
		</div>
        @livewire('admin.unidad-index', [ 'grupo' => $grupo])
		
	</div>
	<div class="card">
		<div class="card-header">
			Clases
		</div>
        @livewire('admin.clases-index', [ 'grupo' => $grupo])
		
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="">
    <style>
    	.list-nota{
    		width: 20%;
    		padding: 0.15rem 1.25rem;
    		border: 0;
    	}
    	.list-nota2{
    		width: 60%;
    	}
    	.list-group-horizontal {
		    border-bottom: 1px solid #bbbbbb;
		}
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop