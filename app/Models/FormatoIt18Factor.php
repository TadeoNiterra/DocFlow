<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormatoIt18Factor extends Model
{
    protected $table = 'fmt_it_18_factores';

    protected $fillable = [
        'fmt_it_18_plan_id',
        'tipo',
        'descripcion',
        'clasificacion',
        'influencia',
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(FormatoIt18Plan::class, 'fmt_it_18_plan_id');
    }
}