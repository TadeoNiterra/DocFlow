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
            $table->unsignedBigInteger('parent_id')->nullable();

            // 2. Creamos la llave foránea de forma manual con la regla estricta para SQL Server
            $table->foreign('parent_id')
                ->references('id')
                ->on('vda_controls')
                ->onDelete('no action');
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