<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosticResultRule extends Model
{
    protected $fillable = [
        'min_score',
        'max_score',
        'title',
        'message',
        'sort_order',
    ];
}