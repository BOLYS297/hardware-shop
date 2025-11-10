<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    /**
     * Les colonnes qu’on peut remplir (mass assignable)
     */
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
        'images',
        'image_principale',
        'marque',
        'reference',
        'categorie_id',
        'est_actif',
    ];

    /**
     * Relations Eloquent
     */

    // 🏷️ 1. Chaque produit appartient à une catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    // 🛒 2. Un produit peut apparaître dans plusieurs paniers
    public function paniers()
    {
        return $this->belongsToMany(Panier::class, 'panier_produit')
                    ->withPivot('quantite', 'prix_unitaire')
                    ->withTimestamps();
    }

    // 🧾 3. Un produit peut apparaître dans plusieurs commandes
    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_produit')
                    ->withPivot('quantite', 'prix_unitaire')
                    ->withTimestamps();
    }

    // 💖 4. Un produit peut être dans plusieurs listes de souhaits
    public function wishlists()
    {
        return $this->belongsToMany(Wishlist::class, 'wishlist_produit')
                    ->withTimestamps();
    }
}
