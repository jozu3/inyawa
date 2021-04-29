<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Matricula;
use Livewire\WithPagination;

class MatriculasIndex extends Component
{
	use WithPagination;

	public $search;
	
	protected $paginationTheme = 'bootstrap';

	public function updatingSearch(){
		$this->resetPage();
	}

    public function render()
    {
    	$matriculas = Matricula::paginate();

        return view('livewire.admin.matriculas-index', compact('matriculas'));
    }
}
