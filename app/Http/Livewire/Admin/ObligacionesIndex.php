<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Obligacione;

class ObligacionesIndex extends Component
{
	use WithPagination;

	public $search = '';
	public $readyToLoad = false;
	public $cant = 30;

	
	protected $paginationTheme = 'bootstrap';

    public function render()
    {
    	$obligaciones = Obligacione::where('estado','<>', '');

    	if($this->search !== ''){
           $obligaciones = $obligaciones->where('matricula_id', '=', $this->search);
        }

        $obligaciones = $obligaciones->paginate($this->cant);

        return view('livewire.admin.obligaciones-index', compact('obligaciones'));
    }
}
