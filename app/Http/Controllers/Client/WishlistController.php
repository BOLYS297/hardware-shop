<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Wishlist;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
     public function index()
    {
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::id())->with('produits')->first();
        }
        else {
            $sessionId = session()->get('wishlist_session_id', null);
            $wishlist = session()->get('wishlist', []);
        }
        return view('client.wishlist', compact('wishlist'));
    }

    public function add(Request $request)
{
    if (Auth::check()) {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
        ]);

        $wishlist = Wishlist::firstOrCreate(['user_id' => Auth::id()]);

        $wishlist->produits()->syncWithoutDetaching([
            $request->produit_id => ['created_at' => now(), 'updated_at' => now()],
        ]);
    } else {
        $produit = Produit::findOrFail($request->produit_id);

        $cart = session()->get('wishlist', []);
        $cart[$produit->id] = [
            'id' => $produit->id,
            'nom' => $produit->nom,
            'prix_unitaire' => $produit->prix,
            'image' => $produit->image_principale
        ];
        session()->put('wishlist', $cart);
    }

    return redirect(route('client.wishlist'))->with('success', 'Produit ajouté à la liste de souhaits');
}

    public function remove(Request $request, Produit $produit)
    {
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::id())->first();
            if ($wishlist) $wishlist->produits()->detach($produit->id);
        } else {
            $cart = session()->get('wishlist', []);
            if (isset($cart[$produit->id])) {
                unset($cart[$produit->id]);
                session()->put('wishlist', $cart);
            }
        }
        return back()->with('success','Produit retiré');
    }
}
