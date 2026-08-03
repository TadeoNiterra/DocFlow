<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormatoIt09Activo extends Model
{
    protected $table = 'fmt_it_09_activos';

    protected $fillable = [
        'fmt_it_09_proyecto_id',
        'id_activo',
        'activo',
        'clasificacion',
        'revision_inicial',
        'resultado_inicial',
        'revision_intermedia',
        'resultado_intermedio',
        'revision_final',
        'resultado_final',
    ];

    // 🟢 Castea automáticamente los campos de revisión a fechas (Carbon)
    protected $casts = [
        'revision_inicial' => 'date',
        'revision_intermedia' => 'date',
        'revision_final' => 'date',
    ];
}