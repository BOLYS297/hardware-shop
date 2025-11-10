<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // admin
        User::create([
            'nom' => 'Admin',
            'prenom' => 'Site',
            'email' => 'admin@quincaillerie.test',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'telephone' => '699000000'
        ]);

        // quelques clients via factory
        User::factory()->count(10)->create();
    }
}
