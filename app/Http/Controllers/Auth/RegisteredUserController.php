<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Afficher le formulaire d’inscription.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Traiter la requête d’inscription d’un nouveau client.
     */
    public function store(Request $request): RedirectResponse
    {
        // ✅ Validation des champs
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:20'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // ✅ Création de l’utilisateur avec rôle par défaut "Client"
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Client', // 🔒 Rôle forcé (aucun risque que quelqu’un s’inscrive comme Admin)
        ]);

        // ✅ Événement d’inscription
        event(new Registered($user));

        // ✅ Connexion automatique
        Auth::login($user);

        // ✅ Redirection vers le tableau de bord client
        return redirect()->route('client.dashboard');
    }
}
