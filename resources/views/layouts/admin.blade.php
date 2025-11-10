<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: #212529;
            color: #fff;
        }
        .sidebar a {
            color: #ddd;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }
        .sidebar a:hover {
            background: #343a40;
        }
        .content {
            margin-left: 250px;
            padding: 30px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center py-3 border-bottom border-secondary">Admin Panel</h4>
        <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Tableau de bord</a>
        <a href="{{ route('admin.produits.index') }}"><i class="fa fa-box"></i> Produits</a>
        <a href="{{ route('admin.categories.index') }}"><i class="fa fa-list"></i> Catégories</a>
        <a href="{{ route('admin.commandes.index') }}"><i class="fa fa-shopping-basket"></i> Commandes</a>
        <a href="{{ route('admin.livraisons.index') }}"><i class="fa fa-truck"></i> Livraisons</a>
        <a href="{{ route('admin.paiements.index') }}"><i class="fa fa-credit-card"></i> Paiements</a>
        <a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> Clients</a>
        {{-- <a href="{{ route('admin.parametres.index') }}"><i class="fa fa-cog"></i> Paramètres</a> --}}

        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                <i class="fa fa-sign-out-alt"></i> Déconnexion
            </button>
        </form>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
