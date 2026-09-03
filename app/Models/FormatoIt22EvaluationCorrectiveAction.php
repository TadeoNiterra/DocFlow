<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormatoIt22EvaluationCorrectiveAction extends Model
{
    protected $table = 'formato_it22_evaluation_corrective_actions';
    protected $guarded = [];

    protected $casts = [
        'start_date' => 'date',
        'close_date' => 'date',
    ];

    public function evaluation(): BelongsTo
    {
        return $this->belongsTo(FormatoIt22Evaluation::class, 'formato_it22_evaluation_id');
    }
}