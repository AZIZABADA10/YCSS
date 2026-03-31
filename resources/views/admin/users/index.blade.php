@extends('layouts.admin')

@section('title', 'Gestion des Utilisateurs')

@push('styles')
<style>
    /* Specific styles for User index table matching the design */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }

    .page-title {
        font-size: 24px;
        color: var(--text-dark);
        font-weight: 500;
        margin-bottom: 4px;
    }

    .page-subtitle {
        color: var(--text-gray);
        font-size: 14px;
    }

    /* Filter Bar inside the card */
    .filter-bar {
        display: flex;
        gap: 16px;
        margin-bottom: 24px;
        background-color: var(--bg-color);
        padding: 8px;
        border-radius: 8px;
    }

    .search-input {
        flex-grow: 1;
        padding: 10px 16px;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        background-color: white;
        font-size: 14px;
        outline: none;
    }

    .search-input:focus { border-color: var(--primary-blue); }

    .filter-select {
        padding: 10px 16px;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        background-color: white;
        font-size: 14px;
        color: var(--text-dark);
        min-width: 200px;
        outline: none;
    }

    .list-header {
        margin-bottom: 16px;
        font-size: 14px;
        font-weight: 600;
        color: var(--text-dark);
    }

    /* Table styles */
    .users-table {
        width: 100%;
        border-collapse: collapse;
    }

    .users-table th {
        text-align: left;
        padding: 12px 16px;
        font-size: 12px;
        color: var(--text-gray);
        font-weight: 500;
        border-bottom: 1px solid var(--border-color);
    }

    .users-table td {
        padding: 16px;
        font-size: 14px;
        color: var(--text-dark);
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }

    /* Badges */
    .badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
        text-align: center;
    }

    .badge-student { background-color: #d1fae5; color: #047857; }
    .badge-trainer { background-color: #dbeafe; color: #1d4ed8; }
    .badge-assistant { background-color: #e0e7ff; color: #4338ca; }
    .badge-admin { background-color: #fef3c7; color: #d97706; }
    .badge-restau { background-color: #ffedd5; color: #c2410c; }
    
    .badge-active { background-color: #d1fae5; color: #047857; }
    .badge-inactive { background-color: #f3f4f6; color: #4b5563; }

    /* Action buttons */
    .action-icons { display: flex; gap: 12px; }
    .action-icons a, .action-icons button {
        background: none;
        border: none;
        color: var(--text-gray);
        font-size: 16px;
        cursor: pointer;
        transition: color 0.2s;
    }
    .action-icons a:hover { color: var(--primary-blue); }
    .action-icons button:hover { color: #dc2626; }

    /* Pagination container */
    .pagination-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 24px;
        font-size: 14px;
        color: var(--text-gray);
    }
    .pagination-wrapper .pagination { display: flex; list-style: none; gap: 8px; }
    .pagination-wrapper .page-item a, .pagination-wrapper .page-item span {
        padding: 6px 12px;
        border: 1px solid var(--border-color);
        border-radius: 4px;
        color: var(--text-dark);
        text-decoration: none;
    }
    .pagination-wrapper .page-item.active span {
        background-color: var(--primary-blue);
        color: white;
        border-color: var(--primary-blue);
    }

    /* Success alert */
    .alert-success { background: #d1fae5; color: #065f46; padding: 12px; border-radius: 6px; margin-bottom: 20px; }
    .alert-error { background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 6px; margin-bottom: 20px; }

</style>
@endpush

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Gestion des Utilisateurs</h1>
            <p class="page-subtitle">Gérer tous les utilisateurs du système</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn-primary">
            + Créer un utilisateur
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif
    
    @if(session('error'))
        <div class="alert-error">{{ session('error') }}</div>
    @endif

    <div class="card">
        <!-- Search and Filter Form -->
        <form method="GET" action="{{ route('admin.users.index') }}" class="filter-bar">
            <input type="text" name="search" value="{{ request('search') }}" class="search-input" placeholder="Rechercher par nom ou email...">
            <select name="role" class="filter-select" onchange="this.form.submit()">
                <option value="Tous">Tous les rôles</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ request('role') == $role->id ? 'selected' : '' }}>
                        {{ $role->titre }}
                    </option>
                @endforeach
            </select>
        </form>

        <div class="list-header">Liste des utilisateurs ({{ $users->total() ?? 0 }})</div>

        <table class="users-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Statut</th>
                    <th>Date de création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td style="font-weight: 500;">{{ $user->nom_complet }}</td>
                        <td style="color: var(--text-gray);">{{ $user->email }}</td>
                        <td>
                            @php
                                $badgeClass = 'badge-gray';
                                $titre = $user->role->titre ?? 'Inconnu';
                                if($titre === 'Apprenant') $badgeClass = 'badge-student';
                                elseif($titre === 'Formateur') $badgeClass = 'badge-trainer';
                                elseif($titre === 'Assistante de direction') $badgeClass = 'badge-assistant';
                                elseif($titre === 'Administrateur') $badgeClass = 'badge-admin';
                                elseif($titre === 'Responsable Restauration') $badgeClass = 'badge-restau';
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ $titre }}</span>
                        </td>
                        <td>
                            @if($user->statut)
                                <span class="badge badge-active">Actif</span>
                            @else
                                <span class="badge badge-inactive">Inactif</span>
                            @endif
                        </td>
                        <td style="color: var(--text-gray);">{{ $user->created_at ? $user->created_at->format('Y-m-d') : '-' }}</td>
                        <td>
                            <div class="action-icons">
                                <a href="#" title="Voir"><i class="fa-regular fa-eye"></i></a>
                                <a href="{{ route('admin.users.edit', $user->id) }}" title="Modifier"><i class="fa-regular fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Supprimer"><i class="fa-regular fa-trash-can" style="color:#ef4444;"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: var(--text-gray); padding: 40px;">Aucun utilisateur trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            <div>
                Affichage {{ $users->firstItem() ?? 0 }} à {{ $users->lastItem() ?? 0 }} sur {{ $users->total() ?? 0 }} résultats
            </div>
            <div>
                {{ $users->links('pagination::bootstrap-4') }} 
                <!-- Vous pouvez spécifier custom vue pour la pagination si nécessaire -->
            </div>
        </div>
    </div>

@endsection
