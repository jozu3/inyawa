<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Alumno;
use Livewire\WithPagination;

class AlumnosIndex extends Component
{
	use WithPagination;

	public $search;
	
	protected $paginationTheme = 'bootstrap';

	public function updatingSearch(){
		$this->resetPage();
	}

    public function render()
    {
    	 $alumnos = Alumno::join('contactos', 'alumnos.contacto_id', '=', 'contactos.id')
    	 			->where('contactos.nombres', 'like','%'.$this->search.'%')
            		->orWhere('contactos.apellidos', 'like','%'.$this->search.'%')
            		->orWhere('contactos.telefono', 'like','%'.$this->search.'%')
            		->orWhere('contactos.email', 'like','%'.$this->search.'%')
            		->paginate();
            		
        return view('livewire.admin.alumnos-index', compact('alumnos'));
    }
}
