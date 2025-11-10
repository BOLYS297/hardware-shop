<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentification | Hardware Shop')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #007bff, #6610f2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .auth-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
            padding: 25px 30px;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .auth-header h3 {
            font-weight: bold;
            color: #343a40;
        }

        .auth-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }
    </style>
</head>
<body>

    <div class="auth-card">
        <div class="auth-header">
            <h3><i class="fa-solid fa-computer"></i> Hardware Shop</h3>
            <p class="text-muted">@yield('subtitle')</p>
        </div>

        {{-- Contenu principal --}}
        @yield('content')

        {{-- Liens bas de page --}}
        <div class="auth-footer">
            @yield('footer')
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
