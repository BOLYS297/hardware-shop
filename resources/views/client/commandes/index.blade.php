@extends('layouts.app')

@section('title', 'Mes commandes')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Mes commandes</h2>

    {{-- Si le client n’a aucune commande --}}
    @if($commandes->isEmpty())
        <div class="alert alert-info">
            Vous n’avez encore passé aucune commande.
            <a href="{{ route('client.produits') }}" class="alert-link">Commencez vos achats</a> !
        </div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table align-middle table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Produits</th>
                        <th>Total</th>
                        <th>Statut</th>
                        <th>Paiement</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commandes as $commande)
                        <tr>
                            <td><strong>#{{ $commande->id }}</strong></td>
                            <td>{{ $commande->created_at->format('d/m/Y') }}</td>

                            {{-- Affiche les produits liés --}}
                            <td>
                                @foreach($commande->produits as $produit)
                                    <div>
                                        • {{ $produit->nom }}
                                        <span class="text-muted">x{{ $produit->pivot->quantite }}</span>
                                    </div>
                                @endforeach
                            </td>

                            {{-- Total de la commande --}}
                            <td>{{ number_format($commande->total, 0, ',', ' ') }} FCFA</td>

                            {{-- Statut coloré dynamiquement --}}
                            <td>
                                <span class="badge bg-{{
                                    $commande->statut === 'livrée' ? 'success' :
                                    ($commande->statut === 'en cours' ? 'warning' : 'secondary')
                                }}">
                                    {{ ucfirst($commande->statut) }}
                                </span>
                            </td>

                            {{-- Paiement --}}
                            <td>
                                @if($commande->paiement)
                                    <span class="text-success">Payée ({{ ucfirst($commande->paiement->methode) }})</span>
                                @else
                                    <span class="text-danger">Non payée</span>
                                @endif
                            </td>

                            {{-- Bouton voir détail --}}
                            <td>
                                <a href="{{ route('client.commandes.show', $commande->id) }}" class="btn btn-outline-primary btn-sm">
                                    Voir détails
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
