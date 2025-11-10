<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Hardware Shop</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }
        .register-container {
            max-width: 500px;
            margin: 80px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 40px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0069d9;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 .2rem rgba(0,123,255,.25);
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h3 class="text-center mb-4">Créer un compte</h3>

        {{-- Message d’erreur global --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erreur !</strong> Veuillez corriger les champs ci-dessous :
                <ul class="mt-2 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulaire d’inscription --}}
        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input id="nom" type="text" name="nom" class="form-control" value="{{ old('nom') }}" required autofocus>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input id="prenom" type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input id="telephone" type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input id="password" type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
            </div>

            {{-- Rôle (facultatif côté front si tu veux le forcer à "Client") --}}
            {{-- <div class="mb-3">
                <label for="role" class="form-label">Type de compte</label>
                <select id="role" name="role" class="form-select" >
                    <option value="">-- Sélectionnez un rôle --</option>
                    <option value="Client" {{ old('role') == 'Client' ? 'selected' : '' }}>Client</option>
                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div> --}}

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <small>Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a></small>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
