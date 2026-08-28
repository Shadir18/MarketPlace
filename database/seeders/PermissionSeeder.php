<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'dashboard-view',
            'user-view',
            'user-create',
            'user-edit',
            'user-delete',
            'category-view',
            'category-create',
            'category-edit',
            'category-delete',
            'model-view',
            'model-create',
            'model-edit',
            'model-delete',
            'type-view',
            'type-create',
            'type-edit',
            'type-delete',
            'post-view',
            'post-edit',
            'post-approve',
            'post-reject',
            'post-sold',
            'contact-view',
            'setting-view',
            'setting-edit',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }
    }
}
