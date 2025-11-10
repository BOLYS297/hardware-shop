@extends('layouts.show')

@section('title', 'Nouvelle adresse')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Ajouter une adresse</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('client.adresses.store') }}" method="POST" class="w-75 mx-auto">
        @csrf

        <div class="mb-3">
            <label for="nom_complet" class="form-label">Nom complet</label>
            <input type="text" name="nom_complet" id="nom_complet" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="pays" class="form-label">Pays</label>
            <input type="text" name="pays" id="pays" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="quartier" class="form-label">Quartier</label>
            <input type="text" name="quartier" id="quartier" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="rue" class="form-label">Rue</label>
            <input type="text" name="rue" id="rue" class="form-control">
        </div>

        <div class="mb-3">
            <label for="code_postal" class="form-label">Code postal</label>
            <input type="text" name="code_postal" id="code_postal" class="form-control">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('client.adresses.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
