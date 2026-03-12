@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-content">
        <h1>Mieux comprendre son stress</h1>
        <p>
            Découvrez des outils simples et efficaces pour identifier, gérer et réduire votre stress
            au quotidien. Prenez soin de votre bien-être mental avec CESIZen.
        </p>

        <div class="hero-actions">
            <a href="/diagnostic" class="nav-btn nav-btn-primary">Commencer un diagnostic</a>
            <a href="/pages" class="nav-btn nav-btn-light">Découvrir les ressources</a>
        </div>
    </div>
</section>

<section class="card-grid">
    <article class="card">
        <div class="card-icon">◎</div>
        <h3>Comprendre le stress</h3>
        <p>Apprenez-en plus sur les mécanismes du stress et les bonnes pratiques de prévention.</p>
        <ul>
            <li>Articles d’information</li>
            <li>Définitions essentielles</li>
        </ul>
    </article>

    <article class="card">
        <div class="card-icon">∿</div>
        <h3>Agir sur son stress</h3>
        <p>Évaluez votre situation grâce à un questionnaire simple et progressif.</p>
        <ul>
            <li>Diagnostic guidé</li>
            <li>Résultats personnalisés</li>
        </ul>
    </article>

    <article class="card">
        <div class="card-icon">♡</div>
        <h3>Suivre son évolution</h3>
        <p>Retrouvez vos diagnostics précédents dans votre espace personnel.</p>
        <ul>
            <li>Historique des résultats</li>
            <li>Accès à votre profil</li>
        </ul>
    </article>
</section>

<div class="info-banner">
    CESIZen est un outil d’information et de prévention. Il ne remplace pas un professionnel de santé.
</div>
@endsection