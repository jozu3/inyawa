<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Matricula;
use Livewire\WithPagination;

class MatriculasIndex extends Component
{
	use WithPagination;

	public $search;
	public $readyToLoad = false;
	
	protected $paginationTheme = 'bootstrap';

	public function updatingSearch(){
		$this->resetPage();
	}

	public function loadMatriculas(){
		$this->readyToLoad = true;
	}

    public function render()
    {
    	if ($this->readyToLoad) {
    		$matriculas = Matricula::paginate();    		
    	} else {
    		$matriculas = Matricula::where('alumno_id', '')->paginate();
    	}

        return view('livewire.admin.matriculas-index', compact('matriculas'));
    }
}
