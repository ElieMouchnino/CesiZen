@php use Illuminate\Support\Str; @endphp

@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>Ressources sur le stress</h2>
    <p>Découvrez des contenus pour mieux comprendre et gérer votre stress au quotidien.</p>
</div>

@if($pages->isEmpty())
    <p class="text-muted">Aucune ressource disponible pour le moment.</p>
@else

<div class="card-grid">
    @foreach($pages as $page)

        <div class="card">
            <div class="card-icon">📘</div>

            <h3>{{ $page->title }}</h3>

            <p class="text-muted">
                {{ Str::limit(strip_tags($page->content), 120) }}
            </p>

            <a href="/pages/{{ $page->slug }}" class="nav-btn nav-btn-primary">
                Lire l'article
            </a>
        </div>

    @endforeach
</div>

@endif

@endsection