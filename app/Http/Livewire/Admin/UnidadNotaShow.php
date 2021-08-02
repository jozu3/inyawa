<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Alumno_unidade;

class UnidadNotaShow extends Component
{
    public $is_report = false;
	public $alumnoUnidade_id;
    public $alumnoUnidad;
    public $icon_comment = 'fa-comment';

    public $open_modalComentario = false;

    public $comentario = '';

    protected $rules = [
        'comentario' => 'max:300'
    ];

	protected function getListeners()
    {
        return ['show-promedio'.$this->alumnoUnidade_id => 'render'];
    }

    public function render()
    {	

    	$this->alumnoUnidad = Alumno_unidade::find($this->alumnoUnidade_id);

        if ($this->alumnoUnidad->comentario != '') {
            $this->icon_comment = 'fa-comment-dots';
        } else {
            $this->icon_comment = 'fa-comment';
        }

        return view('livewire.admin.unidad-nota-show');
    }

    public function openModalComentario(){
        $this->open_modalComentario = true;
        $this->comentario = $this->alumnoUnidad->comentario;
    }

    public function saveComentario(){
        $this->validate();

        $result = $this->alumnoUnidad->update([
            'comentario' => $this->comentario
        ]);

        if ($result) {
            $this->emit('alert', $result);
            $this->reset(['open_modalComentario']);
        }
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
}
