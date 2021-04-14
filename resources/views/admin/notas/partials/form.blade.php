<div class="col-md-12">
	{!! Form::label('descripcion', 'Descripcion') !!}
	{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nota']) !!}
	@error('descripcion')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
<div class="col-md-12">
	{!! Form::label('valor', 'Valor') !!}
	{!! Form::text('valor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese valor de la nota']) !!}
	@error('valor')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>