<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormatoIt14Soporte extends Model
{
    protected $table = 'fmt_it_14_soportes';

    protected $fillable = [
        'alcance_soporte',
        'responsable_asignado',
        'usuario_designado',
        'inicio',
        'fin',
        'solucion_justificacion',
        'comentarios',
        'rutaEvidencia',
        'user_id_creador',
    ];

    protected $casts = [
        'inicio' => 'datetime',
        'fin'    => 'datetime',
    ];

    public function creador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id_creador');
    }
}