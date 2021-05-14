<div class="card cont-pestaña">
	<div class="card-header">
		<b>Listado de Alumnos</b>
	</div>
	<div class="card-body cont-table-div" style="overflow-x:auto">
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="nombre-fijo">Nombre</th>
					@foreach($grupo->unidads as $unidad)
						<th colspan="{{ $unidad->clases->count() }}">
							{{ $unidad->descripcion }}
						</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="nombre-fijo">
						
					</td>
					@foreach($grupo->unidads as $unidad)
							@foreach($unidad->clases as $clase)
							<td>	
								<div class="form-row align-items-center una-fila">
				                <div class="col-auto my-1 mx-2">
								 	<b>{{ date('d/m/Y', strtotime($clase->fechaclase)) }}</b>
				                	
				                </div>
								</div>
							</td>
							@endforeach
						@endforeach
				</tr>
				@foreach($grupo->matriculas as $matricula)
					<tr>
						<td class="nombre-fijo">
							<b>{{$matricula->alumno->contacto->apellidos.' ' }}</b>{{ $matricula->alumno->contacto->nombres }} 
						</td>
						@foreach($matricula->grupo->unidads as $unidad)
							@foreach($unidad->clases as $clase)
								<td>
									<div class="form-row align-items-center una-fila">
				                <div class="col-auto my-1 mx-2">
				                	{!! Form::model($matricula->asistenciaClase($clase)) !!}
				                	@livewire('admin.create-asistencia', [
				                		'clase_id' => $clase->id,
				                		'matricula_id' => $matricula->id,
				                		'asistencia' => $matricula->asistenciaClase($clase)
				                		])
				                	{!! Form::close() !!}
				                </div>
									</div>
								</td>
							@endforeach
						@endforeach
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
