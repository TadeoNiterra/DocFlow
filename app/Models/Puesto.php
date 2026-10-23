<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Puesto extends Model
{
    use HasFactory;

    protected $table = 'puestos';
    
    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
    ];

    public function colaboradores(): HasMany
    {
        return $this->hasMany(Colaborador::class, 'puesto_id');
    }
}