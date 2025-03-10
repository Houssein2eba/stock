<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
    public function run(): void
    
    {
     $role1 = Role::create(['name' => 'commerçant']);

        $user=User::create([
            'name'=>'houssein',
            'email'=>'ebahoussein@gmail.com',
            'email_verified_at'=>now(),
            'password'=>bcrypt('00000000'),
            'phone'=>'30684078',
            'status'=>'active',
            'role_id'=>$role1->id
         ]);
      
     $user->assignRole($role1);
     $role2= Role::create(['name' => 'manager']);
     $role3=Role::create(['name'=>'caissier']);
     $permissions=Permission::pluck('id','id')->all();
     $role1->syncPermissions($permissions);
     $role2->givePermissionTo('notifications');
     $role3->givePermissionTo('view_products');




    }
}
