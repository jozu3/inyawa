@extends('adminlte::page')

@section('title', 'Grupo')

@section('content_header')
	@can('admin.grupos.edit')
		<a href="{{ route('admin.grupos.edit', $grupo) }}" class="btn btn-success btn-sm float-right">Editar grupo</a>
	@endcan
		<a href="{{ route('admin.excel.alumnosGrupo', $grupo) }}" class="btn btn-success btn-sm float-right mr-3"><i class="far fa-file-excel"></i> Registro de alumnos</a>

    <h1>Grupo: {{ $grupo->curso->nombre.' '.$grupo->fecha }}</h1>
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
<div class="row">		
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<p>Unidades:</p>
					</div>
					<div class="col-md-9"> <b>{{ count($grupo->unidads)}}</b></div>
					<div class="col-md-3">
						<p>Alumnos:</p>
					</div>
					<div class="col-md-9"><b>{{ count($grupo->matriculas)}}</b></div>
				</div>
			</div>
		</div>
	</div>
	@if ($grupo->unidads->count() != 0)
	<div class="col-md-12">
		<nav>
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
		    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Asistencia</a>
		    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Notas</a>
		  </div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				@include('admin.grupos.partials.asistencia')
		  </div>
		  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				@include('admin.grupos.partials.register-notas')
		  </div>
		</div>		
	</div>
	@else
	<div class="col-md-12">
		<div class="card">
			<div class="card-header text-warning">
				{{ 'Debe crear las unidades de este grupo' }}
			</div>
		</div>
	</div>
	@endif
</div>
						    
	<div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
	  <b>Se guardó correctamente!</b>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>            	
	{{--@livewire('admin.alert')--}}
@stop

@section('css')
    <style type="text/css">
    	.cont-pestaña{
    		box-shadow: none;
		    border: 1px solid transparent;
		    border-color: #FFF #dee2e6 #dee2e6;
		    border-radius: 0px 0px 0.25rem 0.25rem;
    	}
    	.una-fila{
    		flex-wrap:nowrap;
    	}
    	.nombre-fijo{
		  position:absolute;
		    width:11em;
		    left:0;

    	}
    	.card-body-2{
    		padding-left:0
    	}

    	.cont-table-div {
		  overflow-x:scroll;  
		  margin-left:11em;
		    }
		.alturatd-dis {
			height:4em;
			color: #00000050;
    	}
    	#success-alert{
    		position:fixed;
    		top: 150px;
    		right:5px;
    	}
        .form-control{
            width:80px!important;
        }
    </style>
@stop

@section('js')
    <script> 
    	$().ready(function(){
			$("#success-alert").hide();
    	});

    	Livewire.on('alert', function(result){
	    	
    		if (result) {
    			$("#success-alert").show();
		    	$("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
				    $("#success-alert").slideUp(500);
				});
    		}

    	});
    </script>
@stop