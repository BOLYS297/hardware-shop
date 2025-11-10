<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    /**
     * Colonnes autorisées à être remplies
     */
    protected $fillable = [
        'nom',
        'description',
        'parent_id',
    ];

    /**
     * Relations Eloquent
     */

    // 📦 Une catégorie peut contenir plusieurs produits
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
