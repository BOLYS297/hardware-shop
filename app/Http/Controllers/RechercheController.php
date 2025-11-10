<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class RechercheController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->input('q');
        $produits = Produit::where('nom','like',"%{$q}%")
                    ->orWhere('description','like',"%{$q}%")
                    ->paginate(12);

        return view('home.produits', compact('produits','q'));
    }
    public function show(){
        return view('home.about');
    }
}
