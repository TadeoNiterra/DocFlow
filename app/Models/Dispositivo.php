<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dispositivo extends Model
{
    use HasFactory;

    protected $table = 'dispositivos';
    protected $guarded = [];

    protected $casts = [
        'fecha_compra' => 'date',
        'fecha_asignacion' => 'date',
        'fecha_baja' => 'date',
        'cubo_cargador' => 'boolean',
    ];

    public function modeloEquipo(): BelongsTo
    {
        return $this->belongsTo(ModeloEquipo::class, 'modelo_equipo_id');
    }

    public function colaborador(): BelongsTo
    {
        return $this->belongsTo(Colaborador::class, 'colaborador_id');
    }
}