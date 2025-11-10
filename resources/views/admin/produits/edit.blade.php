@extends('layouts.admin')

@section('title', 'Modifier le produit')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-warning mb-4">Modifier le produit : {{ $produit->nom }}</h2>

    <form action="{{ route('admin.produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm border-0">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Nom du produit</label>
                <input type="text" name="nom" value="{{ $produit->nom }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Prix (FCFA)</label>
                <input type="number" name="prix" value="{{ $produit->prix }}" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" value="{{ $produit->stock }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Catégorie</label>
                <select name="categorie_id" class="form-select" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @selected($cat->id == $produit->categorie_id)>
                            {{ $cat->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ $produit->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image actuelle</label><br>
            <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" width="120" class="img-thumbnail mb-3">
            <input type="file" name="image" class="form-control">
        </div>

        <div class="text-end">
            <button class="btn btn-warning"><i class="bi bi-save"></i> Mettre à jour</button>
            <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
