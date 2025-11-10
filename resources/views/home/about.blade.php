@extends('layouts.show')

@section('title', 'À propos de nous')

@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="{{ asset('assets/img/logo.png') }}" alt="À propos de nous" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h1 class="mb-4 text-primary fw-bold">À propos de notre boutique</h1>
            <p class="text-muted">
                Bienvenue sur <strong>Hardware-Shop</strong>, votre plateforme de confiance pour l’achat de produits et services de quincaillerie :
                outils, matériaux, équipements, et bien plus encore.
            </p>
            <p class="text-muted">
                Notre mission est simple : fournir des produits de qualité à des prix compétitifs, tout en offrant un service client exceptionnel.
            </p>
            <p class="text-muted">
                Que vous soyez un bricoleur passionné, un professionnel du bâtiment, ou simplement à la recherche d’outils fiables,
                <strong>Hardware-Shop</strong> est là pour répondre à vos besoins.
            </p>
            <h5 class="mt-4 text-secondary fw-bold">Pourquoi nous choisir ?</h5>
            <ul class="text-muted">
                <li>✅ Produits soigneusement sélectionnés</li>
                <li>✅ Livraison rapide et fiable</li>
                <li>✅ Paiement sécurisé (Mobile Money, carte bancaire, etc.)</li>
                <li>✅ Support client 7j/7</li>
            </ul>
            <p class="mt-4 text-muted">
                Merci de faire confiance à <strong>Hardware-Shop</strong> — là où la qualité rencontre l’accessibilité.
            </p>
        </div>
    </div>
</div>
@endsection
