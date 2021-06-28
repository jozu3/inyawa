<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Grupo;
use App\Models\Unidad;
use Livewire\WithPagination;

class GruposIndex extends Component
{
	use WithPagination;

	public $search;
	public $curso_id;
	public $estado = 1;
	public $poriniciar = true;
    public $iniciado = true;
    public $terminado = true;

	protected $paginationTheme = 'bootstrap';
	public $cant = 15;


	public function updatingSearch(){
		$this->resetPage();
	}

    public function render()
    {
		$states = [];
		$this->poriniciar == true ? array_push($states, "0") : ''; 
	    $this->iniciado == true ? array_push($states, "1") : '';
	    $this->terminado == true ? array_push($states, "2") : '';
	    //$curso_id = $this->curso_id;

    	$grupos = Grupo::select('grupos.id as idgrupo','cursos.nombre', 'grupos.fecha', 'grupos.estado', 'grupos.id', 'cursos.id as idcurso')->join('cursos', 'cursos.id', '=', 'grupos.curso_id');

		if($this->curso_id != ''){
			$grupos = $grupos->where('cursos.id', '=', $this->curso_id)	;
		}

		$grupos = $grupos->where('cursos.nombre', 'like','%'.$this->search.'%')
			->whereIn('grupos.estado', $states)
			->orderby('grupos.fecha', 'desc')
		    ->paginate($this->cant);

		if (auth()->user()->hasRole('Profesor')) {
        	$grupos = Grupo::select('grupos.id as idgrupo', 'cursos.nombre','grupos.fecha', 'grupos.estado', 'grupos.id', 'cursos.id as idcurso')
        					->join('unidads', 'unidads.grupo_id', '=', 'grupos.id')
        					->join('cursos', 'grupos.curso_id', '=', 'cursos.id')
        					->where('unidads.profesore_id', auth()->user()->profesore->id)
        					->paginate();
        }

		$this->resetPage();

        return view('livewire.admin.grupos-index', compact('grupos'));
    }
}


 