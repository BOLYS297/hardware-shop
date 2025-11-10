@extends('layouts.show')

@section('title', $produit->nom)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $produit->image_principale) }}"
                 class="img-fluid rounded shadow-sm"
                 alt="{{ $produit->nom }}">
        </div>

        <div class="col-md-6">
            <h2 class="fw-bold">{{ $produit->nom }}</h2>
            <p class="text-success fs-5 fw-bold">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</p>
            <p>{{ $produit->description }}</p>

            <form action="{{ route('client.panier.ajouter', $produit->id) }}" method="POST" class="mt-3">
                @csrf
                <div class="d-flex mb-3" style="width: 150px;">
                    <input type="number" name="quantite" value="1" min="1" class="form-control text-center">
                </div>
                <button class="btn btn-success w-50">🛒 Ajouter au panier</button>
            </form>

            <form action="{{ route('client.wishlist.add', $produit->id) }}" method="POST" class="mt-3" data-id="{{ $produit->id }}">
                @csrf
                <button class="btn btn-outline-danger w-50">💖 Ajouter à la liste de souhaits</button>
            </form>

            <div class="mt-4">
                <a href="{{ route('client.produits') }}" class="btn btn-outline-secondary">← Retour aux produits</a>
            </div>
        </div>
    </div>
</div>
@endsection

