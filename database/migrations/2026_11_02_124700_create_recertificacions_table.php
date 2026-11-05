<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1. Cabecera del ciclo de recertificación (Trimestral)
        Schema::create('recertificacions', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique(); // ej. RC-2026-T1
            $table->string('periodo');         // ej. "Q1 2026", "Q2 2026"
            $table->dateTime('fecha_ejecucion');
            $table->integer('total_evaluados')->default(0);
            $table->integer('total_vigentes')->default(0);
            $table->integer('total_desactivados_ad')->default(0);
            $table->integer('total_no_encontrados_ad')->default(0);
            $table->enum('estatus', ['PENDIENTE_REVISION', 'APROBADO', 'ACCION_REQUERIDA'])->default('PENDIENTE_REVISION');
            $table->text('notas')->nullable();
            $table->foreignId('aprobado_por_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        // 2. Detalle línea por línea de cada usuario escaneado
        Schema::create('recertificacion_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recertificacion_id')->constrained('recertificacions')->cascadeOnDelete();
            $table->foreignId('colaborador_id')->constrained('colaboradors')->cascadeOnDelete();
            
            // Datos del estado al momento del escaneo
            $table->string('id_ad_registrado');      // El id_AD guardado en DocFlow
            $table->boolean('existe_en_ad')->default(false);
            $table->boolean('activo_en_ad')->default(false);
            
            // Diagnóstico comparativo
            $table->enum('estado_ad', [
                'VIGENTE',          // Existe y su cuenta está activa (userAccountControl)
                'DESACTIVADO_EN_AD',// Existe pero está deshabilitada en el DC
                'NO_EXISTE_EN_AD',  // No se encontró la cuenta (posible baja borrada)
            ]);

            $table->boolean('resuelto')->default(false); // Bandera para cuando TI ya tomó acción
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recertificacion_detalles');
        Schema::dropIfExists('recertificacions');
    }
};