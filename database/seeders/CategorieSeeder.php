<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nom' => 'mecanique', 'description' => 'Articles de mécanique'],
            ['nom' => 'plomberie', 'description' => 'Articles de plomberie'],
            ['nom' => 'electricite', 'description' => 'Articles d’électricité'],
        ];

        foreach ($categories as $cat) {
            Categorie::create($cat);
        }
    }
}

