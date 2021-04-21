<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Curso;
use App\Models\Grupo;

class MatriculasIndex extends Component
{
	public $curso_id;
	public $grupo_id;

    public function render()
    {
        $cursos = Curso::where('estado', '=', 1)->pluck('nombre', 'id');
        $grupos = Grupo::where('curso_id', '=', $this->curso_id)
        				->where(function($query){
                              $query->orWhere('estado', '=', '0')
                                    ->orWhere('estado', '=', '1');
                        })->pluck('fecha', 'id');

        $grupo_seleccionado = Grupo::find($this->grupo_id);
        
        return view('livewire.admin.matriculas-index', compact('cursos', 'grupos', 'grupo_seleccionado'));
    }
}
