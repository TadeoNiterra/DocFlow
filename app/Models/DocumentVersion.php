<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Casts; // 🚀 Importante para castear fechas con atributos

#[Fillable([
    'document_id',
    'version_number',
    'change_description',
    'file_path',
    'file_name',
    'status',
    'user_id',
    // 🔒 Nuevos campos de Auditoría TISAX
    'created_by_id',
    'reviewed_by_id',
    'reviewed_at',
    'last_reviewed_at',
    'approved_at'
])]
#[Casts([
    'reviewed_at' => 'datetime',
    'last_reviewed_at' => 'datetime',
    'approved_at' => 'datetime'
])]
class DocumentVersion extends Model
{
    use HasFactory;

    /**
     * Relación con el Documento Padre
     */
    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    /**
     * Usuario asignado originalmente (Dueno del registro)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Historial de firmas electronicas asociadas
     */
    public function signatures(): HasMany
    {
        return $this->hasMany(DocumentSignature::class);
    }

    /**
     * 🚀 NUEVO: Obtiene el usuario que creó la versión (Responsable del cambio)
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    /**
     * 🚀 NUEVO: Obtiene el usuario que revisó la versión (Consultado / Revisor Técnico)
     */
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by_id');
    }
}