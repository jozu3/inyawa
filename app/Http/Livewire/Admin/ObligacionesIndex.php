<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Obligacione;
use DB;

class ObligacionesIndex extends Component
{
	use WithPagination;

	public $search = '';
	public $readyToLoad = false;
	public $cant = 50;
       public $mes;
       public $year;


    protected $paginationTheme = 'bootstrap';

    public function load(){
       $this->mes = date('m');
       $this->year = date('Y');
    }

    public function render()
    {
       $years = Obligacione::select(DB::raw('year(fechalimite) as year'))->groupBy('year')->get();


    	$obligaciones = Obligacione::where('estado','<>', '');

    	if($this->search !== ''){
           $obligaciones = $obligaciones->where('matricula_id', '=', $this->search);
       }

       $obligaciones = $obligaciones->where(DB::raw('month(fechalimite)'), $this->mes)
                            ->where(DB::raw('year(fechalimite)'), $this->year)
                            ->orderBy('fechalimite', 'desc')->paginate($this->cant);

       return view('livewire.admin.obligaciones-index', compact('obligaciones', 'years'));
    }
}
