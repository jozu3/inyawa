<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Matricula;
use Livewire\WithPagination;

class MatriculasIndex extends Component
{
	use WithPagination;

	public $search;
	public $estado = 0;
	public $readyToLoad = false;
	
	protected $paginationTheme = 'bootstrap';

	public function updatingSearch(){
		$this->resetPage();
	}

	public function loadMatriculas(){
		$this->readyToLoad = true;
		$this->emit('readytoload');
	}
	
    public function render()
    {
    	if ($this->readyToLoad) {
    		$matriculas = Matricula::select('*', 'empleados.nombres as matri_por_nombres', 'empleados.apellidos as matri_por_apellidos', 'matriculas.id as idmatricula')
    							->join('alumnos', 'alumnos.id', '=', 'matriculas.alumno_id')
    							->join('contactos', 'contactos.id', '=', 'alumnos.contacto_id')
    							->join('empleados', 'empleados.id', '=', 'matriculas.empleado_id')
    							->where(function($query) {
			                          $query->orWhere('contactos.nombres', 'like','%'.$this->search.'%')
			                                ->orWhere('contactos.apellidos', 'like','%'.$this->search.'%');
			                            })
    							->where('matriculas.estado', $this->estado);
    		$user = auth()->user();
    		if ($user->hasRole('Vendedor')) {
				$matriculas = $matriculas->where('matriculas.empleado_id', $user->empleado->id);
    		}



    		$matriculas = $matriculas->paginate();    		
    	} else {
    		$matriculas = Matricula::where('alumno_id', '')->paginate();
    	}

        return view('livewire.admin.matriculas-index', compact('matriculas'));
    }
}
