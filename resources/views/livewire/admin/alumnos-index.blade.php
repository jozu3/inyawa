<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre de un alumno">
    	</div>
        @if ($alumnos->count())
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
                        <th>Código</th>
    					<th>Nombres</th>
    					<th>Apellidos</th>
                        <th>Telefono</th>
    					<th>Correo electrónico</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($alumnos as $alumno)
    				  <tr>
                        <td>{{ $alumno->codigo }}</td>
                        <td>{{ $alumno->contacto->nombres }}</td>
    				  	<td>{{ $alumno->contacto->apellidos }}</td>
                        <td>{{ $alumno->contacto->telefono }}</td>
    				  	<td>
                            @if ( $alumno->user)
                            {{ $alumno->user->email }}
                            @else
                            <a href="{{ route('admin.users.create', ['alumno' => $alumno]) }}" class="btn btn-primary" >Crear usuario</a>
                            @endif
                        </td>
                        {{--ver por quienes fue matriculado 
                        <td>
                            @foreach ($alumno->matriculas as $matricula)
                                {{ '-'.$matricula->empleado->user->name }}
                            @endforeach
                        </td>
                        --}}
                        <td width="10px">
                            <a href="{{ route('admin.alumnos.edit', $alumno) }}" class="btn btn-primary" >Ver</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.matriculas.create', 'idcontacto='.$alumno->contacto->id) }}" class="btn btn-success btn-sm float-right">Matricular</a>
                        </td>
    				  </tr>
    				@endforeach

    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            {{ $alumnos->links() }}
        </div>
        @else
            <div class="card-body">
                <b>No hay alumnos</b>        
            </div>
        @endif
    </div>
</div>