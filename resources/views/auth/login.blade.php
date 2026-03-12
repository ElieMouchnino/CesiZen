@extends('layouts.app')

@section('content')
<h2>Connexion</h2>

@if($errors->any())
  <ul style="color:red">
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form method="POST" action="/login">
  @csrf

  <p>
    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email') }}">
  </p>

  <p>
    <label>Mot de passe</label><br>
    <input type="password" name="password">
  </p>

  <button type="submit">Se connecter</button>

</form>

<p>
  <a href="/forgot-password">Mot de passe oublié ?</a>
</p>
@endsection