<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormatoIt22Evaluation extends Model
{
    protected $table = 'formato_it22_evaluations';
    protected $guarded = [];

    protected $casts = [
        'evaluation_date' => 'date',
        'remediation_deadline' => 'date',
        'bg_has_certifications' => 'boolean',
        'bg_has_support_channels' => 'boolean',
        'bg_has_247_support' => 'boolean',
        'requires_remediation' => 'boolean',
    ];

    public function correctiveActions(): HasMany
    {
        return $this->hasMany(FormatoIt22EvaluationCorrectiveAction::class, 'formato_it22_evaluation_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function proveedor(): BelongsTo
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}