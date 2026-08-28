<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's roles.
     */
    public function run(): void
    {
        $permissions = Permission::where('guard_name', 'web')->pluck('name')->all();

        Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web'])->syncPermissions($permissions);

        Role::firstOrCreate(['name' => 'manager', 'guard_name' => 'web'])->syncPermissions([
            'dashboard-view',
            'user-view',
            'category-view',
            'category-create',
            'category-edit',
            'model-view',
            'model-create',
            'model-edit',
            'type-view',
            'type-create',
            'type-edit',
            'post-view',
            'post-edit',
            'post-approve',
            'post-reject',
            'post-sold',
            'contact-view',
            'setting-view',
        ]);

        Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web'])->syncPermissions([
            'dashboard-view',
            'post-view',
        ]);
    }
}
