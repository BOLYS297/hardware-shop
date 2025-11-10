<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Création d’un compte admin par défaut
        User::firstOrCreate(
            ['email' => 'admin@hardware-shop.com'],
            [
                'nom' => 'Admin',
                'prenom' => 'Principal',
                'telephone' => '690000000',
                'password' => Hash::make('admin1234'),
                'role' => 'admin',
            ]
        );
    }
}
