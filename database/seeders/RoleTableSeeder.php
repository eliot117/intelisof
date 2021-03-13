<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
       $role = Role::create(['name' => 'Admin']);

       $role = Role::create(['name' => 'Cliente']);
    }
}
