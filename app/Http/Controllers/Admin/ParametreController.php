<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    public function index()
    {
        // Si tu stockes les paramètres dans DB via model Parametre, charge-les sinon config
        $params = config('app'); // exemple basique
        return view('admin.parametres.index', compact('params'));
    }

    public function update(Request $request)
    {
        // Validation et persistance selon ton implémentation (fichier config, base, ou table key-values)
        $data = $request->validate([
            'site_name' => 'required|string|max:255',
            'devise' => 'required|string|max:10',
            'tax_rate' => 'nullable|numeric',
            // clés flutterwave si tu veux les stocker ici (attention sécurité)
        ]);

        // Exemple : stocker dans table Parametres (implémenter le model Parametre)
        // Parametre::setMany($data);

        return back()->with('success','Paramètres mis à jour.');
    }
}
