<div class="card cont-pestaña">
	<div class="card-header">
		<b>Listado de Alumnos</b>
	</div>
	<div class="card-body">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nombre</th>
					@foreach($grupo->unidads as $unidad)
						<th>
							{{ $unidad->descripcion }}
						</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				@foreach($grupo->matriculas as $matricula)
					<tr>
						<td>
							{{$matricula->alumno->contacto->nombres}}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>