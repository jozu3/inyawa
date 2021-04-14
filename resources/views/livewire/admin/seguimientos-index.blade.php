<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre de contacto o curso">
    	</div>
        @if ($seguimientos->count())
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
                        <th>Fecha</th>
    					<th>Contacto</th>
    					<th>Curso</th>
                        <th>Comentario</th>
                        <th>Usuario</th>
    					<th></th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($seguimientos as $seguimiento)
    				  <tr>
                        <td>{{ $seguimiento->fecha }}</td>
    				  	<td>{{ $seguimiento->nombres }}</td>
                        <td>{{ $seguimiento->nombre }}</td>
                        <td>{{ $seguimiento->comentario }}</td>
    				  	<td>{{ $seguimiento->empleado->user->name }}</td>
    				  	<td width="10px">
    				  		<a href="{{ route('admin.contactos.show', $seguimiento->contacto) }}" class="btn btn-primary" >Editar</a>
    				  	</td>
    				  </tr>
    				@endforeach

    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            {{ $seguimientos->links() }}
        </div>
        @else
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        @endif
    </div>
</div>
