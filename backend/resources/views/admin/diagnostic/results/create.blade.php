@extends('layouts.app')

@section('content')
<div class="admin-form-shell">
    <div class="admin-form-card">
        <h2>Créer une règle de résultat</h2>
        <p class="form-intro">Définissez l’interprétation associée à une plage de score.</p>

        @if($errors->any())
            <div class="alert" style="background:#fff4f2; border-color:#f2c3bc; color:#9f3c2f;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/admin/diagnostic/results">
            @csrf

            <div class="form-group">
                <label for="min_score">Score minimum</label>
                <input id="min_score" type="number" name="min_score" value="{{ old('min_score') }}">
            </div>

            <div class="form-group">
                <label for="max_score">Score maximum</label>
                <input id="max_score" type="number" name="max_score" value="{{ old('max_score') }}">
            </div>

            <div class="form-group">
                <label for="title">Titre</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message">{{ old('message') }}</textarea>
            </div>

            <div class="form-group">
                <label for="sort_order">Ordre</label>
                <input id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', 0) }}">
            </div>

            <div class="admin-actions">
                <button type="submit" class="nav-btn nav-btn-primary">Créer</button>
                <a href="/admin/diagnostic/results" class="nav-btn nav-btn-light">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection