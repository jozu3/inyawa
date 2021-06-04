<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ClasesIndex extends Component
{
	public $unidad;

    public function render()
    {
    	$clases = $this->unidad->clases;

        return view('livewire.admin.clases-index', compact('clases'));
    }
}
