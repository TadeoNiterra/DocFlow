<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormatoIt02Categoria extends Model
{
    protected $table = 'fmt_it_02_categorias';

    protected $fillable = [
        'matriz_tipo',
        'nombre',
        'orden',
    ];

    public function funciones(): HasMany
    {
        return $this->hasMany(FormatoIt02Funcion::class, 'categoria_id')->orderBy('orden');
    }
}