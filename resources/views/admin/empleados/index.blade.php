@extends('adminlte::page')

@section('title', 'Inyawa')

@section('content_header')
    <a href="{{ route('admin.empleados.create') }}" class="btn btn-success btn-sm float-right">Nuevo empleado</a>
    <h1>Lista de empleados</h1>
@stop

@section('content')
	@if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    @livewire('admin.empleados-index')
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop