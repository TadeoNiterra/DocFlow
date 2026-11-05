<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('auditoria_evidencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auditoria_id')
                ->constrained('auditorias')
                ->cascadeOnDelete();

            $table->string('nombre');
            $table->string('tipo_documento')->default('OTRO');
            $table->string('archivo_path');
            $table->text('comentarios')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('auditoria_evidencias');
    }
};