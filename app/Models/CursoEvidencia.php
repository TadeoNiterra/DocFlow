<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CursoEvidencia extends Model
{
    use HasFactory;

    protected $table = 'curso_evidencias';

    protected $fillable = [
        'curso_id',
        'nombre',
        'tipo_documento',
        'archivo_path',
        'comentarios',
    ];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}