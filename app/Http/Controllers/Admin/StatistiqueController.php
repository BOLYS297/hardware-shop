<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    public function index(Request $request)
    {
        // CA total
        $caTotal = Commande::where('statut_commande','<>','annulée')->sum('montant_total');

        // CA du mois
        $start = Carbon::now()->startOfMonth();
        $caMois = Commande::where('created_at','>=',$start)->sum('montant_total');

        // Produits les plus vendus (top 10)
        $topProduits = DB::table('commande_produit')
            ->select('produit_id', DB::raw('SUM(quantite) as total_vendus'))
            ->groupBy('produit_id')
            ->orderByDesc('total_vendus')
            ->limit(10)
            ->get()
            ->pluck('total_vendus','produit_id');

        // Transforme ids en modèles si besoin
        $produits = Produit::whereIn('id', $topProduits->keys()->toArray())->get()->keyBy('id');

        return view('admin.statistiques.index', compact('caTotal','caMois','topProduits','produits'));
    }
}
