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
     $user=User::create([
        'name'=>'houssein',
        'email'=>'ebahoussein@gmail.com',
        'email_verified_at'=>now(),
        'password'=>bcrypt('00000000'),
        'phone'=>'30684078',
        'status'=>'active',
     ]);

     // Create role and assign all permissions
    $role = Role::create(['name' => 'owner']);
    $role->syncPermissions(Permission::all()); // Directly sync all permissions

    // Assign role to user
    $user->assignRole($role);


    }
}
