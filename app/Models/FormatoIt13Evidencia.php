<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormatoIt13Evidencia extends Model
{
    protected $table = 'fmt_it_13_evidencias';

    protected $fillable = [
        'usuario',
        'base',
        'fecha',
        'version',
        'descripcion',
        'status',
        'observaciones',
        'rutaEvidencia',
        'fecha_nueva',
    ];

    protected $casts = [
        'fecha' => 'datetime',
        'fecha_nueva' => 'datetime',
    ];
}