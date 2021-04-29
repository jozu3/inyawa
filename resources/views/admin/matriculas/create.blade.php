@extends('adminlte::page')

@section('title', 'Matricular')

@section('content_header')
    <h1>Registrar matrícula</h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		{!! Form::model($contacto, ['route' => 'admin.matriculas.store']) !!}
                @include('admin.matriculas.partials.form')
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
    		{!! Form::close() !!}
    	</div>
    </div>
@stop

@section('css')
    <style>
        .form-check{
            display: inline-block;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop