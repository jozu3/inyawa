<div class="card-body">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Unidad</th>
				<th>Fecha de inicio</th>
				<th>Cantidad de clases</th>
				<th>Profesor</th>
				<th>Notas</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
        @if ($unidads->count())
			@foreach($unidads as $unidad)
			  <tr>
			  	<td width="250px">{{ $unidad->descripcion }}</td>
			  	<td width="250px">{{ $unidad->fechainicio }}</td>
			  	<td width="250px">{{ $unidad->cantidad_clases }}</td>
			  	<td width="250px">{{ $unidad->profesore->nombres.' '.$unidad->profesore->apellidos }}</td>
			  	<td>
			  		<div>
							@foreach ($unidad->notas as $nota)
							@if ($nota->tipo == 0)
							<ul class="list-group list-group-horizontal">
							  <li class="list-group-item list-nota">{{ 'Nota Regular' }}</li>
							  <li class="list-group-item list-nota">{{$nota->valor*100}} %</li>
							  <li class="list-group-item list-nota list-nota2">{{$nota->descripcion}}</li>
							</ul>
							@endif
							@endforeach
							@foreach ($unidad->notas as $nota)
							@if ($nota->tipo == 1)
							<ul class="list-group list-group-horizontal">
							  <li class="list-group-item list-nota">{{'Nota Recuperatoria'}}</li>
							  <li class="list-group-item list-nota">Reemplaza a la nota más baja</li>
							  <li class="list-group-item list-nota list-nota2">{{$nota->descripcion}}</li>
							</ul>
							@endif
							@endforeach
					</div>
			  	</td>
			  	<td width="10px">
			  		<a href="{{ route('admin.unidads.edit', $unidad) }}" class="btn btn-sm btn-primary" >Editar</a>
			  	</td>
			  	<td width="10px">
					<form method="POST" action="{{ route('admin.unidads.destroy', $unidad) }}">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
					</form>
				</td>
			  </tr>
			@endforeach
		@else
		    <tr>
		    	<td>No hay unidades</td>		                
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>
		@endif
			<tr>
				<form wire:submit.prevent="submit">
				<td>
					<input type="text" name="descripcion" wire:model="descripcion" class="form-control">
				</td>
				<td>
					<input type="date" name="fechainicio" wire:model="fechainicio" class="form-control">
				</td>
				<td>
					<input type="number" min="1" name="cantidad_clases" wire:model="cantidad_clases" class="form-control">
				</td>
				<td>
					<select name="profesore_id" wire:model="profesore_id" class="form-control">
						<option value="-1">- Seleccione -</option>
						@foreach ($profesores as $profesore)
						<option value="{{ $profesore->id }}">{{ $profesore->nombres.' '.$profesore->apellidos }}</option>
						@endforeach
					</select>
				</td>
				<td>
					<input type="submit" value="Guardar"  wire:loading.attr="disabled" wire:target="submit" class="btn btn-sm btn-primary disabled:opacity-25">
				</td>
				</form>
			</tr>
		</tbody>
	</table>
</div>