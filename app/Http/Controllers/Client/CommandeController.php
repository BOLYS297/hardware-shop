<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\Commande;
use App\Models\Adresse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CommandeController extends Controller
{
    // Liste des commandes du client
    public function index()
    {
        $commandes = Commande::where('user_id', Auth::id())
                            ->orderBy('date_commande', 'desc')
                            ->get();

        return view('client.commandes.index', compact('commandes'));
    }

    // Détails d'une commande
    public function show($id)
    {
        $commande = Commande::with('produits')
                            ->where('id', $id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

        return view('client.commandes.show', compact('commande'));
    }

    // Afficher la page de choix d'adresse
    public function choisirAdresse()
    {
        $adresses = Adresse::where('user_id', Auth::id())->get();

        if ($adresses->isEmpty()) {
            return redirect()->route('client.adresses.create')
                             ->with('error', 'Veuillez d’abord ajouter une adresse.');
        }

        return view('client.commandes.choisir_adresse', compact('adresses'));
    }

    // Créer la commande avec l'adresse sélectionnée
    public function store(Request $request)
    {
        $request->validate([
            'adresse_id' => 'required|exists:adresses,id',
        ]);

        $panier = Panier::where('user_id', Auth::id())
                        ->where('status', 'actif')
                        ->first();

        if (!$panier || $panier->produits->isEmpty()) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }

        $montant_total = $panier->produits->sum(function($produit) {
            return $produit->pivot->quantite * $produit->pivot->prix_unitaire;
        });

        // Création de la commande
        $commande = Commande::create([
            'user_id' => Auth::id(),
            'adresse_id' => $request->adresse_id,
            'total' => $panier->produits->sum(function($produit) {
                return $produit->pivot->quantite * $produit->pivot->prix_unitaire;
            }),
            'montant_total' => $montant_total,
            'status' => 'en attente de paiement',
            'date_commande' => Carbon::now(),
            'reference' => 'CMD-' . strtoupper(uniqid()), // génération d’une référence unique
        ]);

        // Lier les produits du panier à la commande
      foreach ($panier->produits as $produit) {
            $prix = $produit->pivot->prix_unitaire ?? $produit->prix_unitaire ?? 0;
            $quantite = $produit->pivot->quantite ?? 1;

            $commande->produits()->attach($produit->id, [
                'quantite' => $quantite,
                'prix_unitaire' => $prix,
                'sous_total' => $prix * $quantite, // <-- ajout du sous_total
            ]);
        }



        // Marquer le panier comme "valide"
        $panier->status = 'valide';
        $panier->save();

        return redirect()->route('client.commandes.confirmation', $commande->id)
                         ->with('success', 'Commande passée avec succès !');
    }

    // Page de confirmation
    public function confirmation($id)
    {
        $commande = Commande::with('produits')->findOrFail($id);
        return view('client.commandes.confirmation', compact('commande'));
    }
}
