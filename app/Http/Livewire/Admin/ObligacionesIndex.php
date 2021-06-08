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
   public $vertodas = false;


   protected $paginationTheme = 'bootstrap';

   public function load(){
      $this->mes = date('m');
      $this->year = date('Y');
   }

   public function render()
   {
      $years = Obligacione::select(DB::raw('year(fechalimite) as year'))->groupBy('year')->get();


   	$obligaciones = Obligacione::where('estado','<>', '');
      $that = $this;

   	if($this->search !== ''){
        $obligaciones = $obligaciones->where(function($query) use ($that) {
                       $query
                         ->orWhere('matricula_id', 'like','%'.$that->search.'%')
                        ->orWhere('obligaciones.id', 'like','%'.$that->search.'%');
                     });
      }

      if (!$this->vertodas) {
         $obligaciones = $obligaciones->where(DB::raw('month(fechalimite)'), $this->mes)
                            ->where(DB::raw('year(fechalimite)'), $this->year);
      }

      $obligaciones = $obligaciones->orderBy('fechalimite', 'desc')->paginate($this->cant);         

      return view('livewire.admin.obligaciones-index', compact('obligaciones', 'years'));
   }
}
