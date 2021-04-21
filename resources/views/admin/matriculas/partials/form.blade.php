<h4>Datos del alumno</h4>
{!! Form::hidden('contacto_id', $_GET['idcontacto']) !!}
{!! Form::hidden('fecha', date('Y-m-d')) !!}
{!! Form::hidden('codigo', '') !!}

@include('admin.contactos.partials.form')
<br>
<h4>Información del curso y grupo</h4>
@livewire('admin.matriculas-index')
<h4>Tipo de matrícula</h4>
<div class="form-group">
	<div>
	{!! Form::label('', 'Tipo de matrícula') !!}
	</div>
	<div class="form-check">
		
	{!! Form::radio('tipomatricula', 0,false, ['class' => 'form-check-input', 'id' =>'tm1']) !!} 
	{!! Form::label('tm1', 'Alumno nuevo', ['class' => 'form-check-label']) !!}
	</div>
	<div class="form-check">
		
	{!! Form::radio('tipomatricula', 1,false, ['class' => 'form-check-input', 'id' =>'tm2']) !!} 
	{!! Form::label('tm2', 'Alumno antiguo', ['class' => 'form-check-label']) !!}
	</div>

	@error('tipomatricula')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div> 