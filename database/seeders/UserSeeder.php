<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Administrador',
            'email' => 'cebayy044@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'active' => true,
        ]);

        // Secretary user
        User::create([
            'name' => 'Secretario',
            'email' => 'andrescebayadso@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'secretary',
            'active' => true,
        ]);

        // Leader user
        User::create([
            'name' => 'Líder de Ministerio',
            'email' => 'andressceballosc@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'leader',
            'active' => true,
        ]);
    }
}
