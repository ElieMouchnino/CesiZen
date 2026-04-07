@extends('layouts.app')

@section('content')
<h2>Mot de passe oublié</h2>

@if(session('status'))
    <p style="color: green">{{ session('status') }}</p>
@endif

@if($errors->any())
    <ul style="color: red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <p>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </p>

    <button type="submit">Envoyer le lien de réinitialisation</button>
</form>

<p>
    <a href="/login">Retour à la connexion</a>
</p>
@endsection