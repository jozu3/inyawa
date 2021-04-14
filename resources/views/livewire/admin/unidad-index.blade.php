<div class="card-body">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Unidad</th>
				<th>Profesor</th>
				<th>Notas</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
        @if ($unidads->count())
			@foreach($unidads as $unidad)
			  <tr>
			  	<td width="250px">{{ $unidad->descripcion }}</td>
			  	<td width="250px">{{ $unidad->profesore->nombres.' '.$unidad->profesore->apellidos }}</td>
			  	<td>
			  		<div>
							@foreach ($unidad->notas as $nota)
							<ul class="list-group list-group-horizontal">
							  <li class="list-group-item list-nota">{{$nota->valor*100}} %</li>
							  <li class="list-group-item list-nota list-nota2">{{$nota->descripcion}}</li>
							</ul>
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
		    </tr>
		@endif
			<tr>
				<form wire:submit.prevent="submit">
				<td>
					<input type="text" name="descripcion" wire:model="descripcion" class="form-control">
				</td>
				<td>
					<select name="profesore_id" wire:model="profesore_id" class="form-control">
						<option value="-1">- Seleccione -</option>
						@foreach ($profesores as $profesore)
						<option value="{{ $profesore->id }}">{{ $profesore->nombres }}</option>
						@endforeach
					</select>
				</td>
				<td>
					<input type="submit" value="Guardar" class="btn btn-sm btn-primary">
				</td>
				</form>
			</tr>
		</tbody>
	</table>
</div>