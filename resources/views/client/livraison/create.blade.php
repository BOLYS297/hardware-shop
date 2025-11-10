@extends('layouts.app')

@section('title', 'Nouvelle adresse')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Ajouter une adresse</h2>

    <form method="POST" action="{{ route('client.livraison.store') }}" class="card p-4 shadow-sm">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Nom complet</label>
                <input type="text" name="nom_complet" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Téléphone</label>
                <input type="text" name="telephone" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Pays</label>
                <input type="text" name="pays" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Ville</label>
                <input type="text" name="ville" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Quartier</label>
                <input type="text" name="quartier" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Rue (facultatif)</label>
                <input type="text" name="rue" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label>Code postal (facultatif)</label>
            <input type="text" name="code_postal" class="form-control">
        </div>

        <button class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
