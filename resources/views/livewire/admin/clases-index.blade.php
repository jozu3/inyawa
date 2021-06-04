<div>
    <table class="table table-striped">
    	<thead>
    		<tr>
    			<th>Fecha</th>
    			<th>Modificar</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach ($clases as $clase)
    			<tr>
    				{!! Form::model($clase, ['route' => ['admin.clases.update', $clase], 'method' => 'put']) !!}
    				{!! Form::hidden('unidad_id', $unidad->id) !!}
    				<td>
    					{!! Form::date('fechaclase', null, ['class' => 'form-control']) !!}
    				<td>
    					{!! Form::submit('Guardar',  ['class' => 'btn btn-primary'])!!}
    				</td>
    				{!! Form::close() !!}
    			</tr>
    		@endforeach
    	</tbody>
    </table>	
</div>
