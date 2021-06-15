@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Inyawa</h1>
@stop

@section('content')
    <p>Bienvenido al Panel Administrativo de <strong>Inyawa Perú</strong></p>
    <div>
        <div class="contimg">
            <x-jet-application-mark />
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="">
    <style type="text/css">
        .contimg{
            text-align: center;   
        }
        .contimg>img{
            width:50%!important;
            opacity: 0.2;
            border:  0px!important;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop