@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
    <a href="{{ route('admin.pagos.create') }}" class="btn btn-success btn-sm float-right">Registrar pago</a>
    <h1>Lista de pagos</h1>
@stop

@section('content')
	@if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    @livewire('admin.pagos-index')
@stop

@section('css')
    <link rel="stylesheet" href="">

@stop

@section('js')

    <script> console.log('Hi!'); </script>
@stop