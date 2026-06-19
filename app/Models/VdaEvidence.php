<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VdaEvidence extends Model
{
    use HasFactory;

    /**
     * Tabla asociada al modelo.
     */
    protected $table = 'vda_evidences';

    /**
     * Atributos asignables de forma masiva.
     */
    protected $fillable = [
        'vda_control_id',
        'name',
        'type',
        'file_path',
        'external_url',
        'document_version_id', // Se mantiene por si usas cargas estáticas históricas
        'document_id',         // 🔥 AGREGADO: Nueva columna para el Documento Padre
        'user_id',
    ];

    /**
     * Registro automático de metadatos del usuario.
     */
    protected static function boot()
    {
        parent::boot();

        // Antes de crear el registro en la base de datos, le inyectamos el ID del usuario logueado
        static::creating(function ($evidence) {
            if (auth()->check()) {
                $evidence->user_id = auth()->id();
            }
        });
    }

    /**
     * Relación: La evidencia pertenece a un requerimiento específico del árbol VDA.
     */
    public function vdaControl(): BelongsTo
    {
        return $this->belongsTo(VdaControl::class, 'vda_control_id');
    }

    /**
     * Relación: La evidencia pertenece directamente a un Documento Padre de DocFlow.
     */
    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

    /**
     * Relación Opcional: La evidencia puede estar vinculada a una versión firmada de DocFlow.
     */
    public function documentVersion(): BelongsTo
    {
        return $this->belongsTo(DocumentVersion::class, 'document_version_id');
    }

    /**
     * Relación: Conocer qué usuario cargó o vinculó esta evidencia.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Obtiene la versión más reciente del documento vinculado de forma dinámica.
     */
    public function getLatestDocumentVersionAttribute()
    {
        if ($this->type !== 'docflow_version' || !$this->document_id) {
            return null;
        }

        // Buscamos directamente en la tabla de versiones usando el document_id (Padre) guardado
        return DocumentVersion::where('document_id', $this->document_id)
            ->whereIn('status', ['aprobado', 'aprobado / firmado'])
            ->orderBy('id', 'desc') // El ID más alto siempre será la última revisión registrada
            ->first();
    }
}