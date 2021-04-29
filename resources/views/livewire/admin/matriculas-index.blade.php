<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre de un matricula">
    	</div>
        @if ($matriculas->count())
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
                        <th>Fecha</th>
                        <th>Curso</th>
                        <th>Grupo</th>
    					<th>Nombres</th>
    					<th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Empleado</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($matriculas as $matricula)
    				  <tr>
                        <td>{{ $matricula->fecha}}</td>
                        <td>{{ $matricula->grupo->curso->nombre }}</td>
                        <td>{{ $matricula->grupo->fecha }}</td>
    				  	<td>{{ $matricula->alumno->contacto->nombres }}</td>
    				  	<td>{{ $matricula->alumno->contacto->apellidos }}</td>
                        <td>{{ $matricula->alumno->contacto->telefono }}</td>
                        <td>{{ $matricula->empleado->user->name }}</td>
    				  	<td width="10px">
    				  		<a href="{{ route('admin.matriculas.show', $matricula) }}" class="btn btn-primary">Ver</a>
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