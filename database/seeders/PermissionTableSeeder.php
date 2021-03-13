<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'users_index']);
        Permission::create(['name' => 'users_create']);
        Permission::create(['name' => 'users_edit']);
        Permission::create(['name' => 'users_show']);
        Permission::create(['name' => 'users_delete']);
    }
}
