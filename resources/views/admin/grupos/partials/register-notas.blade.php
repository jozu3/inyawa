<div class="card cont-pestaña">
	<div class="card-header">
		<b>Listado de Alumnos</b>
	</div>
	<div class="card-body card-body-2 cont-table-div">
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="nombre-fijo">Nombre</th>
					@foreach($grupo->unidads as $unidad)
						@if (auth()->user()->can('admin.grupos.viewList') or (auth()->user()->hasRole('Profesor') && $unidad->profesore_id == auth()->user()->profesore->id))
							<th colspan="{{ $unidad->notas->count() + 1}}" class="border-left">
								<center>{{ $unidad->descripcion }}</center>
							</th>
						@else
							{{-- @if ()
								<th colspan="{{ $unidad->notas->count() + 1}}" class="border-left">
								<center>{{ $unidad->descripcion }}</center>
							</th>
							@else
							@endif --}}
						@endif
					@endforeach
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="nombre-fijo">
					</td>
					@foreach($grupo->unidads as $unidad)
						@if (auth()->user()->can('admin.grupos.viewList') or (auth()->user()->hasRole('Profesor') && $unidad->profesore_id == auth()->user()->profesore->id))
							<td>Promedio</td>
							@foreach($unidad->notas as $nota)
								<td width="100">	
									<b>{{ $nota->descripcion }}@if ($nota->tipo == 1)
										{{ '(Nota recuperatoria)' }}
									@endif()</b>
								</td>
							@endforeach
						@else
							{{-- @if ()
								<td>Promedio</td>
								@foreach($unidad->notas as $nota)
								<td width="100">	
									<b>{{ $nota->descripcion }}@if ($nota->tipo == 1)
										{{ '(Nota recuperatoria)' }}
									@endif()</b>
								</td>
								@endforeach
							@else
							@endif --}}
						@endif
					@endforeach
				</tr>
				@foreach($grupo->matriculasEstado([0,2]) as $matricula)
					<tr>
						<td class="nombre-fijo">
							<b>{{$matricula->alumno->contacto->apellidos.' ' }}</b>{{ $matricula->alumno->contacto->nombres }} 
						</td>
						@if ($matricula->alumnoUnidades->count())
						@foreach($matricula->alumnoUnidades as $alumnoUnidade)
						@if (auth()->user()->can('admin.grupos.viewList') or (auth()->user()->hasRole('Profesor') && $alumnoUnidade->unidad->profesore_id == auth()->user()->profesore->id))
							<td class="border-left text-center">
								@if (!isset($is_report))
			                		{{ $is_report = false }}
			                	@endif
								@livewire('admin.unidad-nota-show', [
									'alumnoUnidade_id' => $alumnoUnidade->id,
									'is_report' => $is_report
									])	                		
							</td>
							@foreach($alumnoUnidade->alumnoNotas as $alumnoNota)
								<td>
									<div class="form-row align-items-center una-fila">
						                <div class="col-auto my-1 mx-2">
						                	@livewire('admin.create-nota', [
						                		'nota_id' => $alumnoNota->nota->id,
						                		'alumno_unidade_id' => $alumnoNota->alumnoUnidade->id,
						                		])
											<div style="display: none;">
						                	{{ $alumnoNota->valor }}
											</div>
						                </div>
									</div>
								</td>
							@endforeach
						@else
							{{-- @if ()
							<td class="border-left text-center">
								@livewire('admin.unidad-nota-show', ['alumnoUnidade_id' => $alumnoUnidade->id])
							</td>
							@foreach($alumnoUnidade->alumnoNotas as $alumnoNota)
								<td>
									<div class="form-row align-items-center una-fila">
						                <div class="col-auto my-1 mx-2">
						                	@livewire('admin.create-nota', [
						                		'nota_id' => $alumnoNota->nota->id,
						                		'alumno_unidade_id' => $alumnoNota->alumnoUnidade->id,
						                		])
						                	<div style="display: none;">
						                	{{ $alumnoNota->valor }}
											</div>	
						                </div>
									</div>
								</td>
							@endforeach
							@else
							@endif --}}
						@endif
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