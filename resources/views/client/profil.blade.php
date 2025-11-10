@extends('layouts.app')

@section('title', 'Mon profil')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Mon Profil</h2>

    {{-- Informations personnelles --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Informations personnelles</h5>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Nom complet :</strong> {{ $user->name }}</p>
                    <p><strong>Email :</strong> {{ $user->email }}</p>
                    <p><strong>Téléphone :</strong> {{ $user->telephone ?? 'Non renseigné' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Pays :</strong> {{ $user->pays ?? 'Non renseigné' }}</p>
                    <p><strong>Ville :</strong> {{ $user->ville ?? 'Non renseignée' }}</p>
                    <p><strong>Date d’inscription :</strong> {{ $user->created_at->format('d/m/Y') }}</p>
                </div>
            </div>

            <a href="{{ route('client.compte.edit') }}" class="btn btn-outline-primary">
                Modifier mes informations
            </a>
        </div>
    </div>

    {{-- Adresse par défaut (si elle existe) --}}
    @if($user->adresses && $user->adresses->count() > 0)
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Adresse principale</h5>
        </div>
        <div class="card-body">
            @php $adresse = $user->adresses->first(); @endphp
            <p><strong>Nom complet :</strong> {{ $adresse->nom_complet }}</p>
            <p><strong>Téléphone :</strong> {{ $adresse->telephone }}</p>
            <p><strong>Adresse :</strong> {{ $adresse->quartier }}, {{ $adresse->ville }}, {{ $adresse->pays }}</p>
            <p><strong>Code postal :</strong> {{ $adresse->code_postal ?? '—' }}</p>

            <a href="{{ route('client.adresses.index') }}" class="btn btn-outline-secondary mt-2">
                Gérer mes adresses
            </a>
        </div>
    </div>
    @endif

    {{-- Historique rapide des commandes --}}
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light">
            <h5 class="mb-0">Historique des commandes</h5>
        </div>
        <div class="card-body">
            @if($user->commandes->isEmpty())
                <p class="text-muted">Vous n’avez encore passé aucune commande.</p>
            @else
                <ul class="list-group">
                    @foreach($user->commandes->take(3) as $commande)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Commande #{{ $commande->id }}</strong>
                                ({{ $commande->created_at->format('d/m/Y') }})
                            </div>
                            <span class="badge bg-{{ $commande->statut === 'livrée' ? 'success' : 'warning' }}">
                                {{ ucfirst($commande->statut) }}
                            </span>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('client.commandes.index') }}" class="btn btn-link mt-2">Voir toutes mes commandes</a>
            @endif
        </div>
    </div>
</div>
@endsection
