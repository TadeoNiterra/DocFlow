<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormatoIt09Riesgo extends Model
{
    protected $table = 'fmt_it_09_riesgos';

    protected $fillable = [
        'fmt_it_09_proyecto_id',
        'numero',
        'riesgo_problema',
        'c',
        'i',
        'd',
        'probabilidad',
        'severidad',
        'puntaje',
        'nivel_riesgo',
        'tratamiento_causa',
    ];

    protected $casts = [
        'c' => 'boolean',
        'i' => 'boolean',
        'd' => 'boolean',
    ];

    public function evidencias(): HasMany
    {
        return $this->hasMany(FormatoIt09Evidencia::class, 'fmt_it_09_riesgo_id');
    }
}