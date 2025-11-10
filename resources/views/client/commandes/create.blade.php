@extends('layouts.app')

@section('title', 'Passer la commande')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center fw-bold">📝 Passer la commande</h1>

    @if($panier->isEmpty())
        <div class="text-center my-5">
            <h4>Votre panier est vide 😢</h4>
            <a href="{{ route('produits.index') }}" class="btn btn-primary mt-3">Commencer vos achats</a>
        </div>
    @else
        <form action="{{ route('commande.store') }}" method="POST">
            @csrf

            {{-- Adresse de livraison --}}
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Adresse de livraison</h5>
                </div>
                <div class="card-body">
                    @foreach($adresses as $adresse)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="adresse_id"
                                   id="adresse{{ $adresse->id }}" value="{{ $adresse->id }}"
                                   @if($loop->first) checked @endif>
                            <label class="form-check-label" for="adresse{{ $adresse->id }}">
                                {{ $adresse->nom_complet }}, {{ $adresse->quartier }},
                                {{ $adresse->ville }}, {{ $adresse->pays }}
                            </label>
                        </div>
                    @endforeach

                    <a href="{{ route('client.adresses.create') }}" class="btn btn-sm btn-outline-secondary mt-2">
                        Ajouter une nouvelle adresse
                    </a>
                </div>
            </div>

            {{-- Produits récapitulatif --}}
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Produits dans le panier</h5>
                </div>
                <div class="card-body table-responsive">
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
                            @foreach($panier as $item)
                                <tr>
                                    <td>{{ $item->produit->nom }}</td>
                                    <td>{{ $item->quantite }}</td>
                                    <td>{{ number_format($item->produit->prix, 0, ',', ' ') }} FCFA</td>
                                    <td>{{ number_format($item->produit->prix * $item->quantite, 0, ',', ' ') }} FCFA</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Total de la commande --}}
            <div class="card mb-4 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Total :
                        <span class="text-success">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                    </h5>
                    <button type="submit" class="btn btn-success btn-lg">Confirmer et payer</button>
                </div>
            </div>
        </form>
    @endif
</div>
@endsection
