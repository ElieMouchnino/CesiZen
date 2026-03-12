@extends('layouts.app')

@section('content')
<div class="admin-form-shell">
    <div class="admin-form-card">
        <h2>Créer une question</h2>
        <p class="form-intro">Ajoutez une nouvelle question au questionnaire de stress.</p>

        @if($errors->any())
            <div class="alert" style="background:#fff4f2; border-color:#f2c3bc; color:#9f3c2f;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/admin/diagnostic/questions">
            @csrf

            <div class="form-group">
                <label for="label">Question</label>
                <input id="label" type="text" name="label" value="{{ old('label') }}">
            </div>

            <div class="form-group">
                <label for="sort_order">Ordre</label>
                <input id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', 0) }}">
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_active" checked>
                    Question active
                </label>
            </div>

            <div class="admin-actions">
                <button type="submit" class="nav-btn nav-btn-primary">Créer</button>
                <a href="/admin/diagnostic/questions" class="nav-btn nav-btn-light">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection