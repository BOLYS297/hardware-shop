<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paiement;

class PaiementAdminController extends Controller
{
    public function index()
    {
        $paiements = Paiement::with('commande','commande.user')->orderByDesc('created_at')->paginate(25);
        return view('admin.paiements.index', compact('paiements'));
    }

    public function show($id)
    {
        $paiement = Paiement::with('commande')->findOrFail($id);
        return view('admin.paiements.show', compact('paiement'));
    }
}
