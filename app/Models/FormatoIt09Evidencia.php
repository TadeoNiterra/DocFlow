<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormatoIt09Evidencia extends Model
{
    protected $table = 'fmt_it_09_evidencias';

    protected $fillable = [
        'fmt_it_09_riesgo_id',
        'ruta_archivo',
        'nombre_archivo',
    ];

    public function riesgo(): BelongsTo
    {
        return $this->belongsTo(FormatoIt09Riesgo::class, 'fmt_it_09_riesgo_id');
    }
}