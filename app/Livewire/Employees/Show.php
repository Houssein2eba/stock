<?php

namespace App\Livewire\Employees;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class Show extends Component
{
    public $user;
  
    public  $current_role='' ;
    
    public  $current_permissions = [];

    public string $name = '';
    public string $email = '';
    public string $phone = '';

    protected function rules()
    {
        return [
            'name'               => 'required|string|max:255',
            'email'              => 'required|email|unique:users,email,' . $this->user->id,
            'phone'              => 'required|regex:/^[2-4][0-9]{7}$/',
            'current_role'       => 'required|string|exists:roles,name',
            'current_permissions'=> 'required|array|min:1|exists:permissions,name',
        ];
    }
    

    public function mount($idUser): void
    {
        $this->user = User::findOrFail($idUser);
        
        // Populate existing user data
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone ?? '';

        // Get current role and permissions
        $this->current_role = $this->user->getRoleNames()->first() ?? '';
        $this->current_permissions = $this->user->getPermissionNames()->toArray();
    }

    public function updateEmployee(): void
    {
        // Validate the input
        $this->validate();

        // Update user details
        $this->user->update([
            'name'  => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        // Sync Role
        $this->user->syncRoles([$this->current_role]);

        // Sync Permissions
        $this->user->syncPermissions($this->current_permissions);

        session()->flash('success', 'Employee updated successfully!');
        $this->redirect('/listEmployes',navigate:true);
    }

    public function render()
    {
        return view('livewire.employees.show',[
            'roles' => Role::pluck('name'),
            'permissions' => Permission::pluck('name'),
        ]);
    }
}
