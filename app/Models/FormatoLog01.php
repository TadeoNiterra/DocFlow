<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormatoLog01 extends Model
{
    use HasFactory;

    protected $table = 'formato_log01s';

    protected $fillable = [
        'proveedor_id',
        'area',
        'tipo',
        'fecha',
        'fechaAnterior',
        'producto',
        'precio',
        'respuesta',
        'experiencia',
        'pago',
        'pregunta1',
        'pregunta2',
        'pregunta3',
        'pregunta4',
        'pregunta5',
        'pregunta6',
        'pregunta7',
        'pregunta8',
        'pregunta9',
        'pregunta10',
        'pregunta11',
        'pregunta12',
        'pregunta13',
        'pregunta14',
        'pregunta15',
        'evaluador',
        'contrato',
        'vigencia',
    ];

    /**
     * Casts de atributos para formatear automáticamente fechas, booleanos y enteros.
     */
    protected $casts = [
        'tipo' => 'boolean',
        'contrato' => 'boolean',
        'vigencia' => 'boolean',
        'fecha' => 'date',
        'fechaAnterior' => 'date',
        'precio' => 'integer',
        'respuesta' => 'integer',
        'experiencia' => 'integer',
        'pago' => 'integer',
        'pregunta1' => 'integer',
        'pregunta2' => 'integer',
        'pregunta3' => 'integer',
        'pregunta4' => 'integer',
        'pregunta5' => 'integer',
        'pregunta6' => 'integer',
        'pregunta7' => 'integer',
        'pregunta8' => 'integer',
        'pregunta9' => 'integer',
        'pregunta10' => 'integer',
        'pregunta11' => 'integer',
        'pregunta12' => 'integer',
        'pregunta13' => 'integer',
        'pregunta14' => 'integer',
        'pregunta15' => 'integer',
    ];

    /**
     * Relación con el modelo Proveedor.
     */
    public function proveedor(): BelongsTo
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}