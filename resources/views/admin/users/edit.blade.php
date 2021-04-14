@extends('adminlte::page')

@section('title', 'Inyawa')

@section('content_header')
    <h1>Editar usuario y asignar roles</h1>
@stop

@section('content')
    
    @if (session('info'))
        <div class="alert alert-success">
           <b>{{ session('info') }}</b> 
        </div>
    @endif

    <div class="card">
    	<dic class="card-body">
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                <p class="h5">Correo electrónico:</p>
                {!! Form::text('email',null, ['class' => 'form-control']) !!}
                <h2 class="h5 mt-3">Listado de roles</h2>
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {!! $role->name !!}
                        </label>
                    </div>
                @endforeach

                {!! Form::submit('Guardar', ['class' => 'btn btn-primary mt-2']) !!}
    		{!! Form::close() !!}
    	</dic>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop