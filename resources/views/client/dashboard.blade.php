@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Bienvenue, {{ Auth::user()->nom }} 👋</h2>

    {{-- Résumé rapide --}}
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary">Mes Commandes</h5>
                    <p class="display-6 fw-bold">{{ $commandesCount }}</p>
                    <a href="{{ route('client.commandes') }}" class="btn btn-outline-primary">Voir mes commandes</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title text-success">Mon Compte</h5>
                    <p class="text-muted mb-3">Gérez vos informations personnelles</p>
                    <a href="{{ route('client.compte') }}" class="btn btn-outline-success">Mon profil</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title text-warning">Ma Liste de souhaits</h5>
                    <p class="text-muted mb-3">Consultez vos produits favoris</p>
                    <a href="{{ route('client.wishlist') }}" class="btn btn-outline-warning">Voir la liste</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Dernières commandes --}}
    <div class="card shadow-sm border-0 mt-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Dernières commandes</h5>
        </div>
        <div class="card-body">
            @if($dernieresCommandes->isEmpty())
                <p class="text-muted">Aucune commande récente pour le moment.</p>
            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Statut</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dernieresCommandes as $commande)
                            <tr>
                                <td>{{ $commande->reference }}</td>
                                <td>{{ $commande->created_at->format('d/m/Y') }}</td>
                                <td>{{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA</td>
                                <td>
                                    <span class="badge bg-{{ $commande->statut === 'livrée' ? 'success' : 'warning' }}">
                                        {{ ucfirst($commande->statut) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('client.commandes.show', $commande->id) }}" class="btn btn-sm btn-outline-secondary">
                                        Voir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <a href="{{ route('home') }}" class="btn btn-primary">Retouner a la page d'accueil</a>
    </div>
</div>
@endsection
