<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedors';

    protected $fillable = [
        'nombre',
        'razonSocial',
        'actividad',
        'status',
        'departamentoResponsable',
        'personaContacto',
        'numeroContacto',
        'email',
        'date',
    ];
    protected $casts = [
        'date' => 'integer',
    ];

    public function evidencias(): HasMany
    {
        return $this->hasMany(EvidenciaProveedor::class, 'proveedor_id');
    }
}