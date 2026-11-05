<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recertificacion extends Model
{
    protected $table = 'recertificacions';

    protected $fillable = [
        'folio',
        'periodo',
        'fecha_ejecucion',
        'total_evaluados',
        'total_vigentes',
        'total_desactivados_ad',
        'total_no_encontrados_ad',
        'estatus',
        'notas',
        'aprobado_por_user_id',
    ];

    protected $casts = [
        'fecha_ejecucion' => 'datetime',
    ];

    public function detalles(): HasMany
    {
        return $this->hasMany(RecertificacionDetalle::class);
    }

    public function aprobadoPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'aprobado_por_user_id');
    }
}