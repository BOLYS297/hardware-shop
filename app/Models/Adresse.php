<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

     protected $table = 'adresses';

    /**
     * Champs autorisés pour l’insertion ou la mise à jour
     */
    protected $fillable = [
        'user_id',
        'nom_complet',
        'telephone',
        'pays',
        'ville',
        'quartier',
        'rue',
        'code_postal',
    ];

    /**
     * Relation : une adresse appartient à un utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // 🧾 Une adresse peut être associée à plusieurs commandes
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
