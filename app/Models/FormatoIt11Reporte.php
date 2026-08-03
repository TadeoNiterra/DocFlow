<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormatoIt11Reporte extends Model
{
    protected $table = 'fmt_it_11_reportes';

    protected $fillable = [
        'folio',
        'area_negocio',
        'unidad_funcional',
        'fecha_prueba',
        'responsable_respuesta',
        'escenario',
        'lugar_entrevista',
        'consideraciones',
        'personas_presentes',
        'personas_involucradas',
        'evacuacion_teorico',
        'evacuacion_real',
        'rpo_teorico',
        'rpo_real',
        'rto_teorico',
        'rto_real',
        'mtd_teorico',
        'mtd_real',
        'plan_efectivo',
        'porque_efectivo',
        'lecciones_aprendidas',
        'user_id_creador',
    ];

    protected $casts = [
        'fecha_prueba' => 'date',
        'plan_efectivo' => 'boolean',
    ];

    public function fases(): HasMany
    {
        return $this->hasMany(FormatoIt11Fase::class, 'fmt_it_11_reporte_id');
    }

    public function creador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id_creador');
    }
}