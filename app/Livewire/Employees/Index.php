<?php

namespace App\Livewire\Employees;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;


class Index extends Component
{

    
 
    public function render()
    {
        
        return view('livewire.employees.index');

    }
}
