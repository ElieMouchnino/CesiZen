<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosticAnswer extends Model
{
    protected $fillable = [
        'diagnostic_submission_id',
        'diagnostic_question_id',
        'points',
    ];
}