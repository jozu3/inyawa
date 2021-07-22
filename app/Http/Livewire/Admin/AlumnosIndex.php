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
        $that = $this;

    	$alumnos = Alumno::select('*','alumnos.id as id', 'contactos.id as idcontacto')
                    ->join('contactos', 'alumnos.contacto_id', '=', 'contactos.id')
                    //->join('matriculas', 'matriculas.alumno_id', '=', 'alumnos.id')
                    ->where(function($query) use ($that) {
                          $query->orWhere('contactos.apellidos', 'like','%'.$that->search.'%')
	 			                ->orWhere('contactos.nombres', 'like','%'.$that->search.'%')
                                ->orWhere('contactos.telefono', 'like','%'.$that->search.'%')
                                ->orWhere('contactos.email', 'like','%'.$that->search.'%');
                        });

        if (auth()->user()->hasRole(['Vendedor'])) {
            $alumnos = $alumnos->whereHas('matriculas', function($q){ 
                $q->where("matriculas.empleado_id", auth()->user()->empleado->id); 
            });
        }
        $alumnos = $alumnos->paginate();

            		//dd($alumnos);
        return view('livewire.admin.alumnos-index', compact('alumnos'));
    }
}
