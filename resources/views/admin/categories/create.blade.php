@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Ajouter une catégorie</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la catégorie</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
            @error('nom') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (optionnelle)</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Catégorie parente (optionnelle)</label>
            <select name="parent_id" id="parent_id" class="form-select">
                <option value="">Aucune</option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
