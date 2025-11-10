<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    /**
     * Colonnes autorisées à être remplies
     */
    protected $fillable = [
        'user_id',
        'nom', // par exemple "Ma liste de souhaits"
    ];

    /**
     * Relations Eloquent
     */

    // 👤 Une wishlist appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 💖 Une wishlist contient plusieurs produits (via la table pivot wishlist_produit)
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'wishlist_produit')
                    ->withTimestamps();
    }
}
