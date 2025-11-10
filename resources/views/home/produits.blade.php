@extends('layouts.client')

@section('title', 'Produits')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between mb-4">
        <form action="{{ route('client.produits') }}" method="GET" class="d-flex w-50">
            <input type="text" name="q" class="form-control me-2" placeholder="Rechercher un produit..." value="{{ request('q') }}">
            <button class="btn btn-primary">🔍</button>
        </form>

        <form action="{{ route('client.produits') }}" method="GET">
            <select name="categorie" onchange="this.form.submit()" class="form-select">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ request('categorie') == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="row">
        @forelse($produits as $produit)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('storage/' . $produit->image_principale) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5>{{ $produit->nom }}</h5>
                        <p class="fw-bold text-success">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</p>
                        <a href="{{ route('client.produits.show', $produit->id) }}" class="btn btn-outline-primary btn-sm">Voir</a>
                        <form action="{{ route('client.wishlist.add', $produit->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="produit_id" data-id="{{ $produit->id }}" value="{{ $produit->id }}">
                        <button type="submit" class="btn btn-outline-danger btn-sm">💖 Ajouter à la liste</button>
                        </form>
                    </div>

                </div>
            </div>
        @empty
            <p class="text-center">Aucun produit trouvé</p>
        @endforelse
    </div>
</div>
@endsection

