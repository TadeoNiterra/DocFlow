<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChecklistEquipo extends Model
{
    use HasFactory;

    protected $table = 'checklist_equipos';

    protected $fillable = [
        'folio',
        'dispositivo_id',
        'colaborador_id',
        'accion',
        'fecha',
        'accesorios',
        'hw_accesorios_completos',
        'hw_partes_funcionan',
        'hw_enciende_bien',
        'hw_carcasa_estado',
        'hw_accesorios_estado',
        'hw_limpieza',
        'hw_otros',
        'sw_programas_completos',
        'sw_programas_principales',
        'sw_programas_secundarios',
        'sw_limpieza_cookies_historial',
        'sw_autorizado',
        'sw_respaldo_local',
        'sw_espacio_almacenamiento',
        'sw_velocidad_respuesta',
        'seg_mfa_desbloqueado',
        'seg_antivirus_bloqueado',
        'seg_derechos_privilegios',
        'seg_otros',
        'observaciones',
        'nombre_usuario',
        'nombre_jefe_directo',
        'nombre_sistemas',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    public function dispositivo(): BelongsTo
    {
        return $this->belongsTo(Dispositivo::class);
    }

    public function colaborador(): BelongsTo
    {
        return $this->belongsTo(Colaborador::class);
    }
}