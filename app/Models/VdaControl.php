<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VdaControl extends Model
{
    protected $fillable = ['parent_id', 'number', 'name', 'description', 'solution_description', 'sort_order'];


    /**
     * Relación directa con el Capítulo Raíz (El Abuelo) usando un Alias para evitar ambigüedades.
     */
    public function chapter(): BelongsTo
    {
        // Forzamos a la relación a usar la tabla "vda_controls" pero renombrada internamente como "chapters"
        return $this->belongsTo(VdaControl::class, 'parent_id')
            ->from('vda_controls as chapters')
            ->join('vda_controls as subcategories', 'subcategories.parent_id', '=', 'chapters.id');
    }
    // Relación con el padre (Ej: de 1.1.1 a 1.1)
    public function parent(): BelongsTo
    {
        return $this->belongsTo(VdaControl::class, 'parent_id');
    }

    // Relación con los hijos directos (Ej: de 1.1 obtienes todos sus 1.1.X)
    public function children(): HasMany
    {
        return $this->hasMany(VdaControl::class, 'parent_id')->orderBy('sort_order');
    }

    // Evidencias asociadas a este requerimiento específico
    public function evidences(): HasMany
    {
        return $this->hasMany(VdaEvidence::class);
    }
}