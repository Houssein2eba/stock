<?php

namespace App\Livewire\Employees;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class View extends Component
{
    
   
   
   

 
      
    public function delete($id){
       $user= User::find($id);
       $this->authorize('delete', [$user, Auth::user()]);
       $user->delete();
       
        
    }

    
 
   
  

    public function render()
    {
        
            return view('livewire.employees.view',[
                'users'=>User::with('roles')->get(),
            ]);
        
        
    }
}
