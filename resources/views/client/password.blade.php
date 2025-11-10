@extends('layouts.app')

@section('title', 'Changer le mot de passe')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center fw-bold">🔒 Changer le mot de passe</h1>

    {{-- Messages de succès --}}
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    {{-- Messages d'erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('client.compte.password.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="current_password" class="form-label">Mot de passe actuel</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('client.compte.dashboard') }}" class="btn btn-outline-secondary">← Retour</a>
            <button type="submit" class="btn btn-success">💾 Mettre à jour</button>
        </div>
    </form>
</div>
@endsection
