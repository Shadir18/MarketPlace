<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Seller;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'Default',
                'last_name' => 'Admin',
                'email' => 'admin@example.com',
                'admin' => true,
                'manager' => false,
                'user' => false,
                'password' => Hash::make('123456'),
            ],
            [
                'first_name' => 'Virat',
                'last_name' => 'Kohli',
                'email' => 'Virat@example.com',
                'admin' => false,
                'manager' => true,
                'user' => false,
                'password' => Hash::make('123456'),
            ],
            [
                'first_name' => 'Steve',
                'last_name' => 'Smith',
                'email' => 'Steve@example.com',
                'admin' => false,
                'manager' => false,
                'user' => true,
                'password' => Hash::make('123456'),
            ],
            [
                'first_name' => 'Kumar',
                'last_name' => 'Sangakkara',
                'email' => 'Kumar@example.com',
                'admin' => false,
                'manager' => false,
                'user' => true,
                'password' => Hash::make('123456'),
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Warner',
                'email' => 'David@example.com',
                'admin' => false,
                'manager' => false,
                'user' => true,
                'password' => Hash::make('123456'),
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
            Seller::create([
                'user_id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ]);
        }
    }
}
