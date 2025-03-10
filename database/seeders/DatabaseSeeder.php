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
            // Create roles
        Permission::create(['name'=>'view_products']);
     $role = Role::create(['name' => 'employee']);
     $role->givePermissionTo('notifications');
     $role->givePermissionTo('view_products');




    }
}
