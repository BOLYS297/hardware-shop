<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;

class HomeController extends Controller
{
    /**
     * Show the application dasehboard.
     */
    public function index()
    {
        $categories = Categorie::all();
        $produits = Produit::where('est_actif', true)->latest()->take(4)->get();
        return view('index',compact('produits','categories'));
    }

    public function show($slug)
    {
        $produit = Produit::where('id', $slug)->orWhere('reference', $slug)->firstOrFail();
        return view('home.produit', compact('produit', 'categories'));
    }
}
