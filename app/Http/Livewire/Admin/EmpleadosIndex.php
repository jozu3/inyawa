<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Empleado;
use Livewire\WithPagination;


class EmpleadosIndex extends Component
{
	use WithPagination;

	public $search;
	
	protected $paginationTheme = 'bootstrap';

	public function updatingSearch(){
		$this->resetPage();
	}
    public function render()
    {
    	$empleados = Empleado::where('nombres', 'like','%'.$this->search.'%')->orWhere('apellidos', 'like','%'.$this->search.'%')->paginate();    	

        return view('livewire.admin.empleados-index', compact('empleados'));
    }
}
