@extends('adminlte::page')

@section('title', 'Editar unidad')

@section('content_header')
    <a href="{{ route('admin.grupos.edit', $unidad->grupo) }}" class="float-right">Volver al grupo: <b> {{$unidad->grupo->curso->nombre}}</b> <i class="fas fa-chevron-right"></i></a>
    <h1>Editar unidad</h1>
@stop

@section('content')
	@if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
	<div class="card">
		<div class="card-body">
			{!! Form::model($unidad, ['route' => ['admin.unidads.update', $unidad], 'method' => 'put']) !!}
				
				@include('admin.unidads.partials.form')
				
				<br>
				<div class="col-md-12">
					
					{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			Notas
		</div>
        @livewire('admin.nota-index', [ 'unidad' => $unidad])
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop