<div class="card cont-pestaña">
	<div class="card-header">
		<b>Listado de Alumnos</b>
	</div>
	<div class="card-body card-body-2 cont-table-div" style="overflow-x:auto">
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="nombre-fijo">Nombre</th>
					@if (isset($is_report) && $is_report == true)
	                	<th class="">Código de matrícula</th>
						<th class="">DNI/Documento de identidad</th>
						<th class="">Grado académico</th>
						<th class="">Teléfono</th>
	                @endif
					@foreach($grupo->unidads as $unidad)
						@if (auth()->user()->can('admin.grupos.viewList') || (auth()->user()->hasRole('Profesor') && $unidad->profesore_id == auth()->user()->profesore->id))
							<th colspan="{{ $unidad->clases->count() }}" class="text-center border-left">
								{{ $unidad->descripcion }}
							</th>
						@else
							{{--
							@if ()
								<th colspan="{{ $unidad->clases->count() }}" class="text-center border-left">
									{{ $unidad->descripcion }}
								</th>
							@else
							@endif
							--}}
						@endif
					@endforeach
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="nombre-fijo">
					</td>
					@if (isset($is_report) && $is_report == true)
	                	<td class="">
						</td>
						<td class="">
						</td>
						<td class="">
						</td>
						<td class="">
						</td>
	                @endif
					@forelse($grupo->unidads as $unidad)
						@if (auth()->user()->can('admin.grupos.viewList') || (auth()->user()->hasRole('Profesor') && $unidad->profesore_id == auth()->user()->profesore->id))
							@foreach($unidad->clases as $clase)
							<td>	
								<b>{{ date('d/m/Y', strtotime($clase->fechaclase)) }}</b>
							</td>
							@endforeach
						@else
						{{--
							@if ()
								@foreach($unidad->clases as $clase)
								<td>	
									<b>{{ date('d/m/Y', strtotime($clase->fechaclase)) }}</b>
								</td>
								@endforeach
							@else
							@endif
							--}}
						@endif
					@empty
						<td></td>
					@endforelse
				</tr>
				@foreach($grupo->matriculasEstado([0,2]) as $matricula)
					<tr>
						<td class="nombre-fijo">
							<b>{{$matricula->alumno->contacto->apellidos.' ' }}</b>{{ $matricula->alumno->contacto->nombres }} 
						</td>
						@if (isset($is_report) && $is_report == true)
	                	<td class="">
	                		{{ $matricula->id }}
						</td>
						<td class="">
	                		{{ $matricula->alumno->contacto->doc }}
						</td>
						<td class="">
							@php
								$grados = [
									'1' => 'Profesor',
									'2' => 'Bachiller',
									'3' => 'Licenciado',
									'4' => 'Magister',
									'5' => 'Doctor',
									'6' => 'Phd',
									'7' => 'Estudiante',
									'8' => 'No registra',
								];
							@endphp
							@if ($matricula->alumno->contacto->grado_academico > 0)
	                			{{ $grados[$matricula->alumno->contacto->grado_academico] }}
							@endif
						</td>
						<td class="">
	                		{{ $matricula->alumno->contacto->telefono }}
						</td>
	                	@endif
						@if ($matricula->grupo->unidads[0]->clases->count())
							@foreach($matricula->grupo->unidads as $unidad)
								@if (auth()->user()->can('admin.grupos.viewList') || (auth()->user()->hasRole('Profesor') && $unidad->profesore_id == auth()->user()->profesore->id))
									@foreach($unidad->clases as $clase)
										<td class="border-left">
											<div class="form-row align-items-center una-fila">
								                <div class="col-auto my-1 mx-2">
								                	@if (!isset($is_report))
								                		{{ $is_report = false }}
								                	@endif
								                	{!! Form::model($matricula->asistenciaClase($clase)) !!}
								                	@livewire('admin.create-asistencia', [
								                		'clase_id' => $clase->id,
								                		'matricula_id' => $matricula->id,
								                		'is_report' => $is_report
								                		//'asistencia' => $matricula->asistenciaClase($clase)
								                		])
								                	{!! Form::close() !!}
								                </div>
											</div>
										</td>
									@endforeach
								@else
								{{--
									@if ()
										@foreach($unidad->clases as $clase)
										<td class="border-left">
											<div class="form-row align-items-center una-fila">
								                <div class="col-auto my-1 mx-2">
								                	{!! Form::model($matricula->asistenciaClase($clase)) !!}
								                	@livewire('admin.create-asistencia', [
								                		'clase_id' => $clase->id,
								                		'matricula_id' => $matricula->id,
								                		//'asistencia' => $matricula->asistenciaClase($clase)
								                		])
								                	{!! Form::close() !!}
								                </div>
											</div>
										</td>
										@endforeach	
									@else
									@endif
									--}}
								@endif
							@endforeach
						@else
							<td colspan="100%" class="alert-light alturatd-dis">
								{{ 'No se han generado las clases para los alumnos' }}
							</td>
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>