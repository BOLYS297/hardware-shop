@extends('layouts.app')

@section('title', 'Détails de la commande')

@section('content')
<div class="container py-5">
    <a href="{{ route('client.commandes.index') }}" class="btn btn-outline-secondary mb-4">
        ← Retour à mes commandes
    </a>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Commande #{{ $commande->id }}</h5>
        </div>

        <div class="card-body">
            {{-- Informations générales --}}
            <div class="mb-4">
                <h6 class="fw-bold">Informations de la commande</h6>
                <p>Date : <strong>{{ $commande->created_at->format('d/m/Y à H:i') }}</strong></p>
                <p>Statut :
                    <span class="badge bg-{{
                        $commande->statut === 'livrée' ? 'success' :
                        ($commande->statut === 'en cours' ? 'warning' : 'secondary')
                    }}">
                        {{ ucfirst($commande->statut) }}
                    </span>
                </p>
            </div>

            {{-- Liste des produits --}}
            <div class="mb-4">
                <h6 class="fw-bold">Produits commandés</h6>
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
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
                </div>
            </div>

            {{-- Paiement --}}
            <div class="mb-4">
                <h6 class="fw-bold">Paiement</h6>
                @if($commande->paiement)
                    <p>Méthode : <strong>{{ ucfirst($commande->paiement->methode) }}</strong></p>
                    <p>Montant payé : <strong>{{ number_format($commande->paiement->montant, 0, ',', ' ') }} FCFA</strong></p>
                    <p>Date de paiement : {{ $commande->paiement->date_paiement->format('d/m/Y à H:i') }}</p>
                    <p>Référence transaction : <span class="text-muted">{{ $commande->paiement->reference }}</span></p>
                @else
                    <p class="text-danger">Aucun paiement enregistré pour cette commande.</p>
                @endif
            </div>

            {{-- Livraison --}}
            @if($commande->livraison)
            <div class="mb-4">
                <h6 class="fw-bold">Livraison</h6>
                <p>Adresse : {{ $commande->livraison->adresse_complete }}</p>
                <p>Statut de livraison :
                    <span class="badge bg-{{
                        $commande->livraison->statut === 'livrée' ? 'success' :
                        ($commande->livraison->statut === 'en cours' ? 'warning' : 'secondary')
                    }}">
                        {{ ucfirst($commande->livraison->statut) }}
                    </span>
                </p>
            </div>
            @endif

            {{-- Résumé total --}}
            <div class="border-top pt-3 mt-3">
                <h5>Total : <strong>{{ number_format($commande->total, 0, ',', ' ') }} FCFA</strong></h5>
            </div>
        </div>
    </div>
</div>
@endsection
