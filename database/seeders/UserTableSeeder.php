<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Clara',
            'lastname'=>'Isabel',
            'email' => 'clara@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');
    }
}
