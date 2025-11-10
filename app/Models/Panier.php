<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    /**
     * Colonnes autorisées à être remplies
     */
    protected $fillable = [
        'user_id',
        'session_id',
        'total',
        'statut',
    ];

    /**
     * Relations Eloquent
     */

    // 👤 Un panier appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🛒 Un panier contient plusieurs produits (via la table pivot panier_produit)
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'panier_produit')
                    ->withPivot('quantite')
                    ->withTimestamps();
    }

    // 🧾 Une commande peut être créée à partir d’un panier
    public function commande()
    {
        return $this->hasOne(Commande::class);
    }
}
