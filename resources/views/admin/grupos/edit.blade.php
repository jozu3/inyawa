@extends('adminlte::page')

@section('title', 'Editar grupo')

@section('plugins.Sweetalert2', true)

@section('content_header')
     <a href="{{ route('admin.grupos.show', $grupo) }}" class="btn btn-success btn-sm float-right"><i class="fas fa-user-graduate"></i> Ver alumnos</a>

    <h1>Editar grupo</h1>
@stop

@section('content')
	@if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    @if (auth()->user()->can('admin.grupos.edit'))
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
    @endif
	@if (session('info_alumno_nota'))
        <div class="alert alert-success">
            {{ session('info_alumno_nota') }}
        </div>
    @endif
    @if (session('error_alumno_nota'))
        <div class="alert alert-danger">
            {{ session('error_alumno_nota') }}
        </div>
    @endif
	<div class="card">
		<div class="card-header">
			@php
				$iniciado = false;
				$hay_alumnos_nuevos = false;
				if ($grupo->matriculas->count() != $grupo->alumnoUnidadesporMatricula()) {
					$hay_alumnos_nuevos = true;
				}
			@endphp
			Unidades{{ $hay_alumnos_nuevos}}
			@if ($grupo->unidads->count())
				@if(!$grupo->notasGenerateds())
					<div class="float-right">
					{!! Form::open(['route' => 'admin.alumno_unidades.store', 'class' =>'crear_notas_clases']) !!}
						{!! Form::hidden('grupo_id', $grupo->id) !!}
						{!! Form::submit('Generar notas', ['class' =>'btn btn-primary float-right mx-2']) !!}
					{!! Form::close() !!} 
					</div>
				@else
					<div class="float-right">
					@php
						$iniciado = true;
					@endphp
					{!! Form::open(['route' => ['admin.alumno_unidades.destroyfromgroup', $grupo]]) !!}
						@method('DELETE')
						{!! Form::submit('Eliminar registro de notas', ['class' =>'btn btn-danger float-right mx-2']) !!}
					{!! Form::close() !!} 
					</div>
					@if ($hay_alumnos_nuevos)
					<div class="float-right">
					{!! Form::open(['route' => ['admin.alumno_unidades.updatefromgroup', $grupo], 'class' =>'crear_notas_clases']) !!}
						{!! Form::hidden('grupo_id', $grupo->id) !!}
						{!! Form::submit('Generar notas', ['class' =>'btn btn-primary float-right mx-2']) !!}
					{!! Form::close() !!} 
					</div>
					@endif
				@endif

				@if(!$grupo->clasesGenerateds())
					<div class="float-right">
					{!! Form::open(['route' => ['admin.clases.storeforgroup', $grupo], 'class' =>'crear_notas_clases']) !!}
						{!! Form::submit('Crear clases', ['class' =>'btn btn-primary float-right']) !!}
					{!! Form::close() !!}  
					</div>
				@else
					@php
						$iniciado = true;
					@endphp
					<div class="float-right">
					{!! Form::open(['route' => ['admin.clases.destroyfromgroup', $grupo]]) !!}
						@method('DELETE')
						{!! Form::submit('Eliminar registro de clases', ['class' =>'btn btn-danger float-right mx-2']) !!}
					{!! Form::close() !!} 
					</div>				
				@endif	
			@endif
		</div>	
        @livewire('admin.unidad-index', [ 'grupo' => $grupo, 'iniciado' => $iniciado])
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
    <script>
    	$().ready(function() {
		
	    	$('.crear_notas_clases').submit( function (e) {
	    		e.preventDefault();
		    	Swal.fire({
				  title: 'Advertencia',
				  text: "Si crea las clases o genera las notas para los alumnos, ya no podr?? agregar unidades o notas de las unidades a este grupo.",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Continuar',
				  cancelButtonText: "Cancelar", 
				}).then((result) => {
				  if (result.value) {
				    /**/
				    this.submit();
				  }
				})	    		
	    	});
	    

	    });
    </script>
@stop