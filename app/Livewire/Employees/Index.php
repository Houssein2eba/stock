<?php

namespace App\Livewire\Employees;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;


class Index extends Component
{

    public $users=[];
    public $search='';
    public $selectedRole='';
    public $roles=[];
    
      
    public function mount(){
          $this->users=User::with('roles')->get();
          $this->roles=Role::where('name','!=','commercant')->get();
      }
     
      
      

      
    public function delete($id){
       $user= User::find($id);
       $this->authorize('delete', [$user, Auth::user()]);
       $user->delete();
       $this->users=User::with('roles')->get();
        
    }
 
   
    
    public function render()
    {
        
        return view('livewire.employees.index');
    }
}
