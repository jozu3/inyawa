<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Seguimiento;

class SeguimientosIndex extends Component
{		
	use WithPagination;

	public $search;
	
	protected $paginationTheme = 'bootstrap';

	public function updatingSearch(){
		$this->resetPage();
	}

    public function render()
    {
    	$seguimientos = Seguimiento::select('*', 'contactos.nombres', 'cursos.nombre')
    		->join('contactos', 'seguimientos.contacto_id', '=', 'contactos.id')
    		->join('cursos', 'seguimientos.curso_id', '=', 'cursos.id')
    		->where('contactos.nombres', 'like','%'.$this->search.'%')
            ->orWhere('seguimientos.fecha', 'like','%'.$this->search.'%')
    		->orWhere('cursos.nombre', 'like','%'.$this->search.'%')
    		->paginate();

    	

        return view('livewire.admin.seguimientos-index', compact('seguimientos'));
    }
}
