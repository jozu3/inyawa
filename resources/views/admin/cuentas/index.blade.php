@extends('adminlte::page')

@section('title', 'Cuentas')

@section('content_header')
    <a href="{{ route('admin.cuentas.create') }}" class="btn btn-success btn-sm float-right">Nueva cuenta</a>
    <h1>Lista de cuentas</h1>
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
    @livewire('admin.cuentas-index')
    @livewire('admin.cuentas-mensual-index')
    
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop