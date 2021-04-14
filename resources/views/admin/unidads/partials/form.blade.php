<div class="col-md-12">
	{!! Form::label('descripcion', 'Descripcion') !!}
	{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese unidad']) !!}
	@error('descripcion')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
<div class="col-md-12">
	
	{!! Form::label('profesore_id', 'Profesor') !!}
	{!! Form::select('profesore_id', $profesores, null, ['class' => 'form-control', 'placeholder' => 'Seleccione profesor']); !!}

	

	@error('profesore_id')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>