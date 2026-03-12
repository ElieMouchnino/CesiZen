@extends('layouts.app')

@section('content')
<div class="admin-form-shell">
    <div class="admin-form-card">
        <h2>Modifier un utilisateur</h2>
        <p class="form-intro">Mettez à jour les informations, le rôle et l’état du compte.</p>

        @if($errors->any())
            <div class="alert" style="background:#fff4f2; border-color:#f2c3bc; color:#9f3c2f;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/admin/users/{{ $user->id }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}">
            </div>

            <div class="form-group">
                <label for="role">Rôle</label>
                <select id="role" name="role">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Utilisateur</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrateur</option>
                </select>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_active" {{ $user->is_active ? 'checked' : '' }}>
                    Compte actif
                </label>
            </div>

            <div class="admin-actions">
                <button type="submit" class="nav-btn nav-btn-primary">Enregistrer</button>
                <a href="/admin/users" class="nav-btn nav-btn-light">Retour</a>
            </div>
        </form>
    </div>
</div>
@endsection