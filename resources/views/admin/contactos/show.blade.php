@extends('adminlte::page')

@section('title', 'Inyawa')

@section('content_header')
	<a href="{{ route('admin.matriculas.create', 'idcontacto='.$contacto->id) }}" class="btn btn-success btn-sm float-right">Matricular</a>
    <h1>Contacto: {{ $contacto->nombres.' '.$contacto->apellidos }}</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="row">		
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				{!! Form::model($contacto, ['route' => ['admin.contactos.update', $contacto], 'method' => 'put']) !!}

				@include('admin.contactos.partials.form')

				<br>
				<div class="form-group">
				{!! Form::submit('Actualizar datos', ['class' => 'btn btn-primary']) !!}
				</div>
				{!! Form::close() !!}
				
			</div>
		</div>
		
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<b>Comentarios</b>
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Curso</th>
							<th>Comentario</th>
							<th colspan="2">Usuario</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($seguimientos as $seg)
							<tr>
								<td>{{$seg->fecha}}</td>
								<td>{{$seg->curso->nombre}}</td>
								<td>{{$seg->comentario}}</td>
								<td colspan="2">{{$seg->empleado->user->name}}</td>
							</tr>
						@endforeach
                        <tr>
						{!! Form::open(['route' => 'admin.seguimientos.store']) !!}
							{!! Form::hidden('contacto_id', $contacto->id) !!}
							{!! Form::hidden('tipo', 0) !!}
							{!! Form::hidden('user_id', auth()->user()->id) !!}
							{!! Form::hidden('empleado_id', auth()->user()->empleado->id) !!}

                            <td width="100px">
								{!! Form::date('fecha', date('Y-m-d'), ['class' => 'form-control', 'placeholder' => 'Ingrese un comentario']) !!}
                            </td>
                            <td>
                            	{!! Form::select('curso_id', $cursos, null, ['class' => 'form-control', 'placeholder' => 'Escoge un curso']); !!}
							@error('curso_id')
								<small class="text-danger">{{ $message }}</small>
							@enderror
                            </td>
                            <td>
								{!! Form::text('comentario', null, ['class' => 'form-control', 'placeholder' => 'Ingrese un comentario']) !!}
							@error('comentario')
								<small class="text-danger">{{ $message }}</small>
							@enderror
                            </td>
                            <td width="200px">
                                {!! Form::text('user', auth()->user()->empleado->user->name, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                            </td>
                            <td>
                            	{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                            </td>
                    	{!! Form::close() !!}
                        </tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop