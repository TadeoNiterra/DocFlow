<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_18_fases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fmt_it_18_plan_id')->constrained('fmt_it_18_planes')->cascadeOnDelete();
            $table->string('fase_nombre'); // Ej: Fase 0: Preparación
            $table->string('tipo_metrico')->nullable(); // RPO o RTO
            $table->decimal('tiempo_horas', 5, 2)->default(0);
            $table->text('acciones');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_18_fases');
    }
};