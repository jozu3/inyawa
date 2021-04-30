<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Grupo;
use Livewire\WithPagination;

class GruposIndex extends Component
{
	use WithPagination;

	public $search;
	public $estado = 1;
	public $poriniciar = true;
    public $iniciado = true;
    public $terminado = true;

	protected $paginationTheme = 'bootstrap';


	public function updatingSearch(){
		$this->resetPage();
	}

    public function render()
    {
		$states = [];
		$this->poriniciar == true ? array_push($states, "0") : ''; 
	    $this->iniciado == true ? array_push($states, "1") : ''; 
	    $this->terminado == true ? array_push($states, "2") : '';

    	$grupos = Grupo::select('cursos.nombre', 'grupos.fecha', 'grupos.estado', 'grupos.id')
    					->join('cursos', 'cursos.id', '=', 'grupos.curso_id')
    				    ->where('cursos.nombre', 'like','%'.$this->search.'%')
						->whereIn('grupos.estado', $states)
    				    ->paginate();
    				    
		$this->resetPage();

        return view('livewire.admin.grupos-index', compact('grupos'));
    }
}


 