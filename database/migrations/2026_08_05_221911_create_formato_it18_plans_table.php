<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_18_planes', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique(); // F-IT-18 PER-01
            $table->date('fecha_elaboracion');
            $table->string('escenario_critico');
            $table->string('tipo_escenario'); // Tecnológico, Natural, Operativo, Humano
            $table->text('descripcion_escenario');
            $table->text('antecedentes')->nullable();

            // Resumen de Métricos Totales (Horas)
            $table->decimal('rpo_global', 5, 2)->default(0);
            $table->decimal('rto_global', 5, 2)->default(0);
            $table->decimal('mtd', 5, 2)->default(0);

            // Matriz Afectación al Cliente
            $table->boolean('impacta_cliente')->default(false);
            $table->string('oem_tipo_afectacion')->nullable();
            $table->string('oem_consideraciones')->nullable();
            $table->string('aftermarket1_tipo_afectacion')->nullable();
            $table->string('aftermarket1_consideraciones')->nullable();
            $table->string('aftermarket2_tipo_afectacion')->nullable();
            $table->string('aftermarket2_consideraciones')->nullable();
            $table->string('otros_tipo_afectacion')->nullable();
            $table->string('otros_consideraciones')->nullable();

            // Cadena de Llamadas
            $table->text('comite_crisis')->nullable();
            $table->text('otros_niterra')->nullable();
            $table->text('otras_partes_interesadas')->nullable();

            // Bloques de Texto
            $table->text('limitaciones')->nullable();
            $table->text('coordinaciones_responsabilidades')->nullable();

            $table->foreignId('user_id_creador')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_18_planes');
    }
};