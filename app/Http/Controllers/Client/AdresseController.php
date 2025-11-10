<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adresse;
use Illuminate\Support\Facades\Auth;

class AdresseController extends Controller
{
    // Liste des adresses du client
    public function index()
    {
        $adresses = Adresse::where('user_id', Auth::id())->get();
        return view('client.adresses.index', compact('adresses'));
    }

    // Formulaire de création d'adresse
    public function create()
    {
        return view('client.adresses.create');
    }

    // Enregistrement d'une nouvelle adresse
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_complet' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'pays' => 'required|string|max:100',
            'ville' => 'required|string|max:100',
            'quartier' => 'required|string|max:100',
            'rue' => 'nullable|string|max:255',
            'code_postal' => 'nullable|string|max:20',
        ]);

        $validated['user_id'] = Auth::id();

        Adresse::create($validated);

        return redirect()->route('client.adresses.index')
                         ->with('success', 'Adresse ajoutée avec succès.');
    }
}
