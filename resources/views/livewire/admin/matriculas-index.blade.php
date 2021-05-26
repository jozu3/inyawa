<div wire:init="loadMatriculas">
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese el nombre o apellido de un alumno">
            <div class="form-check mt-2 d-inline">
              <input class="form-check-input" wire:model= "estado" type="checkbox" id="estado">
              <label class="form-check-label" for="estado">
                Ver retirados
              </label>
            </div>
    	</div>
        @if ($matriculas->count())
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Curso</th>
                        <th>Grupo</th>
    					<th>Nombres</th>
    					<th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Matriculado por:</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($matriculas as $matricula)
    				  <tr>
                        <td>{{ $matricula->idmatricula }}</td>
                        <td>{{ $matricula->fecha}}</td>
                        <td>{{ $matricula->grupo->curso->nombre }}</td>
                        <td>{{ $matricula->grupo->fecha }}</td>
    				  	<td>{{ $matricula->alumno->contacto->nombres }}</td>
    				  	<td>{{ $matricula->alumno->contacto->apellidos }}</td>
                        <td>{{ $matricula->alumno->contacto->telefono }}</td>
                        <td>{{ $matricula->matri_por_nombres.' '.$matricula->matri_por_apellidos }}</td>
    				  	<td width="10px">
    				  		<a href="{{ route('admin.matriculas.show', $matricula->idmatricula) }}" class="btn btn-primary">Ver</a>
    				  	</td>
                        <td width="10px">
                           <form method="POST" class="eliminar-matricula" action="{{ route('admin.matriculas.destroy', $matricula->idmatricula) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger ">Eliminar</button>
                            </form>
                        </td>
    				  </tr>
    				@endforeach

    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            {{ $matriculas->links() }}
        </div>
        @else
            <div class="card-body">
                <b>No hay matriculas</b>        
            </div>
        @endif
    </div>
</div>