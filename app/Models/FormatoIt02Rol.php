<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormatoIt02Rol extends Model
{
    protected $table = 'fmt_it_02_rols';

    protected $fillable = [
        'nombre',
        'orden',
    ];

    public function permisos(): HasMany
    {
        return $this->hasMany(FormatoIt02Permiso::class, 'rol_id');
    }
}