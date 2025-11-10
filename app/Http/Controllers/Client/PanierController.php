<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Panier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PanierController extends Controller
{
    /**
     * Affiche le panier actuel (utilisateur connecté ou session)
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $panier = Panier::firstOrCreate(
                ['user_id' => Auth::id(), 'status' => 'actif']
            );
            $produits = $panier->produits()->withPivot('quantite','prix_unitaire')->get();
            $total = $produits->sum(function($p){ return $p->pivot->quantite * $p->pivot->prix_unitaire; });
        } else {
            $sessionCart = session()->get('cart', []);
            $produits = collect($sessionCart);
            $total = $produits->sum(function($p){ return $p['quantite'] * $p['prix_unitaire']; });
            $panier = null;
        }

        return view('client.panier', compact('panier','produits','total'));
    }
 
public function getPanierModal()
{
    if (Auth::check()) {
        $panier = Panier::where('user_id', Auth::id())->with('produits')->first();

        if (!$panier || $panier->produits->isEmpty()) {
            return response()->json(['html' => '<p class="text-center text-muted">Votre panier est vide.</p>']);
        }

        $html = view('partials.panier_modal_content', compact('panier'))->render();
        return response()->json(['html' => $html]);
    } else {
        $cart = session('cart', []);
        if (empty($cart)) {
            return response()->json(['html' => '<p class="text-center text-muted">Votre panier est vide.</p>']);
        }

        $html = view('partials.panier_modal_content_guest', compact('cart'))->render();
        return response()->json(['html' => $html]);
    }
}

    /**
     * Ajoute un produit au panier
     */
    public function ajouterAjax(Request $request, $id)
{
    $produit = Produit::findOrFail($id);
    $quantite = max(1, (int)$request->input('quantite', 1));
    $prix = $produit->prix;

    if (Auth::check()) {
        $panier = Panier::firstOrCreate(['user_id' => Auth::id(), 'status' => 'actif']);
        $produitExistant = $panier->produits()->where('produit_id', $id)->first();

        if ($produitExistant) {
            $panier->produits()->updateExistingPivot($id, [
                'quantite' => $produitExistant->pivot->quantite + $quantite,
                'prix_unitaire' => $prix
            ]);
        } else {
            $panier->produits()->attach($id, [
                'quantite' => $quantite,
                'prix_unitaire' => $prix
            ]);
        }

        // Calculer le total du panier
        $total = $panier->produits->sum(function($p) {
            return $p->pivot->quantite * $p->pivot->prix_unitaire;
        });

        // Retourner une réponse JSON
        return response()->json([
            'success' => true,
            'message' => 'Produit ajouté au panier',
            'total' => $total,
            'count' => $panier->produits->count()
        ]);
    }

    return response()->json(['success' => false, 'message' => 'Utilisateur non connecté'], 401);
}


    /**
     * Met à jour la quantité d'un produit dans le panier
     */
    public function update(Request $request, Produit $produit)
    {
        $quantite = max(1, (int)$request->input('quantite',1));
        if (Auth::check()) {
            $panier = Panier::where('user_id', Auth::id())->where('status','actif')->first();
            if ($panier) {
                $panier->produits()->updateExistingPivot($produit->id, ['quantite' => $quantite]);
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$produit->id])) {
                $cart[$produit->id]['quantite'] = $quantite;
                session()->put('cart', $cart);
            }
        }
        return back()->with('success', 'Quantité mise à jour');
    }

    /**
     * Supprime un produit du panier
     */
    public function supprimer(Request $request, Produit $produit)
    {
        if (Auth::check()) {
            $panier = Panier::where('user_id', Auth::id())->where('status','actif')->first();
            if ($panier) {
                $panier->produits()->detach($produit->id);
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$produit->id])) {
                unset($cart[$produit->id]);
                session()->put('cart', $cart);
            }
        }

        return back()->with('success', 'Produit retiré du panier');
    }
}
