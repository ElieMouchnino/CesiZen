@extends('layouts.app')

@section('content')
<div class="admin-shell">
    <div class="admin-header">
        <div>
            <h2>Administration des pages</h2>
            <p>Gérez les contenus d’information publiés sur l’application.</p>
        </div>

        <div class="admin-toolbar">
            <a href="/admin/pages/create" class="nav-btn nav-btn-primary">+ Ajouter une page</a>
        </div>
    </div>

    <div class="admin-table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Slug</th>
                    <th>Rubrique</th>
                    <th>Publication</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>{{ $page->category?->name ?? 'Aucune' }}</td>
                        <td>
                            @if($page->is_published)
                                <span class="admin-badge admin-badge-success">Publiée</span>
                            @else
                                <span class="admin-badge admin-badge-muted">Brouillon</span>
                            @endif
                        </td>
                        <td>
                            <div class="table-link-group">
                                <a href="/pages/{{ $page->slug }}" class="nav-btn nav-btn-light">Voir</a>
                                <a href="/admin/pages/{{ $page->id }}/edit" class="nav-btn nav-btn-light">Modifier</a>

                                <form method="POST" action="/admin/pages/{{ $page->id }}" class="inline-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-danger-btn" onclick="return confirm('Supprimer cette page ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Aucune page trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection