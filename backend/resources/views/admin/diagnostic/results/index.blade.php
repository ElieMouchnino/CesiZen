@extends('layouts.app')

@section('content')
<div class="admin-shell">
    <div class="admin-header">
        <div>
            <h2>Règles de résultat du diagnostic</h2>
            <p>Définissez les niveaux de stress affichés selon les scores obtenus.</p>
        </div>

        <div class="admin-toolbar">
            <a href="/admin/diagnostic/results/create" class="nav-btn nav-btn-primary">+ Ajouter une règle</a>
        </div>
    </div>

    <div class="admin-table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ordre</th>
                    <th>Score min</th>
                    <th>Score max</th>
                    <th>Titre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rules as $rule)
                    <tr>
                        <td>{{ $rule->id }}</td>
                        <td>{{ $rule->sort_order }}</td>
                        <td>{{ $rule->min_score }}</td>
                        <td>{{ $rule->max_score }}</td>
                        <td>{{ $rule->title }}</td>
                        <td>
                            <div class="table-link-group">
                                <a href="/admin/diagnostic/results/{{ $rule->id }}/edit" class="nav-btn nav-btn-light">Modifier</a>

                                <form method="POST" action="/admin/diagnostic/results/{{ $rule->id }}" class="inline-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-danger-btn" onclick="return confirm('Supprimer cette règle ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Aucune règle trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection