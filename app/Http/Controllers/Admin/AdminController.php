<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;


class AdminController extends Controller
{
     public function index()
    {
        $totalVentes = Commande::sum('montant_total');
        $totalProduits = Produit::count();
        $totalUsers = User::count();
        return view('admin.dashboard', compact('totalVentes','totalProduits','totalUsers'));
    }
}
