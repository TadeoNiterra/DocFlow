<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormatoIt04Evidencia extends Model
{
    use HasFactory;

    protected $table = 'fmt_it_04_evidencias';

    protected $fillable = [
        'formato_it04_id',
        'ruta_archivo',
        'nombre_archivo',
        'orden',
    ];

    public function formato(): BelongsTo
    {
        return $this->belongsTo(FormatoIt04::class, 'formato_it04_id');
    }
}