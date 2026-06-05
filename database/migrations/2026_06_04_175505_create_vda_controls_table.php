<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vda_controls', function (Blueprint $table) {
            $table->id();
            // Clave para la jerarquía: apunta a sí misma
            $table->foreignId('parent_id')->nullable()->constrained('vda_controls')->cascadeOnDelete();

            $table->string('number'); // Ej: "1", "1.1", "1.1.1"
            $table->string('name');   // Ej: "Information Security Policies"
            $table->text('description')->nullable(); // Explicación teórica del punto
            $table->text('solution_description')->nullable(); // Tu "Descripción de la solución"

            $table->integer('sort_order')->default(0); // Para ordenar el árbol visualmente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vda_controls');
    }
};