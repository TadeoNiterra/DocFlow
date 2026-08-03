<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_09_riesgos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fmt_it_09_proyecto_id')->constrained('fmt_it_09_proyectos')->cascadeOnDelete();
            $table->integer('numero');
            $table->text('riesgo_problema');
            $table->boolean('c')->default(false); // Confidencialidad
            $table->boolean('i')->default(false); // Integridad
            $table->boolean('d')->default(false); // Disponibilidad
            $table->integer('probabilidad')->default(1);
            $table->integer('severidad')->default(1);
            $table->integer('puntaje')->default(1);
            $table->string('nivel_riesgo')->nullable();
            $table->text('tratamiento_causa')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_09_riesgos');
    }
};