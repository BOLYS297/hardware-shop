@extends('layouts.app')

@section('title', 'Tableau de bord - Admin')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Bienvenue sur le tableau de bord admin 👑</h1>

    <div class="alert alert-info">
        Vous êtes connecté en tant qu’administrateur : <strong>{{ Auth::user()->nom }}</strong>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body text-center">
                    <a href="{{ route('admin.produits.index') }}"><h5 class="card-title">Gestion des produits</h5></a>
                    <a href="{{ route('admin.users.index') }}"><h5 class="card-title">Gestion des utilisateurs</h5></a>
                    <a href="{{ route('admin.commandes.index') }}"><h5 class="card-title">Gestion des commandes</h5></a>
                    <a href="{{ route('admin.paiements.index') }}"><h5 class="card-title">Gestion des paiements</h5></a>
                    <a href="{{ route('admin.livraisons.index') }}"><h5 class="card-title">Gestion des livraisons</h5></a>
                    {{-- <a href="{{ route('admin.retours.index') }}"><h5 class="card-title">Gestion des retours</h5></a>
                    <a href="{{ route('admin.avis.index') }}"><h5 class="card-title">Gestion des avis</h5></a> --}}

                    <a href="{{ route('admin.compte') }}" class="btn btn-primary">Voir mon profil</a><br>
                    <a href="{{ route('home') }}" class="btn btn-primary">Retouner a la page d'accueil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
