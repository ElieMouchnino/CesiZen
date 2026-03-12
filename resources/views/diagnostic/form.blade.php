@extends('layouts.app')

@section('content')
<div class="diagnostic-shell">

    <div class="diagnostic-intro">
        <h2>Questionnaire de stress</h2>
        <p>
            Répondez aux questions suivantes pour obtenir une première estimation de votre niveau de stress.
            Ce diagnostic a une visée informative et préventive.
        </p>
    </div>

    @if($errors->any())
        <div class="alert" style="background:#fff4f2; border-color:#f2c3bc; color:#9f3c2f;">
            <ul style="margin:0; padding-left:18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/diagnostic" id="diagnosticForm">
        @csrf

        <div class="progress-meta">
            <span id="progressText">Question 1 / {{ count($questions) }}</span>
            <span id="progressStepLabel">Étape en cours</span>
        </div>

        <div class="progress-track">
            <div id="progressBar" class="progress-bar"></div>
        </div>

        <div id="progressPercent" class="progress-percent">0% complété</div>

        @foreach($questions as $index => $question)
            <div class="question-step" data-step="{{ $index }}">
                <h3 class="question-label">{{ $question->label }}</h3>

                <div class="answer-list">
                    <div class="answer-option">
                        <label>
                            <input type="radio" name="question_{{ $question->id }}" value="0" {{ old('question_'.$question->id) == '0' ? 'checked' : '' }}>
                            <span>Jamais</span>
                        </label>
                    </div>

                    <div class="answer-option">
                        <label>
                            <input type="radio" name="question_{{ $question->id }}" value="1" {{ old('question_'.$question->id) == '1' ? 'checked' : '' }}>
                            <span>Parfois</span>
                        </label>
                    </div>

                    <div class="answer-option">
                        <label>
                            <input type="radio" name="question_{{ $question->id }}" value="2" {{ old('question_'.$question->id) == '2' ? 'checked' : '' }}>
                            <span>Souvent</span>
                        </label>
                    </div>

                    <div class="answer-option">
                        <label>
                            <input type="radio" name="question_{{ $question->id }}" value="3" {{ old('question_'.$question->id) == '3' ? 'checked' : '' }}>
                            <span>Toujours</span>
                        </label>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="diagnostic-actions">
            <div class="diagnostic-actions-left">
                <button type="button" id="prevBtn" class="nav-btn nav-btn-light">← Précédent</button>
            </div>

            <div class="diagnostic-actions-right">
                <button type="button" id="nextBtn" class="nav-btn nav-btn-primary">Suivant →</button>
                <button type="submit" id="submitBtn" class="nav-btn nav-btn-primary" style="display:none;">Voir le résultat</button>
            </div>
        </div>
    </form>
</div>

<script>
    const steps = document.querySelectorAll('.question-step');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    const progressText = document.getElementById('progressText');
    const progressStepLabel = document.getElementById('progressStepLabel');
    const progressBar = document.getElementById('progressBar');
    const progressPercent = document.getElementById('progressPercent');

    let currentStep = 0;
    const totalSteps = steps.length;

    function countAnswered() {
        let count = 0;

        steps.forEach(step => {
            const radios = step.querySelectorAll('input[type="radio"]');
            const checked = Array.from(radios).some(radio => radio.checked);
            if (checked) count++;
        });

        return count;
    }

    function currentQuestionAnswered() {
        const radios = steps[currentStep].querySelectorAll('input[type="radio"]');
        return Array.from(radios).some(radio => radio.checked);
    }

    function updateStep() {
        steps.forEach((step, index) => {
            step.classList.toggle('active', index === currentStep);
        });

        progressText.textContent = `Question ${currentStep + 1} / ${totalSteps}`;
        progressStepLabel.textContent = currentStep === totalSteps - 1 ? 'Dernière étape' : 'Étape en cours';

        const answeredCount = countAnswered();
        const percent = Math.round((answeredCount / totalSteps) * 100);

        progressBar.style.width = percent + '%';
        progressPercent.textContent = percent + '% complété';

        prevBtn.style.display = currentStep === 0 ? 'none' : 'inline-flex';

        if (currentStep === totalSteps - 1) {
            nextBtn.style.display = 'none';
            submitBtn.style.display = 'inline-flex';
        } else {
            nextBtn.style.display = 'inline-flex';
            submitBtn.style.display = 'none';
        }
    }

    nextBtn.addEventListener('click', () => {
        if (!currentQuestionAnswered()) {
            alert('Veuillez répondre à cette question avant de continuer.');
            return;
        }

        if (currentStep < totalSteps - 1) {
            currentStep++;
            updateStep();
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentStep > 0) {
            currentStep--;
            updateStep();
        }
    });

    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', updateStep);
    });

    updateStep();
</script>
@endsection