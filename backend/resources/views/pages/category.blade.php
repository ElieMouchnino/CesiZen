@php use Illuminate\Support\Str; @endphp

@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>Rubrique : {{ $category->name }}</h2>
    <p>Articles et ressources liés à cette thématique.</p>
</div>

@if($pages->isEmpty())

<p class="text-muted">Aucun article dans cette rubrique.</p>

@else

<div class="card-grid">

@foreach($pages as $page)

<div class="card">

    <div class="card-icon">📗</div>

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

<div class="actions-row">
    <a href="/pages" class="nav-btn nav-btn-light">
        ← Retour aux ressources
    </a>
</div>

@endsection