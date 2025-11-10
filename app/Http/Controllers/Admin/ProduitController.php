<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Produit;
use App\Models\Categorie;

class ProduitController extends Controller
{
    public function index() {

        $produits = Produit::with('categorie')->get();
        return view('admin.produits.index', compact('produits'));
    }


    public function create()
    {
        $categories = Categorie::all();
        return view('admin.produits.create', compact('categories'));
    }

public function store(Request $request)
{
    try {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 🔹 Changer ici
        ]);

        // Générer une référence unique
        $data['reference'] = strtoupper('REF-' . uniqid());

        // Gérer l’upload de l’image principale
        if ($request->hasFile('image')) { // 🔹 Adapter ici aussi
            $data['image_principale'] = $request->file('image')->store('produits', 'public');
        }

        // Créer le produit
        Produit::create($data);

        return redirect()->route('admin.produits.index')->with('success', '✅ Produit créé avec succès.');
    } catch (\Throwable $e) {
        dd('❌ Erreur lors de la création : ' . $e->getMessage());
    }
}



    public function show(Produit $produit) {
        return view('produits.show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        return view('admin.produits.edit', compact('produit','categories'));
    }

    public function update(Request $request, Produit $produit)
    {
        $data = $request->validate([
            'nom'=>'required|string',
            'description'=>'nullable|string',
            'prix'=>'required|numeric',
            'stock'=>'required|integer',
            'categorie_id'=>'required|exists:categories,id',
            'image_principale'=>'nullable|image'
        ]);
        $produit->update($data);
        return redirect()->route('admin.produits.index')->with('success','Produit modifié');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();
        return back()->with('success','Produit supprimé');
    }

}
