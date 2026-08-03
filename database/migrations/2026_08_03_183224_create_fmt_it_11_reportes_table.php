<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_11_reportes', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique();
            $table->string('area_negocio')->default('IT');
            $table->string('unidad_funcional')->default('Niterra México');
            $table->date('fecha_prueba');
            $table->string('responsable_respuesta')->default('Operations Department Emergency Response Head Office');
            $table->text('escenario');
            $table->string('lugar_entrevista')->default('Niterra México, Depto IT');
            $table->text('consideraciones')->nullable();

            $table->integer('personas_presentes')->nullable();
            $table->integer('personas_involucradas')->nullable();

            // Métricos
            $table->decimal('evacuacion_teorico', 5, 2)->nullable();
            $table->decimal('evacuacion_real', 5, 2)->nullable();

            $table->decimal('rpo_teorico', 5, 2)->nullable();
            $table->decimal('rpo_real', 5, 2)->nullable();

            $table->decimal('rto_teorico', 5, 2)->nullable();
            $table->decimal('rto_real', 5, 2)->nullable();

            $table->decimal('mtd_teorico', 5, 2)->nullable();
            $table->decimal('mtd_real', 5, 2)->nullable();

            // Evaluación
            $table->boolean('plan_efectivo')->default(true);
            $table->text('porque_efectivo')->nullable();
            $table->text('lecciones_aprendidas')->nullable();

            $table->foreignId('user_id_creador')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_11_reportes');
    }
};