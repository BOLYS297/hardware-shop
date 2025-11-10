@extends('layouts.show')

@section('title', 'Choisir une adresse')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Sélectionnez votre adresse de livraison</h2>

    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form action="{{ route('client.commandes.store') }}" method="POST" class="w-75 mx-auto">
        @csrf

        <div class="mb-3">
            <label for="adresse_id" class="form-label">Adresse de livraison</label>
            <select name="adresse_id" id="adresse_id" class="form-select" required>
                <option value="">-- Sélectionnez une adresse --</option>
                @foreach($adresses as $adresse)
                    <option value="{{ $adresse->id }}">
                        {{ $adresse->nom_complet }} - {{ $adresse->ville }}, {{ $adresse->quartier }} 
                        @if($adresse->rue) , Rue : {{ $adresse->rue }} @endif
                        @if($adresse->code_postal) , Code postal : {{ $adresse->code_postal }} @endif
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="{{ route('client.adresses.create') }}" class="btn btn-secondary">
                + Ajouter une nouvelle adresse
            </a>
            <button type="submit" class="btn btn-success">Valider ma commande</button>
        </div>
    </form>
</div>
@endsection
