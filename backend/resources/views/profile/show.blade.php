@extends('layouts.app')

@section('content')
<div class="profile-shell">
    <div class="page-header">
        <h2>Mon compte</h2>
        <p>Gérez vos informations personnelles et consultez l’historique de vos diagnostics.</p>
    </div>

    <div class="profile-grid">
        <section class="profile-card">
            <h3>Informations personnelles</h3>

            <div class="profile-meta">
                <div class="profile-meta-item">
                    <span class="profile-meta-label">Nom actuel</span>
                    <span class="profile-meta-value">{{ $user->name }}</span>
                </div>

                <div class="profile-meta-item">
                    <span class="profile-meta-label">Email actuel</span>
                    <span class="profile-meta-value">{{ $user->email }}</span>
                </div>

                <div class="profile-meta-item">
                    <span class="profile-meta-label">Rôle</span>
                    <span class="profile-meta-value">
                        {{ $user->role === 'admin' ? 'Administrateur' : 'Utilisateur' }}
                    </span>
                </div>
            </div>

            <hr style="margin: 22px 0; border: none; border-top: 1px solid var(--cz-border);">

            <h3>Modifier mes informations</h3>

            @if($errors->any())
                <div class="alert" style="background:#fff4f2; border-color:#f2c3bc; color:#9f3c2f;">
                    <ul style="margin:0; padding-left:18px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/profile" class="form-card" style="box-shadow:none; border:none; padding:0; max-width:none;" data-confirm-leave="true">
                @csrf

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}">
                </div>

                <div class="form-inline-actions">
                    <button type="submit" class="nav-btn nav-btn-primary">Enregistrer</button>
                </div>
            </form>
        </section>

        <section>
            @if($chartScores->count() > 0)
                <section class="profile-chart-card">
                    <h3>Évolution de mon stress</h3>
                    <p class="text-muted mb-2">Visualisez l’évolution de vos scores au fil du temps.</p>

                    <div class="chart-wrapper">
                        <canvas id="stressChart"></canvas>
                    </div>
                </section>
            @endif

            <section class="profile-card">
                <div class="history-head">
                    <div>
                        <h3 style="margin-bottom:6px;">Historique des diagnostics</h3>
                        <p class="text-muted mb-0">Retrouvez vos derniers résultats et leur niveau de stress associé.</p>
                    </div>
                    <a href="/diagnostic" class="nav-btn nav-btn-light">Nouveau diagnostic</a>
                </div>

                @if($submissions->isEmpty())
                    <div class="history-empty">
                        Aucun diagnostic effectué pour le moment.
                    </div>
                @else
                    <div class="table-card" style="padding: 0; box-shadow:none; border:none; background:transparent;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Score</th>
                                    <th>Niveau</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($submissions as $submission)
                                    @php
                                        $level = strtolower($submission->stress_level);
                                        $badgeClass = 'badge-medium';

                                        if (str_contains($level, 'faible')) {
                                            $badgeClass = 'badge-low';
                                        } elseif (str_contains($level, 'élev')) {
                                            $badgeClass = 'badge-high';
                                        }
                                    @endphp

                                    <tr>
                                        <td>{{ $submission->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $submission->total_score }}</td>
                                        <td>
                                            <span class="badge-level {{ $badgeClass }}">
                                                {{ $submission->stress_level }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="/diagnostic/result/{{ $submission->id }}" class="nav-btn nav-btn-light">
                                                Voir
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </section>
        </section>
    </div>
</div>

@if($chartScores->count() > 0)
<script>
    const ctx = document.getElementById('stressChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Score de stress',
                data: @json($chartScores),
                borderWidth: 3,
                tension: 0.3,
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
@endif
@endsection