<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormatoIt02Funcion extends Model
{
    protected $table = 'fmt_it_02_funcions';

    protected $fillable = [
        'categoria_id',
        'nombre',
        'orden',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(FormatoIt02Categoria::class, 'categoria_id');
    }

    public function permisos(): HasMany
    {
        return $this->hasMany(FormatoIt02Permiso::class, 'funcion_id');
    }
}