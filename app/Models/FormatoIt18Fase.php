<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormatoIt18Fase extends Model
{
    protected $table = 'fmt_it_18_fases';

    protected $fillable = [
        'fmt_it_18_plan_id',
        'fase_nombre',
        'tipo_metrico',
        'tiempo_horas',
        'acciones',
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(FormatoIt18Plan::class, 'fmt_it_18_plan_id');
    }
}