<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id();

            // Llaves Foráneas
            $table->foreignId('modelo_equipo_id')
                ->constrained('modelo_equipos')
                ->cascadeOnDelete();

            $table->foreignId('colaborador_id')
                ->nullable()
                ->constrained('colaboradors')
                ->nullOnDelete();

            // Columnas
            $table->string('numero_serie')->nullable();
            $table->string('imei')->nullable();
            $table->string('imei2')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('linea_telefonica')->nullable();

            // Monitor o accesorio secundario
            $table->string('marca_monitor')->nullable();
            $table->string('serie_monitor')->nullable();
            $table->boolean('cubo_cargador')->default(false);

            // Control, fechas y ciclo de vida
            $table->string('nivel_confidencialidad')->default('CONFIDENCIAL');
            $table->string('location')->nullable();
            $table->string('arrendamiento_compra')->nullable();
            $table->date('fecha_compra')->nullable();
            $table->date('fecha_asignacion')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->string('estatus_asignacion')->default('ENTREGADO');
            $table->integer('ciclo_borrado')->default(0);
            $table->text('comentarios')->nullable();

            $table->timestamps();
            
            // Índice normal de búsqueda (no único) para mejorar rendimiento en SQL Server
            $table->index('numero_serie');
        });

        // Únicamente mantenemos el índice único para IMEI
        DB::statement('CREATE UNIQUE INDEX dispositivos_imei_unique ON dispositivos (imei) WHERE imei IS NOT NULL');
    }

    public function down(): void
    {
        Schema::dropIfExists('dispositivos');
    }
};