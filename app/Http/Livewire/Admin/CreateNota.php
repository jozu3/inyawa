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
	public $valor_classdanger;
	public $notaActual;

	protected $rules = [
        'valor' => 'numeric|min:0|max:20',
    ];

    protected $messages = [
    ];

    /*public function updatingValor(){
    	//$nota_actual = Alumno_nota::where('nota_id', $this->nota_id)->where('alumno_unidade_id', $this->alumno_unidade_id)->first()->valor;
    	if($this->valor != $this->notaActual){
    		$this->valor_classdanger = 'border border-danger';
    	} else {
    		$this->valor_classdanger = '';
    	}
    }*/

	public function submit(){

		$this->validate();
		
		$alumno_nota = Alumno_nota::where('nota_id', $this->nota_id)->where('alumno_unidade_id', $this->alumno_unidade_id)->first();

		if(isset($alumno_nota)){
			$this->result = $alumno_nota->update([
				'valor' => $this->valor,
			]);
			if ($this->result) {
	    		$this->actualizar();
				$this->emit('alert', $this->result);				
				$this->emit('show-promedio'.$this->alumno_unidade_id);				
			}
		}
	}

    public function render()
    {

    	if($this->valor == $this->notaActual){
	    	$this->actualizar();
    		$this->valor_classdanger = '';
    	} else {
			$this->valor_classdanger = 'border border-danger';
    	}

        return view('livewire.admin.create-nota');
    }

    public function actualizar(){
    		$this->notaActual = Alumno_nota::where('nota_id', $this->nota_id)->where('alumno_unidade_id', $this->alumno_unidade_id)->first()->valor;
	    	$this->valor = $this->notaActual;
    }
}
