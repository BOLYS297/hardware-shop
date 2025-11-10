@extends('layouts.app')

@section('title', 'Modifier une adresse')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Modifier l’adresse</h2>

    <form method="POST" action="{{ route('client.livraison.update', $adresse->id) }}" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        @include('client.livraison.form', ['adresse' => $adresse])

        <button class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
