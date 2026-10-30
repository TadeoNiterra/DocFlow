<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('checklist_equipos', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique(); // Folio de control (ej. CHK-2026-001)
            $table->foreignId('dispositivo_id')->constrained('dispositivos')->cascadeOnDelete();
            $table->foreignId('colaborador_id')->nullable()->constrained('colaboradors')->nullOnDelete();

            // Acción que detona la revisión
            $table->enum('accion', [
                'ASIGNACION_INICIAL', // Primer registro de entrega
                'MANTENIMIENTO',      // Revisiones periódicas
                'REPARACION',         // Fallas / Soporte
                'DEVOLUCION',         // Por baja de personal (libera equipo / Stock / Retirado)
                'CAMBIO',             // Por término de arrendamiento / Renovación
            ]);

            $table->date('fecha')->default(now()); //[cite: 13]
            $table->text('accesorios')->nullable(); // Cargador, mouse, mochila, candado, etc.[cite: 13]

            // --- BLOQUE HARDWARE (C = Cumple, NC = No Cumple, NA = No Aplica)[cite: 13] ---
            $table->enum('hw_accesorios_completos', ['C', 'NC', 'NA'])->default('C');
            $table->enum('hw_partes_funcionan', ['C', 'NC', 'NA'])->default('C');
            $table->enum('hw_enciende_bien', ['C', 'NC', 'NA'])->default('C');
            $table->enum('hw_carcasa_estado', ['C', 'NC', 'NA'])->default('C');
            $table->enum('hw_accesorios_estado', ['C', 'NC', 'NA'])->default('C');
            $table->enum('hw_limpieza', ['C', 'NC', 'NA'])->default('C');
            $table->string('hw_otros')->nullable();

            // --- BLOQUE SOFTWARE[cite: 13] ---
            $table->enum('sw_programas_completos', ['C', 'NC', 'NA'])->default('C');
            $table->enum('sw_programas_principales', ['C', 'NC', 'NA'])->default('C');
            $table->enum('sw_programas_secundarios', ['C', 'NC', 'NA'])->default('C');
            $table->enum('sw_limpieza_cookies_historial', ['C', 'NC', 'NA'])->default('C');
            $table->enum('sw_autorizado', ['C', 'NC', 'NA'])->default('C');
            $table->enum('sw_respaldo_local', ['C', 'NC', 'NA'])->default('C');
            $table->enum('sw_espacio_almacenamiento', ['C', 'NC', 'NA'])->default('C');
            $table->enum('sw_velocidad_respuesta', ['C', 'NC', 'NA'])->default('C');

            // --- BLOQUE SEGURIDAD[cite: 13] ---
            $table->enum('seg_mfa_desbloqueado', ['C', 'NC', 'NA'])->default('C');
            $table->enum('seg_antivirus_bloqueado', ['C', 'NC', 'NA'])->default('C');
            $table->enum('seg_derechos_privilegios', ['C', 'NC', 'NA'])->default('C');
            $table->string('seg_otros')->nullable();

            // Observaciones Generales[cite: 13]
            $table->text('observaciones')->nullable();

            // Firmas del Formato[cite: 13]
            $table->string('nombre_usuario')->nullable(); //[cite: 13]
            $table->string('nombre_jefe_directo')->nullable(); //[cite: 13]
            $table->string('nombre_sistemas')->nullable(); // Personal de TI que valida[cite: 13]

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checklist_equipos');
    }
};