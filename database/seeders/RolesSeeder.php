<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Check if the admin role already exists or create it
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Define permissions for products, categories, orders, coupons, and user management
        $permissions = [
            'create products',
            'read products',
            'update products',
            'delete products',
            'create categories',
            'read categories',
            'update categories',
            'delete categories',
            'create orders',
            'read orders',
            'update orders',
            'delete orders',
            'create coupons',
            'read coupons',
            'update coupons',
            'delete coupons',
            'manage users',
        ];

        // Loop through the permissions array
        foreach ($permissions as $permission) {
            // Create the permission if it doesn't already exist
            $perm = Permission::firstOrCreate(['name' => $permission]);

            // Assign the permission to the admin role
            $adminRole->givePermissionTo($perm);
        }
    }
}
