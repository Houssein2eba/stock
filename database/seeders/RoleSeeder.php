<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::create([
            'name'=>'houssein',
            'email'=>'ebahoussein@gmail.com',
            'email_verified_at'=>now(),
            'password'=>bcrypt('00000000'),
            'phone'=>'30684078',
            'status'=>'active',
         ]);
        $owner = Role::create(['name' => 'owner']);
        $owner->syncPermissions(Permission::all());
        $user->assignRole($owner);


    }
}
