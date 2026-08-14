<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormatoIt18Plan extends Model
{
    protected $table = 'fmt_it_18_planes';

    protected $fillable = [
        'folio',
        'fecha_elaboracion',
        'escenario_critico',
        'tipo_escenario',
        'descripcion_escenario',
        'antecedentes',
        'rpo_global',
        'rto_global',
        'mtd',
        'impacta_cliente',
        'oem_tipo_afectacion',
        'oem_consideraciones',
        'aftermarket1_tipo_afectacion',
        'aftermarket1_consideraciones',
        'aftermarket2_tipo_afectacion',
        'aftermarket2_consideraciones',
        'otros_tipo_afectacion',
        'otros_consideraciones',
        'comite_crisis',
        'otros_niterra',
        'otras_partes_interesadas',
        'limitaciones',
        'coordinaciones_responsabilidades',
        'user_id_creador',
    ];

    protected $casts = [
        'fecha_elaboracion' => 'date',
        'impacta_cliente'   => 'boolean',
    ];

    public function factores(): HasMany
    {
        return $this->hasMany(FormatoIt18Factor::class, 'fmt_it_18_plan_id');
    }

    public function fases(): HasMany
    {
        return $this->hasMany(FormatoIt18Fase::class, 'fmt_it_18_plan_id');
    }

    public function creador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id_creador');
    }

    // Generador de Folio Incremental
    public static function generarFolioNext(): string
    {
        $ultimoId = self::max('id') ?? 0;
        $num = str_pad($ultimoId + 1, 2, '0', STR_PAD_LEFT);
        return "F-IT-18 PER-{$num}";
    }
}