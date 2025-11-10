<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;;

use Illuminate\Http\Request;
use App\Models\Panier;
class RegisterController extends Controller
{
    public function authenticated(Request $request, $user)
{
    if (session()->has('cart')) {
        $sessionCart = session('cart');
        $panier = Panier::firstOrCreate(['user_id' => $user->id, 'status' => 'actif']);
        foreach ($sessionCart as $item) {
            $exists = $panier->produits()->where('produit_id', $item['id'])->exists();
            if ($exists) {
                $pivot = $panier->produits()->where('produit_id', $item['id'])->first()->pivot;
                $panier->produits()->updateExistingPivot($item['id'], [
                    'quantite' => $pivot->quantite + $item['quantite'],
                    'prix_unitaire' => $item['prix_unitaire']
                ]);
            } else {
                $panier->produits()->attach($item['id'], [
                    'quantite' => $item['quantite'],
                    'prix_unitaire' => $item['prix_unitaire']
                ]);
            }
        }
        session()->forget('cart');
    }

    // wishlist session -> db similar...
    return redirect()->intended('/');
}

}
