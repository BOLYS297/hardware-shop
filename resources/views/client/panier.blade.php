@extends('layouts.show')

@section('title', 'Mon panier')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Mon panier</h2>

    @if($produits->isEmpty())
        <p class="text-center">Votre panier est vide.</p>
    @else
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Nom du produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($produits as $produit)
                    <tr>
                        <td class="text-center" style="width: 100px;">
                            @if(isset($produit->image_principale))
                                <img src="{{ asset('storage/' . $produit->image_principale) }}" alt="{{ $produit->nom }}" width="70">
                            @elseif(isset($produit['image']))
                                <img src="{{ asset('storage/' . $produit['image']) }}" alt="{{ $produit['nom'] }}" width="70">
                            @endif
                        </td>

                        <td>{{ $produit->nom ?? $produit['nom'] }}</td>

                        <td>{{ $produit->pivot->quantite ?? $produit['quantite'] }}</td>

                        <td>{{ number_format($produit->pivot->prix_unitaire ?? $produit['prix_unitaire'], 0, ',', ' ') }} FCFA</td>

                        <td>
                            {{ number_format(
                                ($produit->pivot->quantite ?? $produit['quantite']) * 
                                ($produit->pivot->prix_unitaire ?? $produit['prix_unitaire']),
                                0, ',', ' '
                            ) }} FCFA
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <h4>Total : <span class="text-success">{{ number_format($total, 0, ',', ' ') }} FCFA</span></h4>
            <div>
                <a href="{{ route('client.commandes.choisir_adresse') }}" class="btn btn-success">
                  Passer la commande
                </a>
            </div>
        </div>
    @endif
</div>
@endsection

