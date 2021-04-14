<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre de un curso">
            <div class="form-check mt-1">
              <input class="form-check-input" wire:model= "estado" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Solo cursos activos
              </label>
            </div>
    	</div>
        @if ($cursos->count())
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>Curso</th>
    					<th>Estado</th>
    					<th colspan="2"></th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($cursos as $curso)
    				  <tr>
    				  	<td>{{ $curso->nombre }}</td>
    				  	<td>
                            @if ($curso->estado == 0)
                                {{ 'Discontinuado' }}
                            @endif
                            @if ($curso->estado == 1)
                                {{ 'Activo' }}
                            @endif
                        </td>
    				  	<td width="10px">
    				  		<a href="{{ route('admin.cursos.edit', $curso) }}" class="btn btn-sm btn-primary" >Editar</a>
    				  	</td>
    				  	<td width="10px">
							<form method="POST" action="{{ route('admin.cursos.destroy', $curso) }}">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
							</form>
						</td>
    				  </tr>
    				@endforeach

    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            {{ $cursos->links() }}
        </div>
        @else
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        @endif
    </div>
</div>
