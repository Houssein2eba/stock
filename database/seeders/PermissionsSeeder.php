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
        $permissions =[
            'Invoices',
            'Invoice List',
            'Paid Invoices',
            'Partially Paid Invoices',
            'Unpaid Invoices',
            'Archived Invoices',
            'Reports',
            'Invoice Report',
            'Customer Report',
            'Users',
            'User List',
            'User Permissions',
            'Settings',
            'Products',
            'Categories',
        
            'Add Invoice',
            'Delete Invoice',
            'Export to EXCEL',
            'Change Payment Status',
            'Edit Invoice',
            'Archive Invoice',
            'Print Invoice',
            'Add Attachment',
            'Delete Attachment',
        
            'Add User',
            'Edit User',
            'Delete User',
        
            'View Permission',
            'Add Permission',
            'Edit Permission',
            'Delete Permission',
        
            'Add Product',
            'Edit Product',
            'Delete Product',
        
            'Add Category',
            'Edit Category',
            'Delete Category',
            'Notifications'
        ]
        ;
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        
    }
}
