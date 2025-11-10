<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Produit;

class ProduitSeeder extends Seeder
{
    public function run()
    {
        // créer 30 produits via factory
        Produit::factory()->count(30)->create();
    }
}
