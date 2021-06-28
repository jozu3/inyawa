<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
{
	use WithPagination;

	public $search;
  public $admin = true;
  public $asistente = true;
  public $vendedor = true;
  public $coord_academico = true;
  public $profesor = true;	
  public $alumno = true;	
  public $otros = true;	
	
	protected $paginationTheme = 'bootstrap';

	public function updatingSearch(){
		$this->resetPage();
	}

  public function render()
  {

  	$that = $this;

  	$roles = [];
		$this->admin == true ? array_push($roles, "Admin") : ''; 
    $this->asistente == true ? array_push($roles, "Asistente") : '';
    $this->vendedor == true ? array_push($roles, "Vendedor") : '';
    $this->coord_academico == true ? array_push($roles, "Coordinador académico") : '';
    $this->profesor == true ? array_push($roles, "Profesor") : '';
    $this->alumno == true ? array_push($roles, "Alumno") : '';
    $this->otros == true ? array_push($roles, "otros") : '';

  	$users = User::where(function($query) use ($that) {
                      $query->orWhere('email', 'like','%'.$that->search.'%')
                            ->orWhere('name', 'like','%'.$that->search.'%');
                		})
  								->whereHas("roles", function($q) use ($roles, $that){
		  										$q->whereIn("name", $roles); 
		  									if($that->otros == true){
		  										$q->whereIn("name", $roles)->orWhereNotIn('name', ['Admin', 'Asistente', 'Vendedor', 'Coordinador académico', 'Profesor', 'Alumno']);
		  									}
		  							})
  								->paginate();

      return view('livewire.admin.users-index', compact('users', 'roles'));
  }
}
