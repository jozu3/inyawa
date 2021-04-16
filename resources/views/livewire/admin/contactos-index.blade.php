<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre, apellido o telefono de un contacto">
    	</div>
        @if ($contactos->count())
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>Nombre</th>
    					<th>Apellidos</th>
    					<th>Telefono</th>
                        <th>Asignado a:</th>
                        <th>Veces contactadas por su vendedor actual</th>
    					<th colspan="2"></th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($contactos as $contacto)
                    <tr>
                    	<td>{{ $contacto->nombres }}</td>
                    	<td>{{ $contacto->apellidos }}</td>
                    	<td>{{ $contacto->telefono }}</td>
                        @foreach (Auth::user()->roles as $role)
                            @if ($role->id == 1)

                            <td>
                            {!! Form::model($contacto, ['route' => ['admin.contactos.update', $contacto], 'method' => 'put']) !!}
                                {!! Form::hidden('user_id', auth()->user()->id) !!}
                                {!! Form::hidden('asignar', 'true') !!}
                                <span>
    
                                <select name="empleado_id" id="empleado_id" class="form-control" style="max-width: 200px; display: inline-block">
                                    @foreach ( $empleados as $empleado)
                                    @if ($empleado->id == $contacto->empleado->id)
                                        <option value="{{$empleado->id }}" selected>{{$empleado->user->name }}</option>
                                    @else
                                        <option value="{{$empleado->id }}">{{$empleado->user->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                </span>
                                <span>
                                    
                                    {!! Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) !!}
                                </span>
                            {!! Form::close() !!}
                           </td> 
                            <td>
                                @php
                                    $vcp_mi = 0
                                @endphp 
                                @foreach($contacto->seguimientos as $segui)
                                    @php
                                        if ($segui->empleado->id == $contacto->empleado->id){
                                            $vcp_mi++;
                                        }
                                    @endphp
                                @endforeach
                                @if ($vcp_mi == 0)
                                    <b class="alert-warning">No contactado</b>
                                @else
                                    <b>{{ $vcp_mi }}</b>
                                @endif
                            </td>

                            @else
                            <td>
                                {{ $contacto->empleado->user->name }}
                            </td>
                            <td>
                                @php
                                    $vcp_mi = 0
                                @endphp 
                                @foreach($contacto->seguimientos as $segui)
                                    @php
                                        if ($segui->empleado->id == auth()->user()->empleado->id){
                                            $vcp_mi++;
                                        }
                                    @endphp
                                @endforeach
                                @if ($vcp_mi == 0)
                                    <b class="alert-warning">No contactado</b>
                                @else
                                    <b>{{ $vcp_mi }}</b>
                                @endif
                            </td>   
                            @endif
                        @endforeach
                                            
                        <td width="10px">
                    		<a href="{{ route('admin.contactos.show', $contacto) }}" class="btn btn-success" ><i class="fas fa-file-signature"></i></a>
                    	</td>
                    </tr>
    				@endforeach
    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            {{ $contactos->links() }}
        </div>
        @else
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        @endif
    </div>
</div>
