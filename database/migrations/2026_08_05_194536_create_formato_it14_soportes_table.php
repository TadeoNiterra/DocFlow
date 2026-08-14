<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_14_soportes', function (Blueprint $table) {
            $table->id();
            $table->string('alcance_soporte', 20)->default('Interno'); // Interno / Externo
            $table->string('responsable_asignado', 100);
            $table->string('usuario_designado', 100)->default('N/A');

            // Fechas y Horas de Inicio / Fin
            $table->dateTime('inicio')->nullable();
            $table->dateTime('fin')->nullable();

            $table->text('solucion_justificacion')->nullable();
            $table->text('comentarios')->nullable();
            $table->string('rutaEvidencia', 255)->nullable();

            $table->foreignId('user_id_creador')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_14_soportes');
    }
};