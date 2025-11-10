@extends('layouts.app')

@section('title', 'Paiement réussi')

@section('content')
<div class="container text-center py-5">
    <div class="alert alert-success shadow-sm">
        <h2 class="mb-3">✅ Paiement réussi !</h2>
        <p>Merci pour votre achat. Un email de confirmation vous a été envoyé.</p>
    </div>

    <a href="{{ route('client.commandes') }}" class="btn btn-primary mt-3">
        Voir mes commandes
    </a>
</div>
@endsection
