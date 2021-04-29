<div class="form-group">
	<div>
	{!! Form::label('', 'Tipo de matrícula') !!}
	@php 
		$alumno_nuevo = false;
		$alumno_antiguo = false;
	@endphp
	@if(isset($alumno_existe))
		@php
			$alumno_antiguo = true;
		@endphp
		<div class="text-warning">{{ $alumno_existe }}</div>
	@endif
	</div>
	<div class="form-check">
		@if (isset($matricula)) 
			@if ($matricula->tipomatricula == 0)
			@php
				$alumno_nuevo = true;
			@endphp
			@endif
			@if ($matricula->tipomatricula == 1 || isset($alumno_existe))
			@php
				$alumno_antiguo = true;
			@endphp
			@endif
		@endif
	{!! Form::radio('tipomatricula', 0, $alumno_nuevo, ['class' => 'form-check-input', 'id' =>'tm1']) !!} 
	{!! Form::label('tm1', 'Alumno nuevo', ['class' => 'form-check-label']) !!}
	</div>
	<div class="form-check">
	{!! Form::radio('tipomatricula', 1, $alumno_antiguo, ['class' => 'form-check-input', 'id' =>'tm2']) !!} 
	{!! Form::label('tm2', 'Alumno antiguo', ['class' => 'form-check-label']) !!}
	</div>
	@error('tipomatricula')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div> 