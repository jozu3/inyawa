@extends('adminlte::page')

@section('title', 'Editar matricula')

@section('content_header')
    <h1>Editar matrícula</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Detalle de la matrícula</b>
            </div>
    	<div class="card-body">
    		{!! Form::open(['route' => ['admin.matriculas.update', $matricula], 'method' => 'put']) !!}
                @livewire('admin.grupo-info', ['curso_id' => $matricula->grupo->curso->id, 'grupo_id' => $matricula->grupo->id])

                @include('admin.matriculas.partials.formedit')
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
    		{!! Form::close() !!}
        </div>  
    </div>
    <div class="card">  
        <div class="card-header">
                <b>Obligaciones por pagar</b>
            </div>
        <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Concepto</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Monto</th>
                            <th>Descuento</th>
                            <th>Monto final</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matricula->obligaciones as $obligacione)
                            <tr>
                                <td>{{$obligacione->concepto}}</td>
                                <td>{{$obligacione->fechalimite}}</td>
                                <td>
                                    @switch ($obligacione->estado)
                                        @case(0)
                                            Exonerado
                                            @break
                                        @case(1)
                                            Por pagar
                                            @break
                                        @case(2)
                                            Parcial
                                            @break
                                        @case(3)
                                            Pagado
                                            @break
                                    @endswitch
                                </td>
                                <td>{{$obligacione->montofinal}}</td>
                                {!! Form::model( $obligacione, ['route' => ['admin.obligaciones.update', $obligacione], 'method' => 'put']) !!}
                                <td>
                                    {!! Form::number('descuento',null,['class' => 'form-control', 'style' => 'max-width:100px', 'min' => '0', 'step' => '0.01']) !!}
                                </td>
                                <td>{{$obligacione->montofinal}}</td>
                                <td>
                                    {!! Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) !!}
                                </td>
                                {!! Form::close() !!}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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