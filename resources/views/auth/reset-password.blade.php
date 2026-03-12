@extends('layouts.app')

@section('content')
<h2>Réinitialiser le mot de passe</h2>

@if($errors->any())
    <ul style="color: red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/reset-password">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <p>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
    </p>

    <p>
        <label>Nouveau mot de passe</label><br>
        <input type="password" name="password">
    </p>

    <p>
        <label>Confirmation du mot de passe</label><br>
        <input type="password" name="password_confirmation">
    </p>

    <button type="submit">Réinitialiser le mot de passe</button>
</form>
@endsection