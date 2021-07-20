@extends('adminlte::page')

@section('title', 'Grupos')

@section('content_header')
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
    <style type="text/css">
        .card-body {
            overflow: auto;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop