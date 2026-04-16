<?php

namespace App\Services;

class DiagnosticScoringService
{
    /**
     * 
     *
     * @param array<int> $answers
     */
    public function calculateTotalScore(array $answers): int
    {
        return array_sum($answers);
    }
}