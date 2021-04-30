<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Curso;

class CursosIndex extends Component
{
	use WithPagination;

	public $search;
	public $estado = 1;
	
	protected $paginationTheme = 'bootstrap';

	public function updatingSearch(){
		$this->resetPage();
	}

 	public function render()
    {
        $est = $this->estado;
        $cursos = Curso::where('nombre', 'like','%'.$this->search.'%');

        if ($est == 1) {
			$cursos = $cursos->where('estado', $est);
        }

		$cursos = $cursos->paginate();

        return view('livewire.admin.cursos-index', compact('cursos', 'est'));
    }
}
