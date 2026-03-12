@extends('layouts.app')

@section('content')
<div class="admin-shell">
    <div class="admin-header">
        <div>
            <h2>Administration des utilisateurs</h2>
            <p>Gérez les comptes, rôles et états d’activation des utilisateurs.</p>
        </div>

        <div class="admin-toolbar">
            <a href="/admin/users/create" class="nav-btn nav-btn-primary">+ Ajouter un utilisateur</a>
        </div>
    </div>

    <div class="admin-table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role === 'admin')
                                <span class="admin-badge admin-badge-warning">Administrateur</span>
                            @else
                                <span class="admin-badge admin-badge-muted">Utilisateur</span>
                            @endif
                        </td>
                        <td>
                            @if($user->is_active)
                                <span class="admin-badge admin-badge-success">Actif</span>
                            @else
                                <span class="admin-badge admin-badge-muted">Désactivé</span>
                            @endif
                        </td>
                        <td>
                            <div class="table-link-group">
                                <a href="/admin/users/{{ $user->id }}/edit" class="nav-btn nav-btn-light">Modifier</a>

                                @if(auth()->id() !== $user->id)
                                    <form method="POST" action="/admin/users/{{ $user->id }}" class="inline-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-danger-btn" onclick="return confirm('Supprimer cet utilisateur ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Aucun utilisateur trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection