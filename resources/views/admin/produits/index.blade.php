@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des produits</h2>
        <a href="{{ route('admin.produits.create') }}" class="btn btn-primary">+ Ajouter un produit</a>
    </div>

    {{-- Message de succès --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr class="text-center">
                <th>ID</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Référence</th>
                <th>Actif</th>
                <th>Catégorie</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($produits as $produit)
                <tr class="text-center">
                    <td>{{ $produit->id }}</td>

                    {{-- Image du produit --}}
                    <td>
                        @if ($produit->image_principale)
                            <img src="{{ asset('storage/' . $produit->image_principale) }}"
                                 alt="{{ $produit->nom }}"
                                 width="80" height="80"
                                 style="object-fit: cover; border-radius: 8px;">
                        @else
                            <span class="text-muted">Aucune image</span>
                        @endif
                    </td>

                    <td>{{ $produit->nom }}</td>
                    <td>{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</td>
                    <td>{{ $produit->stock }}</td>
                    <td>{{ $produit->reference->nom ?? '—' }}</td>
                    <td>{{ $produit->est_actif ? 'Oui' : 'Non' }}</td>
                    <td>{{ $produit->categorie->nom ?? '—' }}</td>
                    <td>{{ Str::limit($produit->description, 40) }}</td>

                    {{-- Boutons d’action --}}
                    <td>
                        <a href="{{ route('admin.produits.edit', $produit->id) }}" class="btn btn-sm btn-warning">
                            Modifier
                        </a>

                        <form action="{{ route('admin.produits.destroy', $produit->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">Aucun produit enregistré</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
