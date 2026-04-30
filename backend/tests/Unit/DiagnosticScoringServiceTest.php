<?php

namespace Tests\Unit;

use App\Services\DiagnosticScoringService;
use PHPUnit\Framework\TestCase;

class DiagnosticScoringServiceTest extends TestCase
{
    public function test_it_calculates_total_score_correctly(): void
    {
        $service = new DiagnosticScoringService();

        $score = $service->calculateTotalScore([1, 2, 3]);

        $this->assertEquals(6, $score);
    }

    public function test_it_returns_zero_for_empty_answers(): void
    {
        $service = new DiagnosticScoringService();

        $score = $service->calculateTotalScore([]);

        $this->assertEquals(0, $score);
    }

    public function test_it_handles_zero_values_correctly(): void
    {
        $service = new DiagnosticScoringService();

        $score = $service->calculateTotalScore([0, 0, 0]);

        $this->assertEquals(0, $score);
    }
}