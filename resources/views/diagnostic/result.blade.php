@extends('layouts.app')

@section('content')
<div class="result-card">
    <div class="page-header">
        <h2>Résultat du diagnostic</h2>
        <p>Voici une interprétation de votre niveau de stress à partir de vos réponses.</p>
    </div>

    <div class="result-score">
        Score total : {{ $submission->total_score }}
    </div>

    @if($rule)
        <h3 class="result-title">{{ $rule->title }}</h3>

        <div class="result-box">
            Ce résultat est indicatif. Il peut vous aider à prendre du recul sur votre état actuel.
        </div>

        <p class="result-text">{{ $rule->message }}</p>
    @else
        <h3 class="result-title">Résultat indisponible</h3>
        <p class="result-text">Aucune règle de résultat ne correspond actuellement à ce score.</p>
    @endif

    <div class="result-actions">
        <a href="/diagnostic" class="nav-btn nav-btn-primary">Refaire le diagnostic</a>
        <a href="/profile" class="nav-btn nav-btn-light">Voir mon profil</a>
    </div>
</div>
@endsection