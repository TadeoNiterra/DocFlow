<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auditoria extends Model
{
    use HasFactory;

    protected $table = 'auditorias';

    protected $fillable = [
        'nombre',
        'fecha',
        'tipo',
        'estatus',
        'comentarios',
        'created_by_user_id',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    /**
     * Múltiples evidencias y documentos adjuntos asociados a la auditoría.
     */
    public function evidencias(): HasMany
    {
        return $this->hasMany(AuditoriaEvidencia::class, 'auditoria_id');
    }

    /**
     * Usuario que registró la auditoría.
     */
    public function creador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
}