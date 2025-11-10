@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des catégories</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">+ Ajouter une catégorie</a>
    </div>

    {{-- Message de succès --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr class="text-center">
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Parent</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($categories as $categorie)
                <tr class="text-center">
                    <td>{{ $categorie->id }}</td>
                    <td>{{ $categorie->nom }}</td>
                    <td>{{ Str::limit($categorie->description, 50) }}</td>
                    <td>{{ $categorie->parent ? $categorie->parent->nom : 'Aucune' }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $categorie->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                        <form action="{{ route('admin.categories.destroy', $categorie->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Supprimer cette catégorie ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Aucune catégorie enregistrée</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
