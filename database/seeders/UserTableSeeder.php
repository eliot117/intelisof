<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Eliot',
            'lastname'=>'Anderson',
            'email' => 'eliot@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');
    }
}
