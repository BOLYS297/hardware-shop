@extends('layouts.show')

@section('content')
<div class="container">
    <h2>Commande confirmée !</h2>
    <p>Merci pour votre achat, {{ Auth::user()->name }}.</p>
    <p>Montant total : {{ number_format($commande->total, 2) }} FCFA</p>

    <h4>Produits commandés :</h4>
    <ul>
        @foreach($commande->produits as $produit)
            <li>{{ $produit->nom }} x {{ $produit->pivot->quantite }} = {{ $produit->pivot->prix_unitaire * $produit->pivot->quantite }} FCFA</li>
        @endforeach
    </ul>
</div>
@endsection
