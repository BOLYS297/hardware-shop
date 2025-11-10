<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Livraison;
use App\Models\Commande;

class LivraisonController extends Controller
{
    public function index()
    {
        $livraisons = Livraison::with('commande','commande.user')->orderByDesc('created_at')->paginate(25);
        return view('admin.livraisons.index', compact('livraisons'));
    }

    public function create($commandeId = null)
    {
        $commande = $commandeId ? Commande::findOrFail($commandeId) : null;
        return view('admin.livraisons.create', compact('commande'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'commande_id' => 'required|exists:commandes,id',
            'transporteur' => 'required|string|max:255',
            'numero_suivi' => 'nullable|string|max:255',
            'date_expedition' => 'nullable|date',
            'date_livraison_prevue' => 'nullable|date',
            'statut' => 'required|string'
        ]);

        Livraison::create($data);
        return redirect()->route('livraisons.index')->with('success','Livraison créée.');
    }

    public function edit($id)
    {
        $livraison = Livraison::findOrFail($id);
        return view('admin.livraisons.edit', compact('livraison'));
    }

    public function update(Request $request, $id)
    {
        $livraison = Livraison::findOrFail($id);
        $data = $request->validate([
            'transporteur' => 'required|string|max:255',
            'numero_suivi' => 'nullable|string|max:255',
            'date_expedition' => 'nullable|date',
            'date_livraison_prevue' => 'nullable|date',
            'date_livraison_effective' => 'nullable|date',
            'statut' => 'required|string'
        ]);
        $livraison->update($data);
        return redirect()->route('livraisons.index')->with('success','Livraison mise à jour.');
    }

    public function destroy($id)
    {
        $livraison = Livraison::findOrFail($id);
        $livraison->delete();
        return back()->with('success','Livraison supprimée.');
    }
}
