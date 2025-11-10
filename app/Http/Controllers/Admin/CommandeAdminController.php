<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use Illuminate\Support\Facades\Log;

class CommandeAdminController extends Controller
{
    public function index()
    {
        $commandes = Commande::with('user','produits','paiement')->orderByDesc('created_at')->paginate(25);
        return view('admin.commandes.index', compact('commandes'));
    }

    public function show($id)
    {
        $commande = Commande::with('user','produits','paiement','livraison','adresse')->findOrFail($id);
        return view('admin.commandes.show', compact('commande'));
    }

    /**
     * Mettre à jour le statut (ex: en_traitement, expédiée, livrée, annulée)
     */
    public function updateStatus(Request $request, $id)
    {
        $commande = Commande::findOrFail($id);
        $data = $request->validate(['statut_commande' => 'required|string']);
        $commande->statut_commande = $data['statut_commande'];
        $commande->save();

        // Option: enregistrer un log ou notifier l'utilisateur
        Log::info("Commande {$commande->id} statut mis à jour: {$commande->statut_commande}");

        return back()->with('success','Statut mis à jour.');
    }

    public function destroy($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();
        return back()->with('success','Commande supprimée.');
    }
}
