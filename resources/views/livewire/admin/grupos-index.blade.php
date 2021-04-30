<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre de un curso">
            <div class="form-check mr-3 d-inline">
              <input class="form-check-input" wire:model= "poriniciar" type="checkbox" value="" id="poriniciar">
              <label class="form-check-label" for="poriniciar">
                Por iniciar
              </label>
            </div>
            <div class="form-check mr-3 d-inline">
              <input class="form-check-input" wire:model= "iniciado" type="checkbox" value="" id="iniciado">
              <label class="form-check-label" for="iniciado">
                Iniciado
              </label>
            </div>
            <div class="form-check mr-3 d-inline">
              <input class="form-check-input" wire:model= "terminado" type="checkbox" value="" id="terminado">
              <label class="form-check-label" for="terminado">
              	Terminado
              </label>
            </div>
    	</div>
        @if ($grupos->count())
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>Curso</th>
    					<th>Grupo</th>
                        <th>Estado</th>
    					<th colspan="2"></th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($grupos as $grupo)
    				  <tr>
    				  	<td>{{ $grupo->nombre }}</td>
    				  	<td>{{ $grupo->fecha }}</td>
    				  	<td>
                            @if ( $grupo->estado == '0')
                                {{ 'Por iniciar' }}
                            @endif
                            @if ( $grupo->estado == '1')
                                {{ 'Iniciado' }}
                            @endif
                            @if ( $grupo->estado == '2')
                                {{ 'Terminado' }}
                            @endif
                        </td>
    				  	<td width="10px">
    				  		<a href="{{ route('admin.grupos.edit', $grupo) }}" class="btn btn-sm btn-primary" >Editar</a>
    				  	</td>
    				  	<td width="10px">
							<form method="POST" action="{{ route('admin.grupos.destroy', $grupo) }}">
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
            {{ $grupos->links() }}
        </div>
        @else
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        @endif
    </div>
</div>
