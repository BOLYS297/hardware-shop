@extends('layouts.show')

@section('title', 'Mes adresses')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Mes adresses</h2>

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="text-end mb-3">
        <a href="{{ route('client.adresses.create') }}" class="btn btn-primary">+ Ajouter une adresse</a>
    </div>

    @if ($adresses->isEmpty())
        <p class="text-center">Vous n'avez encore enregistré aucune adresse.</p>
    @else
        <table class="table table-striped text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nom complet</th>
                    <th>Téléphone</th>
                    <th>Pays</th>
                    <th>Ville</th>
                    <th>Quartier</th>
                    <th>Rue</th>
                    <th>Code postal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adresses as $adresse)
                    <tr>
                        <td>{{ $adresse->nom_complet }}</td>
                        <td>{{ $adresse->telephone }}</td>
                        <td>{{ $adresse->pays }}</td>
                        <td>{{ $adresse->ville }}</td>
                        <td>{{ $adresse->quartier }}</td>
                        <td>{{ $adresse->rue ?? '-' }}</td>
                        <td>{{ $adresse->code_postal ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
