<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Unidad;
use App\Models\Nota;

class NotasIndex extends Component
{
	public $unidad;
	public $descripcion;
	public $valor;
	public $nc;


	protected $rules = [
        'descripcion' => 'required',
        'valor' => 'required',
        'valor' => 'numeric|min:0.01|max:1',
    ];

	public function submit(){
		

		$nc = 0;

		foreach ($this->unidad->notas as $nota) {
				$nc += $nota->valor;
			}	

		if ($nc >= 1) {
			$this->addError('ncom', 'Las notas están completas.');
		} else {
			if ($nc + $this->valor > 1) {
				$this->addError('ncom', 'El valor ingresado a la nota excede el 100%.');
			}
			else{
			
				$this->validate();

				$nota = new Nota([
					'unidad_id' => $this->unidad->id,
					'descripcion' => $this->descripcion,
					'valor' => $this->valor,
				]);

				$nota->save();

				$this->unidad = $nota->unidad;

				$this->descripcion = '';
				$this->valor = '';

			}
		}

	}


    public function render()
    {

    	$notas = $this->unidad->notas;//Nota::where('unidad_id', $this->unidad->id)->get();

        return view('livewire.admin.notas-index', compact('notas'));
    }
}
