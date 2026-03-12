@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>{{ $page->title }}</h2>
</div>

<div class="content-card">

    {!! nl2br(e($page->content)) !!}

</div>

<div class="actions-row">
    <a href="/pages" class="nav-btn nav-btn-light">
        ← Retour aux ressources
    </a>
</div>

@endsection