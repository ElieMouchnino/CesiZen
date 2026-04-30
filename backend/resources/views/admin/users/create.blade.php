@extends('layouts.app')

@section('content')
<div class="admin-form-shell">
    <div class="admin-form-card">
        <h2>Créer un utilisateur</h2>
        <p class="form-intro">Ajoutez un compte utilisateur ou administrateur depuis l’espace d’administration.</p>

        @if($errors->any())
            <div class="alert" style="background:#fff4f2; border-color:#f2c3bc; color:#9f3c2f;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/admin/users">
            @csrf

            <div class="form-group">
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmation du mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation">
            </div>

            <div class="form-group">
                <label for="role">Rôle</label>
                <select id="role" name="role">
                    <option value="user">Utilisateur</option>
                    <option value="admin">Administrateur</option>
                </select>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_active" checked>
                    Compte actif
                </label>
            </div>

            <div class="admin-actions">
                <button type="submit" class="nav-btn nav-btn-primary">Créer</button>
                <a href="/admin/users" class="nav-btn nav-btn-light">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection