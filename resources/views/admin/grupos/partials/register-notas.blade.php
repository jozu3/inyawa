<div class="card cont-pestaña">
	<div class="card-header">
		<b>Listado de Alumnos</b>
	</div>
	<div class="card-body cont-table-div">
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="nombre-fijo">Nombre</th>
					@foreach($grupo->unidads as $unidad)
						<th colspan="{{ $unidad->notas->count() }}">
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
							@foreach($unidad->notas as $nota)
							<td>	
								<div class="form-row align-items-center una-fila">
				                <div class="col-auto my-1 mx-2">
								 	<b>{{ $nota->descripcion }}</b>
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
						@if ($matricula->alumnoUnidades->count())
							{{-- expr --}}
						@foreach($matricula->alumnoUnidades as $alumnoUnidad)
						<td>
							{{ $alumnoUnidad->nota }}
						</td>
							@foreach($alumnoUnidad->alumnoNotas as $alumnoNota)
								<td>
									<div class="form-row align-items-center una-fila">
				                <div class="col-auto my-1 mx-2">
				                	{!! Form::model($alumnoNota) !!}
				                	@livewire('admin.create-nota', [
				                		'nota_id' => $alumnoNota->nota->id,
				                		'alumno_unidade_id' => $alumnoNota->alumnoUnidad->id,
				                		])
				                	{!! Form::close() !!}
				                </div>
									</div>
								</td>
							@endforeach
						@endforeach
						@else
							<td colspan="100%" class="alert-light alturatd-dis">
								{{ 'No se han generado las notas' }}
							</td>
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>