<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_09_evidencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fmt_it_09_riesgo_id')->constrained('fmt_it_09_riesgos')->cascadeOnDelete();
            $table->string('ruta_archivo');
            $table->string('nombre_archivo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_09_evidencias');
    }
};