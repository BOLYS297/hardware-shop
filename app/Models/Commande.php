<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    /**
     * Colonnes autorisées à être remplies
     */
    protected $fillable = [
        'user_id',
        'panier_id',
        'adresse_id',
        'paiement_id',
        'livraison_id',
        'reference',
        'montant_total',
        'mode_paiement',
        'status_paiement',
        'status_commande',
        'adresse_livraison',
        'notes',
        'date_commande'
    ];

    /**
     * Relations Eloquent
     */

    // 👤 Une commande appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🛒 Une commande est liée à un panier
    public function panier()
    {
        return $this->belongsTo(Panier::class);
    }

    // 📦 Une commande a une adresse de livraison
    public function adresse()
    {
        return $this->belongsTo(Adresse::class);
    }

    // 💳 Une commande a un paiement
    public function paiement()
    {
        return $this->hasOne(Paiement::class);
    }

    // 🚚 Une commande a une livraison
    public function livraison()
    {
        return $this->hasOne(Livraison::class);
    }

    // 🧾 Une commande contient plusieurs produits (via la table pivot commande_produit)
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'commande_produit')
                    ->withPivot('quantite', 'prix_unitaire')
                    ->withTimestamps();
    }
}
