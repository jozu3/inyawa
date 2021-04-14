<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre de un empleado">
    	</div>
        @if ($empleados->count())
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>Nombres</th>
    					<th>Apellidos</th>
                        <th>Telefono</th>
    					<th>Correo electrónico</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($empleados as $empleado)
    				  <tr>
                        <td>{{ $empleado->nombres }}</td>
    				  	<td>{{ $empleado->apellidos }}</td>
                        <td>{{ $empleado->telefono }}</td>
    				  	<td>
                            {{ $empleado->user->email }}
                        </td>
    				  	<td width="10px">
    				  		<a href="{{ route('admin.empleados.edit', $empleado) }}" class="btn btn-primary" >Editar</a>
    				  	</td>
    				  </tr>
    				@endforeach

    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            {{ $empleados->links() }}
        </div>
        @else
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        @endif
    </div>
</div>
