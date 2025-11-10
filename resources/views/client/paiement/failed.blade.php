@extends('layouts.app')

@section('title', 'Échec du paiement')

@section('content')
<div class="container text-center py-5">
    <div class="alert alert-danger shadow-sm">
        <h2 class="mb-3">❌ Échec du paiement</h2>
        <p>Votre transaction n’a pas pu être complétée. Veuillez réessayer.</p>
    </div>

    <a href="{{ route('client.paiement.retry', $commande->id) }}" class="btn btn-warning mt-3">
        Réessayer le paiement
    </a>
</div>
@endsection
