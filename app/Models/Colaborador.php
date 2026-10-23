<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaboradors';

    protected $fillable = [
        'id_colaborador',
        'name',
        'lastname',
        'departamento_id',
        'puesto_id',
        'email',
        'id_sap',
        'id_vpn',
        'id_cofidi',
        'id_AD',
        'num_tarjeta',
        'DDEX',
    ];

    public function dispositivos(): HasMany
    {
        return $this->hasMany(Dispositivo::class, 'colaborador_id');
    }

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function puesto(): BelongsTo
    {
        return $this->belongsTo(Puesto::class, 'puesto_id');
    }
}