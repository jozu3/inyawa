<div>
    <div class="card">
    	<div class="card-header">
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                    <label class="ml-1" for="">Mes</label>
                </div>
                <div class="col-auto my-1 mx-2">
                    <select wire:model="mes" type="date" class="form-control">
                    	<option value="1">Enero</option>
                    	<option value="2">Febrero</option>
                    	<option value="3">Marzo</option>
                    	<option value="4">Abril</option>
                        <option value="5">Mayo</option>
                    	<option value="6">Junio</option>
                    </select>
                </div>
                <div class="col-auto my-1">
                    <label class="ml-1" for="">Año</label>
                </div>
                <div class="col-auto my-1 mx-2">
                    <select wire:model="anio" type="date" class="form-control">
                        @for ($i = $year_actual; $i > $year_actual - 5 ; $i--)
                	       <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="form-row align-items-center">
            </div>
    	</div>
        @if ($cuentas_mensual->count())
    	<div class="card-body" style="overflow-x: auto">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>Cuenta</th>
                        <th>Semana 1</th>
                        <th>Semana 2</th>
                        <th>Semana 3</th>
                        <th>Semana 4</th>
                        <th>Semana 5</th>
    					<th>Ingreso</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($cuentas_mensual as $cuenta)
    				  <tr>
                        <td>
                            <b>{{ $cuenta->nombrecuenta }}</b></td>
                        <td>
                            @foreach($sem1 as $s)
                            @if ($s->idcuenta == $cuenta->idcuenta)
                                {{ 'S/ '.number_format($s->sumpagos,2) }}
                                @break
                            @else
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($sem2 as $s)
                            @if ($s->idcuenta == $cuenta->idcuenta)
                                {{ 'S/ '.number_format($s->sumpagos,2) }}
                                @break
                            @else
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($sem3 as $s)
                            @if ($s->idcuenta == $cuenta->idcuenta)
                                {{ 'S/ '.number_format($s->sumpagos,2) }}
                                @break
                            @else
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($sem4 as $s)
                            @if ($s->idcuenta == $cuenta->idcuenta)
                                {{ 'S/ '.number_format($s->sumpagos,2) }}
                                @break
                            @else
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @if ($sem5 != null)
                            @foreach($sem5 as $s)
                            @if ($s->idcuenta == $cuenta->idcuenta)
                                {{ 'S/ '.number_format($s->sumpagos,2) }}
                                @break
                            @else
                            @endif
                            @endforeach
                            @endif
                        </td>
                        <td>
                            <b>{{ 'S/ '.number_format($cuenta->sumpagos, 2) }}</b></td>
    				  </tr>
    				@endforeach
    			</tbody>
    		</table>
    	</div>
        @else
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        @endif
    </div>
</div>
