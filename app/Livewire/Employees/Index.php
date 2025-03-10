<?php

namespace App\Livewire\Employees;

use App\Models\User;
use Livewire\Component;


class Index extends Component
{

    public $users=[];
    public $roles=[];
    
      
    public function mount(){
          $this->users=User::with('roles')->get()->toArray();
          
      }
 
   
    
    public function render()
    {
        
        return view('livewire.employees.index');
    }
}
