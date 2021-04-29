@extends('adminlte::page')

@section('title', 'Alumno')

@section('content_header')
    <h1>Editar alumno</h1>
@stop

@section('content')
	@if (session('info'))
		<div class="alert alert-success">
			{{ session('info') }}
		</div>
	@endif
    <div class="card">
		<div class="card-body">
			{!! Form::model($alumno->contacto, ['route' => ['admin.contactos.update', $alumno->contacto], 'method' => 'put']) !!}
				{!! Form::hidden('updt_alumno','true') !!}
				@include('admin.contactos.partials.form')
				<div class="row">
					
					<div class="col-md-12">
							{!! Form::label('estado', 'Estado') !!}
							{!! Form::select('estado', [
									'1' => 'No contactado',
									'2' => 'Contactado',
									'3' => 'Probable',
									'4' => 'Confirmado',
									'5' => 'Matriculado',
								], null, ['class' => 'form-control', 'placeholder' => 'Escoge', 'disabled' => 'disabled', 'style' => 'appearance: none; ']); !!}
					</div>
				</div>
				{!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary mt-2']) !!}
			{!! Form::close() !!}
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>Fecha de matrícula</th>
                        <th>Curso</th>
                        <th>Grupo</th>
    					<th>Estado</th>
    					<th colspan="2"></th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($alumno->matriculas as $matricula)
    				  <tr>
    				  	<td>{{ $matricula->fecha }}</td>
    				  	<td>
                            {{ $matricula->grupo->curso->nombre }}
                        </td>
                        <td>                            
                            {{ $matricula->grupo->fecha }}
                        </td>
                        <td>
                            {{ $matricula->grupo->estado }}
                        </td>
    				  	<td width="10px">
    				  		<a href="{{ route('admin.grupos.show', $matricula->grupo) }}" class="btn btn-sm btn-primary" >Ver</a>
    				  	</td>
    				  </tr>
    				@endforeach

    			</tbody>
    		</table>
		</div>
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop