<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class FormatoIt09Proyecto extends Model
{
    use HasFactory;

    protected $table = 'fmt_it_09_proyectos';

    protected $fillable = [
        'folio',
        'proyecto',
        'fecha',
        'user_id_creador',
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'date',
        ];
    }

    public function creador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id_creador');
    }

    public function activos(): HasMany
    {
        return $this->hasMany(FormatoIt09Activo::class, 'fmt_it_09_proyecto_id');
    }

    public function riesgos(): HasMany
    {
        return $this->hasMany(FormatoIt09Riesgo::class, 'fmt_it_09_proyecto_id');
    }

    public function evidencias(): HasMany
    {
        return $this->hasMany(FormatoIt09Evidencia::class, 'fmt_it_09_proyecto_id');
    }

    protected static function booted(): void
    {
        static::deleted(function (FormatoIt09Proyecto $record) {
            // Elimina storage/app/private/f-it-09/$folio
            $folderPath = "f-it-09/{$record->folio}";

            if (Storage::disk('local')->exists($folderPath)) {
                Storage::disk('local')->deleteDirectory($folderPath);
            }
        });
    }
}