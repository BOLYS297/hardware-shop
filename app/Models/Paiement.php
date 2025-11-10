<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    /**
     * Colonnes autorisées à être remplies
     */
    protected $fillable = [
        'commande_id',
        'methode',
        'montant',
        'reference',
        'statut',
        'details',
        'date_paiement'
    ];

    /**
     * Relations Eloquent
     */

    // 💳 Un paiement appartient à une commande
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
