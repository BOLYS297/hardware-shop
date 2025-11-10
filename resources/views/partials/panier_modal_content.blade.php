@foreach($panier->produits as $produit)
<div class="d-flex align-items-center mb-3 border-bottom pb-2">
  <img src="{{ asset('storage/' . $produit->image_principale) }}" alt="{{ $produit->nom }}" width="60" class="me-3 rounded">
  <div class="flex-grow-1">
    <h6 class="mb-0">{{ $produit->nom }}</h6>
    <small>Prix : {{ number_format($produit->pivot->prix_unitaire, 0, ',', ' ') }} FCFA</small><br>
    <small>Qté : {{ $produit->pivot->quantite }}</small>
  </div>
</div>
@endforeach

<p class="fw-bold text-end mt-3">
  Total : {{ number_format($panier->produits->sum(fn($p) => $p->pivot->quantite * $p->pivot->prix_unitaire), 0, ',', ' ') }} FCFA
</p>
