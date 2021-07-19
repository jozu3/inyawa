<div>
	@if (!$is_report)
   <div class="form-check">
	{!! Form::radio('asistencia', 0, null, ['class' => 'form-check-input disabled:opacity-25', 'id' =>'cl_a'.$clase_id.$matricula_id, 'wire:click' => 'saveAsistencia', 'wire:model' => 'asistencia', 'wire:loading.attr' => 'disabled']) !!} 
	{!! Form::label('cl_a'.$clase_id.$matricula_id, 'A', ['class' => 'form-check-label']) !!}
	</div>
	<div class="form-check">
	{!! Form::radio('asistencia', 1, null, ['class' => 'form-check-input disabled:opacity-25', 'id' =>'cl_f'.$clase_id.$matricula_id, 'wire:click' => 'saveAsistencia', 'wire:model' => 'asistencia', 'wire:loading.attr' => 'disabled']) !!} 
	{!! Form::label('cl_f'.$clase_id.$matricula_id, 'F', ['class' => 'form-check-label']) !!}
	</div>
	<div class="form-check">
	{!! Form::radio('asistencia', 2, null, ['class' => 'form-check-input disabled:opacity-25', 'id' =>'cl_fj'.$clase_id.$matricula_id, 'wire:click' => 'saveAsistencia', 'wire:model' => 'asistencia', 'wire:loading.attr' => 'disabled']) !!} 
	{!! Form::label('cl_fj'.$clase_id.$matricula_id, 'FJ', ['class' => 'form-check-label']) !!}
	</div>
 	@else
 		@switch($asistencia)
 		   @case('')
 				{{ '' }}
 		      @break
 		   @case(1)
 				{{ 'F' }}
 		      @break
 		   @case(2)
 				{{ 'FJ' }}
 		      @break
 		   @case(0)
 				{{ 'A' }}
 		      @break
 		   @default
 		      {{ '' }}
 		@endswitch
 	@endif
 	<script>
 		
 		/*$('input[type="radio"]').change(function () {

    		var color = 'as';
    		switch ($(this).val()){
    			case 0:
    				color = 'text-danger'
    				break;
    			case 1:
    				color = 'text-success'
    				break;
    			case 2:
    				color = 'text-warning'
    				break;
    		}

		  if($(this).is(":checked")){
		  	console.log($(this).val());
		    $(this).parent().addClass(color);
		  }

		});*/
 	</script>
</div>
