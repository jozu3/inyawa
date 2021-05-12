<div>
    <div class="card">
    	<div class="card-header">
            <div class="form-row align-items-center">
                <div class="col-md-10 my-1">
                	<input wire:model="search" class="form-control" style="" placeholder="Ingrese  código de matricula para ver los pagos correspondientes">
                </div>
                <div class="col-md-1 my-1">
                    <div style="text-align:right; font-weight:bold">Mostrar:</div>
                </div>
                <div class="col-md-1 my-1">
                  <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                  <select class="custom-select mr-sm-2" wire:model="cant" id="inlineFormCustomSelect">
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                </div>
              </div>
            <!--div class="form-row align-items-center">
                <div class="col-auto my-1">
                  <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                    <label class="custom-control-label" for="customControlAutosizing">Remember my preference</label>
                  </div>
                </div>
              </div-->

    	</div>
        @if ($pagos->count())
    	<div class="card-body" style="overflow-x: auto">
    		<table class="table table-striped">
    			<thead>
    				<tr>
                        <th>Código de matrícula</th>
    					<th>Cuenta</th>
                        <th>Alumno</th>
    					<th>Concepto</th>
                        <th>Monto</th>
                        <th>Fecha de pago</th>
    					<th>Registrado por:</th>
                        <th></th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($pagos as $pago)
    				  <tr>
                        <td>{{ $pago->obligacione->matricula->id }}</td>
                        <td>{{ $pago->cuenta->cuenta }}</td>
                        <td>{{ $pago->obligacione->matricula->alumno->contacto->nombres.' '.$pago->obligacione->matricula->alumno->contacto->apellidos }}</td>
    				  	<td>
                            <a href="{{ route('admin.matriculas.edit', $pago->obligacione->matricula)}}"> {{ $pago->obligacione->concepto }}
                            </a>   
                        </td>
                        <td>{{ $pago->montopago }}</td>
                        <td>{{ $pago->fechapago }}</td>
                        <td>{{ $pago->nombres }}</td>
    				  	<td width="10px">
    				  		<a href="{{ route('admin.pagos.edit', $pago->idpago) }}" class="btn btn-primary" >Editar</a>
    				  	</td>
    				  </tr>
    				@endforeach
    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            {{ $pagos->links() }}
        </div>
        @else
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        @endif
    </div>
</div>
