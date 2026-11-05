<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuditoriaEvidencia extends Model
{
    use HasFactory;

    protected $table = 'auditoria_evidencias';

    protected $fillable = [
        'auditoria_id',
        'nombre',
        'tipo_documento',
        'archivo_path',
        'comentarios',
    ];

    /**
     * Auditoría principal a la que pertenece esta evidencia.
     */
    public function auditoria(): BelongsTo
    {
        return $this->belongsTo(Auditoria::class, 'auditoria_id');
    }
}