<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormatoIt02Permiso extends Model
{
    protected $table = 'fmt_it_02_permisos';

    protected $fillable = [
        'rol_id',
        'funcion_id',
        'valor',
    ];

    public function rol(): BelongsTo
    {
        return $this->belongsTo(FormatoIt02Rol::class, 'rol_id');
    }

    public function funcion(): BelongsTo
    {
        return $this->belongsTo(FormatoIt02Funcion::class, 'funcion_id');
    }
}