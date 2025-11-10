<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Tableau résumé du client (profil minimal + stats perso)
     */
    public function index()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if ($user && ! $user instanceof User && isset($user->id)) {
            $user = User::find($user->id);
        }

        if (! $user) {
            abort(401);
        }

        $commandesCount = $user->commandes()->count();
        $dernieresCommandes = $user->commandes()->latest()->limit(5)->get();

        return view('client.dashboard', compact('user','commandesCount','dernieresCommandes'));
    }

    /**
     * Montrer la page profil détaillée (déléguée à CompteController souvent)
     */
    public function showProfile()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if ($user && ! $user instanceof User && isset($user->id)) {
            $user = User::find($user->id);
        }

        if (! $user) {
            abort(401);
        }

        return view('client.profil', compact('user'));
    }

    /**
     * Liste des commandes du client (déjà fourni dans CompteController mais utile ici)
     */
    public function commandes()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if ($user && ! $user instanceof User && isset($user->id)) {
            $user = User::find($user->id);
        }

        if (! $user) {
            abort(401);
        }

        $commandes = $user->commandes()->with('produits','paiement','livraison')->orderByDesc('created_at')->get();
        return view('client.commandes.index', compact('commandes'));
    }
}
