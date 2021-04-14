<div class="card-body">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nota</th>
				<th>Valor</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
        @if ($notas->count())
			@foreach($notas as $nota)
			  <tr>
			  	<td>{{ $nota->descripcion }}</td>
			  	<td>{{ $nota->valor }}</td>
			  	<td width="10px">
			  		<a href="{{ route('admin.notas.edit', $nota) }}" class="btn btn-sm btn-primary" >Editar</a>
			  	</td>
			  	<td width="10px">
					<form method="POST" action="{{ route('admin.notas.destroy', $nota) }}">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
					</form>
				</td>
			  </tr>
			@endforeach
		@else
		    <tr>
		    	<td>No hay notaes</td>		                
		    	<td></td>
		    	<td></td>
		    </tr>
		@endif
			<tr>

				<form wire:submit.prevent="submit">
				<td>
					<input type="text" name="descripcion" wire:model="descripcion" class="form-control" placeholder="Nueva nota">
					@error('descripcion')  <small class="text-danger">{{ $message }}</small> @enderror
				</td>
				<td>
					<input type="text" name="valor" wire:model="valor" class="form-control" placeholder="valor">
					@error('valor')  <small class="text-danger">{{ $message }}</small> @enderror
					@error('ncom')  <small class="text-danger">{{ $message }}</small> @enderror
				</td>
				<td colspan="2"> 
					<input type="submit" value="Guardar" class="btn btn-sm btn-primary">
				</td>
				</form>
			</tr>
		</tbody>
	</table>
</div>