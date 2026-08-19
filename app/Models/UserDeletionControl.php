<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDeletionControl extends Model
{
    use HasFactory;

    protected $table = 'user_deletion_controls';

    protected $fillable = [
        'usuario',
        'fecha_baja',
        'fecha_final_periodo',
        'dias_revision_respaldos',
        'fecha_autorizacion_eliminacion',
        'fecha_eliminacion',
    ];

    protected $casts = [
        'fecha_baja' => 'date',
        'fecha_final_periodo' => 'date',
        'fecha_autorizacion_eliminacion' => 'date',
        'fecha_eliminacion' => 'date',
        'dias_revision_respaldos' => 'integer',
    ];
}