<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormatoIt18Plan extends Model
{
    protected $table = 'fmt_it_18_planes'; //[cite: 11, 17]

    protected $fillable = [
        'folio', //[cite: 11, 17]
        'fecha_elaboracion', //[cite: 11, 17]
        'escenario_critico', //[cite: 11, 17]
        'tipo_escenario', //[cite: 11, 17]
        'descripcion_escenario', //[cite: 11, 17]
        'antecedentes', //[cite: 11, 17]
        'rpo_global', //[cite: 11, 17]
        'rto_global', //[cite: 11, 17]
        'mtd', //[cite: 11, 17]
        'impacta_cliente', //[cite: 11, 17]
        'oem_tipo_afectacion', //[cite: 11, 17]
        'oem_consideraciones', //[cite: 11, 17]
        'aftermarket1_tipo_afectacion', //[cite: 11, 17]
        'aftermarket1_consideraciones', //[cite: 11, 17]
        'aftermarket2_tipo_afectacion', //[cite: 11, 17]
        'aftermarket2_consideraciones', //[cite: 11, 17]
        'otros_tipo_afectacion', //[cite: 11, 17]
        'otros_consideraciones', //[cite: 11, 17]
        'comite_crisis', //[cite: 11, 17]
        'otros_niterra', //[cite: 11, 17]
        'otras_partes_interesadas', //[cite: 11, 17]
        'limitaciones', //[cite: 11, 17]
        'coordinaciones_responsabilidades', //[cite: 11, 17]
        'user_id_creador', //[cite: 11, 17]
    ];

    protected $casts = [
        'fecha_elaboracion' => 'date', //[cite: 11]
        'impacta_cliente' => 'boolean', //[cite: 11]
    ];

    public function factores(): HasMany
    {
        return $this->hasMany(FormatoIt18Factor::class, 'fmt_it_18_plan_id'); //[cite: 11, 15]
    }

    public function fases(): HasMany
    {
        return $this->hasMany(FormatoIt18Fase::class, 'fmt_it_18_plan_id'); //[cite: 11, 16]
    }

    public function creador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id_creador'); //[cite: 11, 17]
    }

    public static function generarFolioNext(): string
    {
        $ultimoId = self::max('id') ?? 0; //[cite: 11]
        return 'PER-' . str_pad($ultimoId + 1, 3, '0', STR_PAD_LEFT); //[cite: 11]
    }
}