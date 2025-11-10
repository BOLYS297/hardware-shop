@foreach($cart as $item)
<div class="d-flex align-items-center mb-3 border-bottom pb-2">
  <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['nom'] }}" width="60" class="me-3 rounded">
  <div class="flex-grow-1">
    <h6 class="mb-0">{{ $item['nom'] }}</h6>
    <small>Prix : {{ number_format($item['prix_unitaire'], 0, ',', ' ') }} FCFA</small><br>
    <small>Qté : {{ $item['quantite'] }}</small>
  </div>
</div>
@endforeach

<p class="fw-bold text-end mt-3">
  Total : {{ number_format(collect($cart)->sum(fn($p) => $p['quantite'] * $p['prix_unitaire']), 0, ',', ' ') }} FCFA
</p>
