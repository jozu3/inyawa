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
    public $f_inicio = '';
    public $f_fin = '';

    public function render()
    {
        $that = $this;

    	$pagos = Pago::select('*','empleados.nombres as nom_empleado', 'empleados.apellidos as ape_empleado', 'pagos.monto as montopago','pagos.id as idpago')
                ->join('empleados', 'pagos.empleado_id', '=', 'empleados.id')
                ->join('obligaciones', 'pagos.obligacione_id', '=', 'obligaciones.id')
                ->join('matriculas', 'matriculas.id', '=', 'obligaciones.matricula_id')
                ->join('alumnos', 'alumnos.id', '=', 'matriculas.alumno_id')
                ->join('contactos', 'contactos.id', '=', 'alumnos.contacto_id');
    			//->join('matriculas', 'obligaciones.matricula_id', '=', 'matriculas.id')

        if($this->search !== ''){
            $pagos = $pagos->where(function($query) use ($that) {
                      $query->orWhere('obligaciones.matricula_id', '=', $this->search)
                            ->orWhere('contactos.nombres', 'like','%'.$this->search.'%')
                            ->orWhere('contactos.apellidos', 'like','%'.$this->search.'%');
                        });
        }

        if ($this->f_inicio != '' && $this->f_fin != '') {
            if ($this->f_inicio <= $this->f_fin) {
                $pagos = $pagos->where('pagos.fechapago', '>=', $this->f_inicio)
                            ->where('pagos.fechapago', '<=', $this->f_fin);
            } else {
                session()->flash('message', 'La fecha de inicio debe ser anterior a la fecha de fin.');
            }
        }   

    	if(!auth()->user()->hasRole(['Admin', 'Asistente'])){
    			$pagos = $pagos->where('empleado_id','=',auth()->user()->empleado->id);
    	}
    	
    	$pagos = $pagos->orderBy('pagos.fechapago', 'desc')->paginate($this->cant);

        $this->resetPage();

        return view('livewire.admin.pagos-index', compact('pagos'));
    }
}
