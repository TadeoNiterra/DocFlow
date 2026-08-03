<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_11_fases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fmt_it_11_reporte_id')->constrained('fmt_it_11_reportes')->cascadeOnDelete();
            $table->string('bloque'); // Activación BCP / Activación DRP
            $table->string('fase');   // 1. Notificación, 2. Evaluación, etc.
            $table->string('inicio')->nullable(); // Ej: 11:00
            $table->string('fin')->nullable();    // Ej: 11:10
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_11_fases');
    }
};