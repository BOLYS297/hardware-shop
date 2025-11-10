<?php

namespace Database\Factories;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    protected $model = Produit::class;

    public function definition()
    {
        return [
            'categorie_id' => Categorie::inRandomOrder()->first()->id ?? 1,
            'nom' => $this->faker->word() . ' ' . $this->faker->randomNumber(3),
            'description' => $this->faker->sentence(10),
            'prix' => $this->faker->randomFloat(2, 500, 20000),
            'stock' => $this->faker->numberBetween(0, 200),
            'image_principale' => null,
            'est_actif' => true
        ];
    }
}
