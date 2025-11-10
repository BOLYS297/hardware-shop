<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    /**
     * Colonnes autorisées à être remplies
     */
    protected $fillable = [
        'commande_id',
        'transporteur',
        'numero_suivi',
        'date_expedition',
        'date_livraison_prevue',
        'date_livraison_effective',
        'statut',
    ];

    /**
     * Relations Eloquent
     */

    // 🚚 Une livraison appartient à une commande
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
