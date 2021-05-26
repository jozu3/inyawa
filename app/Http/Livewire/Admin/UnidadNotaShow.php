<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Alumno_unidade;

class UnidadNotaShow extends Component
{
	public $alumnoUnidade_id;

	protected function getListeners()
    {
        return ['show-promedio'.$this->alumnoUnidade_id => 'render'];
    }

    public function render()
    {	

    	$alumnoUnidad = Alumno_unidade::find($this->alumnoUnidade_id);

        return view('livewire.admin.unidad-nota-show', compact('alumnoUnidad'));
    }
}
