@extends('layouts.admin')

@section('title', 'Détails du paiement')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Détails du paiement #{{ $paiement->id }}</h2>

    <div class="card shadow-sm p-4">
        <p><strong>Client :</strong> {{ $paiement->commande->user->name ?? 'N/A' }}</p>
        <p><strong>Montant :</strong> {{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</p>
        <p><strong>Statut :</strong>
            <span class="badge bg-{{ $paiement->statut == 'réussi' ? 'success' : 'danger' }}">
                {{ ucfirst($paiement->statut) }}
            </span>
        </p>
        <p><strong>Date :</strong> {{ $paiement->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Référence Flutterwave :</strong> {{ $paiement->reference ?? '—' }}</p>

        <hr>

        <h5>Produits de la commande</h5>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paiement->commande->produits as $produit)
                <tr>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->pivot->quantite }}</td>
                    <td>{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</td>
                    <td>{{ number_format($produit->pivot->quantite * $produit->prix, 0, ',', ' ') }} FCFA</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
