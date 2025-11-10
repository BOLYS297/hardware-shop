<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les attributs modifiables (fillable)
     */
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'password',
        'role', // client ou admin
    ];

    /**
     * Les attributs cachés (pour éviter qu’ils ne soient visibles dans les JSON)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les relations du modèle User
     */

    // 🛒 1. Un utilisateur peut avoir plusieurs paniers
    public function paniers()
    {
        return $this->hasMany(Panier::class);
    }

    // 📦 2. Un utilisateur peut avoir plusieurs commandes
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    // 💳 3. Un utilisateur peut avoir plusieurs paiements (via ses commandes)
    public function paiements()
    {
        return $this->hasManyThrough(Paiement::class, Commande::class);
    }

    // 📮 4. Un utilisateur peut avoir plusieurs adresses
    public function adresses()
    {
        return $this->hasMany(Adresse::class);
    }

    // 💖 5. Un utilisateur peut avoir une ou plusieurs listes de souhaits
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    /**
     * Vérifie si l’utilisateur est un administrateur ou un simple client
     */
    public function isAdmin()
{
    return $this->role === 'admin';
}

public function isClient()
{
    return $this->role === 'client';
}

}
