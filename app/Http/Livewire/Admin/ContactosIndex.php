<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contacto;
use App\Models\Empleado;

use Livewire\WithPagination;

class ContactosIndex extends Component
{
	use WithPagination;

	public $search;
	
	protected $paginationTheme = 'bootstrap';

	public function updatingSearch(){
		$this->resetPage();
	}

 	public function render()
    {
        $empleados = Empleado::all();
        $vendedor = null;

        $contactos = Contacto::where('nombres', 'like','%'.$this->search.'%')
        		->orWhere('apellidos', 'like','%'.$this->search.'%')
        		->orWhere('telefono', 'like','%'.$this->search.'%')
        		->orWhere('email', 'like','%'.$this->search.'%')
        		->paginate();

            //vendedor
        if (auth()->user()->roles[0]->id == 3) {
            $that = $this;

            $contactos = Contacto::where('empleado_id', '=', auth()->user()->empleado->id)
                                ->where(function($query) use ($that) {
                                      $query->orWhere('nombres', 'like','%'.$that->search.'%')
                                            ->orWhere('apellidos', 'like','%'.$that->search.'%')
                                            ->orWhere('telefono', 'like','%'.$that->search.'%');
                                           // ->orWhere('email', 'like','%'.$that->search.'%');
                                })->paginate();            
        }


        return view('livewire.admin.contactos-index',compact('contactos', 'empleados'));
    }
}
