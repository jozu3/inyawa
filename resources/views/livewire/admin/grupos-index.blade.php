<div>
    <div class="card">
    	<div class="card-header">
            @if (!isset($curso_id))
            <div class="form-row align-items-center">
                <div class="col-md-10 my-1">
                    <input wire:model="search" class="form-control" placeholder="Ingrese nombre de un curso">
                </div>
                <div class="col-md-1 my-1">
                    <div style="text-align:right; font-weight:bold">Mostrar:</div>
                </div>
                <div class="col-md-1 my-1">
                  <select class="custom-select mr-sm-2" wire:model="cant" id="inlineFormCustomSelect">
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                </div>
              </div>
            @else
              <a href="{{ route('admin.grupos.create', 'idcurso='.$curso_id) }}" class="btn btn-success btn-sm float-right">Nuevo grupo</a>
            @endif
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "poriniciar" type="checkbox" value="" id="poriniciar">
                    <label class="form-check-label" for="poriniciar">
                    Por iniciar
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "iniciado" type="checkbox" value="" id="iniciado">
                    <label class="form-check-label" for="iniciado">
                    Iniciado
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "terminado" type="checkbox" value="" id="terminado">
                    <label class="form-check-label" for="terminado">
                    	Terminado
                    </label>
                  </div>
                </div>
            </div>
    	</div>
        @if ($grupos->count())
    	<div class="card-body overflow-auto">
    		<table class="table table-striped">
    			<thead>
    				<tr>
                        <th>ID</th>
    					<th>Curso</th>
    					<th>Grupo</th>
                        <th>Estado</th>
                        @if (!auth()->user()->hasRole('Profesor'))
                            <th>Unidades</th>
                        @else
                            <th>Unidades que ense??o</th>
                        @endif
                        <th>Alumnos</th>
                        @can('admin.grupos.edit')
    					<th colspan="2"></th>
                        @endcan
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($grupos as $grupo)
    				  <tr>
                        <td>{{ $grupo->idgrupo }}</td>
    				  	<td>{{ $grupo->nombre }}</td>
    				  	<td>{{ date('d/m/Y', strtotime($grupo->fecha)) }}</td>
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
                        <td>
                            @if (auth()->user()->hasRole('Profesor'))
                                {{auth()->user()->profesore->unidadsqueense??o($grupo->id)->count()}}
                            @else
                                {{ $grupo->unidads->count() }}
                            @endif
                        </td>
                        <td>
                            {{ $grupo->matriculas->count() }}
                        </td>
                        @can('admin.grupos.edit')
    				  	<td width="10px">
                            <a href="{{ route('admin.grupos.edit', $grupo) }}" class="btn btn-sm btn-primary" >Editar</a>
                        </td>
                        @endcan
                        @can(['admin.asistencias.create', 'admin.alumno_notas.create'])
                        <td width="10px">
                            <a href="{{ route('admin.grupos.show', $grupo) }}" class="btn btn-sm btn-primary" >Alumnos</a>
                        </td>
                        @endcan
                        @can('admin.grupos.destroy')
    				  	<td width="10px">
							<form method="POST" action="{{ route('admin.grupos.destroy', $grupo) }}">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
							</form>
						</td>
                        @endcan
                        @if (auth()->user()->hasRole('Profesor') or auth()->user()->can('admin.grupos.viewList'))
                            <td width="200px">
                                <a href="{{ route('admin.excel.alumnosGrupo', $grupo) }}" class="btn btn-success btn-sm float-right mr-3"><i class="far fa-file-excel"></i> Registro de alumnos</a>
                            </td>
                        @endif
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
