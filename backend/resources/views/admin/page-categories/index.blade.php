@extends('layouts.app')

@section('content')
<div class="admin-shell">
    <div class="admin-header">
        <div>
            <h2>Administration des rubriques</h2>
            <p>Organisez les contenus d’information en catégories et sous-catégories.</p>
        </div>

        <div class="admin-toolbar">
            <a href="/admin/page-categories/create" class="nav-btn nav-btn-primary">+ Ajouter une rubrique</a>
        </div>
    </div>

    <div class="admin-table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Ordre</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->parent?->name ?? 'Aucune' }}</td>
                        <td>{{ $category->sort_order }}</td>
                        <td>
                            @if($category->is_active)
                                <span class="admin-badge admin-badge-success">Active</span>
                            @else
                                <span class="admin-badge admin-badge-muted">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="table-link-group">
                                <a href="/admin/page-categories/{{ $category->id }}/edit" class="nav-btn nav-btn-light">Modifier</a>

                                <form method="POST" action="/admin/page-categories/{{ $category->id }}" class="inline-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-danger-btn" onclick="return confirm('Supprimer cette rubrique ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Aucune rubrique trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection