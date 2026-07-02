<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_04', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique();
            $table->date('fecha_eliminacion');
            $table->string('nombre_puesto');
            $table->string('nombre_maquina');
            $table->string('num_serie');
            $table->text('carpeta_respaldo')->nullable();

            // Opciones Múltiples (Enums)
            $table->enum('tipo_dispositivo', ['Fisico', 'Virtual'])->default('Fisico');
            $table->string('dispositivo'); // Laptop, Desktop, Servidor, etc.
            $table->enum('tratamiento', ['Total', 'Reutilizable'])->default('Reutilizable');

            // Firmas / Solicitantes
            $table->foreignId('user_id_creador')->constrained('users')->cascadeOnDelete();
            $table->string('nombre_gerente');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_04');
    }
};