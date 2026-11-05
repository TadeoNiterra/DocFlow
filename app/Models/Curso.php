<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'instructor',
        'modalidad',
        'estatus',
        'horas_duracion',
        'comentarios',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'horas_duracion' => 'integer',
    ];

    public function evidencias(): HasMany
    {
        return $this->hasMany(CursoEvidencia::class, 'curso_id');
    }
}