<?php

namespace App\Livewire\Roles;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public function delete($role_id, $permission_id)
    {
        
        $role = Role::findOrFail($role_id);
    $permission = Permission::findOrFail($permission_id);
      if(!$role->hasPermissionTo($permission)){
        session()->flash('status', 'Permission does not exist.');
      
    } else {
      $role->revokePermissionTo($permission);
      session()->flash('status', 'Permission revoked successfully.');
    }

    return;
    }
        
    public function render()
    {
        return view('livewire.roles.index',['roles'=>Role::with('permissions')->get()]);
    }
}
