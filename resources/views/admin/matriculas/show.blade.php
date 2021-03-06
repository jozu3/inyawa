@extends('adminlte::page')

@section('title', 'Detalle de Matricula')

@section('content_header')
	<a href="{{ route('admin.matriculas.edit', $matricula) }}" class="btn btn-success btn-sm float-right">Editar matrícula</a>
	<a href="{{ route('admin.print', 'recibo-matricula?idmatricula='.$matricula->id) }}" class="btn btn-danger btn-sm float-right mr-2" target="_blank"><i class="fas fa-file-pdf"></i> Imprimir recibo</a>
    <h1>Alumno: {{ $matricula->alumno->contacto->nombres.' '.$matricula->alumno->contacto->apellidos }}</h1>
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
				<div class="row">
					<div class="col-md-3">
						<p>DNI:</p>
					</div>
					<div class="col-md-9">{{ $matricula->alumno->contacto->doc}}</div>
					<div class="col-md-3">
						<p>Correo electrónico:</p>
					</div>
					<div class="col-md-9">{{ $matricula->alumno->contacto->email}}</div>
					<div class="col-md-3">
						<p>Teléfono:</p>
					</div>
					<div class="col-md-9">{{ $matricula->alumno->contacto->telefono}}</div>
					<div class="col-md-3">
						<p>Código:</p>
					</div>
					<div class="col-md-9">{{ $matricula->alumno->codigo }}</div>
					<div class="col-md-3">
						<p>Curso:</p>
					</div>
					<div class="col-md-9">{{ $matricula->grupo->curso->nombre }}</div>
					<div class="col-md-3">
						<p>Fecha de inicio del grupo:</p>
					</div>
					<div class="col-md-9">{{ date('d/m/Y', strtotime($matricula->grupo->fecha)) }}</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<b>Obligaciones por pagar</b>
        		<a href="{{ route('admin.pagos.index', 'search='.$matricula->id) }}" class="btn btn-primary btn-sm float-right">Ver pagos</a>
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Concepto</th>
							<th>Fecha de vencimiento</th>
							<th>Estado</th>
							<th>Monto</th>
							<th>Descuento</th>
							<th>Monto final</th>
							<th>Monto pagado</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($matricula->obligaciones as $obligacione)
							<tr>
								<td>{{$obligacione->concepto}}</td>
								<td>{{ date('d/m/Y', strtotime($obligacione->fechalimite)) }}</td>
								<td>
									@switch ($obligacione->estado)
										@case(0)
									        Exonerado
									        @break
									    @case(1)
									        Por pagar
									        @break
									    @case(2)
									        Parcial
									    	@break
									    @case(3)
									        Pagado
									    	@break
									@endswitch
									@if ($obligacione->fechapagadototal > $obligacione->fechalimite)
		                                <small class="text-danger">({{ date('d/m/Y', strtotime($obligacione->fechapagadototal)) }})</small>
		                            @endif
								</td>
								<td>{{$obligacione->monto}}</td>
								<td>{{$obligacione->descuento}}</td>
								<td>{{$obligacione->montofinal}}</td>
								<td>{{$obligacione->montopagado}}</td>
								<td>
									@switch ($obligacione->estado)
										@case(0)
									        @break
									    @case(1)
											<a href="{{ route('admin.pagos.create', 'idobligacione='.$obligacione->id) }}" class="btn btn-sm btn-primary" >Registar pago</a>
									        @break
									    @case(2)
											<a href="{{ route('admin.pagos.create', 'idobligacione='.$obligacione->id) }}" class="btn btn-sm btn-primary" >Registar pago</a>
									    	@break
									    @case(3)
									    	@break
									@endswitch
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop

@section('css')
    <style type="text/css">
        .card-body {
            overflow: auto;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop