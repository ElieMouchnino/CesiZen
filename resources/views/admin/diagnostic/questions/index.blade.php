@extends('layouts.app')

@section('content')
<div class="admin-shell">
    <div class="admin-header">
        <div>
            <h2>Questions du diagnostic</h2>
            <p>Gérez les questions affichées dans le questionnaire de stress.</p>
        </div>

        <div class="admin-toolbar">
            <a href="/admin/diagnostic/questions/create" class="nav-btn nav-btn-primary">+ Ajouter une question</a>
        </div>
    </div>

    <div class="admin-table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ordre</th>
                    <th>Question</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($questions as $question)
                    <tr>
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->sort_order }}</td>
                        <td>{{ $question->label }}</td>
                        <td>
                            @if($question->is_active)
                                <span class="admin-badge admin-badge-success">Active</span>
                            @else
                                <span class="admin-badge admin-badge-muted">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="table-link-group">
                                <a href="/admin/diagnostic/questions/{{ $question->id }}/edit" class="nav-btn nav-btn-light">Modifier</a>

                                <form method="POST" action="/admin/diagnostic/questions/{{ $question->id }}" class="inline-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-danger-btn" onclick="return confirm('Supprimer cette question ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Aucune question trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection