<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
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
        
        Permission::create(['name' => 'notifications']);
        Permission::create(['name'=>'view_products']);
        Permission::create(['name'=>'create_products']);
        Permission::create(['name'=>'update_products']);
        Permission::create(['name'=>'delete_products']);
        Permission::create(['name'=>'view_categories']);
        Permission::create(['name'=>'create_categories']);
        Permission::create(['name'=>'update_categories']);
        Permission::create(['name'=>'delete_categories']);
        Permission::create(['name'=>'view_commandes']);
        Permission::create(['name'=>'create_commandes']);
        Permission::create(['name'=>'update_commandes']);
        Permission::create(['name'=>'delete_commandes']);
     $role1 = Role::create(['name' => 'manager']);

        $user=User::create([
            'name'=>'houssein',
            'email'=>'ebahoussein@gmail.com',
            'email_verified_at'=>now(),
            'password'=>bcrypt('0000'),
            'phone'=>'30684078',
            'status'=>'active',
            
         ]);
         $admin=Admin::create([
            'name'=>'houssein',
            'email'=>'hanimation410@gmail.com',
            'email_verified_at'=>now(),
            'password'=>bcrypt('0000'),
            
         ]);
      
     $user->assignRole($role1);
     
     $role3=Role::create(['name'=>'caissier']);
     $permissions = Permission::all();
     $role1->syncPermissions($permissions);
     $role3->givePermissionTo(['view_commandes','create_commandes','update_commandes','delete_commandes']);




    }
}
