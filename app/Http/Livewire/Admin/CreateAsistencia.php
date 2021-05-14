<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Asistencia;

class CreateAsistencia extends Component
{
	public $clase_id;
	public $matricula_id;
	public $asistencia;
	public $result = 'hola';

	public function saveAsistencia(){
		
		$asis = Asistencia::where('clase_id', $this->clase_id)->where('matricula_id', $this->matricula_id)->first();

		if(isset($asis)){
			$asis->update([
				'asistencia' => $this->asistencia,
			]);

			$this->result = 'ok!';
    	} else {
			Asistencia::create([
				'clase_id' => $this->clase_id,
				'matricula_id' => $this->matricula_id,
				'asistencia' => $this->asistencia,
			]);    		
			$this->result = '👍!';
    	}
	}

    public function render()
    {
    	$asis = Asistencia::where('clase_id', $this->clase_id)->where('matricula_id', $this->matricula_id)->first();
    	if(isset($asis)){
    		$this->asistencia = $asis->asistencia;
    	}

        return view('livewire.admin.create-asistencia');
    }
}
