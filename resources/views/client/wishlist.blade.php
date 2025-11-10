@extends('layouts.show')

@section('title', 'Ma liste de souhaits')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center fw-bold">💖 Ma liste de souhaits</h1>

    @if(!$wishlist || $wishlist->produits->isEmpty())
        <div class="text-center my-5">
            <h4>Votre liste de souhaits est vide 😢</h4>
            <a href="{{ route('client.produits') }}" class="btn btn-primary mt-3">Voir les produits</a>
        </div>
    @else
        <div class="row">
            @foreach($wishlist->produits as $produit)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $produit->image_principale) }}"
                             class="card-img-top"
                             alt="{{ $produit->nom }}"
                             style="height: 200px; object-fit: cover;">

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $produit->nom }}</h5>
                            <p class="card-text fw-bold text-primary">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</p>
                            <form action="{{ route('client.wishlist.remove', $produit->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑 Retirer</button>
                            </form>
                            <br>
                            <form action="{{ route('client.panier.ajouter', $produit->id) }}" method="POST" class="d-inline ms-2">
                                @csrf
                                <button class="btn btn-sm btn-success">
                                    🛒 Ajouter au panier
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
