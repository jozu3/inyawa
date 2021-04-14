@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
     <a href="{{ route('admin.cursos.create') }}" class="btn btn-success btn-sm float-right">Nuevo curso</a>
    <h1>Lista de cursos</h1>
@stop

@section('content')
	@if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    @livewire('admin.cursos-index')
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop