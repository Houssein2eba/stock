<?php

namespace App\Livewire\Employees;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    



    public $name='';
    public $email='';
    public $password='';
    public $phone='';
    public $role='';
    public $password_confirmation='';

    protected $rules=[
        'name'=>'required|string|max:255',
        'email'=>'required|string|email|max:255|unique:users',
        'password'=>'required|string|min:8|confirmed',
        'password_confirmation'=>'required|string|min:8|same:password',
        'role'=>'required|string|min:1|exists:roles,name',
        'phone'=>'required|string|unique:users|regex:/^[2-4][0-9]{7}$/',
    ];
    public function store(){
        
        $this->validate();

        $user=User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'password'=>bcrypt($this->password),
             
            
        ])->assignRole($this->role);
        
        
        
        
        $this->reset();
        session()->flash('success','employee added successfully');
        return $this->redirect('/listEmployes',navigate: true);
    }
    public function render()
    {

        return view('livewire.employees.create',[
            'roles' => Role::select('name')->pluck('name')

        ]);
    }
}
