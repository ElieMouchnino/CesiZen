@extends('layouts.app')

@section('content')
<div class="admin-form-shell">
    <div class="admin-form-card">
        <h2>Modifier une rubrique</h2>
        <p class="form-intro">Mettez à jour la hiérarchie, l’ordre et l’état de cette rubrique.</p>

        @if($errors->any())
            <div class="alert" style="background:#fff4f2; border-color:#f2c3bc; color:#9f3c2f;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/admin/page-categories/{{ $category->id }}" data-confirm-leave="true">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" value="{{ old('name', $category->name) }}">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input id="slug" type="text" name="slug" value="{{ old('slug', $category->slug) }}">
            </div>

            <div class="form-group">
                <label for="parent_id">Rubrique parente</label>
                <select id="parent_id" name="parent_id">
                    <option value="">Aucune</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                            {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="sort_order">Ordre</label>
                <input id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', $category->sort_order) }}">
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_active" {{ $category->is_active ? 'checked' : '' }}>
                    Rubrique active
                </label>
            </div>

            <div class="admin-actions">
                <button type="submit" class="nav-btn nav-btn-primary">Enregistrer</button>
                <a href="/admin/page-categories" class="nav-btn nav-btn-light">Retour</a>
            </div>
        </form>
    </div>
</div>

<script>
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    if (nameInput && slugInput) {
        nameInput.addEventListener('input', () => {
            if (!slugInput.dataset.modified) {
                slugInput.value = nameInput.value
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