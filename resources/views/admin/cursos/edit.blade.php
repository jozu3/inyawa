@extends('adminlte::page')

@section('title', 'Editar curso')

@section('content_header')
    <h1>Editar curso</h1>
@stop

@section('content')
	@if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
	<div class="card">
		<div class="card-body">
			{!! Form::model($curso, ['route' => ['admin.cursos.update', $curso], 'method' => 'put']) !!}
				
				@include('admin.cursos.partials.form')
				
				<br>
				<div class="form-group">
					
				{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			Grupos
     		<a href="{{ route('admin.grupos.create', 'idcurso='.$curso->id) }}" class="btn btn-success btn-sm float-right">Nuevo grupo</a>
		</div>
		<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>Grupo</th>
    					<th>Fecha de inicio</th>
    					<th colspan="2"></th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($curso->grupos as $grupo)
    				  <tr>
    				  	<td>{{ $grupo->curso->nombre }}</td>
    				  	<td>{{ $grupo->fecha }}</td>
    				  	<td width="10px">
    				  		<a href="{{ route('admin.grupos.edit', $grupo) }}" class="btn btn-sm btn-primary" >Editar</a>
    				  	</td>
    				  	<td width="10px">
							<form method="POST" action="{{ route('admin.grupos.destroy', $grupo) }}">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
							</form>
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
    <style>
    	.list-nota{
    		width: 20%;
    		padding: 0.15rem 1.25rem;
    	}
    	.list-nota2{
    		width: 80%;
    	}
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop