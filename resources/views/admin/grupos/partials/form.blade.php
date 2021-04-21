<div class="row">
<div class="col-md-12">
	{!! Form::label('grupo_nombre', 'Grupo') !!}
	{!! Form::text('grupo_nombre', $curso->nombre, ['class' => 'form-control', 'disabled' => '']) !!}
	{!! Form::hidden('curso_id', $curso->id) !!}

	@error('nombre')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div> 
<div class="col-md-6">
	{!! Form::label('matricula', 'Precio de matrícula') !!}
	{!! Form::number('matricula', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01', 'placeholder' => 'Ingrese el precio de la matrícula']) !!}
	@error('matricula')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
<div class="col-md-6">
	{!! Form::label('matricula2', 'Precio de matrícula 2') !!}
	{!! Form::number('matricula2', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01', 'placeholder' => 'Ingrese el precio de la matrícula 2']) !!}
	@error('matricula2')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
<div class="col-md-4">
	{!! Form::label('ncuotas', 'Cantidad de cuotas') !!}
	{!! Form::number('ncuotas', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01', 'placeholder' => 'Ingrese la cantidad de cuotas del grupo']) !!}
	@error('ncuotas')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
<div class="col-md-4">
	{!! Form::label('cuota', 'Precio de cuota') !!}
	{!! Form::number('cuota', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01', 'placeholder' => 'Ingrese el precio de la cuota']) !!}
	@error('cuota')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
<div class="col-md-4">
	{!! Form::label('cuota2', 'Precio de cuota 2') !!}
	{!! Form::number('cuota2', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01', 'placeholder' => 'Ingrese el precio de la cuota 2']) !!}
	@error('cuota2')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
<div class="col-md-6">
	{!! Form::label('certificacion', 'Precio de certificación') !!}
	{!! Form::number('certificacion', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01', 'placeholder' => 'Ingrese el precio de la certificación']) !!}
	@error('certificacion')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
<div class="col-md-6">
	{!! Form::label('certificacion2', 'Precio de certificación 2') !!}
	{!! Form::number('certificacion2', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01', 'placeholder' => 'Ingrese el precio de la certificación 2']) !!}
	@error('certificacion2')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
<div class="col-md-12">
	{!! Form::label('fecha', 'Fecha de inicio') !!}
	{!! Form::date('fecha', null, ['class' => 'form-control']) !!}
	@error('fecha')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div> 

<div class="col-md-12">
	{!! Form::label('estado', 'Estado') !!}
	{!! Form::select('estado', [
			'0' => 'Por iniciar',
			'1' => 'Iniciado',
			'2' => 'Terminado',
		], null, ['class' => 'form-control', 'placeholder' => 'Escoge']); !!}
	@error('estado')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div> 
</div> 