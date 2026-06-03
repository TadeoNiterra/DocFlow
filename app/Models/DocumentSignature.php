<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocumentSignature extends Model
{
    use HasFactory;

    /**
     * Campos permitidos para asignación masiva.
     */
    protected $fillable = [
        'document_version_id',
        'user_id',
        'user_name_snapshot',
        'user_email_snapshot',
        'ip_address',
        'user_agent',
        'signature_hash',
        'signed_at',
    ];

    /**
     * Casting de tipos de datos automáticos.
     */
    protected $casts = [
        'signed_at' => 'datetime',
    ];

    /**
     * Relación: Una firma pertenece a una versión específica de un documento.
     */
    public function documentVersion(): BelongsTo
    {
        return $this->belongsTo(DocumentVersion::class);
    }

    /**
     * Relación: Una firma fue realizada por un usuario (CISO/Autoridad).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}