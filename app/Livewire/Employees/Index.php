<?php

namespace App\Livewire\Employees;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;


class Index extends Component
{

    
    
    public $roles=[];
  
    
      
    public function mount(){
          
          $this->roles=Role::where('name','!=','commercant')->get();
      }
     
      

      
    
 
   
    
    public function render()
    {
        
        return view('livewire.employees.index');
    }
}
