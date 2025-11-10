@extends('layouts.admin')

@section('title', 'Paramètres de l’Admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Paramètres de l’administrateur</h2>

    <div class="list-group">
        <a href="{{ route('admin.parametres.profil') }}" class="list-group-item list-group-item-action">👤 Mon profil</a>
        <a href="{{ route('admin.parametres.mdp') }}" class="list-group-item list-group-item-action">🔐 Changer le mot de passe</a>
        <a href="{{ route('admin.parametres.systeme') }}" class="list-group-item list-group-item-action">⚙️ Paramètres du système</a>
    </div>
</div>
@endsection
