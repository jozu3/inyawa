<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre o correo de un usuario">
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "admin" type="checkbox" value="" id="admin">
                    <label class="form-check-label" for="admin">
                        Administrador
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "asistente" type="checkbox" value="" id="asistente">
                    <label class="form-check-label" for="asistente">
                        Asistente
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "vendedor" type="checkbox" value="" id="vendedor">
                    <label class="form-check-label" for="vendedor">
                        Vendedor
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "coord_academico" type="checkbox" value="" id="coord-academico">
                    <label class="form-check-label" for="coord-academico">
                        Coordinador académico
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "profesor" type="checkbox" value="" id="profesor">
                    <label class="form-check-label" for="profesor">
                        Profesor
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "alumno" type="checkbox" value="" id="alumno">
                    <label class="form-check-label" for="alumno">
                        Alumno
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "otros" type="checkbox" value="" id="otros">
                    <label class="form-check-label" for="otros">
                        Otros
                    </label>
                  </div>
                </div>
            </div>
    	</div>
        @if ($users->count())
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
    					<th>Roles</th>
    					<th></th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($users as $user)
    				  <tr>
                        <td>{{ $user->id }}</td>
    				  	<td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
    				  	<td>
                            @foreach($user->roles as $rol)
                                - {{ $rol->name }}
                            @endforeach
                        </td>
    				  	<td width="10px">
    				  		<a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary" >Editar</a>
    				  	</td>
    				  </tr>
    				@endforeach

    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
        @else
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        @endif
    </div>
</div>
