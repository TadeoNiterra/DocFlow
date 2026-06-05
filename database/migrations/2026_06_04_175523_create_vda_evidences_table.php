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
        Schema::create('vda_evidences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vda_control_id')->constrained('vda_controls')->cascadeOnDelete();

            $table->string('name'); // Nombre descriptivo de la evidencia
            $table->enum('type', ['upload', 'docflow_version', 'url']); // Origen de la evidencia

            // Columnas condicionales según el tipo
            $table->string('file_path')->nullable(); // Para nuevas subidas físicas
            $table->string('external_url')->nullable(); // Para links de Drive, OneDrive, Jira, etc.

            // Relación opcional con tu tabla actual de versiones de DocFlow
            $table->foreignId('document_version_id')->nullable()->constrained('document_versions')->nullOnDelete();

            $table->foreignId('user_id')->constrained('users'); // Quién cargó la evidencia
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vda_evidences');
    }
};