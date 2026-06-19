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
        Schema::table('vda_evidences', function (Blueprint $table) {
            // 🔥 Agregamos el campo document_id relacionándolo de forma directa con la tabla documents
            $table->foreignId('document_id')
                ->nullable()
                ->after('external_url') // Lo posiciona de forma ordenada en la estructura
                ->constrained('documents')
                ->nullOnDelete(); // Si se llega a borrar el documento maestro, la evidencia no se rompe
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vda_evidences', function (Blueprint $table) {
            // Eliminamos la restricción de llave foránea y la columna si se hace un rollback
            $table->dropForeign(['document_id']);
            $table->dropColumn('document_id');
        });
    }
};