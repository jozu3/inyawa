<h4>Datos del alumno</h4>
{!! Form::hidden('contacto_id', $_GET['idcontacto']) !!}
{!! Form::hidden('fecha', date('Y-m-d')) !!}
{!! Form::hidden('codigo', '') !!}
{!! Form::hidden('user_id', '') !!}

@include('admin.contactos.partials.form')
<br>
<h4>Información del curso y grupo</h4>
@livewire('admin.grupo-info')
@include('admin.matriculas.partials.formedit')