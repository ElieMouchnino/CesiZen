@extends('layouts.app')

@section('content')
<h2>Inscription</h2>

@if($errors->any())
  <ul style="color:red">
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form method="POST" action="/register">
  @csrf

  <p>
    <label>Nom</label><br>
    <input type="text" name="name" value="{{ old('name') }}">
  </p>

  <p>
    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email') }}">
  </p>

  <p>
    <label>Mot de passe</label><br>
    <input type="password" name="password">
  </p>

  <p>
    <label>Confirmation mot de passe</label><br>
    <input type="password" name="password_confirmation">
  </p>

  <button type="submit">Créer mon compte</button>
</form>

<p style="margin-top:12px;">
  Déjà un compte ? <a href="/login">Se connecter</a>
</p>
@endsection