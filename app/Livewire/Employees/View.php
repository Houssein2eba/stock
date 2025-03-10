<?php

namespace App\Livewire\Employees;

use App\Models\User;
use Livewire\Component;

class View extends Component
{
    public $user;
    public function mount($idUser): void
    {
        $this->user = User::with('roles')->findOrFail($idUser);
    }
    public function render()
    {
        return view('livewire.employees.view');
    }
}
