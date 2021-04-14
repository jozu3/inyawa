@extends('adminlte::page')

@section('title', 'Grupos')

@section('content_header')
     <a href="{{ route('admin.grupos.create') }}" class="btn btn-success btn-sm float-right">Nuevo grupo</a>
    <h1>Lista de grupos</h1>
@stop

@section('content')
	@if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    @livewire('admin.grupos-index')
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop