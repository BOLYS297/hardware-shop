@extends('layouts.admin')

@section('title', 'Statistiques et rapports')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Tableau de bord - Statistiques</h2>

    <div class="row text-center">
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm p-3">
                <h5>Chiffre d’affaires</h5>
                <p class="h4 text-success">{{ number_format($chiffreAffaires, 0, ',', ' ') }} FCFA</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm p-3">
                <h5>Commandes</h5>
                <p class="h4">{{ $totalCommandes }}</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm p-3">
                <h5>Clients actifs</h5>
                <p class="h4">{{ $clientsActifs }}</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm p-3">
                <h5>Produits vendus</h5>
                <p class="h4">{{ $produitsVendus }}</p>
            </div>
        </div>
    </div>

    <hr>

    <h4 class="mt-4 mb-3">Produits les plus vendus</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Ventes</th>
                <th>Revenus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topProduits as $produit)
            <tr>
                <td>{{ $produit->nom }}</td>
                <td>{{ $produit->ventes }}</td>
                <td>{{ number_format($produit->revenus, 0, ',', ' ') }} FCFA</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
