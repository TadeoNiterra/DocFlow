<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormatoIt11Fase extends Model
{
    protected $table = 'fmt_it_11_fases';

    protected $fillable = [
        'fmt_it_11_reporte_id',
        'bloque',
        'fase',
        'inicio',
        'fin',
        'descripcion',
    ];

    public function reporte(): BelongsTo
    {
        return $this->belongsTo(FormatoIt11Reporte::class, 'fmt_it_11_reporte_id');
    }
}