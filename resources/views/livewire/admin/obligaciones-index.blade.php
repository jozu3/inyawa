<div wire:init="load">
    <div class="card">
    	<div class="card-header">
            <div class="form-row align-items-center">
                <div class="col-md-10 my-1">
                	<input wire:model="search" class="form-control" style="" placeholder="Ingrese  código de matricula para ver los obligaciones correspondientes">
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
                    <input type="checkbox" wire:model="estemes" class="custom-control-input" id="customControlAutosizing">
                    <label class="custom-control-label" for="customControlAutosizing">Vencen este mes</label>
                  </div>
                </div>
            </div-->
            <div class="form-row align-items-center">
               <div class="col-auto my-1">
                    <label class="ml-1" for="">Mes</label>
                </div>
                <div class="col-auto my-1 mx-2">
                    <select wire:model="mes" class="form-control">
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
                <div class="col-auto my-1">
                    <label class="ml-1" for="">Año</label>
                </div>
                <div class="col-auto my-1 mx-2">
                    <select wire:model="year" type="date" class="form-control">
                       @foreach ($years as $y)
                            <option value="{{$y->year}}">{{ $y->year}}</option>
                       @endforeach
                    </select>
                </div>
            </div>
    	</div>
        @if ($obligaciones->count())
    	<div class="card-body" style="overflow-x: auto">
    		<table class="table table-striped">
    			<thead>
    				<tr>
                        <th>Código de matrícula</th>
                        <th>Alumno</th>
    					<th>Concepto</th>
                        <th>Fecha de vencimiento</th>
    					<th>Estado</th>
                        <th>Monto pagado</th>
                        <th>Monto final</th>
                        <th></th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($obligaciones as $obligacione)
    				  <tr>
                        <td>{{ $obligacione->matricula->id }}</td>
                        <td>{{ $obligacione->matricula->alumno->contacto->nombres.' '.$obligacione->matricula->alumno->contacto->apellidos }}</td>
    				  	<td>
                            <a href="{{ route('admin.matriculas.edit', $obligacione->matricula)}}"> {{ $obligacione->concepto }}
                            </a>   
                        </td>
                        <td>{{ date('d/m/Y', strtotime($obligacione->fechalimite)) }}</td>
                        <td>
                            @switch ($obligacione->estado)
                                @case(0)
                                    Exonerado
                                    @break
                                @case(1)
                                    Por pagar
                                    @break
                                @case(2)
                                    Parcial
                                    @break
                                @case(3)
                                    Pagado
                                    @break
                            @endswitch
                            @if ($obligacione->fechapagadototal > $obligacione->fechalimite)
                                <small class="text-danger">({{ date('d/m/Y', strtotime($obligacione->fechapagadototal)) }})</small>
                            @endif
                        </td>
                        <td>{{ $obligacione->montopagado }}</td>
                        <td>{{ $obligacione->montofinal }}</td>
    				  	<td width="10px">
    				  	</td>
    				  </tr>
    				@endforeach
    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            {{ $obligaciones->links() }}
        </div>
        @else
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        @endif
    </div>
</div>