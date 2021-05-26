@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
    @can('admin.cursos.create')
        <a href="{{ route('admin.cursos.create') }}" class="btn btn-success btn-sm float-right">Nuevo curso</a>
    @endcan
    <h1>Lista de cursos</h1>
@stop

@section('content')
	@if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
     @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
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