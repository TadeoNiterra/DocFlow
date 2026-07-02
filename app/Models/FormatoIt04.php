<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class FormatoIt04 extends Model
{
    use HasFactory;

    protected $table = 'fmt_it_04';

    /**
     * Campos permitidos para asignación masiva.
     */
    protected $fillable = [
        'folio',
        'fecha_eliminacion',
        'nombre_puesto',
        'nombre_maquina',
        'num_serie',
        'tipo_dispositivo',
        'dispositivo',
        'tratamiento',
        'carpeta_respaldo',
        'user_id_creador',
        'nombre_gerente',
    ];

    protected function casts(): array
    {
        return [
            'fecha_eliminacion' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function Creador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id_creador');
    }

    public function evidencias(): HasMany
    {
        return $this->hasMany(FormatoIt04Evidencia::class, 'formato_it04_id')->orderBy('orden');
    }

    protected static function booted(): void
    {
        static::deleted(function (FormatoIt04 $record) {
            $folderPath = "f-it-04/{$record->folio}";

            if (Storage::disk('local')->exists($folderPath)) {
                Storage::disk('local')->deleteDirectory($folderPath);
            }
        });
    }
}