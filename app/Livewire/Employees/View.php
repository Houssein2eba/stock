<?php

namespace App\Livewire\Employees;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class View extends Component
{
    use WithPagination;

    
    public function delete($id){
       $user= User::find($id);
       $user->delete();
    }

    public function render()
    {

            return view('livewire.employees.view',[
                'users'=>User::with('roles')->paginate(10),
                
            ]);
        
        
    }
}
