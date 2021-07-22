<div class="row">
<div class="col-md-4">
	{!! Form::label('codigo_c', 'Código de contacto') !!}
	{!! Form::text('codigo_c', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el código para el nuevo contacto']) !!}
	@error('codigo_c')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
<div class="col-md-4">
	{!! Form::label('nombres', 'Nombre') !!}
	{!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nuevo contacto']) !!}
	@error('nombres')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
<div class="col-md-4">
	{!! Form::label('apellidos', 'Apellidos') !!}
	{!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los apellidos del nuevo contacto']) !!}
	@error('apellidos')
		<small class="text-danger">{{ $message }}</small>
	@enderror
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
@error('doc')
		<small class="text-danger">{{ $message }}</small>
@enderror
</div>
<div class="col-md-12">
	{!! Form::label('grado_academico', 'Grado académico') !!}
	{!! Form::select('grado_academico', [
			'1' => 'Profesor',
			'2' => 'Bachiller',
			'3' => 'Licenciado',
			'4' => 'Magister',
			'5' => 'Doctor',
			'6' => 'Phd',
			'7' => 'Estudiante',
			'8' => 'No registra',
		], null, ['class' => 'form-control', 'placeholder' => '-- Escoge un grado académico --']); !!}
	@error('grado_academico')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div> 
@if (auth()->user()->can('admin.contactos.asignarVendedor'))
<div class="col-md-12">
	{!! Form::label('empleado_id', 'Vendedor') !!}
	{!! Form::select('empleado_id', $vendedores, null, ['class' => 'form-control', 'placeholder' => '-- Seleccione --']); !!}
	@error('empleado_id')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
@else
{!! Form::hidden('empleado_id', null) !!}
@endif
{{-- <div class="col-md-6">
	{!! Form::label('estado', 'Estado') !!}
	{!! Form::select('estado', [
			'1' => 'No contactado',
			'2' => 'Contactado',
			'3' => 'Probable',
			'4' => 'Confirmado',
			'5' => 'Matriculado',
		], null, ['class' => 'form-control', 'placeholder' => 'Escoge']); !!}
	@error('estado')
		<small class="text-danger">{{ $message }}</small>
	@enderror 
</div> --}}
</div> 