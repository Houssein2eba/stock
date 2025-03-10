<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        
        Permission::create(['name' => 'create_users']);
        Permission::create(['name' => 'update_users']);
        Permission::create(['name' => 'delete_users']);
        Permission::create(['name' => 'create_role']);
        Permission::create(['name' => 'update_role']);
        Permission::create(['name' => 'delete_role']);
        Permission::create(['name' => 'create_permission']);
        Permission::create(['name' => 'update_permission']);
        Permission::create(['name' => 'delete_permission']);
        Permission::create(['name' => 'notifications']);
        Permission::create(['name'=>'view_products']);
        Permission::create(['name'=>'create_products']);
        Permission::create(['name'=>'update_products']);
        Permission::create(['name'=>'delete_products']);
        Permission::create(['name'=>'create_categories']);
        Permission::create(['name'=>'update_categories']);
        Permission::create(['name'=>'delete_categories']);
        Permission::create(['name'=>'create_commandes']);
        Permission::create(['name'=>'update_commandes']);
        Permission::create(['name'=>'delete_commandes']);
        
        
    }
}
