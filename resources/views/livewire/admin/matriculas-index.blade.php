<div>
	@if ($cursos->count())
		<div class="form-group">
			{!! Form::label('curso_id', 'Curso') !!}
			{!! Form::select('curso_id', $cursos, null, ['class' => 'form-control', 'placeholder' => 'Escoge un curso', 'wire:model' => 'curso_id']); !!}
			@error('curso_id')
				<small class="text-danger">{{ $message }}</small>
			@enderror
		</div> 
		<div class="form-group">
			{!! Form::label('grupo_id', 'Grupo') !!}
			{!! Form::select('grupo_id', $grupos, null, ['class' => 'form-control', 'placeholder' => 'Escoga grupo según fecha de inicio', 'wire:model' => 'grupo_id']); !!}
			@error('grupo_id')
				<small class="text-danger">{{ $message }}</small>
			@enderror
		</div> 

	@else
	    <div class="">
	        <b>No hay cursos disponibles</b>        
	    </div>
	@endif
	@if ($grupo_seleccionado)
	<table class="table table-striped">
		<thead>
			<th></th>
			<th>Alumno nuevo</th>
			<th>Alumno antiguo</th>
		</thead>
		<tbody>
			<tr>
				<td><b>Precio de matrícula</b></td>
				<td>S/ {{ $grupo_seleccionado->matricula }}</td>
				<td>S/ {{ $grupo_seleccionado->matricula2 }}</td>
			</tr>
			<tr>
				<td><b>Cantidad de cuotas</b></td>
				<td> {{ $grupo_seleccionado->ncuotas }}</td>
				<td>{{ $grupo_seleccionado->ncuotas }}</td>
			</tr>
			<tr>
				<td><b>Precio de cuota</b></td>
				<td>S/ {{ $grupo_seleccionado->cuota }}</td>
				<td>S/ {{ $grupo_seleccionado->cuota2 }}</td>
			</tr>
			<tr>
				<td><b>Precio de certificación</b></td>
				<td>S/ {{ $grupo_seleccionado->certificacion }}</td>
				<td>S/ {{ $grupo_seleccionado->certificacion2 }}</td>
			</tr>
		</tbody>
	</table>
    
    @endif
   
</div>
