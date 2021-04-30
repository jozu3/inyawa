@extends('layouts.print')
@section('title', 'Recibo de Matrícula')
@section('content')
    <center>RECIBO</center>
    <div class="">		
		<span class="datos">
			<div class="mt-2">
				<span class="text1">Alumno:</span>
				<span class="">{{ $matricula->alumno->user->name}}</span>
			</div>
			<div class="mt-2">
				<span class="text1">DNI:</span>
				<span class="">{{ $matricula->alumno->contacto->doc}}</span>
			</div>
			<div class="mt-2">
				<span class="text1">Correo electrónico:</span>
				<span class="">{{ $matricula->alumno->contacto->email}}</span>
			</div>
			<div class="mt-2">
				<span class="text1">Teléfono:</span>
				<span class="">{{ $matricula->alumno->contacto->telefono}}</span>
			</div>
			<div class="mt-2">
				<span class="text1">Código:</span>
				<span class="">{{ $matricula->alumno->codigo }}</span>
			</div>
			<div class="mt-2">
				<span class="text1">Curso:</span>
				<span class="col-md-9">{{ $matricula->grupo->curso->nombre }}</span>
			</div>
		</span>
		<span class="cont-logo">
			<img class="logo" src="{{ config('app.url') }}/img/logo_inyawa.jpg" alt="">
		</span>
		<div class="mt-3">
			<div class="">
				<div class="mt-1">
					<b>Obligaciones por pagar</b>
				</div>
				<div class="">
					<table class="table table-striped mt-4">
						<thead>
							<tr>
								<th>Concepto</th>
								<th>Fecha</th>
								<th>Estado</th>
								<th>Monto</th>
							</tr>
						</thead>
						<tbody>
							@php
								$total = 0;
							@endphp
							@foreach ($matricula->obligaciones as $obligacione)
								<tr>
									<td>{{$obligacione->concepto}}</td>
									<td>{{$obligacione->fechalimite}}</td>
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
									</td>
									<td>{{$obligacione->montofinal}}</td>
								</tr>
								@php
									$total += $obligacione->montofinal;
								@endphp
							@endforeach
							<tr>
								<td></td>
								<td></td>
								<td><b>Total</b></td>
								<td><b>{{ $total }}</b></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="p-footer">
		<img class="ic-fb"s src="{{ config('app.url') }}/img/ic_fb.png" alt="">  INYAWA PERU capacitaciones profesionales.
	</div>
	<div class="p-footer">
		Av Elmer Faucett 16-27 jardines de Viru - Bella Vista - Callao
	</div>
	<div class="p-footer">
		Correo Electronico: <a href="mailto:inyawaperucapacitacionesprofesionales@gmail.com">inyawaperucapacitacionesprofesionales@gmail.com</a> 
	</div>
@endsection
@section('styles')
<style>
	center{
		font-size:23px;
		font-weight:bold;
	}
	.datos{
		font-size:14px;
	}
	.icfb{
		color: #385898;
	}
	.text1 {
		width: 25%;
		/*background-color:red;*/
	}
	.logo{
		width: 200px;
	}
	table{
		font-size: 12px;
	}
	.cont-logo{
		position: absolute;
		right: 0;
		top: 50px
	}
	.p-footer{
		font-weight: bold;
		font-size: 12px;
	}
	td, th {
     	padding: .3rem!important;
    }
    .ic-fb{
    	width: 18px;
    }
</style>
@endsection