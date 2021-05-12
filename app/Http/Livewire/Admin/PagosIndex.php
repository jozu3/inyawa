<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pago;
use Livewire\WithPagination;

class PagosIndex extends Component
{
	use WithPagination;
	
	protected $paginationTheme = 'bootstrap';

    public $search = '';
	public $cant = 15;


    public function render()
    {
    	$pagos = Pago::select('*', 'pagos.monto as montopago','pagos.id as idpago')
                ->join('empleados', 'pagos.empleado_id', '=', 'empleados.id')
                ->join('obligaciones', 'pagos.obligacione_id', '=', 'obligaciones.id');
    			//->join('matriculas', 'obligaciones.matricula_id', '=', 'matriculas.id')
        if($this->search !== ''){
            $pagos = $pagos->where('obligaciones.matricula_id', '=', $this->search);
        }


    	if(!auth()->user()->hasRole(['Admin', 'Asistente'])){
    			$pagos = $pagos->where('empleado_id','=',auth()->user()->empleado->id);
    	}
    	
    	$pagos = $pagos->orderBy('pagos.fechapago', 'desc')->paginate($this->cant);


        return view('livewire.admin.pagos-index', compact('pagos'));
    }
}
