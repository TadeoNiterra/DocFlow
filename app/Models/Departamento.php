<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departamento extends Model
{
    use HasFactory;
    
    protected $table = 'departamentos';

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
    ];

    public function colaboradores(): HasMany
    {
        return $this->hasMany(Colaborador::class, 'departamento_id');
    }
}