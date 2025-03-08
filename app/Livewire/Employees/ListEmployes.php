<?php

namespace App\Livewire\Employees;

use App\Models\User;
use Livewire\Component;

class ListEmployes extends Component
{
    public $search='';
    public $employees = [];
        
    // public function mount(){
        
    //     $this->employees= User::with('roles')->get();
    // }
    // public function updated(){
    //     $this->employees=User::with('roles')->where('name','like','%'.$this->search.'%')->get();

    // }
    public function searche(){
        
        $this->employees=User::with('roles')->where('name','like','%'.$this->search.'%')->get();
    }
    public function render()
    {
        $this->employees= User::with('roles')->get();
        return view('livewire.employees.list-employes',[
            'employees'=>$this->employees]);
    }
}
