@extends('layouts.app')

@section('content')
<div class="admin-form-shell">
    <div class="admin-form-card">
        <h2>Créer une page</h2>
        <p class="form-intro">Ajoutez une nouvelle page d’information.</p>

        @if($errors->any())
            <div class="alert" style="background:#fff4f2; border-color:#f2c3bc; color:#9f3c2f;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/admin/pages" data-confirm-leave="true">
            @csrf

            <div class="form-group">
                <label for="title">Titre</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input id="slug" type="text" name="slug" value="{{ old('slug') }}">
            </div>

            <div class="form-group">
                <label for="page_category_id">Rubrique</label>
                <select id="page_category_id" name="page_category_id">
                    <option value="">Aucune</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('page_category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea id="content" name="content">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_published" {{ old('is_published') ? 'checked' : '' }}>
                    Page publiée
                </label>
            </div>

            <div class="admin-actions">
                <button type="submit" class="nav-btn nav-btn-primary">Créer</button>
                <a href="/admin/pages" class="nav-btn nav-btn-light">Annuler</a>
            </div>
        </form>
    </div>
</div>

<script>
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');

    if (titleInput && slugInput) {
        titleInput.addEventListener('input', () => {
            if (!slugInput.dataset.modified) {
                slugInput.value = titleInput.value
                    .toLowerCase()
                    .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }
        });

        slugInput.addEventListener('input', () => {
            slugInput.dataset.modified = 'true';
        });
    }
</script>
@endsection