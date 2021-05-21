<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Alumno_nota;

class CreateNota extends Component
{
	public $nota_id;
	public $alumno_unidade_id;
	public $valor;
	public $result = false;

	protected $rules = [
        'valor' => 'numeric|min:0|max:20',
    ];

    protected $messages = [
    ];

	public function submit(){

		$this->validate();
		
		$alumno_nota = Alumno_nota::where('nota_id', $this->nota_id)->where('alumno_unidade_id', $this->alumno_unidade_id)->first();

		if(isset($alumno_nota)){
			$this->result = $alumno_nota->update([
				'valor' => $this->valor,
			]);
			if ($this->result) {
				$this->emit('alert', $this->result);				
			}
		}
	}

    public function render()
    {
    	$al_n = Alumno_nota::where('nota_id', $this->nota_id)->where('alumno_unidade_id', $this->alumno_unidade_id)->first();
    	$this->valor = $al_n->valor;


        return view('livewire.admin.create-nota');
    }
}
