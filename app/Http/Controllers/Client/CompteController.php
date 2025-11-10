<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CompteController extends Controller
{
    /**
     * Afficher le profil du client connecté
     */
    public function profil()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if ($user && ! $user instanceof User && isset($user->id)) {
            $user = User::find($user->id);
        }

        if (! $user) {
            abort(401);
        }

        return view('client.profil', compact('user')); // On affiche la vue correspondante
    }

    /**
     * Mettre à jour les informations du profil
     */
    public function updateProfil(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if ($user && ! $user instanceof User && isset($user->id)) {
            $user = User::find($user->id);
        }

        if (! $user) {
            return back()->withErrors(['user' => 'Utilisateur introuvable']);
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'telephone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->storeAs('public/profils', $imageName);
            $user->photo = 'profils/' . $imageName;
        }

        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $saved = $user->save();

        if (! $saved) {
            return back()->withErrors(['save' => 'Impossible de sauvegarder le profil']);
        }

        return back()->with('success', 'Profil mis à jour avec succès.');
    }

    /**
     * Afficher le formulaire de changement de mot de passe
     */
    public function showChangePassword()
    {
        return view('user.compte.motdepasse');
    }

    /**
     * Changer le mot de passe du client
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'ancien_mot_de_passe' => 'required',
            'nouveau_mot_de_passe' => 'required|min:8|confirmed',
        ]);
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if ($user && ! $user instanceof User && isset($user->id)) {
            $user = User::find($user->id);
        }

        if (! $user) {
            return back()->withErrors(['user' => 'Utilisateur introuvable']);
        }

        if (!Hash::check($request->ancien_mot_de_passe, $user->password)) {
            return back()->withErrors(['ancien_mot_de_passe' => 'Ancien mot de passe incorrect']);
        }

        $user->password = Hash::make($request->nouveau_mot_de_passe);
        $saved = $user->save();

        if (! $saved) {
            return back()->withErrors(['save' => 'Impossible de sauvegarder le nouveau mot de passe']);
        }

        return back()->with('success', 'Mot de passe changé avec succès.');
    }

    /**
     * Supprimer le compte utilisateur
     */
    public function supprimerCompte(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if ($user && ! $user instanceof User && isset($user->id)) {
            $user = User::find($user->id);
        }

        if (! $user) {
            return back()->withErrors(['user' => 'Utilisateur introuvable']);
        }

        $userId = $user->id;
        Auth::logout();

        // supprimer via le modèle si possible
        $deleted = User::where('id', $userId)->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if (! $deleted) {
            return back()->withErrors(['delete' => 'Impossible de supprimer le compte']);
        }

        return redirect('/')->with('success', 'Votre compte a été supprimé.');
    }
}

