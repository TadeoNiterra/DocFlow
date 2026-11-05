<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecertificacionDetalle extends Model
{
    protected $table = 'recertificacion_detalles';

    protected $fillable = [
        'recertificacion_id',
        'colaborador_id',
        'id_ad_registrado',
        'guid_ad',
        'nombre_completo_ad',
        'email_ad',
        'distinguished_name',
        'existe_en_ad',
        'activo_en_ad',
        'estado_ad',
        'tipo_cambio',
        'departamento_ad',
        'clasificacion',
        'tipo_cuenta',
        'mes_recertificacion',
        'fecha_creacion_ad',
        'fecha_recertificacion',
        'fecha_cambio_ad',
        'resuelto',
        'observaciones',
    ];

    public function recertificacion(): BelongsTo
    {
        return $this->belongsTo(Recertificacion::class);
    }

    public function colaborador(): BelongsTo
    {
        return $this->belongsTo(Colaborador::class);
    }
}