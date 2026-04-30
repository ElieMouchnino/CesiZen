<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosticSubmission extends Model
{
    protected $fillable = [
        'user_id',
        'total_score',
    ];
}