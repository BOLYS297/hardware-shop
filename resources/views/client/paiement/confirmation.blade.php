@extends('layouts.app')

@section('title', 'Confirmation du paiement')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Confirmation de votre commande</h2>

    <div class="card shadow-sm p-4">
        <h5>Détails de la commande</h5>
        <table class="table table-bordered mt-3">
            <thead class="table-light">
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commande->produits as $produit)
                <tr>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->pivot->quantite }}</td>
                    <td>{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</td>
                    <td>{{ number_format($produit->pivot->quantite * $produit->prix, 0, ',', ' ') }} FCFA</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end">
            <h5>Total à payer : <strong>{{ number_format($commande->total, 0, ',', ' ') }} FCFA</strong></h5>
        </div>

        <form action="{{ route('paiement.process', $commande->id) }}" method="POST" class="text-center mt-4">
            @csrf
            <button type="submit" class="btn btn-success btn-lg">Procéder au paiement sécurisé</button>
        </form>
    </div>
</div>
@endsection
