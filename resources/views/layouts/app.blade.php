@php
    $menuCategories = \App\Models\PageCategory::where('is_active', true)
        ->whereNull('parent_id')
        ->orderBy('sort_order')
        ->get();
@endphp

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CESIZen</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header class="site-header">
        <div class="container header-inner">
            <a href="/" class="brand">
                <img src="{{ asset('images/logo-cesizen.png') }}" alt="Logo CESIZen" class="brand-logo">
                <div class="brand-text">
                    <span class="brand-title">CESIZen</span>
                    <span class="brand-subtitle">L’application de votre santé mentale</span>
                </div>
            </a>

            <nav class="main-nav">
                <a href="/">Accueil</a>
                <a href="/pages">Ressources</a>

                @foreach($menuCategories as $menuCategory)
                    <a href="/pages/category/{{ $menuCategory->slug }}">{{ $menuCategory->name }}</a>
                @endforeach

                <a href="/diagnostic">Diagnostic</a>
            </nav>

            <div class="header-actions">
                @auth
                    <a href="/profile" class="nav-btn nav-btn-light">Mon compte</a>

                    <form method="POST" action="/logout" style="display:inline;">
                        @csrf
                        <button type="submit" class="nav-btn nav-btn-primary">Déconnexion</button>
                    </form>
                @else
                    <a href="/login" class="nav-btn nav-btn-light">Connexion</a>
                    <a href="/register" class="nav-btn nav-btn-primary">Inscription</a>
                @endauth
            </div>
        </div>
    </header>

    @auth
        @if(auth()->user()->role === 'admin')
            <section class="admin-bar-wrapper">
                <div class="container">
                    <div class="admin-bar">
                        <div class="admin-bar-title">Administration</div>
                        <div class="admin-bar-links">
                            <a href="/admin/pages">Pages</a>
                            <a href="/admin/page-categories">Rubriques</a>
                            <a href="/admin/users">Utilisateurs</a>
                            <a href="/admin/diagnostic/questions">Questions diagnostic</a>
                            <a href="/admin/diagnostic/results">Résultats diagnostic</a>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <main class="site-main">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <a href="#">Mentions légales</a>
            <a href="#">Données personnelles</a>
            <a href="#">Contact</a>
        </div>
    </footer>

    <script>
        // Confirmation si on quitte un formulaire modifié
        document.querySelectorAll('form[data-confirm-leave="true"]').forEach(form => {
            let formChanged = false;

            form.querySelectorAll('input, textarea, select').forEach(el => {
                el.addEventListener('change', () => formChanged = true);
                el.addEventListener('input', () => formChanged = true);
            });

            form.addEventListener('submit', () => {
                formChanged = false;
            });

            window.addEventListener('beforeunload', function (e) {
                if (formChanged) {
                    e.preventDefault();
                    e.returnValue = '';
                }
            });
        });

        // Empêche le double submit
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function () {
                const submitButtons = form.querySelectorAll('button[type="submit"]');
                submitButtons.forEach(btn => {
                    btn.disabled = true;

                    if (!btn.dataset.originalText) {
                        btn.dataset.originalText = btn.textContent;
                    }

                    btn.textContent = 'Envoi...';
                });
            });
        });
    </script>
</body>
</html>