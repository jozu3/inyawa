<div>
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
</div>