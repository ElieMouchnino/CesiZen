@extends('layouts.app')

@section('content')
<div class="admin-form-shell">
    <div class="admin-form-card">
        <h2>Modifier une question</h2>
        <p class="form-intro">Mettez à jour le texte, l’ordre et l’état de cette question.</p>

        @if($errors->any())
            <div class="alert" style="background:#fff4f2; border-color:#f2c3bc; color:#9f3c2f;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/admin/diagnostic/questions/{{ $question->id }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="label">Question</label>
                <input id="label" type="text" name="label" value="{{ old('label', $question->label) }}">
            </div>

            <div class="form-group">
                <label for="sort_order">Ordre</label>
                <input id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', $question->sort_order) }}">
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_active" {{ $question->is_active ? 'checked' : '' }}>
                    Question active
                </label>
            </div>

            <div class="admin-actions">
                <button type="submit" class="nav-btn nav-btn-primary">Enregistrer</button>
                <a href="/admin/diagnostic/questions" class="nav-btn nav-btn-light">Retour</a>
            </div>
        </form>
    </div>
</div>
@endsection