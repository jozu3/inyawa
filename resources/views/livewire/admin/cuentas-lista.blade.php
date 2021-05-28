<div>
    <div class="card">
    	<div class="card-header">
    	</div>
        @if ($cuentas->count())
    	<div class="card-body" style="overflow-x: auto">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>Cuenta</th>
    					<th colspan="2"></th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($cuentas as $cuenta)
    				  <tr>
                        <td>{{ $cuenta->cuenta}}</td>
                        <td>
    						<a href="{{ route('admin.cuentas.edit', $cuenta) }}" class="btn btn-success btn-sm float-right">Editar cuenta</a>

                        </td>
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
