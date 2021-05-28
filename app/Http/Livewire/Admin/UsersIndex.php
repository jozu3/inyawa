<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
{
	use WithPagination;

	public $search;
	
	protected $paginationTheme = 'bootstrap';

	public function updatingSearch(){
		$this->resetPage();
	}

    public function render()
    {

    	$that = $this;
    	$users = User::where(function($query) use ($that) {
                                      $query->orWhere('email', 'like','%'.$that->search.'%')
                                            ->orWhere('name', 'like','%'.$that->search.'%');
                                })->paginate();

        return view('livewire.admin.users-index', compact('users'));
    }
}
