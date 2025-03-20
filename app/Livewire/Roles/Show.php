<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Show extends Component
{
    public $role;
    public $current_permissions = [];

    public $rules = [
        'current_permissions' => 'required|array|min:1|exists:permissions,name',
    ];
    public function mount($role_id){
        $role=Role::findOrFail($role_id);
        if($role!==null){
        $this->current_permissions = $role->permissions->pluck('name')->toArray();
        $this->role = $role;
         
        }else{
             session()->flash('status', 'Role does not exist.');
        }
    }
    public function givePermission(){
        $this->role->syncPermissions($this->current_permissions);
        session()->flash('status', 'Permissions updated successfully.');
        $this->redirect('/roles',navigate: true);
    }
    public function render()
    {
        $permissions=Permission::all();
        return view('livewire.roles.show',['permissions'=>$permissions]);
    }
}
