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
    public $estado_retirado = true;
    public $estado_suspendido = true;
    public $estado_habilitado = true;
	
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
    		$states = [];
	        $this->estado_habilitado == true ? array_push($states, "0") : ''; 
	        $this->estado_retirado == true ? array_push($states, "1") : ''; 
	        $this->estado_suspendido == true ? array_push($states, "2") : ''; 

    		$matriculas = Matricula::select('*', 'empleados.nombres as matri_por_nombres', 'empleados.apellidos as matri_por_apellidos', 'matriculas.id as idmatricula', 'matriculas.estado as mat_estado')
    							->join('alumnos', 'alumnos.id', '=', 'matriculas.alumno_id')
    							->join('contactos', 'contactos.id', '=', 'alumnos.contacto_id')
    							->join('empleados', 'empleados.id', '=', 'matriculas.empleado_id')
                                ->whereIn('matriculas.estado', $states)
    							->where(function($query) {
			                          $query->orWhere('contactos.nombres', 'like','%'.$this->search.'%')
			                                ->orWhere('contactos.apellidos', 'like','%'.$this->search.'%');
			                            });
    		$user = auth()->user();
    		if ($user->hasRole('Vendedor')) {
				$matriculas = $matriculas->where('matriculas.empleado_id', $user->empleado->id);
    		}

    		$matriculas = $matriculas->orderBy('matriculas.id', 'desc')->paginate();

    	} else {
    		$matriculas = Matricula::where('alumno_id', '')->paginate();
    	}

        return view('livewire.admin.matriculas-index', compact('matriculas'));
    }
}
