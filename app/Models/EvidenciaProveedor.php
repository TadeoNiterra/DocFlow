<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EvidenciaProveedor extends Model
{
    use HasFactory;
    
    protected $table = 'evidencia_proveedors';
    
    protected $fillable = [
        'proveedor_id',
        'ruta_archivo',
        'nombre_archivo',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    /**
     * Evento ejecutado automáticamente al eliminar una evidencia
     */
    protected static function booted(): void
    {
        static::deleted(function (EvidenciaProveedor $evidencia) {
            if ($evidencia->ruta_archivo) {
                // Borra el archivo físico del disco 'local' (storage/app/private)
                Storage::disk('local')->delete($evidencia->ruta_archivo);
            }
        });
    }
}