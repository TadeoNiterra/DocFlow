<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModeloEquipo extends Model
{
    use HasFactory;

    protected $table = 'modelo_equipos';
    protected $guarded = [];

    public function dispositivos(): HasMany
    {
        return $this->hasMany(Dispositivo::class, 'modelo_equipo_id');
    }
}