@extends('layouts.admin')

@section('title', 'Gestion des livraisons')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Livraisons</h2>

    <table class="table table-hover shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Commande</th>
                <th>Client</th>
                <th>Adresse</th>
                <th>Statut</th>
                <th>Date prévue</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($livraisons as $livraison)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>#{{ $livraison->commande_id }}</td>
                <td>{{ $livraison->commande->user->name }}</td>
                <td>{{ $livraison->adresse->ville }}, {{ $livraison->adresse->quartier }}</td>
                <td>
                    <span class="badge bg-{{ $livraison->statut == 'livrée' ? 'success' : 'warning' }}">
                        {{ ucfirst($livraison->statut) }}
                    </span>
                </td>
                <td>{{ $livraison->date_prevue ?? '—' }}</td>
                <td>
                    <a href="{{ route('admin.livraison.edit', $livraison->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted">Aucune livraison trouvée.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

{{-- Compare this snippet from resources/views/client/profil.blade.php:@extends('layouts.app') --}}
