{!! Form::hidden('user_id', auth()->user()->id) !!}
{!! Form::hidden('empleado_id', auth()->user()->id) !!}
<div class="row">
<div class="col-md-6">
	{!! Form::label('nombres', 'Nombre') !!}
	{!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nuevo contacto']) !!}
	@error('nombres')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
					<div class="col-md-6">
	{!! Form::label('apellidos', 'Apellidos') !!}
	{!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los apellidos del nuevo contacto']) !!}
</div>
<div class="col-md-4">
	
	{!! Form::label('telefono', 'Teléfono') !!}
	{!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el teléfono del nuevo contacto']) !!}
	@error('telefono')
		<small class="text-danger">{{ $message }}</small>
	@enderror

</div>
<div class="col-md-4">
	
	{!! Form::label('email', 'Correo electrónico') !!}
	{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el email del nuevo contacto']) !!}
@error('email')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
<div class="col-md-4">
	{!! Form::label('doc', 'DNI/CE') !!}
	{!! Form::text('doc', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el documento de identidad del nuevo contacto']) !!}
</div>
<div class="col-md-12">
	{!! Form::label('grado_academico', 'Grado académico') !!}
	{!! Form::select('grado_academico', [
			'1' => 'Educación primaria',
			'2' => 'Educación secundaria',
			'3' => 'Técnico superior',
			'4' => 'Universitario',
		], null, ['class' => 'form-control', 'placeholder' => 'Escoge']); !!}
	@error('grado_academico')
		<small class="text-danger">{{ $message }}</small>
	@enderror

</div> 
</div> 