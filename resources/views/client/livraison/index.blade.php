@extends('layouts.app')

@section('title', 'Mes adresses de livraison')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Mes adresses</h2>

    <a href="{{ route('client.livraison.create') }}" class="btn btn-primary mb-3">➕ Ajouter une adresse</a>

    <div class="row">
        @forelse($adresses as $adresse)
        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5>{{ $adresse->nom_complet }}</h5>
                    <p>
                        {{ $adresse->telephone }}<br>
                        {{ $adresse->quartier }}, {{ $adresse->ville }}<br>
                        {{ $adresse->pays }}
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('client.livraison.edit', $adresse->id) }}" class="btn btn-sm btn-outline-info">Modifier</a>
                        <form action="{{ route('client.livraison.destroy', $adresse->id) }}" method="POST" onsubmit="return confirm('Supprimer cette adresse ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>Aucune adresse enregistrée.</p>
        @endforelse
    </div>
</div>
@endsection
