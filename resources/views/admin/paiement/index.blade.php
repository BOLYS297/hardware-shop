@extends('layouts.app')

@section('title', 'Changer le mot de passe')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Changer le mot de passe</h2>

    <form method="POST" action="{{ route('client.parametres.updatePassword') }}" class="card p-4 shadow-sm">
        @csrf
        <div class="mb-3">
            <label>Mot de passe actuel</label>
            <input type="password" name="current_password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nouveau mot de passe</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Confirmer le nouveau mot de passe</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>

        <button class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
