@extends('layouts.app')

@section('title', 'Paramètres du compte')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Paramètres du compte</h2>

    <div class="list-group">
        <a href="{{ route('client.parametres.profil') }}" class="list-group-item list-group-item-action">👤 Informations personnelles</a>
        <a href="{{ route('client.parametres.password') }}" class="list-group-item list-group-item-action">🔐 Changer le mot de passe</a>
        <a href="{{ route('client.parametres.notifications') }}" class="list-group-item list-group-item-action">📩 Préférences de notification</a>
    </div>
</div>
@endsection
