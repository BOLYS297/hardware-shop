<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;

class ProduitController extends Controller
{
    /**
     * Page listing produits (public)
     */
    public function index(Request $request)
    {
        $q = $request->query('q');
        $categorie = $request->query('categorie');

        $query = Produit::where('est_actif', true);
        \session(['categories'=> 'Categorie::all()']);
        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('nom', 'like', "%{$q}%")
                    ->orWhere('description', 'like', "%{$q}%")
                    ->orWhere('reference', 'like', "%{$q}%");
            });
        }

        if ($categorie) {
            $query->where('categorie_id', $categorie);
        }

        $produits = $query->latest()->paginate(7);
        $categories = Categorie::all();

        return view('home.produits', compact('produits','categories','q','categorie'));
    }

    /**
     * Détail produit
     */
    public function show($id)
    {
        $produit = Produit::with('categorie')->findOrFail($id);
        return view('home.show', compact('produit'));
    }
}
