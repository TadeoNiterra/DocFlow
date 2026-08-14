<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_18_factores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fmt_it_18_plan_id')->constrained('fmt_it_18_planes')->cascadeOnDelete();
            $table->string('tipo'); // Interno / Externo
            $table->text('descripcion');
            $table->string('clasificacion'); // Fortaleza, Oportunidad, Debilidad, Amenaza
            $table->string('influencia'); // Alto, Medio, Bajo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_18_factores');
    }
};