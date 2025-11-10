@extends('layouts.admin')

@section('title', 'Ajouter un produit')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-primary mb-4">Ajouter un nouveau produit</h2>
     @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <form action="{{ route('admin.produits.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm border-0">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Nom du produit</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Prix (FCFA)</label>
                <input type="text" name="prix" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Stock</label>
                <input type="text" name="stock" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Catégorie</label>
                <select name="categorie_id" class="form-select" required>
                    <option value="">--catégorie--</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Décrivez le produit..."></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image du produit</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Enregistrer</button>
            <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
