<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompteController extends Controller
{
    /**
     * Afficher le profil de l'admin connecté
     */
    public function profil()
    {
    /** @var \App\Models\User|null $admin */
        $admin = Auth::user();
        if ($admin && ! $admin instanceof User && isset($admin->id)) {
            $admin = User::find($admin->id);
        }
        return view('admin.compte.index', compact('admin'));
    }

    /**
     * Mettre à jour le profil admin
     */
    public function updateProfil(Request $request)
    {
    /** @var \App\Models\User|null $admin */
        $admin = Auth::user();
        if ($admin && ! $admin instanceof User && isset($admin->id)) {
            $admin = User::find($admin->id);
        }
        if ($admin && ! $admin instanceof User && isset($admin->id)) {
            $admin = User::find($admin->id);
        }

        if (! $admin) {
            return back()->withErrors(['user' => 'Utilisateur introuvable']);
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->storeAs('public/profils', $imageName);
            $admin->photo = 'profils/' . $imageName;
        }

        $admin->nom = $request->nom;
        $admin->email = $request->email;
        $saved = $admin->save();

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
        return view('admin.compte.motdepasse');
    }

    /**
     * Changer le mot de passe admin
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'ancien_mot_de_passe' => 'required',
            'nouveau_mot_de_passe' => 'required|min:8|confirmed',
        ]);

        /** @var \App\Models\User|null $admin */
        $admin = Auth::user();
        if ($admin && ! $admin instanceof User && isset($admin->id)) {
            $admin = User::find($admin->id);
        }

        if (! $admin) {
            return back()->withErrors(['user' => 'Utilisateur introuvable']);
        }

        if (!Hash::check($request->ancien_mot_de_passe, $admin->password)) {
            return back()->withErrors(['ancien_mot_de_passe' => 'Ancien mot de passe incorrect']);
        }

        $admin->password = Hash::make($request->nouveau_mot_de_passe);
        $saved = $admin->save();

        if (! $saved) {
            return back()->withErrors(['save' => 'Impossible de sauvegarder le mot de passe']);
        }

        return back()->with('success', 'Mot de passe changé avec succès.');
    }
}
