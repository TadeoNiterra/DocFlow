<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_09_activos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fmt_it_09_proyecto_id')->constrained('fmt_it_09_proyectos')->cascadeOnDelete();
            $table->string('id_activo'); // DM, SV, BD, SW, IN, etc.
            $table->string('activo');
            $table->string('clasificacion')->nullable();
            $table->string('revision_inicial')->nullable();
            $table->string('resultado_inicial')->nullable();
            $table->string('revision_intermedia')->nullable();
            $table->string('resultado_intermedio')->nullable();
            $table->string('revision_final')->nullable();
            $table->string('resultado_final')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_09_activos');
    }
};